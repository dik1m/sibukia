<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pengajuan extends CI_Model
{
	private $table 	= 'pengajuan';
	private $pk 	= 'no_ajuan';


	function read($id_user)
	{
		$this->db->where('people.no_ktp', $id_user);
		$this->db->order_by('pengajuan.tgl_revajuan', 'desc');
		$this->db->join('layanan', 'pengajuan.id_layanan=layanan.id_layanan');
		$this->db->join('people', 'pengajuan.no_ktp=people.no_ktp');
		$this->db->join('kelurahan', 'people.id_kel=kelurahan.id_kel');
		$this->db->join('kecamatan', 'people.id_kec=kecamatan.id_kec');
		$this->db->join('kabupaten', 'people.id_kab=kabupaten.id_kab');
		$this->db->join('provinsi', 'people.id_prov=provinsi.id_prov');
		return $this->db->get('pengajuan');
	}


	public function layanan()
	{
		$this->db->order_by('nm_layanan', 'asc');
		return $this->db->get('layanan');
	}

	public function update($kd, $data)
	{
		$this->db->where('no_ajuan', $kd);
		return $this->db->update('pengajuan', $data);
	}


	public function edit($kd)
	{
		$this->db->where($this->pk, $kd);
		$this->db->join('layanan', 'pengajuan.id_layanan=layanan.id_layanan');
		$this->db->join('people', 'pengajuan.no_ktp=people.no_ktp');
		return $this->db->get('pengajuan')->row_array();
	}

	public function show($kd)
	{
		$this->db->where($this->pk, $kd);
		$this->db->join('layanan', 'pengajuan.id_layanan=layanan.id_layanan');
		$this->db->join('people', 'pengajuan.no_ktp=people.no_ktp');
		$this->db->join('kelurahan', 'people.id_kel=kelurahan.id_kel');
		$this->db->join('kecamatan', 'people.id_kec=kecamatan.id_kec');
		$this->db->join('kabupaten', 'people.id_kab=kabupaten.id_kab');
		$this->db->join('provinsi', 'people.id_prov=provinsi.id_prov');
		return $this->db->get($this->table)->row_array();
	}

	public function buat_nopengajuan()
	{
		$this->db->select('RIGHT(pengajuan.no_ajuan,3) as kode', FALSE);
		$this->db->order_by('no_ajuan', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('pengajuan');      //cek dulu apakah ada sudah ada kode di tabel.
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada
			$kode = 1;
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = date('ymd') . $kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}

	public function save($data)
	{
		return $this->db->insert('pengajuan', $data);
	}

	public function cetak($kd)
	{
		$this->db->where($this->pk, $kd);
		$this->db->join('layanan', 'pengajuan.id_layanan=layanan.id_layanan');
		$this->db->join('people', 'pengajuan.no_ktp=people.no_ktp');
		return $this->db->get('pengajuan')->row_array();
	}
}
