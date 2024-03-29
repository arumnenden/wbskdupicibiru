<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing_model extends CI_model
{
    public function getBerita()
    {
        $query = "SELECT *
                  FROM tb_berita
                  ORDER BY tgl_berita DESC
                  LIMIT 15      
                ";
        return $this->db->query($query)->result_array();
    }

    public function getBeritaLimit()
    {
        $query = "SELECT *
                  FROM tb_berita
                  ORDER BY tgl_berita DESC
                  LIMIT 4      
                ";
        return $this->db->query($query)->result_array();
    }

    public function getBeritaAll($limit, $start)
    {
        $this->db->order_by('tgl_berita', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get('tb_berita');
        return $query;
    }

    function getBeritaAllSingle()
    {
        $this->db->select('*');
        $this->db->from('tb_berita');

        return $this->db->get();
    }




    public function getPromkes()
    {
        $query = "SELECT *
                  FROM tb_promkes
                  ORDER BY tgl_promkes DESC
                  LIMIT 15      
                ";
        return $this->db->query($query)->result_array();
    }

    public function getPromkesLimit()
    {
        $query = "SELECT *
                  FROM tb_promkes
                  ORDER BY tgl_promkes DESC
                  LIMIT 4      
                ";
        return $this->db->query($query)->result_array();
    }

    public function getPromkesAll($limit, $start)
    {
        $this->db->order_by('tgl_promkes', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get('tb_promkes');
        return $query;
    }

    function getPromkesAllSingle()
    {
        $this->db->select('*');
        $this->db->from('tb_promkes');

        return $this->db->get();
    }



    public function getPkk()
    {
        $query = "SELECT *
                  FROM tb_pkk
                  ORDER BY tgl_pkk DESC
                  LIMIT 15      
                ";
        return $this->db->query($query)->result_array();
    }

    public function getPkkLimit()
    {
        $query = "SELECT *
                  FROM tb_pkk
                  ORDER BY tgl_pkk DESC
                  LIMIT 4      
                ";
        return $this->db->query($query)->result_array();
    }

    public function getPkkAll($limit, $start)
    {
        $this->db->order_by('tgl_pkk', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get('tb_pkk');
        return $query;
    }

    function getPkkAllSingle()
    {
        $this->db->select('*');
        $this->db->from('tb_pkk');

        return $this->db->get();
    }





}
