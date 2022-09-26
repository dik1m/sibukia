<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Umur extends CI_Controller
{
    private $view    = "backend/v_umur/";
    private $redirect = "backend/Umur";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/M_Umur');
        $this->load->model('backend/M_Home');
        $this->load->library('form_validation');
        IsUser();
    }

    function index()
    {
        $read = $this->M_Umur->GetAll();
        $user = $this->session->userdata('kd_user');
        $data = array(
            'user' => $this->M_Home->user($user),
            'judul'  => "DATA UMUR",
            'sub'  => "Lihat Umur",
            'read' => $read
        );
        $this->template->load('backend/template', $this->view . 'read', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules('bln_umur', 'Bulan', 'required|trim|is_unique[umur.bln_umur]', [
            'is_unique' => 'Umur (bulan) telah digunakan!'
        ]);
        $this->form_validation->set_rules('th_umur', 'Tahun', 'required|trim');
        $this->form_validation->set_rules('kbm_umur', 'KBM(gr)', 'required|trim|max_length[3]|numeric');
        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('kd_user');
            $data = array(
                'user' => $this->M_Home->user($user),
                'judul'    => "DATA UMUR",
                'sub'    => "Tambah Umur",
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
            'bln_umur' => $this->input->post('bln_umur', true),
            'th_umur' => $this->input->post('th_umur', true),
            'kbm_umur' => $this->input->post('kbm_umur', true),
        ];
        $this->M_Umur->save($data);
        $this->session->set_flashdata('message_true', 'Data berhasil tersimpan');
        redirect($this->redirect, 'refresh');
    }

    public function edit()
    {
        $kd   = $this->uri->segment(4);
        $this->form_validation->set_rules('th_umur', 'Tahun', 'required|trim');
        $this->form_validation->set_rules('kbm_umur', 'KBM(gr)', 'required|trim|max_length[3]|numeric');
        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('kd_user');
            $data = array(
                'user' => $this->M_Home->user($user),
                'judul'  => "DATA UMUR",
                'sub'  => "Ubah Umur",
                'edit'   => $this->M_Umur->edit($kd)
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
            'th_umur' => $this->input->post('th_umur', true),
            'kbm_umur' => $this->input->post('kbm_umur', true),
        );
        $this->M_Umur->update($kd, $data);
        $this->session->set_flashdata('message_true', 'Data telah diperbaharui');
        redirect($this->redirect, 'refresh');
    }

    public function delete()
    {
        $kd = $this->uri->segment(4);
        $data = array(
            'bln_umur' => $kd
        );
        $this->M_Umur->delete($data);
        $this->session->set_flashdata('message_true', 'Data telah dihapus');
        redirect($this->redirect, 'refresh');
    }
}
