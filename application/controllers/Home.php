<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Social Media URL
		$sosmedHelper = list_sosmed();
		$this->facebook = $sosmedHelper['facebook'];
		$this->instagram = $sosmedHelper['instagram'];
		$this->whatsapp = $sosmedHelper['whatsapp'];
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

			case 'contact':
				$this->indexTemplate('frontpage/contact');
			break;

			case 'menu':
				$getdata = $this->input->get();
				$sql = "SELECT";
			  $sql.= " m_barang.id, m_kategori.id AS id_kategori, m_kategori.nama AS nama_kategori, m_barang.nama AS nama_barang,";
			  $sql.= " m_barang.gambar, m_barang.harga_satuan, m_barang.date_added, m_barang.status, m_barang.slug FROM m_barang, m_kategori";
			  $sql.= " WHERE m_barang.id_kategori = m_kategori.id AND m_barang.status = 1 ORDER BY m_barang.date_added DESC";
			  $pagingPerPage = 3;
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
			  	$sql .= " LIMIT ".$getdata['next'].", ".$pagingPerPage;
			  } else {
			  	$sql .= " LIMIT 0, ".$pagingPerPage;
			  }
				$data['list_menu'] = $this->QueryBuilder->rawQuery($sql)->result();
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

 			case 'contact_form':
 				$dataInsert['nama'] = @$data['nama'] ? $data['nama'] : '-';
 				$dataInsert['email'] = @$data['email'] ? $data['email'] : '-';
 				$dataInsert['no_hp'] = @$data['no_hp'] ? $data['no_hp'] : '-';
 				$dataInsert['message'] = @$data['pesan'] ? htmlentities($data['pesan']) : '-';

 				$this->QueryBuilder->insert($dataInsert, 't_contact');
 				redirect('contact');
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
}
