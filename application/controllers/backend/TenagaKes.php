<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TenagaKes extends CI_Controller
{
  private $view    = "backend/v_tenagakes/";
  private $redirect = "backend/TenagaKes";

  public function __construct()
  {
    parent::__construct();
    $this->load->model('backend/M_TenagaKes');
    $this->load->model('backend/M_Home');
    $this->load->library('form_validation');
    IsUser();
  }

  function index()
  {
    $read = $this->M_TenagaKes->GetAll();
    $user = $this->session->userdata('kd_user');
    $data = array(
      'user' => $this->M_Home->user($user),
      'judul'  => "DATA TENAGA KESEHATAN",
      'sub'  => "Lihat Perangkat",
      'read' => $read
    );
    //$this->load->view($this->view.'read', $data);
    $this->template->load('backend/template', $this->view . 'read', $data);
  }

  public function create()
  {
    $this->form_validation->set_rules('nik_kes', 'NIK', 'required|trim|min_length[10]|max_length[16]|numeric|is_unique[tenagakes.nik_kes]', [
      'is_unique' => 'NIK telah digunakan!'
    ]);
    $this->form_validation->set_rules('nm_kes', 'Nama', 'required|trim');
    $this->form_validation->set_rules('born_tglkes', 'Jabatan', 'required|trim');
    $this->form_validation->set_rules('addres_kes', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('hp_kes', 'Nomor HP', 'required|trim|min_length[10]|max_length[13]|numeric');
    $this->form_validation->set_rules('wa_kdkes', 'Kode', 'required|trim|min_length[3]|max_length[6]|numeric');
    $this->form_validation->set_rules('wa_nokes', 'Nomor Whatsapp', 'required|trim|min_length[9]|max_length[13]|numeric');
    $this->form_validation->set_rules('email_kes', 'Email', 'required|trim|valid_email|is_unique[tenagakes.email_kes]', [
      'is_unique' => 'Email telah digunakan!'
    ]);
    if ($this->form_validation->run() == false) {
      $user = $this->session->userdata('kd_user');
      $data = array(
        'user' => $this->M_Home->user($user),
        'judul'    => "DATA TENAGA KESEHATAN",
        'sub'    => "Tambah Tenaga Kesehatan",
        'create'     => ''
      );
      $this->template->load('backend/template', $this->view . 'create', $data);
    } else {
      $this->save();
    }
  }

  public function save()
  {
    $email = $this->input->post('email_kes', true);
    $data = [
      'nik_kes' => $this->input->post('nik_kes'),
      'nm_kes' => $this->input->post('nm_kes'),
      'born_tglkes' => $this->input->post('born_tglkes'),
      'addres_kes' => $this->input->post('addres_kes'),
      'st_kes' => 0,
      'email_kes' => $this->input->post('email_kes'),
      'hp_kes' => $this->input->post('hp_kes'),
      'wa_kdkes' => $this->input->post('wa_kdkes'),
      'wa_nokes' => $this->input->post('wa_nokes'),
      'img_kes' => 'default.jpg',
      'active_kes' => 1,
      'create_kes' => time(),
      'date_kes' => date('Y-m-d')
    ];
    // siapkan token
    $token = base64_encode(random_bytes(32));
    // $user_token = [
    //   'email' => $email,
    //   'token' => $token,
    //   'create_token' => time()
    // ];

    $this->db->insert('tenagakes', $data);
    //$this->db->insert('user_token', $user_token);

    //$this->_sendEmail($token, 'verify');
    $this->session->set_flashdata('message_true', 'Data berhasil tersimpan');
    redirect($this->redirect, 'refresh');
  }

  private function _sendEmail($token, $type)
  {
    $config = [
      'protocol'  => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'projek4ji@gmail.com',
      'smtp_pass' => 'Pa55w@rd',
      'smtp_port' => 465,
      'mailtype'  => 'html',
      'charset'   => 'utf-8',
      'newline'   => "\r\n"
    ];

    // $this->email->initialize($config);
    // $this->email->from('projek4ji@gmail.com', 'Wesite Desa');
    // $this->email->to($this->input->post('email_user'));

    if ($type == 'verify') {
      $this->email->subject('Account Verification');
      $this->email->message('Klik link ini untuk verifikasi akun : <a href="' . base_url() . 'index.php/Auth/verify?email=' . $this->input->post('email_user') . '&token=' . urlencode($token) . '">Activate</a>');
    } else if ($type == 'forgot') {
      $this->email->subject('Reset Password');
      $this->email->message('Klik link ini untuk reset password : <a href="' . base_url() . 'index.php/Auth/resetpassword?email=' . $this->input->post('email_user') . '&token=' . urlencode($token) . '">Reset Password</a>');
    }

    // if ($this->email->send()) {
    //     return true;
    // } else {
    //     echo $this->email->print_debugger();
    //     die;
    // }
  }

  public function edit()
  {
    $kd   = $this->uri->segment(4);
    $this->form_validation->set_rules('nm_kes', 'Nama', 'required|trim');
    $this->form_validation->set_rules('born_tglkes', 'Jabatan', 'required|trim');
    $this->form_validation->set_rules('addres_kes', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('hp_kes', 'Nomor HP', 'required|trim|min_length[10]|max_length[13]|numeric');
    $this->form_validation->set_rules('wa_kdkes', 'Kode', 'required|trim|min_length[3]|max_length[6]|numeric');
    $this->form_validation->set_rules('wa_nokes', 'Nomor Whatsapp', 'required|trim|min_length[9]|max_length[13]|numeric');
    if ($this->form_validation->run() == false) {
      $user = $this->session->userdata('kd_user');
      $data = array(
        'user' => $this->M_Home->user($user),
        'judul'  => "DATA TENAGA KESEHATAN",
        'sub'  => "Ubah Tenaga Kesehatan",
        'edit'   => $this->M_TenagaKes->edit($kd)
      );
      $this->template->load('backend/template', $this->view . 'edit', $data);
    } else {
      $this->update();
    }
  }

  public function update()
  {
    $kd = $this->uri->segment(4);
    //img_kes
    $name_imgkes = $_FILES['img_kes']['name'];
    $type_imgkes = $_FILES['img_kes']['type'];
    $tmp_imgkes  = $_FILES['img_kes']['tmp_name'];
    //upload img
    if (!empty($tmp_imgkes)) {
      if ($type_imgkes != "image/jpeg" and $type_imgkes != "image/jpg" and $type_imgkes != "image/png") {
        $this->session->set_flashdata('message_false', 'Format gambar yang digunakan jpeg|jpg|png');
        redirect($this->redirect, 'refresh');
      } else {
        $img_kes = UploadImg($_FILES['img_kes'], './assets/img_tenagakes/', 'imgkes', 300);
        $data = array(
          'nik_kes' => $this->input->post('nik_kes'),
          'nm_kes' => $this->input->post('nm_kes'),
          'born_tglkes' => $this->input->post('born_tglkes'),
          'addres_kes' => $this->input->post('addres_kes'),
          'email_kes' => $this->input->post('email_kes'),
          'hp_kes' => $this->input->post('hp_kes'),
          'wa_kdkes' => $this->input->post('wa_kdkes'),
          'wa_nokes' => $this->input->post('wa_nokes'),
          'img_kes' => $img_kes,
        );
      }
    } else {
      $data = array(
        'nik_kes' => $this->input->post('nik_kes'),
        'nm_kes' => $this->input->post('nm_kes'),
        'born_tglkes' => $this->input->post('born_tglkes'),
        'addres_kes' => $this->input->post('addres_kes'),
        'email_kes' => $this->input->post('email_kes'),
        'hp_kes' => $this->input->post('hp_kes'),
        'wa_kdkes' => $this->input->post('wa_kdkes'),
        'wa_nokes' => $this->input->post('wa_nokes'),
      );
    }
    $this->M_TenagaKes->update($kd, $data);
    $this->session->set_flashdata('message_true', 'Data telah diperbaharui');
    redirect($this->redirect, 'refresh');
  }

  public function show()
  {
    $kd   = $this->uri->segment(4);
    $user = $this->session->userdata('kd_user');
    $data = array(
      'user' => $this->M_Home->user($user),
      'judul'  => "DATA TENAGA KESEHATAN",
      'sub'  => "Detail Tenaga Kesehatan",
      'show'   => $this->M_TenagaKes->show($kd)
    );
    $this->template->load('backend/template', $this->view . 'show', $data);
  }

  public function status()
  {
    $kd = $this->uri->segment(4);
    $data = array(
      'st_kes' => $this->uri->segment(5)
    );
    $this->M_TenagaKes->status($kd, $data);
    $this->session->set_flashdata('message_true', 'Status telah diperbaharui');
    redirect($this->redirect, 'refresh');
  }

  public function delete()
  {
    $kd = $this->uri->segment(4);
    $data = array(
      'nik_kes' => $kd
    );
    $this->M_TenagaKes->delete($data);
    $this->session->set_flashdata('message_true', 'Data telah dihapus');
    redirect($this->redirect, 'refresh');
  }
}
