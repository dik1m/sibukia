<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller
{
	private $view  	= "frontend/v_page/";
	private $redirect 	= "Page";

	public function __construct()
	{
		parent::__construct();
		//Load model
		$this->load->model('M_Home');
	}

	public function profil()
	{
		$kategori = $this->M_Home->kategori();
		$newsterkini = $this->M_Home->newsterkini();
		$data = array(
			'layanan' => $this->M_Home->layanan(),
			'kategori' 		=> $kategori,
			'newsterkini' 		=> $newsterkini,
			'judul'	=> "Profil",
			'sub'	=> "Halaman Profil",
		);
		$this->template->load('frontend/template', $this->view . 'profil', $data);
	}

	public function kontak()
	{
		$kategori = $this->M_Home->kategori();
		$newsterkini = $this->M_Home->newsterkini();
		$data = array(
			'layanan' => $this->M_Home->layanan(),
			'kategori' 		=> $kategori,
			'newsterkini' 		=> $newsterkini,
			'judul'	=> "Kontak",
			'sub'	=> "Halaman Kontak",
		);
		$this->template->load('frontend/template', $this->view . 'kontak', $data);
	}

	public function layanan()
	{
		$kategori = $this->M_Home->kategori();
		$newsterkini = $this->M_Home->newsterkini();
		$data = array(
			'layanan' => $this->M_Home->layanan(),
			'kategori' 		=> $kategori,
			'newsterkini' 		=> $newsterkini,
			'judul'	=> "Layanan",
			'sub'	=> "Halaman Layanan",
		);
		$this->template->load('frontend/template', $this->view . 'layanan', $data);
	}
}
