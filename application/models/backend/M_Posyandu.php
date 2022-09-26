<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Posyandu extends CI_Model
{
    private $table   = 'posyandu';
    private $pk   = 'no_posy';

    public function GetAll()
    {
        $this->db->order_by('no_posy', 'desc');
        return $this->db->get($this->table);
    }

    public function buat_noposyandu()
    {
        $this->db->select('RIGHT(posyandu.no_posy,3) as kode', FALSE);
        $this->db->order_by('no_posy', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('posyandu');      //cek dulu apakah ada sudah ada kode di tabel.
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = date('Ymd') . $kodemax;    // hasilnya ODJ-9921-0001 dst.
        return $kodejadi;
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
