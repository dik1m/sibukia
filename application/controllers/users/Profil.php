<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller
{

	private $view    = "users/v_profil/";
	private $redirect = "users/Home";


	public function __construct()
	{
		parent::__construct();
		//Load model
		$this->load->model('backend/M_People');
		$this->load->model('backend/M_People', 'Daerah');
		$this->load->model('users/M_Home');
		$this->load->library('form_validation');

		IsUsers();
	}

	public function show()
	{
		$kd   = $this->uri->segment(4);
		$user = $this->session->userdata('no_ktp');
		$data = array(
			'user' => $this->M_Home->user($user),
			'judul'    => "PROFIL USER",
			'sub'    => "Detail Profil",
			'user' => $this->M_Home->user($user),
			'prov' 	=> $this->M_People->prov(),
			'kab' 	=> $this->M_People->kab(),
			'kec' 	=> $this->M_People->kec(),
			'kel' 	=> $this->M_People->kel(),
			'show'     => $this->M_People->show($kd)
		);
		$this->template->load('users/template', $this->view . 'show', $data);
	}

	public function edit()
	{
		$kd   = $this->uri->segment(4);
		$this->form_validation->set_rules('no_kk', 'Nomor Kartu Keluarga', 'trim|min_length[10]|max_length[16]|numeric');
		$this->form_validation->set_rules('nm_peop', 'Nama', 'required|trim');
		$this->form_validation->set_rules('hp_peop', 'Nomor HP', 'required|trim|min_length[10]|max_length[13]|numeric');
		$this->form_validation->set_rules('wa_kdpeop', 'Kode Whatsapp', 'trim|min_length[3]|max_length[6]|numeric');
		$this->form_validation->set_rules('wa_nopeop', 'Nomor Whatsapp', 'required|trim|min_length[9]|max_length[13]|numeric');
		$this->form_validation->set_rules('gender_peop', 'Pilih Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('born_tmppeop', 'Tempat Lahir', 'required|trim');
		$this->form_validation->set_rules('born_tglpeop', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('relig_peop', 'Pilih Agama', 'required|trim');
		$this->form_validation->set_rules('studi_peop', 'Pilih Pendidikan', 'required|trim');
		$this->form_validation->set_rules('work_peop', 'Pekerjaan', 'required|trim');
		$this->form_validation->set_rules('addres_peop', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('kdpos_peop', 'Kode POS', 'required|trim|min_length[4]|max_length[6]|numeric');
		$this->form_validation->set_rules('id_prov', 'Pilih Provinsi', 'required|trim');
		$this->form_validation->set_rules('id_kab', 'Pilih Kabupaten/Kota', 'required|trim');
		$this->form_validation->set_rules('id_kec', 'Pilih Kecamatan', 'required|trim');
		$this->form_validation->set_rules('id_kel', 'Pilih Kelurahan/Desa', 'required|trim');

		if ($this->form_validation->run() == false) {
			$user = $this->session->userdata('no_ktp');
			$data = array(
				'user' => $this->M_Home->user($user),
				'judul'    => "PROFIL USER",
				'sub'    => "Ubah Profil",
				'prov' 	=> $this->M_People->prov(),
				'kab' 	=> $this->M_People->kab(),
				'kec' 	=> $this->M_People->kec(),
				'kel' 	=> $this->M_People->kel(),
				'edit'     => $this->M_People->edit($kd)
			);
			$this->template->load('users/template', $this->view . 'edit', $data);
		} else {
			$this->update();
		}
	}

	public function update()
	{
		$kd = $this->uri->segment(4);
		//img_peop
		$name_img_peop = $_FILES['img_peop']['name'];
		$type_img_peop = $_FILES['img_peop']['type'];
		$tmp_img_peop  = $_FILES['img_peop']['tmp_name'];
		//img_ktp
		$name_img_ktp = $_FILES['img_ktp']['name'];
		$type_img_ktp = $_FILES['img_ktp']['type'];
		$tmp_img_ktp  = $_FILES['img_ktp']['tmp_name'];
		//img_kk
		$name_img_kk = $_FILES['img_kk']['name'];
		$type_img_kk = $_FILES['img_kk']['type'];
		$tmp_img_kk  = $_FILES['img_kk']['tmp_name'];
		//upload3img
		if (!empty($tmp_img_peop) and !empty($tmp_img_ktp) and !empty($tmp_img_kk)) {
			if (
				$type_img_peop != "image/jpeg" and $type_img_peop != "image/jpg" and $type_img_peop != "image/png" and
				$type_img_ktp != "image/jpeg" and $type_img_ktp != "image/jpg" and $type_img_ktp != "image/png" and
				$type_img_kk != "image/jpeg" and $type_img_kk != "image/jpg" and $type_img_kk != "image/png"
			) {
				$this->session->set_flashdata('message_false', 'Format gambar yang digunakan jpeg|jpg|png');
				redirect($this->redirect, 'refresh');
			} else {
				$img_peop = UploadImg($_FILES['img_peop'], './assets/img_penduduk/', 'foto', 400);
				$img_ktp = UploadImg($_FILES['img_ktp'], './assets/img_ktp/', 'ktp', 500);
				$img_kk = UploadImg($_FILES['img_kk'], './assets/img_kk/', 'kk', 800);
				$data = array(
					'no_kk' => $this->input->post('no_kk', true),
					'nm_peop' => htmlspecialchars($this->input->post('nm_peop', true)),
					'hp_peop' => $this->input->post('hp_peop', true),
					'wa_kdpeop' => $this->input->post('wa_kdpeop'),
					'wa_nopeop' => $this->input->post('wa_nopeop', true),
					'gender_peop' => $this->input->post('gender_peop', true),
					'born_tmppeop' => $this->input->post('born_tmppeop', true),
					'born_tglpeop' => $this->input->post('born_tglpeop', true),
					'relig_peop' => $this->input->post('relig_peop', true),
					'studi_peop' => $this->input->post('studi_peop', true),
					'work_peop' => $this->input->post('work_peop', true),
					'addres_peop' => $this->input->post('addres_peop', true),
					'kdpos_peop' => $this->input->post('kdpos_peop', true),
					'id_prov' => $this->input->post('id_prov', true),
					'id_kab' => $this->input->post('id_kab', true),
					'id_kec' => $this->input->post('id_kec', true),
					'id_kel' => $this->input->post('id_kel', true),
					'img_peop' => 	$img_peop,
					'img_ktp' => 	$img_ktp,
					'img_kk' => 	$img_kk
				);
			}
		}
		//upload2img
		elseif (!empty($tmp_img_peop) and !empty($tmp_img_ktp)) {
			if (
				$type_img_peop != "image/jpeg" and $type_img_peop != "image/jpg" and $type_img_peop != "image/png" and
				$type_img_ktp != "image/jpeg" and $type_img_ktp != "image/jpg" and $type_img_ktp != "image/png"
			) {
				$this->session->set_flashdata('message_false', 'Format gambar yang digunakan jpeg|jpg|png');
				redirect($this->redirect, 'refresh');
			} else {
				$img_peop = UploadImg($_FILES['img_peop'], './assets/img_penduduk/', 'foto', 400);
				$img_ktp = UploadImg($_FILES['img_ktp'], './assets/img_ktp/', 'ktp', 500);
				$data = array(
					'no_kk' => $this->input->post('no_kk', true),
					'nm_peop' => htmlspecialchars($this->input->post('nm_peop', true)),
					'hp_peop' => $this->input->post('hp_peop', true),
					'wa_kdpeop' => $this->input->post('wa_kdpeop'),
					'wa_nopeop' => $this->input->post('wa_nopeop', true),
					'gender_peop' => $this->input->post('gender_peop', true),
					'born_tmppeop' => $this->input->post('born_tmppeop', true),
					'born_tglpeop' => $this->input->post('born_tglpeop', true),
					'relig_peop' => $this->input->post('relig_peop', true),
					'studi_peop' => $this->input->post('studi_peop', true),
					'work_peop' => $this->input->post('work_peop', true),
					'addres_peop' => $this->input->post('addres_peop', true),
					'kdpos_peop' => $this->input->post('kdpos_peop', true),
					'id_prov' => $this->input->post('id_prov', true),
					'id_kab' => $this->input->post('id_kab', true),
					'id_kec' => $this->input->post('id_kec', true),
					'id_kel' => $this->input->post('id_kel', true),
					'img_peop' => 	$img_peop,
					'img_ktp' => 	$img_ktp
				);
			}
		}
		//upload2img
		elseif (!empty($tmp_img_peop) and !empty($tmp_img_kk)) {
			if (
				$type_img_peop != "image/jpeg" and $type_img_peop != "image/jpg" and $type_img_peop != "image/png" and
				$type_img_kk != "image/jpeg" and $type_img_kk != "image/jpg" and $type_img_kk != "image/png"
			) {
				$this->session->set_flashdata('message_false', 'Format gambar yang digunakan jpeg|jpg|png');
				redirect($this->redirect, 'refresh');
			} else {
				$img_peop = UploadImg($_FILES['img_peop'], './assets/img_penduduk/', 'foto', 400);
				$img_kk = UploadImg($_FILES['img_kk'], './assets/img_kk/', 'kk', 800);
				$data = array(
					'no_kk' => $this->input->post('no_kk', true),
					'nm_peop' => htmlspecialchars($this->input->post('nm_peop', true)),
					'hp_peop' => $this->input->post('hp_peop', true),
					'wa_kdpeop' => $this->input->post('wa_kdpeop'),
					'wa_nopeop' => $this->input->post('wa_nopeop', true),
					'gender_peop' => $this->input->post('gender_peop', true),
					'born_tmppeop' => $this->input->post('born_tmppeop', true),
					'born_tglpeop' => $this->input->post('born_tglpeop', true),
					'relig_peop' => $this->input->post('relig_peop', true),
					'studi_peop' => $this->input->post('studi_peop', true),
					'work_peop' => $this->input->post('work_peop', true),
					'addres_peop' => $this->input->post('addres_peop', true),
					'kdpos_peop' => $this->input->post('kdpos_peop', true),
					'id_prov' => $this->input->post('id_prov', true),
					'id_kab' => $this->input->post('id_kab', true),
					'id_kec' => $this->input->post('id_kec', true),
					'id_kel' => $this->input->post('id_kel', true),
					'img_peop' => 	$img_peop,
					'img_kk' => 	$img_kk
				);
			}
		}
		//upload2img
		elseif (!empty($tmp_img_ktp) and !empty($tmp_img_kk)) {
			if (
				$type_img_ktp != "image/jpeg" and $type_img_ktp != "image/jpg" and $type_img_ktp != "image/png" and
				$type_img_kk != "image/jpeg" and $type_img_kk != "image/jpg" and $type_img_kk != "image/png"
			) {
				$this->session->set_flashdata('message_false', 'Format gambar yang digunakan jpeg|jpg|png');
				redirect($this->redirect, 'refresh');
			} else {
				$img_ktp = UploadImg($_FILES['img_ktp'], './assets/img_ktp/', 'ktp', 500);
				$img_kk = UploadImg($_FILES['img_kk'], './assets/img_kk/', 'kk', 800);
				$data = array(
					'no_kk' => $this->input->post('no_kk', true),
					'nm_peop' => htmlspecialchars($this->input->post('nm_peop', true)),
					'hp_peop' => $this->input->post('hp_peop', true),
					'wa_kdpeop' => $this->input->post('wa_kdpeop'),
					'wa_nopeop' => $this->input->post('wa_nopeop', true),
					'gender_peop' => $this->input->post('gender_peop', true),
					'born_tmppeop' => $this->input->post('born_tmppeop', true),
					'born_tglpeop' => $this->input->post('born_tglpeop', true),
					'relig_peop' => $this->input->post('relig_peop', true),
					'studi_peop' => $this->input->post('studi_peop', true),
					'work_peop' => $this->input->post('work_peop', true),
					'addres_peop' => $this->input->post('addres_peop', true),
					'kdpos_peop' => $this->input->post('kdpos_peop', true),
					'id_prov' => $this->input->post('id_prov', true),
					'id_kab' => $this->input->post('id_kab', true),
					'id_kec' => $this->input->post('id_kec', true),
					'id_kel' => $this->input->post('id_kel', true),
					'img_ktp' => 	$img_ktp,
					'img_kk' => 	$img_kk
				);
			}
		}
		//upload1img
		elseif (!empty($tmp_img_peop)) {
			if ($type_img_peop != "image/jpeg" and $type_img_peop != "image/jpg" and $type_img_peop != "image/png") {
				$this->session->set_flashdata('message_false', 'Format gambar yang digunakan jpeg|jpg|png');
				redirect($this->redirect, 'refresh');
			} else {
				$img_peop = UploadImg($_FILES['img_peop'], './assets/img_penduduk/', 'foto', 400);
				$data = array(
					'no_kk' => $this->input->post('no_kk', true),
					'nm_peop' => htmlspecialchars($this->input->post('nm_peop', true)),
					'hp_peop' => $this->input->post('hp_peop', true),
					'wa_kdpeop' => $this->input->post('wa_kdpeop'),
					'wa_nopeop' => $this->input->post('wa_nopeop', true),
					'gender_peop' => $this->input->post('gender_peop', true),
					'born_tmppeop' => $this->input->post('born_tmppeop', true),
					'born_tglpeop' => $this->input->post('born_tglpeop', true),
					'relig_peop' => $this->input->post('relig_peop', true),
					'studi_peop' => $this->input->post('studi_peop', true),
					'work_peop' => $this->input->post('work_peop', true),
					'addres_peop' => $this->input->post('addres_peop', true),
					'kdpos_peop' => $this->input->post('kdpos_peop', true),
					'id_prov' => $this->input->post('id_prov', true),
					'id_kab' => $this->input->post('id_kab', true),
					'id_kec' => $this->input->post('id_kec', true),
					'id_kel' => $this->input->post('id_kel', true),
					'img_peop' => 	$img_peop
				);
			}
		} elseif (!empty($tmp_img_ktp)) {
			if ($type_img_ktp != "image/jpeg" and $type_img_ktp != "image/jpg" and $type_img_ktp != "image/png") {
				$this->session->set_flashdata('message_false', 'Format gambar yang digunakan jpeg|jpg|png');
				redirect($this->redirect, 'refresh');
			} else {
				$img_ktp = UploadImg($_FILES['img_ktp'], './assets/img_ktp/', 'ktp', 500);
				$data = array(
					'no_kk' => $this->input->post('no_kk', true),
					'nm_peop' => htmlspecialchars($this->input->post('nm_peop', true)),
					'hp_peop' => $this->input->post('hp_peop', true),
					'wa_kdpeop' => $this->input->post('wa_kdpeop'),
					'wa_nopeop' => $this->input->post('wa_nopeop', true),
					'gender_peop' => $this->input->post('gender_peop', true),
					'born_tmppeop' => $this->input->post('born_tmppeop', true),
					'born_tglpeop' => $this->input->post('born_tglpeop', true),
					'relig_peop' => $this->input->post('relig_peop', true),
					'studi_peop' => $this->input->post('studi_peop', true),
					'work_peop' => $this->input->post('work_peop', true),
					'addres_peop' => $this->input->post('addres_peop', true),
					'kdpos_peop' => $this->input->post('kdpos_peop', true),
					'id_prov' => $this->input->post('id_prov', true),
					'id_kab' => $this->input->post('id_kab', true),
					'id_kec' => $this->input->post('id_kec', true),
					'id_kel' => $this->input->post('id_kel', true),
					'img_ktp' => 	$img_ktp
				);
			}
		} elseif (!empty($tmp_img_kk)) {
			if ($type_img_kk != "image/jpeg" and $type_img_kk != "image/jpg" and $type_img_kk != "image/png") {
				$this->session->set_flashdata('message_false', 'Format gambar yang digunakan jpeg|jpg|png');
				redirect($this->redirect, 'refresh');
			} else {
				$img_kk = UploadImg($_FILES['img_kk'], './assets/img_kk/', 'kk', 800);
				$data = array(
					'no_kk' => $this->input->post('no_kk', true),
					'nm_peop' => htmlspecialchars($this->input->post('nm_peop', true)),
					'hp_peop' => $this->input->post('hp_peop', true),
					'wa_kdpeop' => $this->input->post('wa_kdpeop'),
					'wa_nopeop' => $this->input->post('wa_nopeop', true),
					'gender_peop' => $this->input->post('gender_peop', true),
					'born_tmppeop' => $this->input->post('born_tmppeop', true),
					'born_tglpeop' => $this->input->post('born_tglpeop', true),
					'relig_peop' => $this->input->post('relig_peop', true),
					'studi_peop' => $this->input->post('studi_peop', true),
					'work_peop' => $this->input->post('work_peop', true),
					'addres_peop' => $this->input->post('addres_peop', true),
					'kdpos_peop' => $this->input->post('kdpos_peop', true),
					'id_prov' => $this->input->post('id_prov', true),
					'id_kab' => $this->input->post('id_kab', true),
					'id_kec' => $this->input->post('id_kec', true),
					'id_kel' => $this->input->post('id_kel', true),
					'img_kk' => 	$img_kk
				);
			}
		} else {
			$data = array(
				'no_kk' => $this->input->post('no_kk', true),
				'nm_peop' => htmlspecialchars($this->input->post('nm_peop', true)),
				'hp_peop' => $this->input->post('hp_peop', true),
				'wa_kdpeop' => $this->input->post('wa_kdpeop'),
				'wa_nopeop' => $this->input->post('wa_nopeop', true),
				'gender_peop' => $this->input->post('gender_peop', true),
				'born_tmppeop' => $this->input->post('born_tmppeop', true),
				'born_tglpeop' => $this->input->post('born_tglpeop', true),
				'relig_peop' => $this->input->post('relig_peop', true),
				'studi_peop' => $this->input->post('studi_peop', true),
				'work_peop' => $this->input->post('work_peop', true),
				'addres_peop' => $this->input->post('addres_peop', true),
				'kdpos_peop' => $this->input->post('kdpos_peop', true),
				'id_prov' => $this->input->post('id_prov', true),
				'id_kab' => $this->input->post('id_kab', true),
				'id_kec' => $this->input->post('id_kec', true),
				'id_kel' => $this->input->post('id_kel', true),
			);
		}
		$this->M_People->update($kd, $data);
		$this->session->set_flashdata('message_true', 'Data berhasil diperbaharui');
		redirect($this->redirect, 'refresh');
	}

	public function changepswd()
	{
		$kd   = $this->uri->segment(4);
		$user = $this->session->userdata('kd_user');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$user = $this->session->userdata('no_ktp');
			$data = array(
				'user' => $this->M_Home->user($user),
				'judul'    => "DATA PROFIL",
				'sub'    => "Ubah Password",
				'edit'     => $this->M_People->changepswd($kd)
			);
			$this->template->load('users/template', $this->view . 'changepswd', $data);
		} else {
			$this->uchangepswd();
		}
	}

	public function uchangepswd()
	{
		$kd = $this->uri->segment(4);
		$data = array(
			'pswd_peop' => md5($this->input->post('password1'))
		);
		$this->M_People->uchangepswd($kd, $data);
		$this->session->set_flashdata('message_true', 'Password berhasil diubah');
		redirect('users/Home', 'refresh');
	}
}
