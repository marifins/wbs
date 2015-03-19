<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Belum_diproses_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function main_query($tanggal = 0){
        if($tanggal == 0)
            $query = $this->db->query('SELECT * FROM laporan WHERE status = 0 ORDER BY timestamp DESC');
        else
            $query = $this->db->query('SELECT * FROM laporan');
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
        $query = $this->db->query('SELECT * FROM laporan WHERE id = "'.$id.'"');
        return $query->row();
    }

}

?>
