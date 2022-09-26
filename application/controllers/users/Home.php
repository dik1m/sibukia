<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
	private $view  	= "users/v_home/";
	private $redirect 	= "users/Home";

	public function __construct()
	{
		parent::__construct();
		//Load model
		$this->load->model('users/M_Home');
		$this->load->model('backend/M_Kia');
		$this->load->model('backend/M_Kia', 'Daerah');
		$this->load->model('backend/M_TenagaKes');
		$this->load->model('backend/M_Buku');
		$this->load->library('form_validation');
		IsUsers();
	}

	public function index()
	{
		$user = $this->session->userdata('no_kia');
		$data = array(
			'judul'	=> "Beranda",
			'sub'	=> "Halaman Beranda",
			'user' => $this->M_Home->user($user),
			// 'total_user' 	=> $this->M_home->total('user'),
			// 'total_people' 	=> $this->M_home->total('people'),
			// 'total_kategori' 	=> $this->M_home->total('kategori'),
			// 'total_berita' 	=> $this->M_home->total('berita'),
			'prov' 	=> $this->M_Kia->prov(),
			'kab' 	=> $this->M_Kia->kab(),
			'kec' 	=> $this->M_Kia->kec(),
			'kel' 	=> $this->M_Kia->kel(),
			'buku' 	=> $this->M_Buku->CekBuku(),
			'tenagakes' 	=> $this->M_TenagaKes->bertugas(),
			'edit'     => $this->M_Kia->edit($user)
		);
		$this->template->load('users/template', $this->view . 'read', $data);
	}
}
