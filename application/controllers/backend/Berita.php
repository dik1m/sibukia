<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Berita extends CI_Controller
{
	private $view  	= "backend/v_berita/";
	private $redirect 	= "backend/Berita";

	public function __construct()
	{
		parent::__construct();
		//Load model
		$this->load->model('backend/M_Berita');
		$this->load->model('backend/M_kategori');
		$this->load->model('backend/M_Home');
		$this->load->library('form_validation');
		$this->load->library('upload');
		IsUser();
	}

	public function index()
	{
		$q = $this->M_Berita->GetAll();
		$user = $this->session->userdata('kd_user');
		$data = array(
			'user' => $this->M_Home->user($user),
			'judul'	=> "DATA BERITA",
			'sub'	=> "Lihat Berita",
			'read' => $q
		);
		$this->template->load('backend/template', $this->view . 'read', $data);
	}

	public function cetak()
	{
		$q = $this->M_Berita->GetAll();
		$data = array(
			'judul'	=> "DATA BERITA",
			'sub'	=> "Lihat Berita",
			'read' => $q
		);
		$this->load->view($this->view . 'cetak', $data);
	}

	public function create()
	{
		$this->form_validation->set_rules('judul_berita', 'Nama Kategori', 'required|trim|is_unique[berita.judul_berita]', [
			'is_unique' => 'Judul Berita digunakan!'
		]);
		$this->form_validation->set_rules('id_kategori', 'Pilih Kategori', 'required|trim');
		$this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required|trim');
		// $this->form_validation->set_rules('img_berita', 'Foro Berita', 'required|trim');
		if ($this->form_validation->run() == false) {
			$user = $this->session->userdata('kd_user');
			$data = array(
				'user' => $this->M_Home->user($user),
				'judul'    => "DATA BERITA",
				'sub'    => "Tambah Berita",
				'kategori' 	=> $this->M_kategori->GetAll(),
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
				'source_image'  => './assets/img_berita/' . $file_name,
				'maintain_ratio' => FALSE,
				'width'         => 730,
				'height'        => 534,
				'new_image'     => './assets/img_berita/large/' . $file_name
			),
			// Medium Image
			array(
				'image_library' => 'GD2',
				'source_image'  => './assets/img_berita/' . $file_name,
				'maintain_ratio' => FALSE,
				'width'         => 350,
				'height'        => 256,
				'new_image'     => './assets/img_berita/medium/' . $file_name
			),
			// Small Image
			array(
				'image_library' => 'GD2',
				'source_image'  => './assets/img_berita/' . $file_name,
				'maintain_ratio' => FALSE,
				'width'         => 100,
				'height'        => 72,
				'new_image'     => './assets/img_berita/small/' . $file_name,
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
		$config['upload_path'] = './assets/img_berita/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);

		if (!empty($_FILES['img_berita']['name'])) {
			if ($this->upload->do_upload('img_berita')) {
				$img = $this->upload->data();
				$this->ImgThumbs($img['file_name']);
				$title = $this->input->post('title', TRUE);
				$img_berita = $img['file_name'];

				$data = array(
					'judul_berita' => $this->input->post('judul_berita'),
					'id_kategori' => $this->input->post('id_kategori'),
					'st_berita' => '0',
					'isi_berita' => $this->input->post('isi_berita'),
					'tgl_berita' => date('Y-m-d'),
					'jam_berita' => date('H:i:s'),
					'kd_user'	=> $this->session->userdata('kd_user'),
					'img_berita' => $img_berita
				);
				$this->M_Berita->save($data);
				$this->session->set_flashdata('message_true', 'Data berhasil tersimpan');
				redirect($this->redirect, 'refresh');
			}
		} else {
			$this->session->set_flashdata('message_false', 'Data tidak berhasil tersimpan');
			redirect($this->redirect, 'refresh');
		}
	}

	public function edit()
	{
		$kd   = $this->uri->segment(4);
		$this->form_validation->set_rules('judul_berita', 'Nama Kategori', 'required|trim');
		$this->form_validation->set_rules('id_kategori', 'Pilih Kategori', 'required|trim');
		$this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required|trim');
		if ($this->form_validation->run() == false) {
			$user = $this->session->userdata('kd_user');
			$data = array(
				'user' => $this->M_Home->user($user),
				'judul'    => "DATA BERITA",
				'sub'    => "Tambah Berita",
				'kategori' 	=> $this->M_kategori->GetAll(),
				'edit' 	=> $this->M_Berita->edit($kd)
			);
			$this->template->load('backend/template', $this->view . 'edit', $data);
		} else {
			$this->update();
		}
	}

	public function update()
	{
		$kd = $this->uri->segment(4);
		$config['upload_path'] = './assets/img_berita/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);

		if (!empty($_FILES['img_berita']['name'])) {
			if ($this->upload->do_upload('img_berita')) {
				$img = $this->upload->data();
				$this->ImgThumbs($img['file_name']);
				$title = $this->input->post('title', TRUE);
				$img_berita = $img['file_name'];

				$data = array(
					'judul_berita' => $this->input->post('judul_berita'),
					'id_kategori' => $this->input->post('id_kategori'),
					'isi_berita' => $this->input->post('isi_berita'),
					'tgl_berita' => $this->input->post('tgl_berita'),
					'jam_berita' => $this->input->post('jam_berita'),
					'kd_user'	=> $this->session->userdata('kd_user'),
					'img_berita'			=> $img_berita
				);
			}
		} else {
			$data = array(
				'judul_berita' => $this->input->post('judul_berita'),
				'id_kategori' => $this->input->post('id_kategori'),
				'isi_berita' => $this->input->post('isi_berita'),
				'tgl_berita' => $this->input->post('tgl_berita'),
				'jam_berita' => $this->input->post('jam_berita'),
				'kd_user'	=> $this->session->userdata('kd_user'),
			);
		}
		$this->M_Berita->update($kd, $data);
		$this->session->set_flashdata('message_true', 'Data telah diperbaharui');
		redirect($this->redirect, 'refresh');
	}

	public function status()
	{
		$kd = $this->uri->segment(4);
		$data = array(
			'st_berita' => $this->uri->segment(5)
		);
		$this->M_Berita->status($kd, $data);
		$this->session->set_flashdata('message_true', 'Status telah diperbaharui');
		redirect($this->redirect, 'refresh');
	}

	public function delete()
	{
		$kd = $this->uri->segment(4);
		$data = array(
			'id_berita' => $kd
		);
		$this->M_Berita->delete($data);
		$this->session->set_flashdata('message_true', 'Data telah dihapus');
		redirect($this->redirect, 'refresh');
	}
}
