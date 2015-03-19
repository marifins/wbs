<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Dashboard_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function main_query($tanggal = 0){
        if($tanggal == 0)
            $query = $this->db->query('SELECT * FROM laporan WHERE status = 0 ORDER BY timestamp DESC LIMIT 5 ');
        else
            $query = $this->db->query('SELECT * FROM laporan WHERE status = 0');
        return $query;
    }
    
    function get_all($tanggal = 0)
    {
        $query = $this->main_query($tanggal);
        return $query->result();
    }
    function get_rows($tanggal = 0){
        $query = $this->main_query($tanggal);
        return $query->num_rows();
    }
    
    function get_details($id = 0){
        $query = $this->db->query('SELECT * FROM laporan WHERE id = 1 AND status = 0');
        return $query->row();
    }
    
    function get_laporan_masuk($tanggal = 0)
    {
        $query = $this->main_query($tanggal);
        return $query->result();
    }
    
    function laporan_masuk_rows(){
        $query = $this->db->query('SELECT * FROM laporan');
        return $query->num_rows();
    }
    
    function belum_diproses_rows(){
        $query = $this->db->query('SELECT * FROM laporan WHERE status = 0');
        return $query->num_rows();
    }
    
    function sedang_diproses_rows(){
        $query = $this->db->query('SELECT * FROM laporan WHERE status = 1');
        return $query->num_rows();
    }
    
    function proses_selesai_rows(){
        $query = $this->db->query('SELECT * FROM laporan WHERE status = 2');
        return $query->num_rows();
    }

}

?>
