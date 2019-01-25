<?php
defined('BASEPATH') OR ('No direct script access allowed');

class Masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SuratMasuk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['surat_masuk'] = $this->SuratMasuk_model->getAll();
        $this->load->view('admin/surat/masuk/list',$data);
    }

    public function add()
    {
        $masuk      = $this->SuratMasuk_model;
        $validation = $this->form_validation;
        $validation->set_rules($masuk->rules());
 
        if($validation->run()){  //validasi
            $masuk->save();
            $this->session->set_flashdata('success','Data Berhasil Disimpan');
        }
        $data['content'] = $this->db->get('tb_kategori');
        $this->load->view('admin/surat/masuk/new_form',$data);

    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/masuk');
       
        $masuk = $this->SuratMasuk_model;
        $validation = $this->form_validation;
        $validation->set_rules($masuk->rules());

        if ($validation->run()) {
            $masuk->update();
            $this->session->set_flashdata('success', 'Data Berhasil disimpan');
        }

        $data['surat_masuk'] = $masuk->getById($id);
        if (!$data['surat_masuk']) show_404();
        
        $data['content'] = $this->db->get('tb_kategori');
        $this->load->view('admin/surat/masuk/edit_form', $data);
    }

    public function delete()
    {   $id = $this->input->post("id");
        if (!isset($id)) show_404();
            
        if ($this->SuratMasuk_model->delete($id)) {
            redirect(site_url('admin/masuk'));
        }
    }

    public function print($id_masuk = null)
    {
        $this->db->where('id_masuk',$id_masuk);
        $data['surat_masuk'] = $this->db->query("SELECT file FROM `tb_surat_masuk` WHERE id_masuk='$id_masuk'");
        $this->load->view('admin/surat/masuk/print', $data);
    }

    public function detail($id_masuk = null)
    {   
        $this->db->where('id_masuk',$id_masuk);
        $data['surat_masuk'] = $this->db->query("SELECT * FROM `tb_surat_masuk` WHERE id_masuk='$id_masuk'");

        $this->load->view('admin/surat/masuk/detail', $data);
    }

}