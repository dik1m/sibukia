<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    private $view    = "backend/v_kategori/";
    private $redirect = "backend/Kategori";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/M_Kategori');
        $this->load->model('backend/M_Home');
        $this->load->library('form_validation');
        IsUser();
    }

    function index()
    {
        $read = $this->M_Kategori->GetAll();
        $user = $this->session->userdata('kd_user');
        $data = array(
            'user' => $this->M_Home->user($user),
            'judul'  => "DATA KATEGORI",
            'sub'  => "Lihat Kategori",
            'read' => $read
        );
        $this->template->load('backend/template', $this->view . 'read', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules('nm_kategori', 'Nama Kategori', 'required|trim|is_unique[kategori.nm_kategori]', [
            'is_unique' => 'Nama Kategori digunakan!'
        ]);
        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('kd_user');
            $data = array(
                'user' => $this->M_Home->user($user),
                'judul'    => "DATA KATEGORI",
                'sub'    => "Tambah Kategori",
                'create'     => ''
            );
            $this->template->load('backend/template', $this->view . 'create', $data);
        } else {
            $this->save();
        }
    }

    public function save()
    {
        $data = [
            'nm_kategori' => $this->input->post('nm_kategori', true),
        ];
        $this->M_Kategori->save($data);
        $this->session->set_flashdata('message_true', 'Data berhasil tersimpan');
        redirect($this->redirect, 'refresh');
    }

    public function edit()
    {
        $kd   = $this->uri->segment(4);
        $this->form_validation->set_rules('nm_kategori', 'Nama Kategori', 'required|trim|');
        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('kd_user');
            $data = array(
                'user' => $this->M_Home->user($user),
                'judul'  => "DATA KATEGORI",
                'sub'  => "Ubah Kategori",
                'edit'   => $this->M_Kategori->edit($kd)
            );
            $this->template->load('backend/template', $this->view . 'edit', $data);
        } else {
            $this->update();
        }
    }

    public function update()
    {
        $kd = $this->uri->segment(4);
        $data = array(
            'nm_kategori' => $this->input->post('nm_kategori')
        );
        $this->M_Kategori->update($kd, $data);
        $this->session->set_flashdata('message_true', 'Data telah diperbaharui');
        redirect($this->redirect, 'refresh');
    }

    public function delete()
    {
        $kd = $this->uri->segment(4);
        $data = array(
            'id_kategori' => $kd
        );
        $this->M_Kategori->delete($data);
        $this->session->set_flashdata('message_true', 'Data telah dihapus');
        redirect($this->redirect, 'refresh');
    }
}
