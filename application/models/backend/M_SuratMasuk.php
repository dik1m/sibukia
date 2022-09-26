<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_SuratMasuk extends CI_Model
{
  private $table   = 'mail_in';
  private $pk   = 'id_mailin';

  public function GetAll()
  {
    $this->db->order_by('id_mailin', 'desc');
    return $this->db->get($this->table);
  }

  public function save($data)
  {
    if (!empty($_FILES['upload_mailin']['name'])) {
      $upload = $this->_do_uploadfile();
      $data['upload_mailin'] = $upload;
    }
    return $this->db->insert($this->table, $data);
  }

  private function _do_uploadfile()
  {
    unset($config);
    $config['upload_path']    = './assets/surat_masuk/';
    $config['allowed_types']  = '.doc|docx|pdf|jpeg|jpg|png';
    $config['max_size']       = 5048;
    $config['file_name']      = 'dokumen' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('upload_mailin')) {
    }
    return $this->upload->data('file_name');
  }

  public function edit($kd)
  {
    $this->db->where($this->pk, $kd);
    return $this->db->get($this->table)->row_array();
  }

  public function update($kd, $data)
  {
    if (!empty($_FILES['upload_mailin']['name'])) {
      $upload = $this->_do_uploadfile();
      $data['upload_mailin'] = $upload;
    }
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
