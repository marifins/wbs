<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 *
 * @copyright 2015
 * @author Muhammad Arifin Siregar
 * @package default_template
 * @modified Feb 26, 2015
 */

 class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
     
    public function insert() {
        $this->load->helper('url');
        $this->load->model('laporan_model');
        
        $this->laporan_model->insert_entry();
    }
    
}


/* End of file def.php */
/* Location: ./application/controllers/def.php */
    
?>