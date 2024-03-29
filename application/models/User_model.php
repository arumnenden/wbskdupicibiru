<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_model
{
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

    public function getEditSsindah($id_sspindah)
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


   function getTicket()
{
    // Generate random bytes (binary data)
    $random_bytes = random_bytes(3);
    $hexadecimal = bin2hex($random_bytes);
    $random_part = substr($hexadecimal, 0, 5);
    $random_number = str_pad(rand(0, 99999), 5, "0", STR_PAD_LEFT);

    $kode = 'WBSkdupicibiru/' . '/' . $random_part . $random_number;
    return $kode;
}


    function getTickett()
    {
        $this->db->select('RIGHT(tickett,5) as kode', FALSE);
        $this->db->order_by('id_sspindah', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_sspindah');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = date('d/m/Y') . '/SiMsd/' . $kodemax;
        return $kodejadi;
    }
    

   
}
