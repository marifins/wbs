<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Laporan_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function insert_entry(){
        $laporan = array(
                         'id' => '',
                         'nama' => $_POST['nama'],
                         'email' => $_POST['email'],
                         'phone' => $_POST['phone'],
                         'jlh_rugi' => $_POST['jlh_rugi'],
                         'pihak_terlibat' => $_POST['pihak_terlibat'],
                         'lokasi_kejadian' => $_POST['lokasi_kejadian'],
                         'waktu_kejadian' => $_POST['waktu_kejadian'],
                         'dokumen_pendukung' => $_POST['dokumen'],
                         'kronologis' => $_POST['kronologis']
                         );
        $this->db->insert('laporan', $laporan);
        return true;
    }
    
    


}

?>
