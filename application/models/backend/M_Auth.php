<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Auth extends CI_Model
{

    public function CekLogin($table, $email, $pswd)
    {
        $this->db->where('email_user', $email);
        $this->db->where('pswd_user', $pswd);
        return $this->db->get($table)->row_array();
    }
}
