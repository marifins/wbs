<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 *
 * @copyright 2015
 * @author Muhammad Arifin Siregar
 * @package default_template
 * @modified Feb 26, 2015
 */

 class Belum_diproses extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->model('belum_diproses_model');
        $this->load->library('auth');
        $this->auth->restrict();
    }

    public function index() {
        $this->load->library('parser');
        
        $d['query'] = $this->belum_diproses_model->get_all();
        
        $data = array(
            'title' => 'Laporan Masuk - Belum Diproses',
            'h1' => 'Laporan Masuk - Belum Diproses',
            'content' => $this->load->view('belum_diproses', $d, TRUE)
        );
        $this->parser->parse('template', $data);
    }
}

?>
