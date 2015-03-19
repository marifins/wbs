<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 *
 * @copyright 2015
 * @author Muhammad Arifin Siregar
 * @package default_template
 * @modified Feb 26, 2015
 */

 class Sedang_diproses extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->model('sedang_diproses_model');
        $this->load->library('auth');
        $this->auth->restrict();
    }

    public function index() {
        $this->load->library('parser');
        
        $d['query'] = $this->sedang_diproses_model->get_all();
        
        $data = array(
            'title' => 'Laporan Masuk - Sedang Diproses',
            'h1' => 'Laporan Masuk - Sedang Diproses',
            'content' => $this->load->view('sedang_diproses', $d, TRUE)
        );
        $this->parser->parse('template', $data);
    }
     
    public function set($id = 0) {
        $this->sedang_diproses_model->set($id);
        redirect('laporan_masuk');
    }
}

?>
