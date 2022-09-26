<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layanan extends CI_Controller
{
	private $view  	= "backend/v_layanan/";
	private $redirect 	= "backend/Layanan";

	public function __construct()
	{
		parent::__construct();
		//Load model
		$this->load->model('backend/M_Layanan');
		$this->load->model('backend/M_Home');
		$this->load->library('form_validation');
		$this->load->library('upload');
		IsUser();
	}

	public function index()
	{
		$q = $this->M_Layanan->GetAll();
		$user = $this->session->userdata('kd_user');
		$data = array(
			'user' => $this->M_Home->user($user),
			'judul'	=> "DATA LAYANAN",
			'sub'	=> "Lihat Layanan",
			'read' => $q
		);
		$this->template->load('backend/template', $this->view . 'read', $data);
	}

	public function cetak()
	{
		$q = $this->M_Layanan->GetAll();
		$data = array(
			'judul'	=> "DATA LAYANAN",
			'sub'	=> "Lihat Layanan",
			'read' => $q
		);
		$this->load->view($this->view . 'cetak', $data);
	}

	public function create()
	{
		$this->form_validation->set_rules('nm_layanan', 'Nama Layanan', 'required|trim|is_unique[layanan.nm_layanan]', [
			'is_unique' => 'Nama Layanan telah digunakan!'
		]);
		$this->form_validation->set_rules('isi_layanan', 'Isi Layanan', 'required|trim');
		if ($this->form_validation->run() == false) {
			$user = $this->session->userdata('kd_user');
			$data = array(
				'user' => $this->M_Home->user($user),
				'judul'    => "DATA LAYANAN",
				'sub'    => "Tambah Layanan",
				'create'     => ''
			);
			$this->template->load('backend/template', $this->view . 'create', $data);
		} else {
			$this->save();
		}
	}

	function ImgThumbs($file_name)
	{
		$config = array(
			// Large Image
			array(
				'image_library' => 'GD2',
				'source_image'  => './assets/img_layanan/' . $file_name,
				'maintain_ratio' => FALSE,
				'width'         => 730,
				'height'        => 367,
				'new_image'     => './assets/img_layanan/large/' . $file_name
			),
			// Medium Image
			array(
				'image_library' => 'GD2',
				'source_image'  => './assets/img_layanan/' . $file_name,
				'maintain_ratio' => FALSE,
				'width'         => 540,
				'height'        => 272,
				'new_image'     => './assets/img_layanan/medium/' . $file_name
			),
			// Small Image
			array(
				'image_library' => 'GD2',
				'source_image'  => './assets/img_layanan/' . $file_name,
				'maintain_ratio' => FALSE,
				'width'         => 100,
				'height'        => 60,
				'new_image'     => './assets/img_layanan/small/' . $file_name,
			)
		);
		$this->load->library('image_lib', $config[0]);
		foreach ($config as $item) {
			$this->image_lib->initialize($item);
			if (!$this->image_lib->resize()) {
				return false;
			}
			$this->image_lib->clear();
		}
	}

	public function save()
	{
		$config['upload_path'] = './assets/img_layanan/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);

		if (!empty($_FILES['img_layanan']['name'])) {
			if ($this->upload->do_upload('img_layanan')) {
				$img = $this->upload->data();
				$this->ImgThumbs($img['file_name']);
				$title = $this->input->post('title', TRUE);
				$img_layanan = $img['file_name'];

				$data = array(
					'st_layanan' => 'Blokir',
					'nm_layanan' => $this->input->post('nm_layanan'),
					'isi_layanan' => $this->input->post('isi_layanan'),
					'tgl_layanan' => date('Y-m-d'),
					'jam_layanan' => date('H:i:s'),
					'img_layanan' => $img_layanan
				);
				$this->M_Layanan->save($data);
				$this->session->set_flashdata('message_true', 'Data berhasil tersimpan');
				redirect($this->redirect, 'refresh');
			}
		} else {
			$this->session->set_flashdata('message_false', 'Data tidak berhasil tersimpan');
			redirect($this->redirect, 'refresh');
		}
	}

	public function edit_()
	{
		$kd   = $this->uri->segment(4);
		$user = $this->session->userdata('kd_user');
		$data = array(
			'user' => $this->M_Home->user($user),
			'judul'	=> "DATA LAYANAN",
			'sub'	=> "Ubah Berita",
			'edit' 	=> $this->M_Layanan->edit($kd)
		);
		$this->template->load('backend/template', $this->view . 'edit', $data);
	}

	public function edit()
	{
		$kd   = $this->uri->segment(4);
		$this->form_validation->set_rules('nm_layanan', 'Nama Layanan', 'required|trim|is_unique[layanan.nm_layanan]', [
			'is_unique' => 'Nama Layanan telah digunakan!'
		]);
		$this->form_validation->set_rules('isi_layanan', 'Isi Layanan', 'required|trim');
		if ($this->form_validation->run() == false) {
			$user = $this->session->userdata('kd_user');
			$data = array(
				'user' => $this->M_Home->user($user),
				'judul'    => "DATA LAYANAN",
				'sub'    => "Tambah Layanan",
				'edit' 	=> $this->M_Layanan->edit($kd)
			);
			$this->template->load('backend/template', $this->view . 'edit', $data);
		} else {
			$this->update();
		}
	}

	public function update()
	{
		$kd = $this->uri->segment(4);
		$config['upload_path'] = './assets/img_layanan/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);

		if (!empty($_FILES['img_layanan']['name'])) {
			if ($this->upload->do_upload('img_layanan')) {
				$img = $this->upload->data();
				$this->ImgThumbs($img['file_name']);
				$title = $this->input->post('title', TRUE);
				$img_layanan = $img['file_name'];

				$data = array(
					'nm_layanan' => $this->input->post('nm_layanan'),
					'isi_layanan' => $this->input->post('isi_layanan'),
					'tgl_layanan' => $this->input->post('tgl_layanan'),
					'jam_layanan' => $this->input->post('jam_layanan'),
					'img_layanan' => $img_layanan,
				);
			}
		} else {
			$data = array(
				'nm_layanan' => $this->input->post('nm_layanan'),
				'isi_layanan' => $this->input->post('isi_layanan'),
				'tgl_layanan' => $this->input->post('tgl_layanan'),
				'jam_layanan' => $this->input->post('jam_layanan'),
			);
		}
		$this->M_Layanan->update($kd, $data);
		$this->session->set_flashdata('message_true', 'Data telah diperbaharui');
		redirect($this->redirect, 'refresh');
	}

	public function status()
	{
		$kd = $this->uri->segment(4);
		$data = array(
			'st_layanan' => $this->uri->segment(5)
		);
		$this->M_Layanan->status($kd, $data);
		$this->session->set_flashdata('message_true', 'Status telah diperbaharui');
		redirect($this->redirect, 'refresh');
	}

	public function delete()
	{
		$kd = $this->uri->segment(4);
		$data = array(
			'id_layanan' => $kd
		);
		$this->M_Layanan->delete($data);
		$this->session->set_flashdata('message_true', 'Data telah dihapus');
		redirect($this->redirect, 'refresh');
	}
}
