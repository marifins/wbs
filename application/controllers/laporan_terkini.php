<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 *
 * @copyright 2015
 * @author Muhammad Arifin Siregar
 * @package default_template
 * @modified Feb 26, 2015
 */

 class Laporan_terkini extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->model('laporan_terkini_model');
        $this->load->library('auth');
        $this->auth->restrict();
    }

    public function index() {
        $this->load->library('parser');
        
        $d['query'] = $this->laporan_terkini_model->get_all();
        
        $data = array(
            'title' => 'Laporan Terkini',
            'h1' => 'Laporan Terkini',
            'content' => $this->load->view('laporan_terkini', $d, TRUE)
        );
        $this->parser->parse('template', $data);
    }
     
     public function details($id) {
         if($id == 0) redirect(base_url());
         $this->load->library('parser');
         $d['query'] = $this->laporan_terkini_model->get_details($id);
         $data = array(
                       'title' => 'Whistle Blower System Admin',
                       'h1' => 'Whistle Blower System Admin',
                       'content' => $this->load->view('laporan_terkini_details', $d, TRUE)
                       );
         $this->parser->parse('template', $data);
     }
}

?>
