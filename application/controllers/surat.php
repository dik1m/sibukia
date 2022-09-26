<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
    private $view    = "backend/v_surat/";
    private $redirect = "Surat";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_surat');
        $this->load->model('M_admin');
        $this->load->model('M_jenis');
    }

    function index()
    {
        $read = $this->M_surat->GetAll();
        $data = array(
            'judul' => "DATA SURAT",
            'sub' => "Lihat Surat",
            'read' => $read
        );
        $this->load->view($this->view . 'read', $data);
    }

    public function create()
    {
        $data = array(
            'judul' => "DATA SURAT",
            'sub' => "Tambah Data Surat",
            'create' => ''
        );
        $this->load->view($this->view . 'create', $data);
    }

    public function save()
    {
        $data = array(
            'surat_judul' => $this->input->post('surat_judul'),
            'pengirim' => $this->input->post('pengirim'),
            'tujuan' => $this->input->post('tujuan'),
            'kd_admin' => $this->input->post('kd_admin'),
            'jenis_id' => $this->input->post('jenis_id'),
            'ket_surat' => $this->input->post('ket_surat'),
            'doc_surat' => $this->input->post('doc_surat'),
        );
        $this->M_surat->save($data);
        echo "<script>alert('Data Berhasil tersimpan')</script>";
        redirect($this->redirect, 'refresh');
    }

    public function edit()
    {
        $kd   = $this->uri->segment(3);
        $data = array(
            'judul'   => "DATA SURAT",
            'sub'   => "Ubah Data Surat",
            'edit'   => $this->M_surat->edit($kd)
        );
        $this->load->view($this->view . 'edit', $data);
    }

    public function update()
    {
        $kd = $this->uri->segment(3);
        $data = array(
            'surat_judul' => $this->input->post('surat_judul'),
            'pengirim' => $this->input->post('pengirim'),
            'tujuan' => $this->input->post('tujuan'),
            'kd_admin' => $this->input->post('kd_admin'),
            'jenis_id' => $this->input->post('jenis_id '),
            'ket_surat' => $this->input->post('ket_surat'),
            'doc_surat' => $this->input->post('doc_surat'),
        );
        $this->M_surat->update($kd, $data);
        echo "<script>alert('Data Telah di Perbaharui')</script>";
        redirect($this->redirect, 'refresh');
    }

    public function delete()
    {
        $kd = $this->uri->segment(3);
        $data = array(
            'surat_judul' => $kd
        );
        $this->M_surat->delete($data);
        echo "<script>alert('Data telah di Hapus')</script>";
        redirect($this->redirect, 'refresh');
    }
}
