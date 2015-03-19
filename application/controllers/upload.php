<?php
    class Upload extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('form');
            $this->load->helper('url');
        }
        
        
        /*
         *	Display upload form
         */
        public function index()
        {
            
            $this->load->view('upload/view');
        }
        
        
        /*
         *	Handles JSON returned from /js/uploadify/upload.php
         */
        public function uploadify()
        {
            
            //Decode JSON returned by /js/uploadify/upload.php
            $file = $this->input->post('filearray');
            $data['json'] = json_decode($file);
            
            $this->load->view('upload/uploadify',$data);
        }
        
    }