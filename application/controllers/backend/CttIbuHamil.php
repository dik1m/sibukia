<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CttIbuHamil extends CI_Controller
{
    private $view    = "backend/v_cttibuhamil/";
    private $redirect = "backend/CttIbuHamil";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/M_CttIbuHamil');
        $this->load->model('backend/M_TenagaKes');
        $this->load->model('backend/M_Kia');
        $this->load->model('backend/M_Home');
        $this->load->library('form_validation');
        IsUser();
    }

    function index()
    {
        $read = $this->M_CttIbuHamil->GetAll();
        $user = $this->session->userdata('kd_user');
        $data = array(
            'user' => $this->M_Home->user($user),
            'judul'  => "CATATAN IBU HAMIL",
            'sub'  => "Tambah Catatan Ibu Hamil",
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
                'judul'  => "CATATAN IBU HAMIL",
                'sub'  => "Tambah Catatan Ibu Hamil",
                'posy'   => $this->M_CttIbuHamil->create($kd),
                'kia'   => $this->M_Kia->KiaHamil(),
            );
            $this->template->load('backend/template', $this->view . 'selectkia', $data);
        }
    }

    public function create()
    {
        $kd   = $this->uri->segment(4);
        $kia   = $this->uri->segment(5);
        $this->form_validation->set_rules('keluhan_mil', 'Keluhan Sekarang', 'required|trim');
        $this->form_validation->set_rules('tekdarah_mil', 'Tekanan Darah', 'required|trim');
        $this->form_validation->set_rules('berat_mil', 'Berat Badan', 'required|trim|max_length[3]|numeric');
        $this->form_validation->set_rules('umur_mil', 'Umur Kehamilan', 'required|trim');
        $this->form_validation->set_rules('fundus_mil', 'Tinggi Fundus', 'required|trim');
        $this->form_validation->set_rules('janin_mil', 'Letak Janin', 'required|trim');
        $this->form_validation->set_rules('denjantung_mil', 'Denyut Jantung Janin', 'required|trim');
        $this->form_validation->set_rules('kaki_mil', 'Kaki Bengkak', 'required|trim');
        $this->form_validation->set_rules('hasillab_mil', 'Hasil Periksa Laboratorium', 'required|trim');
        $this->form_validation->set_rules('tindakan_mil', 'Tindakan', 'required|trim');
        $this->form_validation->set_rules('nasehat_mil', 'Nasihat', 'required|trim');
        $this->form_validation->set_rules('kembali_mil', 'Kapan Harus Kembali', 'required|trim');
        $this->form_validation->set_rules('nik_kes', 'Tenaga Kesehatan', 'required|trim');
        $this->form_validation->set_rules('gb_posykia', 'gb_posykia', 'required|trim|is_unique[posyandu_detail.gb_posykia]', [
            'is_unique' => 'Nomor KIA telah tercatat pada posyandu saat ini!'
        ]);
        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('kd_user');
            $data = array(
                'user' => $this->M_Home->user($user),
                'judul'  => "CATATAN IBU HAMIL",
                'sub'  => "Catatan Ibu Hamil",
                'posy'   => $this->M_CttIbuHamil->create($kd),
                'kia'     => $this->M_Kia->kia($kia),
                'tenagakes'   => $this->M_TenagaKes->bertugas(),
            );
            $this->template->load('backend/template', $this->view . 'create', $data);
        } else {
            $this->save();
        }
    }

    public function save()
    {
        //img_user
        $name_imgmil = $_FILES['img_mil']['name'];
        $type_imgmil = $_FILES['img_mil']['type'];
        $tmp_imgmil  = $_FILES['img_mil']['tmp_name'];
        //upload img
        if (!empty($tmp_imgmil)) {
            if ($type_imgmil != "image/jpeg" and $type_imgmil != "image/jpg" and $type_imgmil != "image/png") {
                $this->session->set_flashdata('message_false', 'Format gambar yang digunakan jpeg|jpg|png');
                redirect($this->redirect, 'refresh');
            } else {
                $img_mil = UploadImg($_FILES['img_mil'], './assets/img_mil/', 'usg', 400);
                $data = [
                    'no_posy' =>  $this->input->post('no_posy'),
                    'gb_posykia' => $this->input->post('gb_posykia'),
                    'kateg_ctt' => $this->input->post('st_kia'),
                    'kd_user'    => $this->session->userdata('kd_user'),
                    'no_kia' =>  $this->input->post('no_kia'),
                    'tgl_detailctt' =>  $this->input->post('tgl_posy'),
                    'keluhan_mil' => $this->input->post('keluhan_mil', true),
                    'tekdarah_mil' => $this->input->post('tekdarah_mil', true),
                    'berat_mil' => $this->input->post('berat_mil', true),
                    'umur_mil'    => $this->input->post('umur_mil', true),
                    'fundus_mil'    => $this->input->post('fundus_mil', true),
                    'janin_mil'    => $this->input->post('janin_mil', true),
                    'denjantung_mil'    => $this->input->post('denjantung_mil', true),
                    'kaki_mil'    => $this->input->post('kaki_mil', true),
                    'hasillab_mil'    => $this->input->post('hasillab_mil', true),
                    'tindakan_mil'    => $this->input->post('tindakan_mil', true),
                    'nasehat_mil'    => $this->input->post('nasehat_mil', true),
                    'kembali_mil'    => $this->input->post('kembali_mil', true),
                    'ketspesialis_mil'    => $this->input->post('ketspesialis_mil'),
                    'img_mil'    => $img_mil,
                    'nik_kes'    => $this->input->post('nik_kes', true),
                ];
            }
        } else {
            $data = [
                'no_posy' =>  $this->input->post('no_posy'),
                'gb_posykia' => $this->input->post('gb_posykia'),
                'kateg_ctt' => $this->input->post('st_kia'),
                'kd_user'    => $this->session->userdata('kd_user'),
                'no_kia' =>  $this->input->post('no_kia'),
                'tgl_detailctt' =>  $this->input->post('tgl_posy'),
                'keluhan_mil' => $this->input->post('keluhan_mil', true),
                'tekdarah_mil' => $this->input->post('tekdarah_mil', true),
                'berat_mil' => $this->input->post('berat_mil', true),
                'umur_mil'    => $this->input->post('umur_mil', true),
                'fundus_mil'    => $this->input->post('fundus_mil', true),
                'janin_mil'    => $this->input->post('janin_mil', true),
                'denjantung_mil'    => $this->input->post('denjantung_mil', true),
                'kaki_mil'    => $this->input->post('kaki_mil', true),
                'hasillab_mil'    => $this->input->post('hasillab_mil', true),
                'tindakan_mil'    => $this->input->post('tindakan_mil', true),
                'nasehat_mil'    => $this->input->post('nasehat_mil', true),
                'kembali_mil'    => $this->input->post('kembali_mil', true),
                'ketspesialis_mil'    => $this->input->post('ketspesialis_mil'),
                'nik_kes'    => $this->input->post('nik_kes', true),
            ];
        }
        $this->M_CttIbuHamil->save($data);
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
                'posy'   => $this->M_CttIbuHamil->create($kd),
                'kia'   => $this->M_CttIbuHamil->detailall($kd),
            );
            $this->template->load('backend/template', $this->view . 'detailall', $data);
        }
    }

    public function edit()
    {
        $kd   = $this->uri->segment(4);
        $this->form_validation->set_rules('keluhan_mil', 'Keluhan Sekarang', 'required|trim');
        $this->form_validation->set_rules('tekdarah_mil', 'Tekanan Darah', 'required|trim');
        $this->form_validation->set_rules('berat_mil', 'Berat Badan', 'required|trim|max_length[3]|numeric');
        $this->form_validation->set_rules('umur_mil', 'Umur Kehamilan', 'required|trim');
        $this->form_validation->set_rules('fundus_mil', 'Tinggi Fundus', 'required|trim');
        $this->form_validation->set_rules('janin_mil', 'Letak Janin', 'required|trim');
        $this->form_validation->set_rules('denjantung_mil', 'Denyut Jantung Janin', 'required|trim');
        $this->form_validation->set_rules('kaki_mil', 'Kaki Bengkak', 'required|trim');
        $this->form_validation->set_rules('hasillab_mil', 'Hasil Periksa Laboratorium', 'required|trim');
        $this->form_validation->set_rules('tindakan_mil', 'Tindakan', 'required|trim');
        $this->form_validation->set_rules('nasehat_mil', 'Nasihat', 'required|trim');
        $this->form_validation->set_rules('kembali_mil', 'Kapan Harus Kembali', 'required|trim');
        $this->form_validation->set_rules('nik_kes', 'Tenaga Kesehatan', 'required|trim');
        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('kd_user');
            $data = array(
                'user' => $this->M_Home->user($user),
                'judul'  => "CATATAN PERKEMBANGAN ANAK",
                'sub'  => "Tambah Catatan Perkembangan Anak",
                'tenagakes'   => $this->M_TenagaKes->bertugas(),
                'edit'   => $this->M_CttIbuHamil->edit($kd),
            );
            $this->template->load('backend/template', $this->view . 'edit', $data);
        } else {
            $this->update();
        }
    }


    public function update()
    {
        $kd = $this->uri->segment(4);
        //img_user
        $name_imgmil = $_FILES['img_mil']['name'];
        $type_imgmil = $_FILES['img_mil']['type'];
        $tmp_imgmil  = $_FILES['img_mil']['tmp_name'];
        //upload img
        if (!empty($tmp_imgmil)) {
            if ($type_imgmil != "image/jpeg" and $type_imgmil != "image/jpg" and $type_imgmil != "image/png") {
                $this->session->set_flashdata('message_false', 'Format gambar yang digunakan jpeg|jpg|png');
                redirect($this->redirect, 'refresh');
            } else {
                $img_mil = UploadImg($_FILES['img_mil'], './assets/img_mil/', 'usg', 400);
                $data = [
                    'keluhan_mil' => $this->input->post('keluhan_mil', true),
                    'tekdarah_mil' => $this->input->post('tekdarah_mil', true),
                    'berat_mil' => $this->input->post('berat_mil', true),
                    'umur_mil'    => $this->input->post('umur_mil', true),
                    'fundus_mil'    => $this->input->post('fundus_mil', true),
                    'janin_mil'    => $this->input->post('janin_mil', true),
                    'denjantung_mil'    => $this->input->post('denjantung_mil', true),
                    'kaki_mil'    => $this->input->post('kaki_mil', true),
                    'hasillab_mil'    => $this->input->post('hasillab_mil', true),
                    'tindakan_mil'    => $this->input->post('tindakan_mil', true),
                    'nasehat_mil'    => $this->input->post('nasehat_mil', true),
                    'kembali_mil'    => $this->input->post('kembali_mil', true),
                    'ketspesialis_mil'    => $this->input->post('ketspesialis_mil'),
                    'img_mil'    => $img_mil,
                    'nik_kes'    => $this->input->post('nik_kes', true),
                ];
            }
        } else {
            $data = [
                'keluhan_mil' => $this->input->post('keluhan_mil', true),
                'tekdarah_mil' => $this->input->post('tekdarah_mil', true),
                'berat_mil' => $this->input->post('berat_mil', true),
                'umur_mil'    => $this->input->post('umur_mil', true),
                'fundus_mil'    => $this->input->post('fundus_mil', true),
                'janin_mil'    => $this->input->post('janin_mil', true),
                'denjantung_mil'    => $this->input->post('denjantung_mil', true),
                'kaki_mil'    => $this->input->post('kaki_mil', true),
                'hasillab_mil'    => $this->input->post('hasillab_mil', true),
                'tindakan_mil'    => $this->input->post('tindakan_mil', true),
                'nasehat_mil'    => $this->input->post('nasehat_mil', true),
                'kembali_mil'    => $this->input->post('kembali_mil', true),
                'ketspesialis_mil'    => $this->input->post('ketspesialis_mil'),
                'nik_kes'    => $this->input->post('nik_kes', true),
            ];
        }
        $this->M_CttIbuHamil->update($kd, $data);
        $this->session->set_flashdata('message_true', 'Data telah diperbaharui');
        redirect($this->redirect, 'refresh');
    }

    public function status()
    {
        $kd = $this->uri->segment(4);
        $data = array(
            'st_posy' => $this->uri->segment(5)
        );
        $this->M_CttIbuHamil->status($kd, $data);
        $this->session->set_flashdata('message_true', 'Status telah diperbaharui');
        redirect($this->redirect, 'refresh');
    }

    public function delete()
    {
        $kd = $this->uri->segment(4);
        $data = array(
            'gb_posykia' => $kd
        );
        $this->M_CttIbuHamil->delete($data);
        $this->session->set_flashdata('message_true', 'Data telah dihapus');
        redirect($this->redirect, 'refresh');
    }
}
