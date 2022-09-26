<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_TenagaKes extends CI_Model
{
  private $table   = 'tenagakes';
  private $pk   = 'nik_kes';

  public function GetAll()
  {
    $this->db->order_by('st_kes', 'desc');
    $this->db->order_by('nm_kes', 'asc');
    return $this->db->get($this->table);
  }

  public function bertugas()
  {
    $this->db->order_by('nm_kes', 'asc');
    $this->db->where('st_kes', '1');
    $this->db->order_by('st_kes', 'desc');
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

  public function show($kd)
  {
    $this->db->where($this->pk, $kd);
    return $this->db->get($this->table)->row_array();
  }

  public function status($kd, $data)
  {
    $this->db->where($this->pk, $kd);
    return $this->db->update($this->table, $data);
  }

  public function delete($data)
  {
    $this->db->where($data);
    return $this->db->delete($this->table);
  }
}
