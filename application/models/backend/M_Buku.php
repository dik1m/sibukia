<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Buku extends CI_Model
{
    private $table   = 'buku';
    private $pk   = 'no_kia';

    public function GetAll()
    {
        $this->db->order_by('no_kia', 'desc');
        $this->db->order_by('st_buku', 'desc');
        $this->db->order_by('tgl_inbuku', 'desc');
        return $this->db->get($this->table);
    }

    public function CekBuku()
    {
        $this->db->order_by('no_kia', 'asc');
        $this->db->order_by('tgl_inbuku', 'asc');
        $this->db->where('st_buku', 1);
        $this->db->order_by('tgl_inbuku', 'desc');
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
        return $this->db->get($this->table)->row_array();
    }

    public function update($kd, $data)
    {
        $this->db->where($this->pk, $kd);
        return $this->db->update($this->table, $data);
    }

    public function status($no_kia, $up_bukukia)
    {
        $this->db->where($this->pk, $no_kia);
        return $this->db->update($this->table, $up_bukukia);
    }

    public function delete($data)
    {
        $this->db->where($data);
        return $this->db->delete($this->table);
    }
}
