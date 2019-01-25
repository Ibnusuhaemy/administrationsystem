<?php
    class Overview extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('mread');    
        }

        public function index()
        {

            $data['content'] = $this->mread->getAll();

            $this->load->view('admin/overview',$data);
        }

        public function grafik()
        {
            $data = array(
                'report'    => $this->mread->report(),
                'report1'   => $this->mread->report1()
            );

            $this->load->view('admin/grafik',$data);
        }

        public function dashboard()
        {

            $data['content'] = $this->db->query("SELECT * FROM `tb_surat_masuk` ORDER BY id_masuk DESC LIMIT 1");

            $this->load->view('admin/dashboard',$data);
        }
    }

?>