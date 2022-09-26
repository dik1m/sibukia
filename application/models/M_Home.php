<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Home extends CI_Model
{
    private $table = 'berita';
    private $pk = 'id_berita';

    function headslide()
    {
        $this->db->where('st_berita', 1);
        $this->db->limit(6);
        $this->db->order_by('tgl_berita', 'desc');
        $this->db->order_by('jam_berita', 'desc');
        $this->db->join('kategori', 'berita.id_kategori=kategori.id_kategori');
        $this->db->join('user', 'berita.kd_user=user.kd_user');
        return $this->db->get($this->table);
    }

    function newshead1()
    {
        $this->db->where('st_berita', 1);
        $this->db->where('berita.id_kategori', 1);
        $this->db->limit(1);
        $this->db->order_by('tgl_berita', 'desc');
        $this->db->order_by('jam_berita', 'desc');
        $this->db->join('kategori', 'berita.id_kategori=kategori.id_kategori');
        $this->db->join('user', 'berita.kd_user=user.kd_user');
        return $this->db->get($this->table, 1, 0);
    }

    function newshead2()
    {
        $this->db->where('st_berita', 1);
        $this->db->where('berita.id_kategori', 1);
        $this->db->limit(1);
        $this->db->order_by('tgl_berita', 'desc');
        $this->db->order_by('jam_berita', 'desc');
        $this->db->join('kategori', 'berita.id_kategori=kategori.id_kategori');
        $this->db->join('user', 'berita.kd_user=user.kd_user');
        return $this->db->get($this->table, 1, 1);
    }

    function newshead3()
    {
        $this->db->where('st_berita', 1);
        $this->db->where('berita.id_kategori', 1);
        $this->db->limit(1);
        $this->db->order_by('tgl_berita', 'desc');
        $this->db->order_by('jam_berita', 'desc');
        $this->db->join('kategori', 'berita.id_kategori=kategori.id_kategori');
        $this->db->join('user', 'berita.kd_user=user.kd_user');
        return $this->db->get($this->table, 1, 2);
    }

    function newshome()
    {
        $this->db->where('st_berita', 1);
        $this->db->where('berita.id_kategori', 2);
        $this->db->limit(6);
        $this->db->order_by('tgl_berita', 'desc');
        $this->db->order_by('jam_berita', 'desc');
        $this->db->join('kategori', 'berita.id_kategori=kategori.id_kategori');
        $this->db->join('user', 'berita.kd_user=user.kd_user');
        return $this->db->get($this->table);
    }

    function newsterkini()
    {
        $this->db->where('st_berita', 1);
        $this->db->where('berita.id_kategori', 2);
        $this->db->limit(4);
        $this->db->order_by('tgl_berita', 'desc');
        $this->db->order_by('jam_berita', 'desc');
        $this->db->join('kategori', 'berita.id_kategori=kategori.id_kategori');
        $this->db->join('user', 'berita.kd_user=user.kd_user');
        return $this->db->get($this->table);
    }

    function newsfooter()
    {
        $this->db->where('st_berita', 1);
        $this->db->limit(2);
        $this->db->order_by('tgl_berita', 'desc');
        $this->db->order_by('jam_berita', 'desc');
        $this->db->join('kategori', 'berita.id_kategori=kategori.id_kategori');
        $this->db->join('user', 'berita.kd_user=user.kd_user');
        return $this->db->get($this->table);
    }


    function kategori()
    {
        $this->db->order_by('nm_kategori', 'asc');
        return $this->db->get('kategori');
    }

    function layanan()
    {
        $this->db->where('st_layanan', 'Publik');
        $this->db->order_by('nm_layanan', 'asc');
        return $this->db->get('layanan');
    }
}
