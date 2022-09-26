<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Auth extends CI_Model
{
    private $table     = 'kia';
    private $pk     = 'no_kia';

    public function CekLogin($table, $no_kia, $pswd_kia)
    {
        $this->db->where('no_kia', $no_kia);
        $this->db->where('pswd_kia', $pswd_kia);
        return $this->db->get($table)->row_array();
    }

    public function save($data)
    {
        return $this->db->insert($this->table, $data);
    }
}
