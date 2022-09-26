<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Kia extends CI_Model
{
	private $table 	= 'kia';
	private $pk 	= 'no_kia';

	public function GetAll()
	{
		$this->db->order_by('tgl_nerimakia', 'desc');
		$this->db->order_by('tgl_nerimakia', 'desc');
		return $this->db->get($this->table);
	}

	public function KiaHamil()
	{
		$this->db->order_by('tgl_nerimakia', 'desc');
		$this->db->where('st_kia', 'Hamil');
		return $this->db->get($this->table);
	}

	public function KiaAnak()
	{
		$this->db->order_by('tgl_nerimakia', 'desc');
		$this->db->where('st_kia', 'Anak');
		return $this->db->get($this->table);
	}

	public function KiaSelesai()
	{
		$this->db->order_by('tgl_nerimakia', 'desc');
		$this->db->where('st_kia', 'Selesai');
		return $this->db->get($this->table);
	}

	public function edit($kd)
	{
		$this->db->where($this->pk, $kd);
		$this->db->join('tenagakes', 'kia.nik_kes=tenagakes.nik_kes');
		$this->db->join('kelurahan', 'kia.id_kel=kelurahan.id_kel');
		$this->db->join('kecamatan', 'kia.id_kec=kecamatan.id_kec');
		$this->db->join('kabupaten', 'kia.id_kab=kabupaten.id_kab');
		$this->db->join('provinsi', 'kia.id_prov=provinsi.id_prov');
		return $this->db->get($this->table)->row_array();
	}


	public function kia($kia)
	{
		$this->db->where($this->pk, $kia);
		$this->db->join('tenagakes', 'kia.nik_kes=tenagakes.nik_kes');
		$this->db->join('kelurahan', 'kia.id_kel=kelurahan.id_kel');
		$this->db->join('kecamatan', 'kia.id_kec=kecamatan.id_kec');
		$this->db->join('kabupaten', 'kia.id_kab=kabupaten.id_kab');
		$this->db->join('provinsi', 'kia.id_prov=provinsi.id_prov');
		return $this->db->get($this->table)->row_array();
	}

	public function update($kd, $data)
	{
		$this->db->where($this->pk, $kd);
		return $this->db->update($this->table, $data);
	}

	public function show($kd)
	{
		$this->db->where($this->pk, $kd);
		$this->db->join('kelurahan', 'kia.id_kel=kelurahan.id_kel');
		$this->db->join('kecamatan', 'kia.id_kec=kecamatan.id_kec');
		$this->db->join('kabupaten', 'kia.id_kab=kabupaten.id_kab');
		$this->db->join('provinsi', 'kia.id_prov=provinsi.id_prov');
		return $this->db->get($this->table)->row_array();
	}

	public function changepswd($kd)
	{
		$this->db->where($this->pk, $kd);
		return $this->db->get($this->table)->row_array();
	}

	public function uchangepswd($kd, $data)
	{
		$this->db->where($this->pk, $kd);
		return $this->db->update($this->table, $data);
	}

	public function delete($data)
	{
		$this->db->where($data);
		return $this->db->delete($this->table);
	}

	public function getProv()
	{
		$sql = "SELECT * FROM provinsi";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function getKab($id_prov)
	{
		$sql = "SELECT * FROM kabupaten WHERE id_prov={$id_prov} ORDER BY nama_kab";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function getKec($id_kab)
	{
		$sql = "SELECT * FROM kecamatan WHERE id_kab={$id_kab} ORDER BY nama_kec";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function getKel($id_kec)
	{
		$sql = "SELECT * FROM kelurahan WHERE id_kec={$id_kec} ORDER BY nama_kel";
		$query = $this->db->query($sql);
		return $query->result();
	}


	public function prov()
	{
		$this->db->order_by('nama_prov', 'asc');
		return $this->db->get('provinsi');
	}

	public function kab()
	{
		$this->db->order_by('nama_kab', 'asc');
		return $this->db->get('kabupaten');
	}

	public function kec()
	{
		$this->db->order_by('nama_kec', 'asc');
		return $this->db->get('kecamatan');
	}

	public function kel()
	{
		$this->db->order_by('nama_kel', 'asc');
		return $this->db->get('kelurahan');
	}
}
