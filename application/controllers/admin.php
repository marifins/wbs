<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 *
 * @copyright 2015
 * @author Muhammad Arifin Siregar
 * @package default_template
 * @modified Feb 26, 2015
 */

 class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->helper('url');
        $this->load->library('auth');
        $session = from_session('username');
        if($session == "") redirect(base_url()."login_page");
    }

    public function index() {
        
        $this->load->library('parser');
        $d['query'] = $this->dashboard_model->get_all();
        $data = array(
            'title' => 'Whistle Blower System Admin',
            'h1' => 'Whistle Blower System Admin',
            'content' => $this->load->view('home', $d, TRUE)
        );
        $this->parser->parse('template', $data);
    }

    public function not_found() {
        $this->load->view('404', '', '');
    }

    function setNum($str) {
        return number_format($str, 0, ',', '.');
    }
    
}


/* End of file def.php */
/* Location: ./application/controllers/def.php */
    
?>