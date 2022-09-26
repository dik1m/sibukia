<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_CttImunisasi extends CI_Model
{
    private $table   = 'posyandu';
    private $pk   = 'no_posy';

    public function GetAll()
    {
        $this->db->where('st_posy', 1);
        $this->db->order_by('no_posy', 'desc');
        return $this->db->get($this->table);
    }

    public function create($kd)
    {
        $this->db->where($this->pk, $kd);
        return $this->db->get($this->table)->row_array();
    }

    public function save($data)
    {
        return $this->db->insert('posyandu_detail', $data);
    }

    public function last($kia)
    {
        error_reporting(0);
        $this->db->where('posyandu_detail.no_kia', $kia);
        $this->db->order_by('posyandu_detail.no_kia', 'desc');
        $this->db->join('kia', 'posyandu_detail.no_kia=kia.no_kia');
        $this->db->join('umur', 'posyandu_detail.bln_umur=umur.bln_umur');
        return $this->db->get('posyandu_detail')->row_array();
    }

    public function detailall($kd)
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('posyandu_detail.kateg_ctt', 'Anak');
        $this->db->where('posyandu_detail.no_posy', $kd);
        $this->db->join('posyandu', 'posyandu_detail.no_posy=posyandu.no_posy');
        $this->db->join('kia', 'posyandu_detail.no_kia=kia.no_kia');
        // $this->db->join('umur', 'posyandu_detail.bln_umur=umur.bln_umur');
        // $this->db->join('imunisasi', 'posyandu_detail.id_imunisasi=imunisasi.id_imunisasi');
        return $this->db->get('posyandu_detail');
    }

    public function edit($kd)
    {
        $this->db->where('posyandu_detail.gb_posykia', $kd);
        $this->db->join('posyandu', 'posyandu_detail.no_posy=posyandu.no_posy');
        $this->db->join('kia', 'posyandu_detail.no_kia=kia.no_kia');
        $this->db->join('umur', 'posyandu_detail.bln_umur=umur.bln_umur');
        $this->db->join('tenagakes', 'posyandu_detail.nik_kes=tenagakes.nik_kes');
        $this->db->join('imunisasi', 'posyandu_detail.id_imunisasi=imunisasi.id_imunisasi');
        return $this->db->get('posyandu_detail')->row_array();
    }

    public function update($kd, $data)
    {
        $this->db->where('posyandu_detail.gb_posykia', $kd);
        return $this->db->update('posyandu_detail', $data);
    }

    public function status($kd, $data)
    {
        $this->db->where($this->pk, $kd);
        return $this->db->update($this->table, $data);
    }

    public function delete($data)
    {
        $this->db->where($data);
        return $this->db->delete('posyandu_detail');
    }
}
