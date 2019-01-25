<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Users_model extends CI_Model{

    private $_table = 'tb_users';

    public $user_id         ;
    public $username       ;
    public $email      ;
    public $password   ;
    public $level       ='2';   

    public function rules()
    {
        return[
            ['field'    => 'username',
             'label'    => 'Username',
             'rules'    => 'required'],

            ['field'    => 'email',
             'label'    => 'Email',
             'rules'    => 'required'],

            ['field'    => 'password',
             'label'    => 'Password',
             'rules'    => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table,['user_id'=>$id])->row();
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table,array('user_id'=>$id));
        
    }

    public function save()
    {
        $post = $this->input->post();
        $this->username      = $post['username'];
        $this->email         = $post['email'];
        $this->password      = $post['password'];
        $this->db->insert($this->_table,$this);
    }


}