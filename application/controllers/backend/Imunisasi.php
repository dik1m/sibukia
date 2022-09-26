<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Imunisasi extends CI_Controller
{
    private $view    = "backend/v_imunisasi/";
    private $redirect = "backend/Imunisasi";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/M_Imunisasi');
        $this->load->model('backend/M_Home');
        $this->load->library('form_validation');
        IsUser();
    }

    function index()
    {
        $read = $this->M_Imunisasi->GetAll();
        $user = $this->session->userdata('kd_user');
        $data = array(
            'user' => $this->M_Home->user($user),
            'judul'  => "DATA IMUNISASI",
            'sub'  => "Lihat Imunisasi",
            'read' => $read
        );
        $this->template->load('backend/template', $this->view . 'read', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules('nm_imunisasi', 'Nama Imunisasi', 'required|trim|is_unique[imunisasi.nm_imunisasi]', [
            'is_unique' => 'Nama Imunisasi telah digunakan!'
        ]);
        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('kd_user');
            $data = array(
                'user' => $this->M_Home->user($user),
                'judul'    => "DATA IMUNISASI",
                'sub'    => "Tambah Imunisasi",
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
            'nm_imunisasi' => $this->input->post('nm_imunisasi', true),
        ];
        $this->M_Imunisasi->save($data);
        $this->session->set_flashdata('message_true', 'Data berhasil tersimpan');
        redirect($this->redirect, 'refresh');
    }

    public function edit()
    {
        $kd   = $this->uri->segment(4);
        $this->form_validation->set_rules('nm_imunisasi', 'Nama Imunisasi', 'required|trim');
        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('kd_user');
            $data = array(
                'user' => $this->M_Home->user($user),
                'judul'  => "DATA IMUNISASI",
                'sub'  => "Ubah Imunisasi",
                'edit'   => $this->M_Imunisasi->edit($kd)
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
            'nm_imunisasi' => $this->input->post('nm_imunisasi')
        );
        $this->M_Imunisasi->update($kd, $data);
        $this->session->set_flashdata('message_true', 'Data telah diperbaharui');
        redirect($this->redirect, 'refresh');
    }

    public function delete()
    {
        $kd = $this->uri->segment(4);
        $data = array(
            'id_imunisasi' => $kd
        );
        $this->M_Imunisasi->delete($data);
        $this->session->set_flashdata('message_true', 'Data telah dihapus');
        redirect($this->redirect, 'refresh');
    }
}
