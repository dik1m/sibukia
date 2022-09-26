<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
	//private $view  	= "user/v_login/";
	private $redirect 	= "users/Register";

	public function __construct()
	{
		parent::__construct();
		$this->load->model('backend/M_People');
		$this->load->model('backend/M_People', 'Daerah');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('email_peop', 'Email', 'required|trim|valid_email|is_unique[people.email_peop]', [
			'is_unique' => 'Email telah digunakan!'
		]);
		$this->form_validation->set_rules('no_ktp', 'Nomor KTP', 'required|trim|min_length[10]|max_length[16]|numeric|is_unique[people.no_ktp]', [
			'is_unique' => 'Nomor KTP digunakan!'
		]);
		$this->form_validation->set_rules('nm_peop', 'Nama', 'required|trim');
		$this->form_validation->set_rules('id_prov', 'Pilih Provinsi', 'required|trim');
		$this->form_validation->set_rules('id_kab', 'Pilih Kabupaten/Kota', 'required|trim');
		$this->form_validation->set_rules('id_kec', 'Pilih Kecamatan', 'required|trim');
		$this->form_validation->set_rules('id_kel', 'Pilih Kelurahan/Desa', 'required|trim');
		$this->form_validation->set_rules('addres_peop', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['provinsi'] = $this->Daerah->getProv();
			$this->load->view('users/register', $data);
			//$this->template->load('user/register', $this->view . 'register', $data);
		} else {
			// validasinya success
			$this->save();
		}
	}

	public function save()
	{
		$email = $this->input->post('email_peop', true);
		$data = [
			'no_ktp' => htmlspecialchars($this->input->post('no_ktp', true)),
			'nm_peop' => htmlspecialchars($this->input->post('nm_peop', true)),
			'pswd_peop' => md5($this->input->post('password1', true)),
			'email_peop' => $email,
			'img_peop' => 'default.jpg',
			'active_peop' => 0,
			'create_peop' => time(),
			'date_peop' => date('Y-m-d'),
			'id_prov' => $this->input->post('id_prov', true),
			'id_kab' => $this->input->post('id_kab', true),
			'id_kec' => $this->input->post('id_kec', true),
			'id_kel' => $this->input->post('id_kel', true),
			'addres_peop' => $this->input->post('addres_peop', true),
		];

		// siapkan token
		$token = base64_encode(random_bytes(32));
		$user_token = [
			'email' => $email,
			'token' => $token,
			'create_token' => time()
		];

		$this->db->insert('people', $data);
		$this->db->insert('user_token', $user_token);

		$this->_sendEmail($token, 'verify');
		$this->session->set_flashdata('message_true', 'Akun Berhasi tersimpan! Silahkan aktivasi melalui email dengan waktu 24 Jam');
		redirect('users/Auth', 'refresh');
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
}
/* End of file Portal.php */
/* Location: ./application/controllers/Portal.php */
