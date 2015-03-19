<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 *
 * @copyright 2015
 * @author Muhammad Arifin Siregar
 * @package default_template
 * @modified Feb 26, 2015
 */

 class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('url');
        $this->load->library('auth');
    }

    function do_login() {
        $this->auth->restrict(true);
        $this->load->library('auth');
        $login = array('username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        $return = $this->auth->do_login($login);
        if ($return) {
            redirect(base_url()."admin");
        } else {
            redirect(base_url()."login_page?status=err");
        }
    }

    function do_logout(){
        $this->auth->logout();
        redirect(base_url()."login_page");
    }
 }
 ?>