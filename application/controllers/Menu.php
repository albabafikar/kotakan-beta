<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Social Media URL
		$sosmedHelper = list_sosmed();
		$this->facebook = $sosmedHelper['facebook'];
		$this->instagram = $sosmedHelper['instagram'];
		$this->whatsapp = $sosmedHelper['whatsapp'];
	}	

	public function Category($categoryMenu)
	{
		$getdata = $this->input->get();
		$kategori = trimLower($categoryMenu);
		$listCategory = array('nasikotak','snackbox','coffeebreak','katering');
		if(!in_array($kategori, $listCategory)) $this->showError();
		else {
			$indexKategori = array_search($kategori, $listCategory) + (int) 1;
			$sql = "SELECT";
		  $sql.= " m_barang.id, m_kategori.id AS id_kategori, m_kategori.nama AS nama_kategori, m_barang.nama AS nama_barang,";
		  $sql.= " m_barang.gambar, m_barang.harga_satuan, m_barang.date_added, m_barang.status, m_barang.slug FROM m_barang, m_kategori";
		  $sql.= " WHERE m_barang.id_kategori = m_kategori.id AND m_barang.status = 1 AND m_kategori.id = '".$indexKategori."' ORDER BY m_barang.date_added DESC";
		  $pagingPerPage = 1;
		  // Pagination custom config
			$configPaging = array(
					'baseUrl' => base_url().'menu/'.$kategori,
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
			$data['label'] = $kategori;
			$data['paging'] = createPagination($configPaging);
			$this->indexTemplate('frontpage/menu_kategori', $data);
		}
	}

	public function Detail($categorySlug)
	{
		$slug = trimLower($categorySlug);
		// Data Detail Menu
		$detailSQL = "SELECT";
	  $detailSQL.= " m_barang.id, m_kategori.id AS id_kategori, m_kategori.nama AS nama_kategori, m_barang.nama AS nama_barang,";
	  $detailSQL.= " m_barang.gambar, m_barang.harga_satuan, m_barang.deskripsi, m_barang.date_added, m_barang.status, m_barang.slug FROM m_barang, m_kategori";
	  $detailSQL.= " WHERE m_barang.id_kategori = m_kategori.id AND m_barang.status = 1 AND m_barang.slug = '".$slug."'";
	  $query = $num = $this->QueryBuilder->rawQuery($detailSQL);
	  $num = $query->num_rows();
	  if($num == 0 || $num == '0') $this->showError();
	  else {
			$data['detail_menu'] = $query->row();

			// Data Similiar Menu
			$similiarSQL = "SELECT";
		  $similiarSQL.= " m_barang.id, m_kategori.id AS id_kategori, m_kategori.nama AS nama_kategori, m_barang.nama AS nama_barang,";
		  $similiarSQL.= " m_barang.gambar, m_barang.harga_satuan, m_barang.deskripsi, m_barang.date_added, m_barang.status, m_barang.slug"; 
		  $similiarSQL.= " FROM m_barang, m_kategori";
		  $similiarSQL.= " WHERE m_barang.id_kategori = m_kategori.id AND m_barang.status = 1";
		  $similiarSQL.= " AND m_barang.id_kategori = '".$data['detail_menu']->id_kategori."'";
		  $similiarSQL.= " AND m_barang.slug != '".$slug."' ORDER BY RAND() LIMIT 3";
			$data['similiar_menu'] = $this->QueryBuilder->rawQuery($similiarSQL);
			$this->indexTemplate('frontpage/menu_detail', $data);
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

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */