<?php
defined('BASEPATH') OR ('No direct script allowed');

class Keluar extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Keluar_model');

    }

    public function index()
    {
        $data['surat_keluar'] = $this->Keluar_model->getAll();
        $this->load->view('user/keluar/list',$data);
    }
}
?>