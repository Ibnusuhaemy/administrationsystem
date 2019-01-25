<?php
defined('BASEPATH') OR ('No direct script access allowed');

class Keluar extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Keluar_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['surat_keluar'] = $this->Keluar_model->getAll();
        $this->load->view('admin/surat/keluar/list',$data);

    }

    public function add()
    {
        $keluar      = $this->Keluar_model;
        $validation  = $this->form_validation;
        $validation->set_rules($keluar->rules());
        $data = array(
            "content" => $this->db->get('tb_kategori'),
            "surat_keluar" => $this->Keluar_model->getAll()
        );
        // $data['content'] = $this->db->get('tb_kategori');
        // $data['surat_keluar'] = $this->Keluar_model->getAll();

        if($validation->run()){
            $keluar->save();
            $this->session->set_flashdata('success','Data Berhasil Disimpan');

        }

        $this->load->view('admin/surat/keluar/new_form',$data);   
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/keluar');
       
        $keluar = $this->Keluar_model;
        $validation = $this->form_validation;
        $validation->set_rules($keluar->rules());

        if ($validation->run()) {
            $keluar->update();
            $this->session->set_flashdata('success', 'Data Berhasil disimpan');
        }

        $data['surat_keluar'] = $keluar->getById($id);
        if (!$data['surat_keluar']) show_404();
        
        $data['content'] = $this->db->get('tb_kategori');
        $this->load->view('admin/surat/keluar/edit_form', $data);
    }

    public function delete()
    {
        $id = $this->input->post("id");
        if (!isset($id)) show_404();
            
        if ($this->Keluar_model->delete($id)) {
            redirect(site_url('admin/keluar'));
        }
    }

   public function print($id_keluar = null)
    {
        $this->db->where('id_keluar',$id_keluar);
        $data['surat_keluar'] = $this->db->query("SELECT file FROM `tb_surat_keluar` WHERE id_keluar='$id_keluar'");
        $this->load->view('admin/surat/keluar/print', $data);
    }

    public function detail($id_keluar = null)
    {   
        $this->db->where('id_keluar',$id_keluar);
        $data['surat_keluar'] = $this->db->query("SELECT * FROM `tb_surat_keluar` WHERE id_keluar='$id_keluar'");

        $this->load->view('admin/surat/keluar/detail', $data);
    }
}
?>