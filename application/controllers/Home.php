<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
    private $view      = "frontend/v_home/";
    private $redirect     = "Home";

    public function __construct()
    {
        parent::__construct();
        //Load model
        $this->load->model('M_Home');
    }

    public function index()
    {
        $kategori = $this->M_Home->kategori();
        $newsterkini = $this->M_Home->newsterkini();
        $newsfooter = $this->M_Home->newsfooter();
        $newshome = $this->M_Home->newshome();
        $headslide = $this->M_Home->headslide();
        $newshead1 = $this->M_Home->newshead1();
        $newshead2 = $this->M_Home->newshead2();
        $newshead3 = $this->M_Home->newshead3();
        $data = array(
            'layanan' => $this->M_Home->layanan(),
            'kategori'         => $kategori,
            'newsterkini'         => $newsterkini,
            'newsfooter'         => $newsfooter,
            'judul'    => "Beranda",
            'sub'    => "Halaman Utama",
            'newshome' => $newshome,
            'headslide' => $headslide,
            'newshead1' => $newshead1,
            'newshead2' => $newshead2,
            'newshead3' => $newshead3,
        );
        $this->template->load('frontend/template', $this->view . 'read', $data);
    }
}
