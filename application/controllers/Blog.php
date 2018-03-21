<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		// link URL
		$linkHelper = list_link();
		$this->facebook = $linkHelper['facebook'];
		$this->instagram = $linkHelper['instagram'];
		$this->whatsapp = $linkHelper['whatsapp'];
		$this->kotakanPartner = $linkHelper['kotakanPartner'];
	}

	public function Detail($slug)
	{
		$slug = trimLower($slug);

		$sql = "SELECT 
						artikel.id, artikel.judul, artikel.gambar_utama, artikel.slug,
						artikel.konten, user.nama AS nama_author, artikel.date_added
						FROM m_artikel artikel, m_user user
						WHERE artikel.status = 1 AND artikel.author = user.id AND slug = '".$slug."'";
		$query = $this->QueryBuilder->rawQuery($sql);
		$num = $query->num_rows();
		if($num == 0 || $num == '0') $this->showError();
	  else {
			$data['artikel'] = $query->row();
			$this->indexTemplate('frontpage/blog_detail', $data);
	  }
	}

	public function errorPages()
	{
		$this->showError();
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

/* End of file Blog.php */
/* Location: ./application/controllers/Blog.php */