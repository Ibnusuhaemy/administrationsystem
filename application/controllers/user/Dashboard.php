<?php
    class Dashboard extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('mread');    
        }

        public function index()
        {
            $data = array(
                'report'    => $this->mread->report(),
                'report1'   => $this->mread->report1()
            );

            $this->load->view('user/dashboard',$data);
        }

    }

?>