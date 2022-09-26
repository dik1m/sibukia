<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Berita extends CI_Controller
{
	private $view  	= "frontend/v_berita/";
	private $redirect 	= "Berita";
	//Paging
	private $per_page 	= 4;


	public function __construct()
	{
		parent::__construct();
		//Load model
		$this->load->model('M_Home');
		$this->load->model('M_Berita');
	}

	public function index()
	{
		$page = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
		$newsusr = $this->M_Berita->newsusr();
		$newsusr = $this->M_Berita->GetDataPaging($this->per_page, $page);
		$kategori = $this->M_Home->kategori();
		$newsterkini = $this->M_Home->newsterkini();
		$data = array(
			'layanan' => $this->M_Home->layanan(),
			'kategori' 		=> $kategori,
			'newsterkini' 		=> $newsterkini,
			'judul'	=> "Berita",
			'sub'	=> "Halaman Berita",
			'newsusr' => $newsusr,
			'paging' 	=> Paging($this->per_page, $this->M_Berita->GetCount())
		);
		$this->template->load('frontend/template', $this->view . 'read', $data);
	}

	public function readmore()
	{
		$kategori = $this->M_Home->kategori();
		$newsterkini = $this->M_Home->newsterkini();
		$data = array(
			'layanan' => $this->M_Home->layanan(),
			'kategori' 		=> $kategori,
			'newsterkini' 		=> $newsterkini,
			'judul'	=> "Berita",
			'sub'	=> "Halaman Berita",
			'row' => $this->M_Berita->readmore($this->uri->segment(3))->row_array()
		);
		$this->template->load('frontend/template', $this->view . 'readmore', $data);
	}

	public function newskategori()
	{
		$kategori = $this->M_Home->kategori();
		$newsterkini = $this->M_Home->newsterkini();
		$data = array(
			'layanan' => $this->M_Home->layanan(),
			'kategori' 		=> $kategori,
			'newsterkini' 		=> $newsterkini,
			'judul'	=> "Berita",
			'sub'	=> "Halaman Berita",
			'newskategori' => $this->M_Berita->newskategori($this->uri->segment(3))
		);
		$this->template->load('frontend/template', $this->view . 'newskategori', $data);
	}
}
