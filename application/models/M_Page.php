<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Page extends CI_Model
{
	private $table 	= 'visimisi';
	private $pk 	= 'id_visimisi';

	public function save($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function hasilrekam($id_user)
	{
		$this->db->where('user.id_user', $id_user);
		$this->db->order_by('rekam.tgl_rekam', 'desc');
		$this->db->order_by('rekam.jam_rekam', 'desc');
		$this->db->join('user', 'rekam.id_user=user.id_user');
		return $this->db->get($this->table);
	}

	function vm()
	{
		return $this->db->get('visimisi')->row_array();;
	}

	function cetakrekam($kd)
	{
		$this->db->where('rekam.id_rekam', $kd);
		$this->db->join('user', 'rekam.id_user=user.id_user');
		return $this->db->get($this->table)->row_array();;
	}
}
