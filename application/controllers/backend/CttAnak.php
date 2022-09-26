<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CttAnak extends CI_Controller
{
    private $view    = "backend/v_cttanak/";
    private $redirect = "backend/CttAnak";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/M_CttAnak');
        $this->load->model('backend/M_TenagaKes');
        $this->load->model('backend/M_Kia');
        $this->load->model('backend/M_Umur');
        $this->load->model('backend/M_Imunisasi');
        $this->load->model('backend/M_Home');
        $this->load->library('form_validation');
        IsUser();
    }

    function index()
    {
        $read = $this->M_CttAnak->GetAll();
        $user = $this->session->userdata('kd_user');
        $data = array(
            'user' => $this->M_Home->user($user),
            'judul'  => "CATATAN PERKEMBANGAN ANAK",
            'sub'  => "Lihat Posyandu",
            'read' => $read
        );
        $this->template->load('backend/template', $this->view . 'read', $data);
    }


    public function selectkia()
    {
        $kd   = $this->uri->segment(4);
        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('kd_user');
            $data = array(
                'user' => $this->M_Home->user($user),
                'judul'  => "CATATAN PERKEMBANGAN ANAK",
                'sub'  => "Tambah Catatan Perkembangan Anak",
                'posy'   => $this->M_CttAnak->create($kd),
                'kia'   => $this->M_Kia->KiaAnak(),
            );
            $this->template->load('backend/template', $this->view . 'selectkia', $data);
        }
    }

    public function create()
    {
        $kd   = $this->uri->segment(4);
        $kia   = $this->uri->segment(5);
        $this->form_validation->set_rules('bln_umur', 'Umur', 'required|trim');
        $this->form_validation->set_rules('bb_ank', 'BB', 'required|trim|max_length[4]|numeric');
        $this->form_validation->set_rules('hbb_ank', 'Hasil BB', 'required|trim');
        $this->form_validation->set_rules('nik_kes', 'Tenaga Kesehatan', 'required|trim');
        $this->form_validation->set_rules('gb_posykia', 'gb_posykia', 'required|trim|is_unique[posyandu_detail.gb_posykia]', [
            'is_unique' => 'Nomor KIA telah tercatat pada posyandu saat ini!'
        ]);
        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('kd_user');
            $data = array(
                'user' => $this->M_Home->user($user),
                'judul'  => "CATATAN PERKEMBANGAN ANAK",
                'sub'  => "Tambah Catatan Perkembangan Anak",
                'posy'   => $this->M_CttAnak->create($kd),
                'kia'     => $this->M_Kia->kia($kia),
                'tenagakes'   => $this->M_TenagaKes->bertugas(),
                'umur'     => $this->M_Umur->umur(),
                'imunisasi'     => $this->M_Imunisasi->GetAll(),
                'last'     => $this->M_CttAnak->last($kia),
            );
            $this->template->load('backend/template', $this->view . 'create', $data);
        } else {
            $this->save();
        }
    }

    public function save()
    {
        $id_imunisasi = $this->input->post('id_imunisasi');
        if (!empty($id_imunisasi)) {
            $data = [
                'no_posy' =>  $this->input->post('no_posy'),
                'no_kia' =>  $this->input->post('no_kia'),
                'gb_posykia' => $this->input->post('gb_posykia'),
                'kateg_ctt' => $this->input->post('st_kia'),
                'kd_user'    => $this->session->userdata('kd_user'),
                'tgl_detailctt' =>  $this->input->post('tgl_posy'),
                'bln_umur' =>  $this->input->post('bln_umur'),
                'bb_ank' =>  $this->input->post('bb_ank'),
                'panjang_ank' =>  $this->input->post('panjang_ank'),
                'asi_ank' =>  $this->input->post('asi_ank'),
                'id_imunisasi' =>  $this->input->post('id_imunisasi'),
                'vitamin_ank' =>  $this->input->post('vitamin_ank'),
                'hbb_ank' =>  $this->input->post('hbb_ank'),
                'hpanjang_ank' =>  $this->input->post('hpanjang_ank'),
                'nik_kes' =>  $this->input->post('nik_kes'),
            ];
        } else {
            $data = [
                'no_posy' =>  $this->input->post('no_posy'),
                'no_kia' =>  $this->input->post('no_kia'),
                'gb_posykia' => $this->input->post('gb_posykia'),
                'kateg_ctt' => $this->input->post('st_kia'),
                'kd_user'    => $this->session->userdata('kd_user'),
                'tgl_detailctt' =>  $this->input->post('tgl_posy'),
                'bln_umur' =>  $this->input->post('bln_umur'),
                'bb_ank' =>  $this->input->post('bb_ank'),
                'panjang_ank' =>  $this->input->post('panjang_ank'),
                'asi_ank' =>  $this->input->post('asi_ank'),
                'id_imunisasi' =>  14,
                'vitamin_ank' =>  $this->input->post('vitamin_ank'),
                'hbb_ank' =>  $this->input->post('hbb_ank'),
                'hpanjang_ank' =>  $this->input->post('hpanjang_ank'),
                'nik_kes' =>  $this->input->post('nik_kes'),
            ];
        }
        $this->M_CttAnak->save($data);
        $this->session->set_flashdata('message_true', 'Data berhasil tersimpan');
        redirect($this->redirect, 'refresh');
    }

    public function detailall()
    {
        $kd   = $this->uri->segment(4);
        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('kd_user');
            $data = array(
                'user' => $this->M_Home->user($user),
                'judul'  => "CATATAN PERKEMBANGAN ANAK",
                'sub'  => "Detail Catatan Perkembangan Anak",
                'posy'   => $this->M_CttAnak->create($kd),
                'kia'   => $this->M_CttAnak->detailall($kd),
            );
            $this->template->load('backend/template', $this->view . 'detailall', $data);
        }
    }

    public function edit()
    {
        $kd   = $this->uri->segment(4);
        $kia   = $this->uri->segment(5);
        $this->form_validation->set_rules('bln_umur', 'Umur', 'required|trim');
        $this->form_validation->set_rules('bb_ank', 'BB', 'required|trim');
        $this->form_validation->set_rules('hbb_ank', 'Hasil BB', 'required|trim');
        $this->form_validation->set_rules('nik_kes', 'Tenaga Kesehatan', 'required|trim');
        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('kd_user');
            $data = array(
                'user' => $this->M_Home->user($user),
                'judul'  => "CATATAN PERKEMBANGAN ANAK",
                'sub'  => "Tambah Catatan Perkembangan Anak",
                'tenagakes'   => $this->M_TenagaKes->bertugas(),
                'umur'     => $this->M_Umur->umur(),
                'imunisasi'     => $this->M_Imunisasi->GetAll(),
                'last'     => $this->M_CttAnak->last($kia),
                'edit'   => $this->M_CttAnak->edit($kd),
            );
            $this->template->load('backend/template', $this->view . 'edit', $data);
        } else {
            $this->update();
        }
    }

    public function update()
    {
        $kd = $this->uri->segment(4);
        $id_imunisasi = $this->input->post('id_imunisasi');
        if (!empty($id_imunisasi)) {
            $data = [
                'bln_umur' =>  $this->input->post('bln_umur'),
                'bb_ank' =>  $this->input->post('bb_ank'),
                'panjang_ank' =>  $this->input->post('panjang_ank'),
                'asi_ank' =>  $this->input->post('asi_ank'),
                'id_imunisasi' =>  $this->input->post('id_imunisasi'),
                'vitamin_ank' =>  $this->input->post('vitamin_ank'),
                'hbb_ank' =>  $this->input->post('hbb_ank'),
                'hpanjang_ank' =>  $this->input->post('hpanjang_ank'),
                'nik_kes' =>  $this->input->post('nik_kes'),
            ];
        } else {
            $data = [
                'bln_umur' =>  $this->input->post('bln_umur'),
                'bb_ank' =>  $this->input->post('bb_ank'),
                'panjang_ank' =>  $this->input->post('panjang_ank'),
                'asi_ank' =>  $this->input->post('asi_ank'),
                'id_imunisasi' =>  14,
                'vitamin_ank' =>  $this->input->post('vitamin_ank'),
                'hbb_ank' =>  $this->input->post('hbb_ank'),
                'hpanjang_ank' =>  $this->input->post('hpanjang_ank'),
                'nik_kes' =>  $this->input->post('nik_kes'),
            ];
        }
        $this->M_CttAnak->update($kd, $data);
        $this->session->set_flashdata('message_true', 'Data telah diperbaharui');
        redirect($this->redirect, 'refresh');
    }

    public function status()
    {
        $kd = $this->uri->segment(4);
        $data = array(
            'st_posy' => $this->uri->segment(5)
        );
        $this->M_CttAnak->status($kd, $data);
        $this->session->set_flashdata('message_true', 'Status telah diperbaharui');
        redirect($this->redirect, 'refresh');
    }

    public function delete()
    {
        $kd = $this->uri->segment(4);
        $data = array(
            'gb_posykia' => $kd
        );
        $this->M_CttAnak->delete($data);
        $this->session->set_flashdata('message_true', 'Data telah dihapus');
        redirect($this->redirect, 'refresh');
    }
}
