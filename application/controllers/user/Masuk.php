<?php
defined('BASEPATH') OR ('No direct script allowed');

class Masuk extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('SuratMasuk_model');

    }

    public function index()
    {
        $data['kuy'] = $this->SuratMasuk_model->getAll();
        $this->load->view('user/masuk/list',$data);
    }
}
?>