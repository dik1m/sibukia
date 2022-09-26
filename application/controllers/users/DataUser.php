<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class DataUser extends CI_Controller
{
    private $view      = "users/v_datauser/";
    private $redirect     = "users/DataUser";

    public function __construct()
    {
        parent::__construct();
        //Load model
        $this->load->model('users/M_Home');
        $this->load->model('backend/M_Kia');
        $this->load->model('backend/M_Kia', 'Daerah');
        $this->load->model('backend/M_TenagaKes');
        $this->load->library('form_validation');
        IsUsers();
    }

    public function index()
    {
        $user = $this->session->userdata('no_kia');
        $data = array(
            'judul'    => "DATA IBU DAN ANAK",
            'sub'    => "Data Ibu dan Anak",
            // 'total_user' 	=> $this->M_home->total('user'),
            // 'total_people' 	=> $this->M_home->total('people'),
            // 'total_kategori' 	=> $this->M_home->total('kategori'),
            // 'total_berita' 	=> $this->M_home->total('berita'),
            'user' => $this->M_Home->user($user),
            //'tenagakes'     => $this->M_TenagaKes->GetAll(),
            'edit'     => $this->M_Kia->edit($user)
        );
        $this->template->load('users/template', $this->view . 'edit', $data);
    }
}
