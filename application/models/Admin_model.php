<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_model
{
    public function countJmlUser()
    {

        $query = $this->db->query(
            "SELECT COUNT(id) as user
                               FROM mst_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->user;
        } else {
            return 0;
        }
    }

    public function countBelum()
    {
        $query = $this->db->query(
            "SELECT COUNT(status_komplain) as belum
                               FROM tb_komplain
                               WHERE status_komplain = 1"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->belum;
        } else {
            return 0;
        }
    }

    public function countProses()
    {
        $query = $this->db->query(
            "SELECT COUNT(status_komplain) as proses
                               FROM tb_komplain
                               WHERE status_komplain = 2"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->proses;
        } else {
            return 0;
        }
    }

    public function countClear()
    {
        $query = $this->db->query(
            "SELECT COUNT(status_komplain) as clear
                               FROM tb_komplain
                               WHERE status_komplain = 0"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->clear;
        } else {
            return 0;
        }
    }

    public function getUserEdit($id)
    {
        $query = $this->db->get_where('mst_user', ['id' => $id])->row_array();
        return $query;
    }

    public function getMember()
    {
        $query = "SELECT *
                  FROM mst_member
                  LEFT JOIN mst_user
                  ON mst_member.sess_id = mst_user.id              
                ";
        return $this->db->query($query)->result_array();
    }

    public function getKomplain()
    {
        $query = "SELECT *
                  FROM tb_komplain
                  LEFT JOIN mst_member
                  ON tb_komplain.sess_id = mst_member.sess_id   
                  LEFT JOIN mst_user
                  ON mst_user.id = tb_komplain.sess_id         
                ";
        return $this->db->query($query)->result_array();
    }

    public function getEditKomplain($id_komplain)
    {
        $query = $this->db->get_where('tb_komplain', ['id_komplain' => $id_komplain])->row_array();
        return $query;
    }



    public function getSspindah()
    {
        $query = "SELECT *
                  FROM tb_sspindah
                  LEFT JOIN mst_member
                  ON tb_sspindah.sess_id = mst_member.sess_id   
                  LEFT JOIN mst_user
                  ON mst_user.id = tb_sspindah.sess_id         
                ";
        return $this->db->query($query)->result_array();
    }

    public function getEditSspindah($id_sspindah)
    {
        $query = $this->db->get_where('tb_sspindah', ['id_sspindah' => $id_sspindah])->row_array();
        return $query;
    }


    public function getSsktm()
    {
        $query = "SELECT *
                  FROM tb_ssktm
                  LEFT JOIN mst_member
                  ON tb_ssktm.sess_id = mst_member.sess_id   
                  LEFT JOIN mst_user
                  ON mst_user.id = tb_ssktm.sess_id         
                ";
        return $this->db->query($query)->result_array();
    }

    public function getEditSsktm($id_ssktm)
    {
        $query = $this->db->get_where('tb_ssktm', ['id_ssktm' => $id_ssktm])->row_array();
        return $query;
    }


    public function getSsdispensasi()
    {
        $query = "SELECT *
                  FROM tb_ssdispensasi
                  LEFT JOIN mst_member
                  ON tb_ssdispensasi.sess_id = mst_member.sess_id   
                  LEFT JOIN mst_user
                  ON mst_user.id = tb_ssdispensasi.sess_id         
                ";
        return $this->db->query($query)->result_array();
    }

    public function getEditSsdispensasi($id_ssdispensasi)
    {
        $query = $this->db->get_where('tb_ssdispensasi', ['id_ssdispensasi' => $id_ssdispensasi])->row_array();
        return $query;
    }



    public function getSskbd()
    {
        $query = "SELECT *
                  FROM tb_sskbd
                  LEFT JOIN mst_member
                  ON tb_sskbd.sess_id = mst_member.sess_id   
                  LEFT JOIN mst_user
                  ON mst_user.id = tb_sskbd.sess_id         
                ";
        return $this->db->query($query)->result_array();
    }

    public function getEditSskbd($id_sskbd)
    {
        $query = $this->db->get_where('tb_sskbd', ['id_sskbd' => $id_sskbd])->row_array();
        return $query;
    }


    public function getSsktp()
    {
        $query = "SELECT *
                  FROM tb_ssktp
                  LEFT JOIN mst_member
                  ON tb_ssktp.sess_id = mst_member.sess_id   
                  LEFT JOIN mst_user
                  ON mst_user.id = tb_ssktp.sess_id         
                ";
        return $this->db->query($query)->result_array();
    }

    public function getEditSsktp($id_ssktp)
    {
        $query = $this->db->get_where('tb_ssktp', ['id_ssktp' => $id_ssktp])->row_array();
        return $query;
    }









    public function getListBerita()
    {
        $query = "SELECT *
                  FROM tb_berita
                  ORDER BY tgl_berita DESC   
                ";
        return $this->db->query($query)->result_array();
    }


    public function getListPromkes()
    {
        $query = "SELECT *
                  FROM tb_promkes
                  ORDER BY tgl_promkes DESC   
                ";
        return $this->db->query($query)->result_array();
    }


    public function getListPkk()
    {
        $query = "SELECT *
                  FROM tb_pkk
                  ORDER BY tgl_pkk DESC   
                ";
        return $this->db->query($query)->result_array();
    }    

    public function getFilterKomplain($tanggal1, $tanggal2)
    {
        $query = "SELECT *
                  FROM tb_komplain
                  LEFT JOIN mst_member
                  ON tb_komplain.sess_id = mst_member.sess_id   
                  LEFT JOIN mst_user
                  ON mst_user.id = tb_komplain.sess_id
                  WHERE DATE(date_komplain) BETWEEN '$tanggal1' AND '$tanggal2'         
                ";
        return $this->db->query($query)->result_array();
    }
}
