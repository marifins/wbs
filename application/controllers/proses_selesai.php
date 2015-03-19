<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 *
 * @copyright 2015
 * @author Muhammad Arifin Siregar
 * @package default_template
 * @modified Feb 26, 2015
 */

 class Proses_Selesai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->model('proses_selesai_model');
        $this->load->library('auth');
        $this->auth->restrict();
    }

    public function index() {
        $this->load->library('parser');
        
        $d['query'] = $this->proses_selesai_model->get_all();
        
        $data = array(
            'title' => 'Laporan Masuk - Proses Selesai',
            'h1' => 'Laporan Masuk - Proses Selesai',
            'content' => $this->load->view('proses_selesai', $d, TRUE)
        );
        $this->parser->parse('template', $data);
    }
     
    public function set($id = 0) {
        $this->proses_selesai_model->set($id);
        redirect('laporan_masuk');
    }
}

?>
