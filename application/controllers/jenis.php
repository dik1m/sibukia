<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{
    private $view    = "backend/v_jenis/";
    private $redirect = "Jenis";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_jenis');
    }

    function index()
    {
        $read = $this->M_jenis->GetAll();
        $data = array(
            'judul' => "DATA JENIS SURAT",
            'sub' => "Lihat Jenis Surat",
            'read' => $read
        );
        $this->load->view($this->view . 'read', $data);
    }

    public function create()
    {
        $data = array(
            'judul' => "DATA JENIS SURAT",
            'sub' => "Tambah Jenis Surat",
            'create' => ''
        );
        $this->load->view($this->view . 'create', $data);
    }

    public function save()
    {
        $data = array(
            'jenis_surat' => $this->input->post('jenis_surat')
        );
        $this->M_jenis->save($data);
        echo "<script>alert('Data Berhasil tersimpan')</script>";
        redirect($this->redirect, 'refresh');
    }

    public function edit()
    {
        $kd   = $this->uri->segment(3);
        $data = array(
            'judul'   => "DATA JENIS SURAT",
            'sub'   => "Ubah Jensi",
            'edit'   => $this->M_jenis->edit($kd)
        );
        $this->load->view($this->view . 'edit', $data);
    }

    public function update()
    {
        $kd = $this->uri->segment(3);
        $data = array(
            'jenis_surat' => $this->input->post('jenis_surat')
        );
        $this->M_jenis->update($kd, $data);
        echo "<script>alert('Data Telah di Perbaharui')</script>";
        redirect($this->redirect, 'refresh');
    }

    public function delete()
    {
        $kd = $this->uri->segment(3);
        $data = array(
            'jenis_id' => $kd
        );
        $this->M_jenis->delete($data);
        echo "<script>alert('Data telah di Hapus')</script>";
        redirect($this->redirect, 'refresh');
    }
}
