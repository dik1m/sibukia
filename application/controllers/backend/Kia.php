<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kia extends CI_Controller
{

	private $view    = "backend/v_kia/";
	private $redirect = "backend/Kia";


	public function __construct()
	{
		parent::__construct();
		//Load model
		$this->load->model('backend/M_Kia');
		$this->load->model('backend/M_Kia', 'Daerah');
		$this->load->model('backend/M_TenagaKes');
		$this->load->model('backend/M_Home');
		$this->load->model('backend/M_Buku');
		$this->load->library('form_validation');
		IsUser();
	}

	public function index()
	{

		$read = $this->M_Kia->GetAll();
		$user = $this->session->userdata('kd_user');
		$data = array(
			'user' => $this->M_Home->user($user),
			'judul'	=> "DATA IBU & ANAK",
			'sub'	=> "Lihat Ibu & Anak",
			'read' => $read
		);
		$this->template->load('backend/template', $this->view . 'read', $data);
	}


	public function edit()
	{
		$kd   = $this->uri->segment(4);
		$this->form_validation->set_rules('tgl_nerimakia', 'Tanggal Menerima Buku', 'required|trim');
		$this->form_validation->set_rules('nik_kes', 'Tenaga Kesehatan', 'required|trim');
		$this->form_validation->set_rules('st_kia', 'Status Buku Kia', 'required|trim');
		$this->form_validation->set_rules('nmibu_kia', 'Nama Ibu', 'required|trim');
		$this->form_validation->set_rules('born_tmpibu', 'Tempat Lahir', 'required|trim');
		$this->form_validation->set_rules('born_tglibu', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('hamilke', 'Kehamilan ke', 'required|trim|max_length[2]|numeric');
		$this->form_validation->set_rules('age_anakterakhir', 'Anak terakhir umur', 'required|trim|max_length[2]|numeric');
		$this->form_validation->set_rules('bloodibu_kia', 'Golongan Darah', 'required|trim|max_length[2]');
		$this->form_validation->set_rules('nmbpk_kia', 'Nama Suami', 'required|trim');
		// kehamilan
		$this->form_validation->set_rules('tgl_hpht', 'Hari Pertama Haid Terakhir', 'required|trim');
		$this->form_validation->set_rules('tgl_htp', 'Hari Taksir Persalinan', 'required|trim');
		$this->form_validation->set_rules('ling_lengan', 'Lingkar Lengan Atas', 'required|trim|max_length[3]|numeric');
		$this->form_validation->set_rules('kek', 'KEK', 'required|trim');
		$this->form_validation->set_rules('ting_badan', 'Tinggi Badan', 'required|trim|max_length[3]|numeric');
		$this->form_validation->set_rules('kontrasepsi', 'Penggunan Kontrasepsi', 'required|trim');
		$this->form_validation->set_rules('riw_penyakit', 'Riwayat Penyakit', 'required|trim');
		$this->form_validation->set_rules('riw_alergi', 'Riwayat Alergi', 'required|trim');
		$this->form_validation->set_rules('jumpersalinan', 'Jumlah Persalinan', 'required|trim|max_length[2]');
		$this->form_validation->set_rules('jumgugur', 'Gugur', 'required|trim|max_length[2]');
		$this->form_validation->set_rules('jum_g', 'Jumlah G', 'required|trim|max_length[2]');
		$this->form_validation->set_rules('jum_p', 'Jumlah P', 'required|trim|max_length[2]');
		$this->form_validation->set_rules('jum_a', 'Jumlah A', 'required|trim|max_length[2]');
		$this->form_validation->set_rules('jmlanakhidup', 'Jumlah Anak Hidup', 'required|trim|max_length[2]');
		$this->form_validation->set_rules('jmllahirmati', 'Jumlah Lahir Mati', 'required|trim|max_length[2]');
		$this->form_validation->set_rules('jarakkehamilan', 'Jarak Kehamilan', 'required|trim|max_length[2]');
		$this->form_validation->set_rules('imu_tt', 'Imunisasi TT', 'required|trim');
		$this->form_validation->set_rules('penolongan', 'Penolongan persalinan', 'required|trim');
		$this->form_validation->set_rules('cr_persalinan', 'Cara Persalinan ', 'required|trim');
		// data lain
		$this->form_validation->set_rules('email_kia', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('hp_kia', 'Nomor HP', 'required|trim|min_length[10]|max_length[13]|numeric');
		$this->form_validation->set_rules('wa_kdkia', 'kode', 'required|trim|min_length[3]|max_length[6]|numeric');
		$this->form_validation->set_rules('wa_nokia', 'Nomor Whatsapp', 'required|trim|min_length[9]|max_length[13]|numeric');
		$this->form_validation->set_rules('addres_kia', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('id_prov', 'Pilih Provinsi', 'required|trim');
		$this->form_validation->set_rules('id_kab', 'Pilih Kabupaten/Kota', 'required|trim');
		$this->form_validation->set_rules('id_kec', 'Pilih Kecamatan', 'required|trim');
		$this->form_validation->set_rules('id_kel', 'Pilih Kelurahan/Desa', 'required|trim');

		if ($this->form_validation->run() == false) {
			$user = $this->session->userdata('kd_user');
			$data = array(
				'user' => $this->M_Home->user($user),
				'judul'    => "DATA IBU & ANAK",
				'sub'    => "Ubah Ibu & Anak",
				'prov' 	=> $this->M_Kia->prov(),
				'kab' 	=> $this->M_Kia->kab(),
				'kec' 	=> $this->M_Kia->kec(),
				'kel' 	=> $this->M_Kia->kel(),
				'buku' 	=> $this->M_Buku->CekBuku(),
				'tenagakes' 	=> $this->M_TenagaKes->bertugas(),
				'edit'     => $this->M_Kia->edit($kd)
			);
			$this->template->load('backend/template', $this->view . 'edit', $data);
		} else {
			$this->update();
		}
	}

	public function update()
	{
		$kd = $this->uri->segment(4);
		//img_kia
		$name_imgkia = $_FILES['img_kia']['name'];
		$type_imgkia = $_FILES['img_kia']['type'];
		$tmp_imgkia  = $_FILES['img_kia']['tmp_name'];
		//upload img
		if (!empty($tmp_imgkia)) {
			if ($type_imgkia != "image/jpeg" and $type_imgkia != "image/jpg" and $type_imgkia != "image/png") {
				$this->session->set_flashdata('message_false', 'Format gambar yang digunakan jpeg|jpg|png');
				redirect($this->redirect, 'refresh');
			} else {
				$img_kia = UploadImg($_FILES['img_kia'], './assets/img_kia/', 'kia', 300);
				$data = array(
					// buku kia
					'noreg_kia' => $this->input->post('noreg_kia'),
					'no_kohort' => $this->input->post('no_kohort'),
					'tgl_nerimakia' => $this->input->post('tgl_nerimakia', true),
					'nik_kes' => $this->input->post('nik_kes', true),
					'st_kia' => $this->input->post('st_kia', true),
					// data ibu
					'nmibu_kia' => $this->input->post('nmibu_kia', true),
					'born_tmpibu' => $this->input->post('born_tmpibu', true),
					'born_tglibu' => $this->input->post('born_tglibu', true),
					'hamilke' => $this->input->post('hamilke', true),
					'age_anakterakhir' => $this->input->post('age_anakterakhir', true),
					'religibu_kia' => $this->input->post('religibu_kia'),
					'studiibu_kia' => $this->input->post('studiibu_kia'),
					'bloodibu_kia' => $this->input->post('bloodibu_kia', true),
					'jobibu_kia' => $this->input->post('jobibu_kia'),
					'no_jkn' => $this->input->post('no_jkn'),
					// data suami
					'nmbpk_kia' => $this->input->post('nmbpk_kia', true),
					'born_tmpbpk' => $this->input->post('born_tmpbpk'),
					'born_tglbpk' => $this->input->post('born_tglbpk'),
					'religbpk_kia' => $this->input->post('religbpk_kia'),
					'studibpk_kia' => $this->input->post('studibpk_kia'),
					'bloodbpk_kia' => $this->input->post('bloodbpk_kia'),
					'jobbpk_kia' => $this->input->post('jobbpk_kia'),
					// kehamilan
					'tgl_hpht' => $this->input->post('tgl_hpht', true),
					'tgl_htp' => $this->input->post('tgl_htp', true),
					'ling_lengan' => $this->input->post('ling_lengan', true),
					'kek' => $this->input->post('kek', true),
					'ting_badan' => $this->input->post('ting_badan', true),
					'kontrasepsi' => $this->input->post('kontrasepsi', true),
					'riw_penyakit' => $this->input->post('riw_penyakit', true),
					'riw_alergi' => $this->input->post('riw_alergi', true),
					'jumpersalinan' => $this->input->post('jumpersalinan', true),
					'jumgugur' => $this->input->post('jumgugur', true),
					'jum_g' => $this->input->post('jum_g', true),
					'jum_p' => $this->input->post('jum_p', true),
					'jum_a' => $this->input->post('jum_a', true),
					'jmlanakhidup' => $this->input->post('jmlanakhidup', true),
					'jmllahirmati' => $this->input->post('jmllahirmati', true),
					'jarakkehamilan' => $this->input->post('jarakkehamilan', true),
					'imu_tt' => $this->input->post('imu_tt', true),
					'penolongan' => $this->input->post('penolongan', true),
					'cr_persalinan' => $this->input->post('cr_persalinan', true),
					'tindakan' => $this->input->post('tindakan'),
					// data anak
					'nmanak_kia' => $this->input->post('nmanak_kia'),
					'gender_anak' => $this->input->post('gender_anak'),
					'born_tmpanak' => $this->input->post('born_tmpanak'),
					'born_tglanak' => $this->input->post('born_tglanak'),
					'anakke' => $this->input->post('anakke'),
					'dranakke' => $this->input->post('dranakke'),
					'noakta_kia' => $this->input->post('noakta_kia'),
					// identitas lain
					'hp_kia' => $this->input->post('hp_kia'),
					'wa_kdkia' => $this->input->post('wa_kdkia'),
					'wa_nokia' => $this->input->post('wa_nokia'),
					'addres_kia' => $this->input->post('addres_kia'),
					'id_prov' => $this->input->post('id_prov'),
					'id_kab' => $this->input->post('id_kab'),
					'id_kec' => $this->input->post('id_kec'),
					'id_kel' => $this->input->post('id_kel'),
					'kdpos_kia' => $this->input->post('kdpos_kia'),
					'email_kia' => $this->input->post('email_kia'),
					'ket_selesaikia' => $this->input->post('ket_selesaikia'),
					'img_kia'            => $img_kia
				);
			}
		} else {
			$data = array(
				// buku kia
				'noreg_kia' => $this->input->post('noreg_kia'),
				'no_kohort' => $this->input->post('no_kohort'),
				'tgl_nerimakia' => $this->input->post('tgl_nerimakia', true),
				'nik_kes' => $this->input->post('nik_kes', true),
				'st_kia' => $this->input->post('st_kia', true),
				// data ibu
				'nmibu_kia' => $this->input->post('nmibu_kia', true),
				'born_tmpibu' => $this->input->post('born_tmpibu', true),
				'born_tglibu' => $this->input->post('born_tglibu', true),
				'hamilke' => $this->input->post('hamilke', true),
				'age_anakterakhir' => $this->input->post('age_anakterakhir', true),
				'religibu_kia' => $this->input->post('religibu_kia'),
				'studiibu_kia' => $this->input->post('studiibu_kia'),
				'bloodibu_kia' => $this->input->post('bloodibu_kia', true),
				'jobibu_kia' => $this->input->post('jobibu_kia'),
				'no_jkn' => $this->input->post('no_jkn'),
				// data suami
				'nmbpk_kia' => $this->input->post('nmbpk_kia', true),
				'born_tmpbpk' => $this->input->post('born_tmpbpk'),
				'born_tglbpk' => $this->input->post('born_tglbpk'),
				'religbpk_kia' => $this->input->post('religbpk_kia'),
				'studibpk_kia' => $this->input->post('studibpk_kia'),
				'bloodbpk_kia' => $this->input->post('bloodbpk_kia'),
				'jobbpk_kia' => $this->input->post('jobbpk_kia'),
				// kehamilan
				'tgl_hpht' => $this->input->post('tgl_hpht', true),
				'tgl_htp' => $this->input->post('tgl_htp', true),
				'ling_lengan' => $this->input->post('ling_lengan', true),
				'kek' => $this->input->post('kek', true),
				'ting_badan' => $this->input->post('ting_badan', true),
				'kontrasepsi' => $this->input->post('kontrasepsi', true),
				'riw_penyakit' => $this->input->post('riw_penyakit', true),
				'riw_alergi' => $this->input->post('riw_alergi', true),
				'jumpersalinan' => $this->input->post('jumpersalinan', true),
				'jumgugur' => $this->input->post('jumgugur', true),
				'jum_g' => $this->input->post('jum_g', true),
				'jum_p' => $this->input->post('jum_p', true),
				'jum_a' => $this->input->post('jum_a', true),
				'jmlanakhidup' => $this->input->post('jmlanakhidup', true),
				'jmllahirmati' => $this->input->post('jmllahirmati', true),
				'jarakkehamilan' => $this->input->post('jarakkehamilan', true),
				'imu_tt' => $this->input->post('imu_tt', true),
				'penolongan' => $this->input->post('penolongan', true),
				'cr_persalinan' => $this->input->post('cr_persalinan', true),
				'tindakan' => $this->input->post('tindakan'),
				// data anak
				'nmanak_kia' => $this->input->post('nmanak_kia'),
				'gender_anak' => $this->input->post('gender_anak'),
				'born_tmpanak' => $this->input->post('born_tmpanak'),
				'born_tglanak' => $this->input->post('born_tglanak'),
				'anakke' => $this->input->post('anakke'),
				'dranakke' => $this->input->post('dranakke'),
				'noakta_kia' => $this->input->post('noakta_kia'),
				// identitas lain
				'hp_kia' => $this->input->post('hp_kia'),
				'wa_kdkia' => $this->input->post('wa_kdkia'),
				'wa_nokia' => $this->input->post('wa_nokia'),
				'addres_kia' => $this->input->post('addres_kia'),
				'id_prov' => $this->input->post('id_prov'),
				'id_kab' => $this->input->post('id_kab'),
				'id_kec' => $this->input->post('id_kec'),
				'id_kel' => $this->input->post('id_kel'),
				'kdpos_kia' => $this->input->post('kdpos_kia'),
				'ket_selesaikia' => $this->input->post('ket_selesaikia'),
			);
		}
		$this->M_Kia->update($kd, $data);
		$this->session->set_flashdata('message_true', 'Profil telah berhasil diperbaharui, untuk max logout terlebih dulu');
		redirect($this->redirect, 'refresh');
	}


	public function show()
	{
		$kd   = $this->uri->segment(4);
		$user = $this->session->userdata('kd_user');
		$data = array(
			'user' => $this->M_Home->user($user),
			'judul'    => "DATA IBU & ANAK",
			'sub'    => "Detail Ibu & Anak",
			'prov' 	=> $this->M_Kia->prov(),
			'kab' 	=> $this->M_Kia->kab(),
			'kec' 	=> $this->M_Kia->kec(),
			'kel' 	=> $this->M_Kia->kel(),
			'show'     => $this->M_Kia->show($kd)
		);
		$this->template->load('backend/template', $this->view . 'show', $data);
	}

	public function delete()
	{
		$id_peop = $this->uri->segment(4);
		$data = array('id_peop' => $id_peop);
		$this->M_Kia->delete($data);
		$this->session->set_flashdata('message', 'Anda berhasil menghapus data');
		redirect($this->redirect, 'refresh');
	}
}
