<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
    private $view    = "backend/v_buku/";
    private $redirect = "backend/Buku";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/M_Buku');
        $this->load->model('backend/M_Home');
        $this->load->library('form_validation');
        IsUser();
    }

    function index()
    {
        $read = $this->M_Buku->GetAll();
        $user = $this->session->userdata('kd_user');
        $data = array(
            'user' => $this->M_Home->user($user),
            'judul'  => "DATA BUKU",
            'sub'  => "Lihat Buku",
            'read' => $read
        );
        $this->template->load('backend/template', $this->view . 'read', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules('no_kia', 'Nomor KIA', 'required|trim|is_unique[buku.no_kia]', [
            'is_unique' => 'Nomor telah digunakan!'
        ]);
        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('kd_user');
            $data = array(
                'user' => $this->M_Home->user($user),
                'judul'    => "DATA BUKU",
                'sub'    => "Tambah Buku",
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
            'no_kia' => $this->input->post('no_kia', true),
            'st_buku' => 1,
            'tgl_inbuku' => date('Y-m-d'),
            'kd_user'    => $this->session->userdata('kd_user'),
        ];
        $this->M_Buku->save($data);
        $this->session->set_flashdata('message_true', 'Data berhasil tersimpan');
        redirect($this->redirect, 'refresh');
    }

    public function edit()
    {
        $kd   = $this->uri->segment(4);
        $this->form_validation->set_rules('tgl_inbuku', 'Tanggal Masuk', 'required|trim');
        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('kd_user');
            $data = array(
                'user' => $this->M_Home->user($user),
                'judul'  => "DATA BUKU",
                'sub'  => "Ubah Buku",
                'edit'   => $this->M_Buku->edit($kd)
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
            'st_buku' => $this->input->post('st_buku', true),
            'tgl_inbuku' => $this->input->post('tgl_inbuku', true),
            'tgl_outbuku' => $this->input->post('tgl_outbuku', true),
        );
        $this->M_Buku->update($kd, $data);
        $this->session->set_flashdata('message_true', 'Data telah diperbaharui');
        redirect($this->redirect, 'refresh');
    }

    public function delete()
    {
        $kd = $this->uri->segment(4);
        $data = array(
            'no_kia' => $kd
        );
        $this->M_Buku->delete($data);
        $this->session->set_flashdata('message_true', 'Data telah dihapus');
        redirect($this->redirect, 'refresh');
    }
}
