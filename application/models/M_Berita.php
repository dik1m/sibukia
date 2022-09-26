<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Berita extends CI_Model
{
  private $table = 'berita';
  private $pk = 'id_berita';

  function newsusr()
  {
    $this->db->where('st_berita', 'Publik');
    $this->db->limit(4);
    $this->db->order_by('tgl_berita', 'desc');
    $this->db->order_by('jam_berita', 'desc');
    $this->db->join('kategori', 'berita.id_kategori=kategori.id_kategori');
    $this->db->join('user', 'berita.kd_user=user.kd_user');
    return $this->db->get('berita');
  }

  function readmore($id_berita)
  {
    $this->db->where('id_berita', $id_berita);
    $this->db->where('st_berita', 'Publik');
    $this->db->limit(1);
    $this->db->order_by('id_berita', 'desc');
    $this->db->join('kategori', 'berita.id_kategori=kategori.id_kategori');
    $this->db->join('user', 'berita.kd_user=user.kd_user');
    return $this->db->get('berita');
  }

  public function GetDataPaging($limit, $start)
  {
    $this->db->where('st_berita', 'Publik');
    $this->db->order_by('tgl_berita', 'desc');
    $this->db->order_by('jam_berita', 'desc');
    $this->db->join('kategori', 'berita.id_kategori=kategori.id_kategori');
    $this->db->join('user', 'berita.kd_user=user.kd_user');
    return $this->db->get($this->table, $limit, $start);
  }

  public function GetCount()
  {
    return $this->db->count_all($this->table);
  }

  function newskategori($id_kategori)
  {
    $this->db->or_where('berita.id_kategori', $id_kategori);
    $this->db->where('st_berita', 'Publik');
    $this->db->order_by('tgl_berita', 'desc');
    $this->db->order_by('jam_berita', 'desc');
    $this->db->join('kategori', 'berita.id_kategori=kategori.id_kategori');
    $this->db->join('user', 'berita.kd_user=user.kd_user');
    return $this->db->get('berita');
  }
}
