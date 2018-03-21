<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Link URL
		$linkHelper = list_link();
		$this->facebook = $linkHelper['facebook'];
		$this->instagram = $linkHelper['instagram'];
		$this->whatsapp = $linkHelper['whatsapp'];
		$this->googleMapsKey = $linkHelper['gmaps'];
		$this->kotakanPartner = $linkHelper['kotakanPartner'];
	}
	
	public function Router($action) 
	{
		$router = trimLower($action);

		switch($router) {
			case 'about':
				$this->indexTemplate('frontpage/about');
			break;

			case 'order':
				$getdata = $this->input->get();
				if(!$getdata['form']) $this->showError();
				else{
					switch( trimLower($getdata['form'])) {
						case 'snackbox':
						case 'coffeebreak':
						case 'katering':
						case 'nasikotak':
							$slug = @$getdata['s'];
							if(!$slug && $getdata['form'] === 'nasikotak') redirect();
							// Parameter slug ada?
							if($slug) {
								$theSlug = @urlDecoder($slug);
								// Apakah slug benar ? 
								if( ! validSlug($theSlug)) $this->showError();
								else {
								$dataSelect['slug'] = $theSlug;
								$query = $this->QueryBuilder->select($dataSelect, 'm_barang');
									// Validasi lagi apabila slug tidak ditemukan, Apakah slug ditemukan di DB?
									if( ! $query->num_rows() > 0) $this->showError();
									else{
										$data['selected_menu'] = $query->row();
									}
								}
							}
							$listCategory = array('nasikotak','snackbox','coffeebreak','katering');
							$indexKategori = array_search($getdata['form'], $listCategory) + (int) 1;
							$selectMenu['id_kategori'] = $indexKategori;
							$data['kategori'] = $getdata['form'];
							$data['select_menu'] = $this->QueryBuilder->select($selectMenu, 'm_barang', 'nama', 'DESC')->result();
							$this->indexTemplate('frontpage/form_pemesanan', @$data);
						break;

						default:
							$this->showError();
						break;
					}
				}
			break;

			case 'blog':
				$getdata = $this->input->get();
				$sql = "SELECT 
								artikel.id, artikel.judul, artikel.gambar_utama, artikel.slug,
								artikel.konten, user.nama AS nama_author, artikel.date_added
								FROM m_artikel artikel, m_user user
								WHERE artikel.status = 1 AND artikel.author = user.id ORDER BY artikel.date_added DESC";
				$pagingPerPage = 6;
			  // Pagination custom config
				$configPaging = array(
						'baseUrl' => base_url().'blog/',
						'totalRows' => $this->QueryBuilder->rawQuery($sql)->num_rows(),
						'perPage' => $pagingPerPage,
						'numLinks' => 1
					);
				//* Pagination custom config
			  if(@$getdata['next']) { 
			  	$pattern = (bool) preg_match('/^[0-9]*$/', $getdata['next']);
			  	if(!$pattern) redirect();
			  	$offset = (int) $getdata['next'] * (int) $pagingPerPage;
			  	$sql .= " LIMIT ".$pagingPerPage.", ".$offset;
			  } else {
			  	$sql .= " LIMIT 0, ".$pagingPerPage;
			  }
				$data['list_artikel'] = $this->QueryBuilder->rawQuery($sql)->result();
				$data['paging'] = createPagination($configPaging);
				$this->indexTemplate('frontpage/blog_list', $data);
			break;

			case 'contact':
				$this->indexTemplate('frontpage/contact');
			break;

			case 'confirmation':
				$this->indexTemplate('frontpage/payment_confirmation');
			break;

			case 'order-completed':
				if(!$this->session->flashdata('orderCompleted')) redirect();
				$this->indexTemplate('frontpage/order_done');
			break;

			case 'menu':
				$getdata = $this->input->get();
				$sql = "SELECT";
			  $sql.= " m_barang.id, m_kategori.id AS id_kategori, m_kategori.nama AS nama_kategori, m_barang.nama AS nama_barang,";
			  $sql.= " m_barang.gambar, m_barang.harga_satuan, m_barang.date_added, m_barang.status, m_barang.slug FROM m_barang, m_kategori";
			  $sql.= " WHERE m_barang.id_kategori = m_kategori.id AND m_barang.status = 1";
			  if(@$getdata['category']) {
			  	$listCategory = array(
			  			1 => 'nasikotak',
			  			2 => 'snackbox',
			  			3 => 'coffeebreak',
			  			4 => 'katering'
			  		);
			  	$kategoriIndex = array_search($getdata['category'], $listCategory);
			  	if($getdata['category'] == 'all') {
			  		$sql .= " AND m_kategori.id IN (1,2,3,4)";
			  	} elseif(!empty($kategoriIndex)) {
			  		$sql .= " AND m_kategori.id = ".$kategoriIndex;
			  	}
			  }
			  if(@$getdata['q']) {
			  	$sql .= " AND m_barang.nama LIKE '%".$getdata['q']."%'";
			  }
			  if(@$getdata['price']) {
			  	$listPrice = array(
			  			1 => 'lowest',
			  			2 => 'highest'
			  		);
			  	$priceIndex = array_search($getdata['price'], $listPrice);

			  	if($priceIndex) {
			  		 $sql.= " ORDER BY m_barang.harga_satuan ";
			  		 $sql.= $priceIndex == 1 ? 'ASC' : 'DESC';
			  	}
			  }

			  if(!isset($getdata['category']) && !isset($getdata['price'])) {
			  	$sql.= " ORDER BY m_barang.date_added DESC";
			  }
			  $pagingPerPage = 6;
			  // Pagination custom config
				$configPaging = array(
						'baseUrl' => base_url().'menu/',
						'totalRows' => $this->QueryBuilder->rawQuery($sql)->num_rows(),
						'perPage' => $pagingPerPage,
						'numLinks' => 1
					);
				//* Pagination custom config
			  if(@$getdata['next']) { 
			  	$pattern = (bool) preg_match('/^[0-9]*$/', $getdata['next']);
			  	if(!$pattern) redirect();
			  	$offset = (int) $getdata['next'] * (int) $pagingPerPage;
			  	$sql .= " LIMIT ".$pagingPerPage.", ".$offset;
			  } else {
			  	$sql .= " LIMIT 0, ".$pagingPerPage;
			  }
			  $data['list_menu'] = $this->QueryBuilder->rawQuery($sql)->result();
			  $result = count($data['list_menu']);
				$data['paging'] = createPagination($configPaging);
				$this->indexTemplate('frontpage/menu_list', $data);
			break;

			case 'do_action':
				$getdata = $this->input->get();
				$postdata = $this->input->post();
				if(!$postdata) redirect();
				if(!$getdata['method']) $this->showError();
				else $this->doAction($getdata['method'], $postdata, @$_FILES);	
			break;

			case 'payment':
				$getdata = $this->input->get();
				if(!$getdata['t']) redirect();
				$noOrder = @urlDecoder($getdata['t']);
				$pattern = '/^[1-9][0-9]{0,15}$/';

				if( ! (bool) preg_match($pattern, $noOrder)) $this->showError();
				else {
					$dataCondition['no_pesanan'] = "#".$noOrder;
					$query = $this->QueryBuilder->select($dataCondition, 'm_pesanan');
					$data['data_pesanan'] = $query->row();
					$data['data_pemesan'] = $this->QueryBuilder->select(array('id_pesanan' => $data['data_pesanan']->id), 't_data_pribadi')->row();
					$sql = "SELECT 
									barang.nama, barang.harga_satuan, barang.gambar 
									FROM m_barang barang, t_order
									WHERE t_order.id_barang = barang.id AND t_order.id_pesanan = '".$data['data_pesanan']->id."'";
					$data['data_menu'] = $this->QueryBuilder->rawQuery($sql)->result();
					$this->indexTemplate('frontpage/form_confirmation', $data);
				}
			break;

			default:
				$this->showError();
			break;
		}
	}

	public function index()
	{
		$sql = "SELECT";
	  $sql.= " m_barang.id, m_kategori.id AS id_kategori, m_kategori.nama AS nama_kategori, m_barang.nama AS nama_barang,";
	  $sql.= " m_barang.gambar, m_barang.harga_satuan, m_barang.date_added, m_barang.status, m_barang.slug FROM m_barang, m_kategori";
	  $sql.= " WHERE m_barang.id_kategori = m_kategori.id AND m_barang.status = 1 ORDER BY RAND() LIMIT 12";
		$data['list_menu'] = $this->QueryBuilder->rawQuery($sql)->result();
		$this->indexTemplate('homepage', $data);
	}

	private function doAction($method, $data, $files = '')
	{
		switch( trimLower($method)) {
			case 'new_order':
				// Hitung total biaya
				$items = null;
				$numItems = count($data['items']);
				$i = 0;
				foreach($data['items'] as $id) {
					$items .= (++$i === $numItems) ? $id : $id.',';
				}
				$sql = 'SELECT SUM(harga_satuan) AS total_biaya FROM m_barang WHERE id IN ('.$items.')';
				$result = $this->QueryBuilder->rawQuery($sql)->row();
				
				// Insert Orderan
				$newOrder = generateNoOrder();
				$dataOrder['no_pesanan'] = $newOrder;
				$dataOrder['tanggal_kirim'] = customDate($data['tanggal_kirim']).' '.$data['jam_kirim'].':00:00';
				$dataOrder['alamat_penerima'] = $data['alamat_kirim'];
				$dataOrder['nomor_penerima'] = $data['nohp_penerima'];
				$dataOrder['total_biaya'] = $result->total_biaya;
				$dataOrder['keterangan'] = @$data['keterangan'] ? $data['keterangan'] : null;

				$newOrderId = $this->QueryBuilder->insert_id($dataOrder, 'm_pesanan');
				if(!$newOrderId) redirect();

				// Insert Data Pribadi
				$dataPemesan['id_pesanan'] = $newOrderId;
				$dataPemesan['nama'] = $data['nama_pemesan'];
				$dataPemesan['no_hp'] = $data['nohp_pemesan'];
				$dataPemesan['email'] = $data['email_pemesan'];
				$dataPemesan['alamat'] = $data['alamat_pemesan'];

				$this->QueryBuilder->insert($dataPemesan, 't_data_pribadi');

				// Insert Menu
				$menudata = array();
				foreach($data['items'] as $id) {
					$dataMenu['id_pesanan'] = $newOrderId;
					$dataMenu['id_barang'] = $id;
 					$menudata[] = $dataMenu;
				}

				$this->QueryBuilder->insert_batch($menudata, 't_order');
				$encode = str_replace('#', '', $newOrder);
				redirect('payment?t='.urlEncoder($encode));
 			break;

 			case 'accept_order':
 				$dataCondition['no_pesanan'] = $data['__n'];
 				$dataUpdate['status'] = 2;
 				$this->QueryBuilder->update($dataCondition, $dataUpdate, 'm_pesanan');
 				$send = array(
 						'email' => $data['__e'],
 						'no_pesanan' => $data['__n']
 					);
 				$this->sendEmail($send);
 				$this->session->set_flashdata('orderCompleted', true);
 				redirect('order-completed');
 			break;

 			case 'contact_form':
 				$dataInsert['nama'] = @$data['nama'] ? $data['nama'] : '-';
 				$dataInsert['email'] = @$data['email'] ? $data['email'] : '-';
 				$dataInsert['no_hp'] = @$data['no_hp'] ? $data['no_hp'] : '-';
 				$dataInsert['message'] = @$data['pesan'] ? htmlentities($data['pesan']) : '-';

 				$this->QueryBuilder->insert($dataInsert, 't_contact');
 				redirect('contact');
 			break;

 			case 'confirm':
 				$uploadImage = $this->insertImage('upload_bukti');
 				if($uploadImage['is_ok']) {
	 				$status = "info";
 					$message = "Terima kasih, Bukti transfer telah terkirim!";

 					$dataInsert['no_pesanan'] = @$data['no_pesanan'];
 					$dataInsert['nama'] = @$data['nama_pemesan'];
 					$dataInsert['email'] = @$data['email_pemesan'];
 					$dataInsert['no_hp'] = @$data['nohp_pemesan'];
 					$dataInsert['gambar'] = base_url().$uploadImage['newImage'];
 					$dataInsert['date_added'] = date('Y-m-d H:i:s');

 					$this->QueryBuilder->insert($dataInsert, 't_bukti_pembayaran');
 				} else {
 					$status = "danger";
 					$message = "Maaf, File bukti transfer hanya boleh berekstensi <strong>JPG, JPEG atau PNG!</strong> Harap coba lagi.";
 				}
				
				$sessData = array(
						'status' => $status,
						'message' => $message
					);
				$this->session->set_flashdata('confirmInfo', $sessData);
				redirect('confirmation');
 			break;

			default:
				$this->showError();
			break;
		}
	}

	private function indexTemplate($page, $data = '')
	{
		$this->load->view('templates/frontHeader', $data);
		$this->load->view($page, $data);
		$this->load->view('templates/frontFooter', $data);
	}

	private function showError()
	{
		$this->indexTemplate('frontpage/page_404');
	}
	
	private function insertImage($field_name) {
		$newImageName = imageEncrypt($_FILES[$field_name]['name']);
		$uploadDir = 'resources/uploads/payments/';
  	$config['upload_path'] = FCPATH.$uploadDir;
  	$config['allowed_types'] = 'jpg|png|jpeg';
  	$config['file_name'] = $newImageName;
  	$this->load->library('upload', $config);

  	if(!$this->upload->do_upload($field_name)) {
  		$status = 0;
  		$data = $this->upload->display_errors();
  	}
  	else {
  		$status = 1;
  		$data = $this->upload->data();
  	}

  	return array('is_ok' => $status, 'data' => $data, 'newImage' => @$newImageName ? $uploadDir.$newImageName : null);
  }

  private function sendEmail($params) {
  	$config =  array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://mail.kotakan.id',
		  'smtp_port' => 465,
		  'smtp_user' => 'mimin@kotakan.id', // change it to yours
		  'smtp_pass' => 'adminkotakan1', // change it to yours
		  'mailtype' => 'html',
		  'charset' => 'utf-8',
		  'wordwrap' => TRUE
		);
  	$this->load->library('email', $config);
  	
  	$this->email->from('mimin@kotakan.id', 'Mimin Kotakan');
  	$this->email->to($params['email']);

  	// BCC ke List Email Berikut
  	$listBcc = array(
  			'fikaralbaba@gmail.com', 'inikotakan@gmail.com'
  		);
  	$this->email->bcc($listBcc);
  	
  	$this->email->subject('Kotakan: Informasi Pemesanan '.$params['no_pesanan']);
  	$sqlOrder = "SELECT
								pesanan.*,
								self.nama AS nama_pemesan, self.no_hp AS nomor_pemesan, self.email, self.alamat AS alamat_pemesan
								FROM m_pesanan pesanan, t_data_pribadi self
								WHERE pesanan.id = self.id_pesanan AND pesanan.no_pesanan = '".$params['no_pesanan']."' AND pesanan.status != 0";
		$data['dataOrder'] = $this->QueryBuilder->rawQuery($sqlOrder)->row();
		$sqlMenu = "SELECT
								pesanan.id , barang.nama AS nama_barang, kategori.nama AS nama_kategori, barang.harga_satuan
								FROM t_order pesanan,m_barang barang, m_kategori kategori 
								WHERE pesanan.id_barang = barang.id AND barang.id_kategori = kategori.id 
								AND pesanan.id = '".$data['dataOrder']->id."'
								ORDER BY pesanan.id";
		$data['dataMenu'] = $this->QueryBuilder->rawQuery($sqlMenu)->result();
		$data['no_pesanan'] = $params['no_pesanan'];
		$message = $this->load->view('email', $data, TRUE);
  	$this->email->message($message);
  	
  	if($this->email->send())
     {
      echo 'Email sent.';
     }
     else
    {
     show_error($this->email->print_debugger());
    }
  }
}
