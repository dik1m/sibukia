<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Umur extends CI_Model
{
    private $table   = 'umur';
    private $pk   = 'bln_umur';

    public function GetAll()
    {
        $this->db->order_by('bln_umur', 'desc');
        return $this->db->get($this->table);
    }

    public function umur()
    {
        $this->db->order_by('bln_umur', 'asc');
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
