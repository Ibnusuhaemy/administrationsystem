<?php

class Page extends CI_Controller{
    function __construct()
    {
        parents::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('login');
        }
    }

    function index()
    {
        if($this->session->userdata('level') === 1){
            $this->load->view('admin');
        }
        else{
            echo " access denied";
        }
    }

    function pimpinan(){
        if($this->session->userdata('level') === 2){
            $this->load->view('pimpinan');
        }
        else{
            echo "access denied";
        }
    }
}
?>