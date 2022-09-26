<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Home extends CI_Model
{

	public function total($table)
	{
		$query = $this->db->get($table)->num_rows();
		return $query;
	}

	public function user($user)
	{
		$this->db->where('no_kia', $user);
		return $this->db->get('kia')->row_array();
	}

	public function berita()
	{
		$this->db->order_by('tgl_berita', 'desc');
		$this->db->order_by('jam_berita', 'desc');
		//$this->db->join('user','berita.kd_user=user.kd_user');
		$this->db->join('kategori', 'berita.id_kategori=kategori.id_kategori');
		$this->db->join('user', 'berita.kd_user=user.kd_user');
		return $this->db->get('berita');
	}
}
