<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    /**
     *
     *
     * @copyright 2015
     * @author Muhammad Arifin Siregar
     * @package default_template
     * @modified Feb 26, 2015
     */
    
    class Details extends CI_Controller {
        
        public function __construct() {
            parent::__construct();
            $this->load->model('dashboard_model');
            $this->load->library('auth');
            $this->auth->restrict();
        }
        
        public function laporan_terkini($id) {
            $this->load->library('parser');
            
            $d['query'] = $this->dashboard_model->get_details($id);
            
            $data = array(
                          'title' => 'Details',
                          'h1' => 'Details',
                          'content' => $this->load->view('details', $d, TRUE)
                          );
            $this->parser->parse('template', $data);
        }
        
    }
    
    
    /* End of file def.php */
    /* Location: ./application/controllers/def.php */
    
    ?>