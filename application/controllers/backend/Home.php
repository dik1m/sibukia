<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
	private $view  	= "backend/v_home/";
	private $redirect 	= "Home";

	public function __construct()
	{
		parent::__construct();
		//Load model
		$this->load->model('backend/M_Home');
		IsUser();
	}

	public function index()
	{
		$user = $this->session->userdata('kd_user');
		$berita = $this->M_Home->berita();
		$user = $this->session->userdata('kd_user');
		$data = array(
			'user' => $this->M_Home->user($user),
			'judul'	=> "Beranda",
			'sub'	=> "Halaman Beranda",
			'total_user' 	=> $this->M_Home->total('user'),
			'total_kia' 	=> $this->M_Home->total('kia'),
			'total_kategori' 	=> $this->M_Home->total('kategori'),
			'total_berita' 	=> $this->M_Home->total('berita'),
			'user' => $this->M_Home->user($user),
			'berita' => $berita
		);
		$this->template->load('backend/template', $this->view . 'read', $data);
	}
}
