<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 *
 * @copyright 2015
 * @author Muhammad Arifin Siregar
 * @package default_template
 * @modified Feb 26, 2015
 */

 class Def extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->helper('url');
    }

    public function index() {
        
        $this->load->library('parser');
        $data = array(
            'title' => 'Whistle Blower System',
            'h1' => 'Whistle Blower System',
            'content' => $this->load->view('home', '', TRUE)
        );
        $this->parser->parse('main_template', $data);
    }

    public function not_found() {
        $this->load->view('404', '', '');
    }
    
}


/* End of file def.php */
/* Location: ./application/controllers/def.php */
    
?>