<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Keluar_model extends CI_Model
{
    private $table = 'tb_surat_keluar';
    private $category = 'tb_kategori';

    public $id_keluar              ;
    public $kode            ;
    public $isi             ;
    public $tujuan          ;
    public $no_surat        ;
    public $tgl_surat       ;
    public $tgl_catat       ;
    public $keterangan      ='';
    public $file            ='';
    public $pengolah        ='1';

    public function rules()
    {
        return[
            ['field'    => 'kode',
             'label'    => 'Kode',
             'rules'    => 'required'],

            ['field'    => 'isi',
             'label'    => 'Isi',
             'rules'    => 'required'],

            ['field'    => 'tujuan',
             'label'    => 'Tujuan',
             'rules'    => 'required'],

            ['field'    => 'no_surat',
             'label'    => 'No Surat',
             'rules'    => 'trim'],

            ['field'    => 'tgl_surat',
             'label'    => 'Tanggal Surat',
             'rules'    => 'required'],

             ['field'    => 'tgl_catat',
              'label'    => 'Tanggal Catat',
              'rules'    => 'required'],

            ['field'     => 'keterangan',
             'label'     => 'Keterangan',
             'rules'     => 'trim'],
            
            ['field'     => 'file',
             'label'     => 'File',
             'rules'     => 'trim']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function getCategory()
    {
        return $this->db->get($this->category)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table,["id_keluar"=>$id])->row();
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
        $data = $this->db->query("select id_keluar as id from tb_surat_keluar order by id_keluar desc limit 1 ") ;
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
        
        $this->kode             = $post['kode'];
        $this->isi              = $post['isi'];
        $this->tujuan           = $post['tujuan'];
        $this->no_surat         = $id."/".$post['kode']."/IS"."/".$bln."/".$thn;
        $this->tgl_surat        = $post['tgl_surat'];
        $this->tgl_catat        = $post['tgl_catat'];
        $this->keterangan       = $post['keterangan'];
        $this->file             = $this->_uploadFile();
        $this->db->insert($this->table,$this);
    }

    public function update()
    {
        $data = $this->db->query("select id_keluar as id from tb_surat_keluar order by id_keluar desc limit 1 ") ;
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
        $this->id_keluar        = $post["id"];
        $this->kode             = $post['kode'];
        $this->isi              = $post['isi'];
        $this->tujuan           = $post['tujuan'];
        $this->no_surat         = $id."/".$post['kode']."/IS"."/".$bln."/".$thn;
        $this->tgl_surat        = $post['tgl_surat'];
        $this->tgl_catat        = $post['tgl_catat'];
        $this->keterangan       = $post['keterangan'];
        
        if (!empty($_FILES["file"]["name"])) {
            $this->file = $this->_uploadFile();
        } else {
            $this->file = $post["old_file"];
        }

        $this->db->update($this->table, $this, array('id_keluar' => $post['id']));
    }

    public function delete($id)
    {
        $this->_deleteFile($id);
        $this->_deleteImage($id);
        return $this->db->delete($this->table,array('id_keluar'=> $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/gambar/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = uniqid();
        $config['overwrite']			= true;
        $config['max_size']             = 2048; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }

    private function _uploadFile()
    {
        $config['upload_path']          = './upload/file/';
        $config['allowed_types']        = 'docx|pdf|zip|txt|gif|jpg|png';
        $config['file_name']            = uniqid();
        $config['overwrite']			= true;
        $config['max_size']             = 2048; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data("file_name");
        }

        return 'Tidak Ada File';
    }

    private function _deleteImage($id)
    {
        $keluar = $this->getById($id);
        if ($keluar->image != "default.jpg") {
            $filename = explode(".", $keluar->image)[0];
            return array_map('unlink', glob(FCPATH."upload/gambar/$filename.*"));
        }
    }

    private function _deleteFile($id)
    {
        $keluar = $this->getById($id);
        if ($keluar->image) {
            $filename = explode(".",$keluar->file)[0];
            return array_map('unlink',glob(FCPATH."upload/file/$filename.*"));
        }
    }
}
?>