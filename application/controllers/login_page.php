<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 *
 * @copyright 2010
 * @author Muhammad Arifin Siregar
 * @package default_template
 * @modified Sep 2, 2010
 */

 class Login_page extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        if (is_logged_in ()) {
            redirect(base_url());
        }
    }

    public function index() {
        $this->load->view('login_page', '', '');
    }
 }
 ?>