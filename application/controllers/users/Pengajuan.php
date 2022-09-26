<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
	private $view  	= "users/v_pengajuan/";
	private $redirect 	= "users/Pengajuan";


	public function __construct()
	{
		parent::__construct();
		$this->load->model('users/M_Pengajuan');
		$this->load->model('backend/M_Layanan');
		$this->load->model('backend/M_People');
		$this->load->model('users/M_Home');
		$this->load->library('form_validation');
		IsUsers();
	}

	public function index()
	{
		//$read = $this->M_Pengajuan->GetAll();
		$user = $this->session->userdata('no_ktp');
		$data = array(
			'user' => $this->M_Home->user($user),
			'judul'	=> "DATA PENGAJUAN",
			'sub'	=> "Halaman Pengajauan",
			'data' 	=> $this->M_Pengajuan->read($user)
		);
		$data['ai_pengajuan'] = $this->M_Pengajuan->buat_nopengajuan();
		$this->template->load('users/template', $this->view . 'read', $data);
	}


	public function create()
	{
		$this->load->helper('string');
		/*echo 'Random string alpha   = <b>'. random_string('alpha', 20).'</b><br>';
		echo 'Random string alnum = <b>'. random_string('alnum', 30).'</b><br>';
		echo 'Random string basic = <b>'. random_string('basic').'</b><br>';
		echo 'Random string numeric = <b>'. random_string('numeric', 40).'</b><br>';
		echo 'Random string nozero = <b>'. random_string('nozero', 45).'</b><br>';
		echo 'Random string md5 = <b>'. random_string('md5').'</b><br>';
		echo 'Random string sha1 = <b>'. random_string('sha1').'</b><br>';*/
		/*
		alpha: string yang hanya menghasilkan huruf kecil dan huruf besar dengan karakter yang bisa kita tentukan value nya
		alnum: Alpha-numeric yaitu string yang hanya menghasilkan huruf kecil dan huruf besar dengan karakter yang bisa kita tentukan value nya
		basic: string yang hanya menghasilkan nomor acak berdasarkan fungsi dari rand() milik PHP dengan karakter yang bisa kita tentukan value nya
		numeric: hanya menghasilkan nomor acak dengan karakter hanya 10.
		nozero: hanya menghasilkan nomor acak tanpa nomor 0 (nol) dengan karakter yang bisa kita tentukan value nya
		md5: meng encrypt numor dan huruf besar dan kecil berdasarkan fungsi md5 dan mempunyai 32 karakter
		sha1: meng encrypt numor dan huruf besar dan kecil berdasarkan fungsi sha1 dan mempunyai 40 karakte */
		$this->form_validation->set_rules('id_layanan', 'Pilih Layanan', 'required|trim');
		$this->form_validation->set_rules('ket_ajuan', 'Keterangan', 'required|trim');
		$this->load->model('M_layanan');
		if ($this->form_validation->run() == false) {
			$user = $this->session->userdata('no_ktp');
			$data = array(
				'user' => $this->M_Home->user($user),
				'judul'	=> "DATA PENGAJUAN",
				'sub'	=> "Tambah Pengajauan",
				//'data' 	=> $this->M_People->akun($kd),
				'row' 	=> $this->M_Layanan->GetAll(),
			);
			$data['ai_pengajuan'] = $this->M_Pengajuan->buat_nopengajuan();
			$this->template->load('users/template', $this->view . 'create', $data);
		} else {
			$this->save();
		}
	}

	public function save()
	{
		$data = [
			'no_ajuan' => $this->input->post('no_ajuan'),
			'no_ktp' => $this->input->post('no_ktp'),
			'id_layanan' => $this->input->post('id_layanan', true),
			'ket_ajuan' => $this->input->post('ket_ajuan', true),
			'key_ajuan' => $this->input->post('key_ajuan'),
			'st_ajuan' => 'Pengajuan Baru',
			'tgl_ajuan' => date('Y-m-d'),
		];
		$this->M_Pengajuan->save($data);
		$this->session->set_flashdata('message_true', 'Data berhasil tersimpan');
		redirect($this->redirect, 'refresh');
	}

	public function show()
	{
		$kd   = $this->uri->segment(4);
		$user = $this->session->userdata('no_ktp');
		$data = array(
			'user' => $this->M_Home->user($user),
			'judul'	=> "DATA PENGAJUAN",
			'sub'	=> "Detail Pengajuan",
			'prov' 	=> $this->M_People->prov(),
			'kab' 	=> $this->M_People->kab(),
			'kec' 	=> $this->M_People->kec(),
			'kel' 	=> $this->M_People->kel(),
			'show' 	=> $this->M_Pengajuan->show($kd)
		);
		$this->template->load('users/template', $this->view . 'show', $data);
	}


	public function save_()
	{
		$name_imgscan1 = $_FILES['img_scan1']['name'];
		$type_imgscan1 = $_FILES['img_scan1']['type'];
		$tmp_imgscan1  = $_FILES['img_scan1']['tmp_name'];
		//img_scan2
		$name_imgscan2 = $_FILES['img_scan2']['name'];
		$type_imgscan2 = $_FILES['img_scan2']['type'];
		$tmp_imgscan2  = $_FILES['img_scan2']['tmp_name'];
		//img_scan3
		$name_imgscan3 = $_FILES['img_scan3']['name'];
		$type_imgscan3 = $_FILES['img_scan3']['type'];
		$tmp_imgscan3  = $_FILES['img_scan3']['tmp_name'];

		//upload3img
		if (!empty($tmp_imgscan1) and !empty($tmp_imgscan2) and !empty($tmp_imgscan3)) {
			if (
				$type_imgscan1 != "image/jpeg" and $type_imgscan1 != "image/jpg" and $type_imgscan1 != "image/png" and
				$type_imgscan2 != "image/jpeg" and $type_imgscan2 != "image/jpg" and $type_imgscan2 != "image/png" and
				$type_imgscan3 != "image/jpeg" and $type_imgscan3 != "image/jpg" and $type_imgscan3 != "image/png"
			) {
				$this->session->set_flashdata('msgerror', 'Format yang digunakan jpeg|jpg|png');
				redirect('Pengajuan/read/' . $this->session->userdata('id_penduduk'), 'refresh');
			} else {
				$img_scan1 = UploadImg($_FILES['img_scan1'], './assets/img_scan/', 'scan1', 730);
				$img_scan2 = UploadImg($_FILES['img_scan2'], './assets/img_scan/', 'scan2', 730);
				$img_scan3 = UploadImg($_FILES['img_scan3'], './assets/img_scan/', 'scan3', 730);
				$data = array(
					'nopengajuan' => $this->input->post('ai_pengajuan'),
					'id_penduduk' => $this->input->post('id_penduduk'),
					'id_layanan' => $this->input->post('id_layanan'),
					'st_pengajuan' => 'Belum dicek',
					'isi_pengajuan' => $this->input->post('isi_pengajuan'),
					'tgl_stpengajuan' => date('Y-m-d H:i:s'),
					'tgl_pengajuan' => date('Y-m-d'),
					'security_key' => $this->input->post('security_key'),
					'alamat_pengaju' => $this->input->post('alamat_pengaju'),
					'img_scan1' => 	$img_scan1,
					'img_scan2' => 	$img_scan2,
					'img_scan3' => 	$img_scan3
				);
				$this->M_Pengajuan->save($data);
				//$this->session->set_flashdata('message','Data berhasil tersimpan');
				echo "<script>alert('Data berhasil tersimpan');</script>";
				redirect('Pengajuan/read/' . $this->session->userdata('id_penduduk'), 'refresh');
			}
		}
		//upload2img
		if (!empty($tmp_imgscan1) and !empty($tmp_imgscan2)) {
			if (
				$type_imgscan1 != "image/jpeg" and $type_imgscan1 != "image/jpg" and $type_imgscan1 != "image/png" and
				$type_imgscan2 != "image/jpeg" and $type_imgscan2 != "image/jpg" and $type_imgscan2 != "image/png"
			) {
				$this->session->set_flashdata('msgerror', 'Format yang digunakan jpeg|jpg|png');
				redirect('Pengajuan/read/' . $this->session->userdata('id_penduduk'), 'refresh');
			} else {
				$img_scan1 = UploadImg($_FILES['img_scan1'], './assets/img_scan/', 'scan1', 730);
				$img_scan2 = UploadImg($_FILES['img_scan2'], './assets/img_scan/', 'scan2', 730);
				$data = array(
					'nopengajuan' => $this->input->post('ai_pengajuan'),
					'id_penduduk' => $this->input->post('id_penduduk'),
					'id_layanan' => $this->input->post('id_layanan'),
					'st_pengajuan' => 'Belum dicek',
					'isi_pengajuan' => $this->input->post('isi_pengajuan'),
					'tgl_stpengajuan' => date('Y-m-d H:i:s'),
					'tgl_pengajuan' => date('Y-m-d'),
					'security_key' => $this->input->post('security_key'),
					'alamat_pengaju' => $this->input->post('alamat_pengaju'),
					'img_scan1' => 	$img_scan1,
					'img_scan2' => 	$img_scan2
				);
				$this->M_Pengajuan->save($data);
				//$this->session->set_flashdata('message','Data berhasil tersimpan');
				echo "<script>alert('Data berhasil tersimpan');</script>";
				redirect('Pengajuan/read/' . $this->session->userdata('id_penduduk'), 'refresh');
			}
		}
		//upload2img
		if (!empty($tmp_imgscan1) and !empty($tmp_imgscan3)) {
			if (
				$type_imgscan1 != "image/jpeg" and $type_imgscan1 != "image/jpg" and $type_imgscan1 != "image/png" and
				$type_imgscan3 != "image/jpeg" and $type_imgscan3 != "image/jpg" and $type_imgscan3 != "image/png"
			) {
				$this->session->set_flashdata('msgerror', 'Format yang digunakan jpeg|jpg|png');
				redirect('Pengajuan/read/' . $this->session->userdata('id_penduduk'), 'refresh');
			} else {
				$img_scan1 = UploadImg($_FILES['img_scan1'], './assets/img_scan/', 'scan1', 730);
				$img_scan3 = UploadImg($_FILES['img_scan3'], './assets/img_scan/', 'scan3', 730);
				$data = array(
					'nopengajuan' => $this->input->post('ai_pengajuan'),
					'id_penduduk' => $this->input->post('id_penduduk'),
					'id_layanan' => $this->input->post('id_layanan'),
					'st_pengajuan' => 'Belum dicek',
					'isi_pengajuan' => $this->input->post('isi_pengajuan'),
					'tgl_stpengajuan' => date('Y-m-d H:i:s'),
					'tgl_pengajuan' => date('Y-m-d'),
					'security_key' => $this->input->post('security_key'),
					'alamat_pengaju' => $this->input->post('alamat_pengaju'),
					'img_scan1' => 	$img_scan1,
					'img_scan3' => 	$img_scan3
				);
				$this->M_Pengajuan->save($data);
				//$this->session->set_flashdata('message','Data berhasil tersimpan');
				echo "<script>alert('Data berhasil tersimpan');</script>";
				redirect('Pengajuan/read/' . $this->session->userdata('id_user'), 'refresh');
			}
		}
		//upload3img
		if (!empty($tmp_imgscan1)) {
			if ($type_imgscan1 != "image/jpeg" and $type_imgscan1 != "image/jpg" and $type_imgscan1 != "image/png") {
				$this->session->set_flashdata('msgerror', 'Format gambar digunakan jpeg|jpg|png');
				redirect('Pengajuan/read/' . $this->session->userdata('id_penduduk'), 'refresh');
			} else {
				$img_scan1 = UploadImg($_FILES['img_scan1'], './assets/img_scan/', 'scan1', 730);
				$data = array(
					'nopengajuan' => $this->input->post('ai_pengajuan'),
					'id_penduduk' => $this->input->post('id_penduduk'),
					'id_layanan' => $this->input->post('id_layanan'),
					'st_pengajuan' => 'Belum dicek',
					'tgl_stpengajuan' => date('Y-m-d H:i:s'),
					'isi_pengajuan' => $this->input->post('isi_pengajuan'),
					'tgl_pengajuan' => date('Y-m-d'),
					'security_key' => $this->input->post('security_key'),
					'alamat_pengaju' => $this->input->post('alamat_pengaju'),
					'img_scan1' => 	$img_scan1
				);
				$this->M_Pengajuan->save($data);
				//$this->session->set_flashdata('message','Data berhasil tersimpan');
				echo "<script>alert('Data berhasil tersimpan');</script>";
				redirect('Pengajuan/read/' . $this->session->userdata('id_penduduk'), 'refresh');
			}
		}
	}

	public function update()
	{
		$kd = $this->uri->segment(3);
		$name_imgscan1 = $_FILES['img_scan1']['name'];
		$type_imgscan1 = $_FILES['img_scan1']['type'];
		$tmp_imgscan1  = $_FILES['img_scan1']['tmp_name'];
		//img_scan2
		$name_imgscan2 = $_FILES['img_scan2']['name'];
		$type_imgscan2 = $_FILES['img_scan2']['type'];
		$tmp_imgscan2  = $_FILES['img_scan2']['tmp_name'];
		//img_scan3
		$name_imgscan3 = $_FILES['img_scan3']['name'];
		$type_imgscan3 = $_FILES['img_scan3']['type'];
		$tmp_imgscan3  = $_FILES['img_scan3']['tmp_name'];

		//upload3img
		if (!empty($tmp_imgscan1) and !empty($tmp_imgscan2) and !empty($tmp_imgscan3)) {
			if (
				$type_imgscan1 != "image/jpeg" and $type_imgscan1 != "image/jpg" and $type_imgscan1 != "image/png" and
				$type_imgscan2 != "image/jpeg" and $type_imgscan2 != "image/jpg" and $type_imgscan2 != "image/png" and
				$type_imgscan3 != "image/jpeg" and $type_imgscan3 != "image/jpg" and $type_imgscan3 != "image/png"
			) {
				$this->session->set_flashdata('msgerror', 'Format yang digunakan jpeg|jpg|png');
				redirect('Pengajuan/read/' . $this->session->userdata('id_penduduk'), 'refresh');
			} else {
				$img_scan1 = UploadImg($_FILES['img_scan1'], './assets/img_scan/', 'scan1', 730);
				$img_scan2 = UploadImg($_FILES['img_scan2'], './assets/img_scan/', 'scan2', 730);
				$img_scan3 = UploadImg($_FILES['img_scan3'], './assets/img_scan/', 'scan3', 730);
				$data = array(
					'id_layanan' => $this->input->post('id_layanan'),
					'isi_pengajuan' => $this->input->post('isi_pengajuan'),
					'st_pengajuan' => 'Revisi',
					'tgl_stpengajuan' => date('Y-m-d H:i:s'),
					'img_scan1' => 	$img_scan1,
					'img_scan2' => 	$img_scan2,
					'img_scan3' => 	$img_scan3
				);
				$this->M_Pengajuan->updatepengajuan($kd, $data);
				//$this->session->set_flashdata('message','Data telah diperbaharui');
				echo "<script>alert('Data berhasil diperbaharui');</script>";
				redirect('Pengajuan/read/' . $this->session->userdata('id_penduduk'), 'refresh');
			}
		}
		//upload2img
		if (!empty($tmp_imgscan1) and !empty($tmp_imgscan2)) {
			if (
				$type_imgscan1 != "image/jpeg" and $type_imgscan1 != "image/jpg" and $type_imgscan1 != "image/png" and
				$type_imgscan2 != "image/jpeg" and $type_imgscan2 != "image/jpg" and $type_imgscan2 != "image/png"
			) {
				$this->session->set_flashdata('msgerror', 'Format yang digunakan jpeg|jpg|png');
				redirect('Pengajuan/read/' . $this->session->userdata('id_penduduk'), 'refresh');
			} else {
				$img_scan1 = UploadImg($_FILES['img_scan1'], './assets/img_scan/', 'scan1', 730);
				$img_scan2 = UploadImg($_FILES['img_scan2'], './assets/img_scan/', 'scan2', 730);
				$data = array(
					'id_layanan' => $this->input->post('id_layanan'),
					'isi_pengajuan' => $this->input->post('isi_pengajuan'),
					'st_pengajuan' => 'Revisi',
					'tgl_stpengajuan' => date('Y-m-d H:i:s'),
					'img_scan1' => 	$img_scan1,
					'img_scan2' => 	$img_scan2
				);
				$this->M_Pengajuan->updatepengajuan($kd, $data);
				//$this->session->set_flashdata('message','Data telah diperbaharui');
				echo "<script>alert('Data berhasil diperbaharui');</script>";
				redirect('Pengajuan/read/' . $this->session->userdata('id_penduduk'), 'refresh');
			}
		}
		//upload2img
		if (!empty($tmp_imgscan1) and !empty($tmp_imgscan3)) {
			if (
				$type_imgscan1 != "image/jpeg" and $type_imgscan1 != "image/jpg" and $type_imgscan1 != "image/png" and
				$type_imgscan3 != "image/jpeg" and $type_imgscan3 != "image/jpg" and $type_imgscan3 != "image/png"
			) {
				$this->session->set_flashdata('msgerror', 'Format yang digunakan jpeg|jpg|png');
				redirect('Pengajuan/read/' . $this->session->userdata('id_penduduk'), 'refresh');
			} else {
				$img_scan1 = UploadImg($_FILES['img_scan1'], './assets/img_scan/', 'scan1', 730);
				$img_scan3 = UploadImg($_FILES['img_scan3'], './assets/img_scan/', 'scan3', 730);
				$data = array(
					'id_layanan' => $this->input->post('id_layanan'),
					'isi_pengajuan' => $this->input->post('isi_pengajuan'),
					'st_pengajuan' => 'Revisi',
					'tgl_stpengajuan' => date('Y-m-d H:i:s'),
					'img_scan1' => 	$img_scan1,
					'img_scan3' => 	$img_scan3
				);
				$this->M_Pengajuan->updatepengajuan($kd, $data);
				$this->session->set_flashdata('message', 'Data telah diperbaharui');
				redirect('Pengajuan/read/' . $this->session->userdata('id_penduduk'), 'refresh');
			}
		}
		//upload3img
		if (!empty($tmp_imgscan1)) {
			if ($type_imgscan1 != "image/jpeg" and $type_imgscan1 != "image/jpg" and $type_imgscan1 != "image/png") {
				$this->session->set_flashdata('msgerror', 'Format gambar digunakan jpeg|jpg|png');
				redirect('Pengajuan/read/' . $this->session->userdata('id_penduduk'), 'refresh');
			} else {
				$img_scan1 = UploadImg($_FILES['img_scan1'], './assets/img_scan/', 'scan1', 730);
				$data = array(
					'id_layanan' => $this->input->post('id_layanan'),
					'isi_pengajuan' => $this->input->post('isi_pengajuan'),
					'st_pengajuan' => 'Revisi',
					'tgl_stpengajuan' => date('Y-m-d H:i:s'),
					'img_scan1' => 	$img_scan1
				);
				$this->M_Pengajuan->updatepengajuan($kd, $data);
				//$this->session->set_flashdata('message','Data telah diperbaharui');
				echo "<script>alert('Data berhasil diperbaharui');</script>";
				redirect('Pengajuan/read/' . $this->session->userdata('id_penduduk'), 'refresh');
			}
		}
		$data = array(
			'id_layanan' => $this->input->post('id_layanan'),
			'isi_pengajuan' => $this->input->post('isi_pengajuan'),
			'st_pengajuan' => 'Revisi',
			'tgl_stpengajuan' => date('Y-m-d H:i:s')
		);
		$this->M_Pengajuan->update($kd, $data);
		//$this->session->set_flashdata('message','Data telah diperbaharui');
		echo "<script>alert('Data berhasil diperbaharui');</script>";
		redirect('Pengajuan/read/' . $this->session->userdata('id_penduduk'), 'refresh');
	}
	/*
	public function read(){
		$kategori = $this->M_home->kategori();
		$newsterkini = $this->M_home->newsterkini();
		$newshome=$this->M_home->newshome();
		$data = array(
			'kategori' 		=> $kategori,
			'newsterkini' 		=> $newsterkini,
			'judul'	=> "PENGAJUAN",
			'sub'	=> "Halaman Pengajauan",
		'data' 	=> $this->M_Pengajuan->read($this->session->userdata('id_user'))
		);
		$data['ai_pengajuan'] = $this->M_Pengajuan->buat_nopengajuan();
		$this->template->load('frontend/template',$this->view.'read', $data);
	}
	*/

	public function edit()
	{
		$kd   = $this->uri->segment(3);
		$this->load->model('M_layanan');
		$user = $this->session->userdata('no_ktp');
		$data = array(
			'user' => $this->M_Home->user($user),
			'judul'	=> "PENGAJUAN",
			'sub'	=> "Halaman Pengajauan",
			'row' 	=> $this->M_layanan->GetAll(),
			'data' 	=> $this->M_Pengajuan->edit($kd)
		);
		$this->template->load('frontend/template', $this->view . 'edit', $data);
	}

	public function detail()
	{
		$kd   = $this->uri->segment(3);
		$this->load->model('M_layanan');
		$user = $this->session->userdata('no_ktp');
		$data = array(
			'user' => $this->M_Home->user($user),
			'judul'	=> "PENGAJUAN",
			'sub'	=> "Halaman Pengajauan",
			'row' 	=> $this->M_layanan->GetAll(),
			'data' 	=> $this->M_Pengajuan->edit($kd)
		);
		$this->template->load('frontend/template', $this->view . 'detail', $data);
	}

	public function cetak()
	{
		$kd   = $this->uri->segment(3);
		$this->load->model('M_layanan');
		$kategori = $this->M_home->kategori();
		$newsterkini = $this->M_home->newsterkini();
		$data = array(
			'layanan' => $this->M_home->layanan(),
			'kategori' 		=> $kategori,
			'newsterkini' 		=> $newsterkini,
			'judul'	=> "PENGAJUAN",
			'sub'	=> "Halaman Pengajauan",
			'row' 	=> $this->M_layanan->GetAll(),
			'data' 	=> $this->M_Pengajuan->cetak($kd)
		);

		$this->load->view($this->view . 'cetak', $data);
	}
}



/* End of file Portal.php */
/* Location: ./application/controllers/Portal.php */
