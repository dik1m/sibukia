<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posyandu extends CI_Controller
{
    private $view    = "backend/v_posyandu/";
    private $redirect = "backend/Posyandu";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/M_Posyandu');
        $this->load->model('backend/M_Home');
        $this->load->library('form_validation');
        IsUser();
    }

    function index()
    {
        $read = $this->M_Posyandu->GetAll();
        $user = $this->session->userdata('kd_user');
        $data = array(
            'user' => $this->M_Home->user($user),
            'judul'  => "DATA POSYANDU",
            'sub'  => "Lihat Posyandu",
            'read' => $read
        );
        $this->template->load('backend/template', $this->view . 'read', $data);
    }

    function all()
    {
        $read = $this->M_Posyandu->GetAll();
        $user = $this->session->userdata('kd_user');
        $data = array(
            'user' => $this->M_Home->user($user),
            'judul'  => "DATA POSYANDU",
            'sub'  => "Lihat Posyandu",
            'read' => $read
        );
        $this->template->load('backend/template', $this->view . 'readall', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules('tgl_posy', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('jam_posy', 'Jam', 'required|trim');
        $this->form_validation->set_rules('tmp_posy', 'Tempat', 'required|trim');
        $this->form_validation->set_rules('jenis_posy', 'Jenis Posyadu', 'required|trim');
        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('kd_user');
            $data = array(
                'user' => $this->M_Home->user($user),
                'judul'    => "DATA POSYANDU",
                'sub'    => "Tambah Posyandu",
                'create'     => ''
            );
            $data['ai_posyandu'] = $this->M_Posyandu->buat_noposyandu();
            $this->template->load('backend/template', $this->view . 'create', $data);
        } else {
            $this->save();
        }
    }

    public function save()
    {
        $data = [
            'no_posy' => $this->input->post('no_posy'),
            'st_posy' => '0',
            'tgl_posy' => $this->input->post('tgl_posy'),
            'jam_posy' => $this->input->post('jam_posy'),
            'tmp_posy' => $this->input->post('tmp_posy'),
            'jenis_posy' => $this->input->post('jenis_posy'),
            'detail_posy' => $this->input->post('detail_posy'),
            'kd_user'    => $this->session->userdata('kd_user'),
        ];
        $this->M_Posyandu->save($data);
        $this->session->set_flashdata('message_true', 'Data berhasil tersimpan');
        redirect($this->redirect, 'refresh');
    }

    public function edit()
    {
        $kd   = $this->uri->segment(4);
        $this->form_validation->set_rules('nM_Posyandu', 'Nama Kategori', 'required|trim|is_unique[kategori.nM_Posyandu]', [
            'is_unique' => 'Nama Kategori digunakan!'
        ]);
        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('kd_user');
            $data = array(
                'user' => $this->M_Home->user($user),
                'judul'  => "DATA POSYANDU",
                'sub'  => "Ubah Posyandu",
                'edit'   => $this->M_Posyandu->edit($kd)
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
            'nM_Posyandu' => $this->input->post('nM_Posyandu')
        );
        $this->M_Posyandu->update($kd, $data);
        $this->session->set_flashdata('message_true', 'Data telah diperbaharui');
        redirect($this->redirect, 'refresh');
    }

    public function status()
    {
        $kd = $this->uri->segment(4);
        $data = array(
            'st_posy' => $this->uri->segment(5)
        );
        $this->M_Posyandu->status($kd, $data);
        $this->session->set_flashdata('message_true', 'Status telah diperbaharui');
        redirect($this->redirect, 'refresh');
    }

    public function delete()
    {
        $kd = $this->uri->segment(4);
        $data = array(
            'no_posy' => $kd
        );
        $this->M_Posyandu->delete($data);
        $this->session->set_flashdata('message_true', 'Data telah dihapus');
        redirect($this->redirect, 'refresh');
    }
}
