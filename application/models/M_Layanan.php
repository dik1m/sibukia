<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Layanan extends CI_Model
{
  private $table = 'layanan';
  private $pk = 'id_layanan';

  function infolayanan($id_layanan)
  {
    $this->db->where('id_layanan', $id_layanan);
    $this->db->where('st_layanan', 'Publik');
    $this->db->limit(1);
    $this->db->order_by('id_layanan', 'desc');
    return $this->db->get('layanan');
  }
}
