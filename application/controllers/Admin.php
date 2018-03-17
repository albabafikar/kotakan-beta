<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->siteName = "Kotakan";
		$this->adminRoute = "adminsite/";
		$this->adminSite = base_url().$this->adminRoute;
		$this->userdata = $this->session->userdata('userdata');
	}

	public function Router($action)
	{
		$router = trimLower($action);

		switch($router){
			case 'dashboard':
				$menu = $this->getCountData('m_barang', array('status' => 1));
				$artikel = $this->getCountData('m_artikel', array('status' => 1));
				$pesanan = $this->getCountData('m_pesanan', array('status !=' => 0));
				$kontak = $this->getCountData('t_contact');
				$bukti_pembayaran = $this->getCountData('t_bukti_pembayaran', array('status !=' => 3));
				$data['siteTitle'] = "Dashboard";
				$data['tiles'] = array(
						0 => array(
								'title' => 'Jumlah Menu',
								'subtitle' => 'Semua menu yang tersedia',
								'value' => $menu,
								'icon' => 'fa fa-cubes'
							),
						1 => array(
								'title' => 'Menu Nasi Kotak',
								'subtitle' => 'Jumlah menu nasi kotak.',
								'value' => $this->getKategoriMenu(1),
								'icon' => 'fa fa-cube'
							),
						2 => array(
								'title' => 'Menu Snackbox',
								'subtitle' => 'Jumlah menu snackbox.',
								'value' => $this->getKategoriMenu(2),
								'icon' => 'fa fa-cube'
							),
						3 => array(
								'title' => 'Menu Coffee Break',
								'subtitle' => 'Jumlah menu coffee break.',
								'value' => $this->getKategoriMenu(3),
								'icon' => 'fa fa-cube'
							),
						4 => array(
								'title' => 'Menu Katering',
								'subtitle' => 'Jumlah menu katering prasmanan.',
								'value' => $this->getKategoriMenu(1),
								'icon' => 'fa fa-cube'
							),
						5 => array(
								'title' => 'Jumlah Artikel',
								'subtitle' => 'Jumlah artikel yang disubmit.',
								'value' => $artikel,
								'icon' => 'fa fa-file-text-o'
							),
						6 => array(
								'title' => 'Jumlah Pesanan',
								'subtitle' => 'Jumlah pesanan yang diterima.',
								'value' => $pesanan,
								'icon' => 'fa fa-send'
							),
						7 => array(
								'title' => 'Pesanan Menunggu',
								'subtitle' => 'Pesanan tahap pembayaran.',
								'value' => $this->getCountData('m_pesanan', array('status' => 2)),
								'icon' => 'fa fa-ellipsis-h'
							),
						8 => array(
								'title' => 'Pesanan Selesai',
								'subtitle' => 'Pesanan sudah dibayar.',
								'value' => $this->getCountData('m_pesanan', array('status' => 3)),
								'icon' => 'fa fa-thumbs-up'
							),
						9 => array(
								'title' => 'Jumlah Kontak',
								'subtitle' => 'Jumlah kontak yang disubmit.',
								'value' => $kontak,
								'icon' => 'fa fa-envelope-o'
							),
						10 => array(
								'title' => 'Jumlah Bukti Pembayaran',
								'subtitle' => 'Bukti pembayaran yang disubmit.',
								'value' => $bukti_pembayaran,
								'icon' => 'fa fa-picture-o'
							),
					);
				$this->indexTemplate('dashboard', $data);
			break;

			case 'item':
				$getdata = $this->input->get();
				if(isset($getdata['action'])) {
					$defaultCondition['status'] = 1;
					switch(trimLower($getdata['action'])) {
						case 'add':
							$data['siteTitle'] = "Tambah Menu";
							$data['list_kategori'] = $this->QueryBuilder->select($defaultCondition, 'm_kategori', 'nama')->result();
							$data['list_subkategori'] = $this->QueryBuilder->select($defaultCondition, 'm_subkategori', 'nama')->result();
							$this->indexTemplate('barang/add_barang', $data);
						break;

						case 'detail':
							if(!$getdata['id']) redirect();
							$data['list_subkategori'] = $this->QueryBuilder->select($defaultCondition, 'm_subkategori', 'nama')->result();
							$sql = "SELECT";
					    $sql.= " m_barang.id, m_kategori.nama AS nama_kategori, m_kategori.id AS id_kategori, m_barang.nama AS nama_barang,";
					    $sql.= " m_barang.gambar, m_barang.harga_satuan, m_barang.date_added, m_barang.status FROM m_barang, m_kategori";
					    $sql.= " WHERE m_barang.id_kategori = m_kategori.id AND m_barang.status = 1 AND m_barang.id = '".$getdata['id']."'";
							$data['detail_barang'] = $this->QueryBuilder->rawQuery($sql)->row();
							$data['siteTitle'] = "Detail Menu";
							$this->indexTemplate('barang/detail_barang', $data);
						break;

						case 'edit':
							if(!$getdata['id']) redirect();
							$data['siteTitle'] = "Ubah Menu";
							$data['list_kategori'] = $this->QueryBuilder->select($defaultCondition, 'm_kategori', 'nama')->result();
							$data['list_subkategori'] = $this->QueryBuilder->select($defaultCondition, 'm_subkategori', 'nama')->result();
							$sql = "SELECT";
					    $sql.= " m_barang.id, m_kategori.nama AS nama_kategori, m_kategori.id AS id_kategori, m_barang.nama AS nama_barang,";
					    $sql.= " m_barang.gambar, m_barang.harga_satuan, m_barang.date_added, m_barang.status FROM m_barang, m_kategori";
					    $sql.= " WHERE m_barang.id_kategori = m_kategori.id AND m_barang.status = 1 AND m_barang.id = '".$getdata['id']."'";
							$data['detail_barang'] = $this->QueryBuilder->rawQuery($sql)->row();
							$this->indexTemplate('barang/edit_barang', $data);
						break;

						case 'delete':
							if(!$getdata['id']) redirect();

							$this->QueryBuilder->update(array('id' => $getdata['id']), array('status' => 0), 'm_barang');
							redirect($this->adminRoute.'item');
						break;

						default:
							redirect();
						break;
					}
				} else {
					$this->load->library('pagination');
					$sql = "SELECT * FROM m_barang WHERE status = 1";
					$paginateConfig = array(
							'totalRows' => $this->QueryBuilder->rawQuery($sql)->num_rows(),
							'baseUrl' => $this->adminSite.'item/',
							'perPage' => 10
						);
					$this->pagination->initialize($this->setPagination($paginateConfig));

					$data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
					$sql = "SELECT";
			    $sql.= " m_barang.id, m_kategori.nama AS nama_kategori, m_barang.nama AS nama_barang,";
			    $sql.= " m_barang.gambar, m_barang.harga_satuan, m_barang.date_added, m_barang.status FROM m_barang, m_kategori";
			    $sql.= " WHERE m_barang.id_kategori = m_kategori.id AND m_barang.status = 1 ORDER BY m_barang.date_added DESC 
			    LIMIT ".$data['page'].", ".$paginateConfig['perPage']."";

					$data['list_barang'] = $this->QueryBuilder->rawQuery($sql)->result();
					$data['siteTitle'] = "Data Barang";
					$this->indexTemplate('barang/list_barang', $data);
				}
			break;

			case 'order':
				$getdata = $this->input->get();
				if(isset($getdata['action'])) {
					switch(trimLower($getdata['action'])) {
						case 'detail':
							if(!$getdata['id']) redirect();
							$sqlOrder = "SELECT
											pesanan.*,
											self.nama AS nama_pemesan, self.no_hp AS nomor_pemesan, self.email, self.alamat AS alamat_pemesan
											FROM m_pesanan pesanan, t_data_pribadi self
											WHERE pesanan.id = self.id_pesanan AND pesanan.id = '".$getdata['id']."' AND pesanan.status != 0";
							$sqlMenu = "SELECT
													pesanan.id , barang.nama AS nama_barang, kategori.nama AS nama_kategori, barang.harga_satuan
													FROM t_order pesanan,m_barang barang, m_kategori kategori 
													WHERE pesanan.id_barang = barang.id AND barang.id_kategori = kategori.id 
													AND pesanan.id_pesanan = '".$getdata['id']."'
													ORDER BY pesanan.id";
							$data['dataOrder'] = $this->QueryBuilder->rawQuery($sqlOrder)->row();
							$data['dataMenu'] = $this->QueryBuilder->rawQuery($sqlMenu)->result();
							// Update Status dilihat
							$dataCondition['id'] = $getdata['id'];
							$dataUpdate['dilihat'] = 1;
							$this->QueryBuilder->update($dataCondition, $dataUpdate, 'm_pesanan');
							
							$data['siteTitle'] = "Detail Pesanan";
							$this->indexTemplate('order/detail_order', $data);
						break;

						default:
							redirect();
						break;
					}
				} else {
					$sql = "SELECT 
									pesanan.id,
									pesanan.no_pesanan,
									data_pribadi.nama AS nama_pemesan,
									pesanan.tanggal_kirim,
									pesanan.alamat_penerima,
									pesanan.dilihat,
									pesanan.date_added
									FROM m_pesanan pesanan, t_data_pribadi data_pribadi
									WHERE pesanan.id = data_pribadi.id_pesanan AND pesanan.status != 0 ORDER BY date_added DESC";
					$data['list_pesanan'] = $this->QueryBuilder->rawQuery($sql)->result();
					$data['siteTitle'] = "Data Pesanan";
					$this->indexTemplate('order/list_order', $data);
				}
			break;

			case 'category':
				$getdata = $this->input->get();
				if(isset($getdata['action'])) {
					switch(trimLower($getdata['action'])) {
						default:
							redirect();
						break;
					}
				} else {
					$sql = "SELECT * FROM m_kategori WHERE status = 1";
					$data['list_kategori'] = $this->QueryBuilder->rawQuery($sql)->result();
					$data['siteTitle'] = "Data Kategori";
					$this->indexTemplate('kategori/list_kategori', $data);
				}
			break;

			case 'subcategory':
				$getdata = $this->input->get();
				if(isset($getdata['action'])) {
					switch(trimLower($getdata['action'])) {
						default:
							redirect();
						break;
					}
				} else {
					$sql = "SELECT 
									sub.id , kat.nama AS nama_kategori, sub.nama AS nama_subkategori, sub.date_added, sub.status
									FROM m_subkategori sub, m_kategori kat WHERE sub.status = 1 AND sub.id_kategori = kat.id";
					$data['list_subkategori'] = $this->QueryBuilder->rawQuery($sql)->result();
					$data['siteTitle'] = "Data Sub Kategori";
					$this->indexTemplate('subkategori/list_subkategori', $data);
				}
			break;

			case 'artikel';
				$getdata = $this->input->get();
				if(isset($getdata['action'])) {
					switch(trimLower($getdata['action'])) {
						default:
							redirect();
						break;
					}
				} else {
					$sql = "SELECT 
									artikel.id, artikel.judul, 
									artikel.konten, user.nama AS nama_author
									FROM m_artikel artikel, m_user user
									WHERE artikel.status = 1 AND artikel.author = user.id";
					$data['list_artikel'] = $this->QueryBuilder->rawQuery($sql)->result();
					$data['siteTitle'] = "Data Artikel";
					$this->indexTemplate('artikel/list_artikel', $data);
				}
			break;

			case 'contact':
				$getdata = $this->input->get();
				if(isset($getdata['action'])) {
					switch(trimLower($getdata['action'])) {
						case 'detail':
							if(!$getdata['id']) redirect();
							$data['siteTitle'] = "Detail Contact";
							$dataCondition['id'] = $getdata['id'];
							$data['detail_contact'] = $this->QueryBuilder->select($dataCondition, 't_contact')->row();
							$this->indexTemplate('contact/detail_contact', $data);
						break;

						default:
							redirect();
						break;
					}
				} else {
					$data['list_contact'] = $this->QueryBuilder->get('t_contact', 'date_submitted', 'DESC')->result();
					$data['siteTitle'] = "Data Contact";
					$this->indexTemplate('contact/list_contact', $data);
				}
			break;
			
			case 'login':
				$this->load->view('action/login');
			break;

			case 'logout':
				session_destroy();
				redirect($this->adminRoute.'login');
			break;

			case 'do_action':
				$postdata = $this->input->post();
				$getdata = $this->input->get();
				if(!$postdata) redirect($this->adminRoute);
				if(!$getdata['method']) show_404();
				else $this->doAction($getdata['method'], $postdata, @$_FILES);	
			break;
			
			case 'bukti-pembayaran':
				$getdata = $this->input->get();
				if(isset($getdata['action'])) {
					switch(trimLower($getdata['action'])) {
						case 'detail':
							if(!$getdata['id']) redirect();
							$data['siteTitle'] = "Detail Bukti Pembayaran";
							$dataCondition['id'] = $getdata['id'];
							$dataUpdate['status'] = 1;
							$this->QueryBuilder->update($dataCondition, $dataUpdate, 't_bukti_pembayaran');
							$data['detail_bukti'] = $this->QueryBuilder->select($dataCondition, 't_bukti_pembayaran')->row();
							$this->indexTemplate('bukti_pembayaran/detail_bukti', $data);
						break;

						default:
							redirect();
						break;
					}
				} else {
					$data['list_bukti'] = $this->QueryBuilder->get('t_bukti_pembayaran', 'date_added', 'DESC')->result();
					$data['siteTitle'] = 'Bukti Pembayaran';
					$this->indexTemplate('bukti_pembayaran/list_bukti', $data);
				}
			break;

			default:
				$this->load->view('action/page_404');
			break;
		}	
	}

	private function indexTemplate($page, $data = '') {
			$sql = "SELECT 
						pesanan.id,
						pesanan.no_pesanan,
						data_pribadi.nama AS nama_pemesan,
						pesanan.tanggal_kirim,
						pesanan.alamat_penerima,
						pesanan.dilihat,
						pesanan.date_added,
						pesanan.keterangan
						FROM m_pesanan pesanan, t_data_pribadi data_pribadi
						WHERE pesanan.id = data_pribadi.id_pesanan AND pesanan.status = 1 AND pesanan.dilihat = 0 ORDER BY date_added DESC";
		$data['list_order'] = $this->QueryBuilder->rawQuery($sql);
		$this->load->view('templates/adminHeader', $data);
		$this->load->view($page, $data);
		$this->load->view('templates/adminFooter', $data);
	}

	public function index() {
		$uri = $this->userdata ? $this->adminRoute.'dashboard' : $this->adminRoute.'login';
		redirect($uri);
	}

	private function doAction($method, $data, $files = '') {
		switch( trimLower($method)) {
			case 'login':
				$dataCondition['username'] = $data['username'];
				$dataCondition['password'] = md5($data['password']);
				$query = $this->QueryBuilder->select($dataCondition, 'm_user');

				if($query->num_rows() > 0) {
					$dataUser = array(
						'userdata' => $query->row()
					);
					$this->session->set_userdata($dataUser);
				}

				$uri = $query->num_rows() > 0 ? $this->adminRoute.'dashboard' : $this->adminRoute.'login';
				redirect($uri);
			break;

			case 'add_barang':
				$imgUpload = $this->insertImage('gambar');
				if($imgUpload['is_ok']) {
					$dataInsert['nama'] = $data['nama_barang'];
					$dataInsert['id_kategori'] = $data['kategori'];
					$dataInsert['id_subkategori'] = isset($data['subkategori']) ? $data['subkategori'] : 0;
					$dataInsert['harga_satuan'] = $data['harga_satuan'];
					$dataInsert['date_added'] = date('Y-m-d H:i:s');
					$dataInsert['slug'] = createSlug($data['nama_barang']);
					$dataInsert['keterangan'] = @$data['keterangan'] ? nl2br($data['keterangan']) : null;
					$dataInsert['status'] = 1;
					$dataInsert['gambar'] = base_url().$imgUpload['newImage'];

					$this->QueryBuilder->insert($dataInsert, 'm_barang');
					$condition = 'success';
					$message = "Berhasil menambah data menu!";
				} else{
					$condition = 'danger';
					$message = "Error: ".$imgUpload['data'];
				}

				$sessionValue = array(
						'condition' => $condition,
						'message' => $message
					);

				$this->session->set_flashdata('itemInfo', $sessionValue);
					
				redirect($this->adminSite.'item');
			break;

			case 'edit_barang':
				print_r($data);
				print_r($_FILES);
			break;

			case 'accept_order':
				$params = $this->input->post();
				if(!$params) redirect();

				$dataCondition['id'] = $params['id'];
				$dataUpdate['status'] = 3;
				$this->QueryBuilder->update($dataCondition, $dataUpdate, 'm_pesanan');

				echo json_encode(array('is_ok' => true));
			break;

			default:
				show_404();
			break;
		}
	}

	private function insertImage($field_name) {
		$newImageName = imageEncrypt($_FILES[$field_name]['name']);
		$uploadDir = 'resources/uploads/';
  	$config['upload_path'] = FCPATH.$uploadDir;
  	$config['allowed_types'] = 'gif|jpg|png|jpeg';
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

  private function setPagination($data = array()) {
    // Pagination
    $config['base_url'] = $data['baseUrl'];
		$config['total_rows'] = $data['totalRows']; 
		$config['per_page'] = $data['perPage'];
		$config['uri_segment'] = 3;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = floor($choice);
		// Style
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		return $config;
  }
  private function getCountData($table, $condition = '') {
  	if($condition) {
  		$query = $this->QueryBuilder->select($condition, $table);
  	} else {
  		$query = $this->QueryBuilder->get($table);
  	}

  	return $query->num_rows();
  }

  private function getKategoriMenu($id) {
  	$dataCondition['status'] = 1;
  	$dataCondition['id_kategori'] = $id;

  	return $this->getCountData('m_barang', $dataCondition);
  }
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */