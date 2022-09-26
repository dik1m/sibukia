<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Kategori extends CI_Model
{
    private $table   = 'kategori';
    private $pk   = 'id_kategori';

    public function GetAll()
    {
        $this->db->order_by('nm_kategori', 'asc');
        return $this->db->get($this->table);
    }

    function CekKode($table, $kode)
    {
        return $this->db->get_where($table, $kode);
    }

    public function save($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function edit($kd)
    {
        $this->db->where($this->pk, $kd);
        // return $this->db->get($this->table);
        return $this->db->get($this->table)->row_array();
    }

    public function update($kd, $data)
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
