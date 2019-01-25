<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class SuratMasuk_model extends CI_Model{

    private $table = 'tb_surat_masuk';

    public $id_masuk        ;
    public $kode            ;
    public $isi_surat       ;
    public $dari            ;
    public $no_surat        = '';
    public $tgl_surat       ;
    public $tgl_diterima    ;
    public $keterangan      = '';
    public $file            = '';
    public $pengolah        = '';

    public function rules()
    {
        return[
            ['field'    => 'kode',
             'label'    => 'Kode',
             'rules'    => 'required'],

            ['field'    => 'isi_surat',
             'label'    => 'Isi Surat',
             'rules'    => 'required'],

            ['field'    => 'dari',
             'label'    => 'Dari',
             'rules'    => 'required'],

            ['field'    => 'no_surat',
             'label'    => 'No Surat',
             'rules'    => 'trim'],

            ['field'    => 'tgl_surat',
             'label'    => 'TanggalSurat',
             'rules'    => 'required'],

            ['field'    => 'tgl_diterima',
             'label'    => 'TanggalDiterima',
             'rules'    => 'required'],

            ['field'    => 'keterangan',
             'label'    => 'Keterangan',
             'rules'    => 'trim'],

            ['field'    => 'file',
             'label'    => 'File',
             'rules'    => 'trim']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table,["id_masuk"=>$id])->row();
    }

    function roman($number) {
        $number = (int)$number;
        $roman = array(
            1=>"I",
            2=>"II",
            3=>"III",
            4=>"IV",
            5=>"V",
            6=>"VI",
            7=>"VII",
            8=>"VIII",
            9=>"IX",
            10=>"X",
            11=>"XI",
            12=>"XII"
        );
        return $roman[$number];
    }

    public function save()
    {
        $data = $this->db->query("select id_masuk as id from tb_surat_masuk order by id_masuk desc limit 1 ") ;
            if($data){
                $data=$data->result();
                if(!empty($data)){
                    $id = $data[0]->id+1 ;
                }else{
                    $id= 1 ;
                }
            }else{
                $id = 1 ;
            }
        $post = $this->input->post();   
        $bln = $this->roman(date("m",strtotime($post['tgl_surat'])));
        $thn = date("Y",strtotime($post['tgl_surat']));
        $post = $this->input->post();
        $this->kode              = $post['kode'];
        $this->isi_surat         = $post['isi_surat'];
        $this->dari              = $post['dari'];
        $this->no_surat          = $id."/".$post['kode']."/IS"."/".$bln."/".$thn;
        $this->tgl_surat         = $post['tgl_surat'];
        $this->tgl_diterima      = $post['tgl_diterima'];
        $this->keterangan        = $post['keterangan'];
        $this->file              = $this->_uploadFile();

        $this->db->insert($this->table,$this);
    }

    public function update()
    {
        $data = $this->db->query("select id_masuk as id from tb_surat_masuk order by id_masuk desc limit 1 ") ;
            if($data){
                $data=$data->result();
                if(!empty($data)){
                    $id = $data[0]->id+1 ;
                }else{
                    $id= 1 ;
                }
            }else{
                $id = 1 ;
            }
        $post = $this->input->post();   
        $bln = $this->roman(date("m",strtotime($post['tgl_surat'])));
        $thn = date("Y",strtotime($post['tgl_surat']));
        $post = $this->input->post();
        $this->id_masuk          = $post["id"];
        $this->kode              = $post['kode'];
        $this->isi_surat         = $post['isi_surat'];
        $this->dari              = $post['dari'];
        $this->no_surat          = $id."/".$post['kode']."/IS"."/".$bln."/".$thn;
        $this->tgl_surat         = $post['tgl_surat'];
        $this->tgl_diterima      = $post['tgl_diterima'];
        $this->keterangan        = $post['keterangan'];
        
        if (!empty($_FILES["file"]["name"])) {
            $this->file = $this->_uploadFile();
        } else {
            $this->file = $post["old_file"];
        }

        $this->db->update($this->table, $this, array('id_masuk' => $post['id']));
    }

    private function _noSurat()
    {
        echo "kentel";
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        $this->_deleteFile($id); 
        return $this->db->delete($this->table,array('id_masuk'=> $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/gambar/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id_masuk;
        $config['overwrite']			= true;
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }


    private function _uploadFile()
    {
        $config['upload_path']          = './upload/file/';
        $config['allowed_types']        = 'docx|pdf|zip|txt|png|jpg|gif';
        $config['file_name']            = uniqid();
        $config['overwrite']			= true;
        $config['max_size']             = 2048;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data("file_name");
        }

        return 'Kosong';
    }

    private function _deleteImage($id)
    {
        $masuk = $this->getById($id);
        if ($masuk->image != "default.jpg") {
            $filename = explode(".", $masuk->image)[0];
            return array_map('unlink', glob(FCPATH."upload/gambar/$filename.*"));
        }
    }

    private function _deleteFile($id)
    {
        $masuk = $this->getById($id);
        if ($masuk->file ) {
            $filename = explode(".", $masuk->file)[0];
            return array_map('unlink', glob(FCPATH."upload/file/$filename.*"));
        }
    }
}