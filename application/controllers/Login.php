<?php

class Login extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('login_model');
    }

    function index()
    {
        $this->load->view('login_view');
    }

    function auth()
    {
        $username   = $this->input->post('username',TRUE);
        $password   = $this->input->post('password',TRUE);
        $validate   = $this->login_model->validate($username,$password);
        if ($validate->num_rows() > 0 )
        {
            $data   = $validate->row_array();
            $name   = $data['username'];
            $email  = $data['email'];
            $level  = $data['level'];
            $sesdata= array(
                'username'  => $name,
                'email'     => $email,
                'level'     => $level,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sesdata);

            if($level == 1)
            {
                redirect('admin/overview/dashboard');
            }
            else {
                redirect('user');
            }
        }
        else{
            echo $this->session->set_flashdata('msg','Username Atau Password Salah');
            redirect('login');
        }
    }

    function log_out()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
?>