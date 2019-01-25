<?php
defined('BASEPATH') OR ('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['users'] = $this->users_model->getAll();
        // $this->load->view('pimpinan/dashboard',$data);
        $this->load->view('admin/users/list', $data);
    }

    public function add()
    {
        $user       = $this->users_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if($validation->run()){
            $user->save();
            $this->session->set_flashdata('success','ntabs Soul');

        }

        $this->load->view('admin/users/new_form');   
    }

    public function edit($id = NULL)
    {
        $this->db->where('user_id',$id);
        $data['content']=$this->db->get('tb_users');
        $this->load->view('admin/users/edit_form',$data);
        
    }

   public function proses_edit($id='')
   {
    $username=$this->input->post('username');
    $email=$this->input->post('email');
    $password=$this->input->post('password');

    $data=array(
        'username'=>$username,
        'email'=>$email,
        'password'=>$password
    );
    $this->db->where('user_id',$id);
    $this->db->update('tb_users',$data);
    redirect('admin/users','refresh');
   }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
            
        if ($this->users_model->delete($id)) {
            redirect(site_url('admin/users'));
        }
    }

    
}