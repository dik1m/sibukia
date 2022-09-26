<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layanan extends CI_Controller
{
	private $view  	= "frontend/v_layanan/";
	private $redirect 	= "Berita";
	//Paging
	private $per_page 	= 4;


	public function __construct()
	{
		parent::__construct();
		//Load model
		$this->load->model('M_Home');
		$this->load->model('M_Layanan');
	}

	public function infolayanan()
	{
		$kategori = $this->M_Home->kategori();
		$newsterkini = $this->M_Home->newsterkini();
		$data = array(
			'layanan' => $this->M_Home->layanan(),
			'kategori' 		=> $kategori,
			'newsterkini' 		=> $newsterkini,
			'judul'	=> "Detail Layanan",
			'sub'	=> "Halaman Layanan",
			'row' 	=> $this->M_Layanan->infolayanan($this->uri->segment(3))->row_array()
		);
		$this->template->load('frontend/template', $this->view . 'readmore', $data);
	}
}
