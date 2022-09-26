<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daerah extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('backend/M_Daerah', 'daerah');
	}


	public function getKab($id_prov)
	{
		$kab = $this->daerah->getKab($id_prov);
		echo "<option value=''>Pilih Kabupaten/Kota</option>";
		foreach ($kab as $k) {
			echo "<option value='{$k->id_kab}'>{$k->nama_kab}</option>";
		}
	}

	public function getKec($id_kab)
	{
		$kec = $this->daerah->getKec($id_kab);
		echo "<option value=''>Pilih Kecamatan</option>";
		foreach ($kec as $k) {
			echo "<option value='{$k->id_kec}'>{$k->nama_kec}</option>";
		}
	}

	public function getKel($id_kec)
	{
		$kel = $this->daerah->getKel($id_kec);
		echo "<option value=''>Pilih Kelurahan/Desa</option>";
		foreach ($kel as $k) {
			echo "<option value='{$k->id_kel}'>{$k->nama_kel}</option>";
		}
	}
}
