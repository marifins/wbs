<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 *
 * @copyright 2015
 * @author Muhammad Arifin Siregar
 * @package default_template
 * @modified Feb 26, 2015
 */

 class Settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->model('user_model');
        $this->load->library('auth');
        $this->auth->restrict();
    }

    public function index() {
        $this->load->library('parser');
        
        $register =  from_session('user_id');
        $d['query'] = $this->user_model->get_details($register);
        
        $data = array(
            'title' => 'Settings',
            'h1' => 'Settings',
            'content' => $this->load->view('user/settings', $d, TRUE)
        );
        $this->parser->parse('template', $data);
    }
}

?>
