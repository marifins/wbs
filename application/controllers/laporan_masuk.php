<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 *
 * @copyright 2015
 * @author Muhammad Arifin Siregar
 * @package default_template
 * @modified Feb 26, 2015
 */

 class Laporan_masuk extends CI_Controller {

     public function __construct() {
         parent::__construct();
         $this->load->model('dashboard_model');
         $this->load->model('laporan_masuk_model');
         $this->load->library('auth');
         $this->auth->restrict();
     }
     
     public function index() {
         $this->load->library('parser');
         
         $d['query'] = $this->laporan_masuk_model->get_all();
         
         $data = array(
                       'title' => 'Laporan Masuk',
                       'h1' => 'Laporan Masuk',
                       'content' => $this->load->view('laporan_masuk', $d, TRUE)
                       );
         $this->parser->parse('template', $data);
     }
     
     public function details($id) {
         if($id == 0) redirect(base_url());
         $this->load->library('parser');
         $d['query'] = $this->laporan_masuk_model->get_details($id);
         $data = array(
                       'title' => 'Whistle Blower System Admin',
                       'h1' => 'Whistle Blower System Admin',
                       'content' => $this->load->view('laporan_masuk_details', $d, TRUE)
                       );
         $this->parser->parse('template', $data);
     }
     
     
}

?>
