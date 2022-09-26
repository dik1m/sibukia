<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{
	private $table 	= 'user';
	private $pk 	= 'kd_user';

	public function GetAll()
	{
		$this->db->order_by('date_user', 'desc');
		return $this->db->get($this->table);
	}

	public function save($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function edit($kd)
	{
		$this->db->where($this->pk, $kd);
		return $this->db->get($this->table)->row_array();
	}

	public function update($kd, $data)
	{
		$this->db->where($this->pk, $kd);
		return $this->db->update($this->table, $data);
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

	public function show($kd)
	{
		$this->db->where($this->pk, $kd);
		return $this->db->get($this->table)->row_array();
	}

	public function CekLogin($table, $user, $pswd)
	{
		$this->db->where('kd_user', $user);
		$this->db->where('pswd_user', $pswd);
		return $this->db->get($table)->row_array();
	}

	public function delete($data)
	{
		$this->db->where($data);
		return $this->db->delete($this->table);
	}
}
