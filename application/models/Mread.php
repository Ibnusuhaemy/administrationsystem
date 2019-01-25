<?php    
class Mread extends CI_Model{

    private $table1 = "tb_surat_masuk";
    private $table2 = "tb_surat_keluar";
    function report(){
        $query = $this->db->query("SELECT COUNT(id_keluar) AS jumlah, tgl_surat as bulan from tb_surat_keluar GROUP BY YEAR(tgl_surat),MONTH(tgl_surat)");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function report1(){
        $query = $this->db->query("SELECT COUNT(id_masuk) AS jumlah, tgl_surat as bulan from tb_surat_masuk GROUP BY YEAR(tgl_surat),MONTH(tgl_surat)");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function getAll(){
        $query = $this->db->query("SELECT * FROM tb_surat_masuk,tb_surat_keluar WHERE tb_surat_masuk.id_masuk=tb_surat_keluar.id_keluar");

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}
//SELECT(Select SUM(pengolah) as desember From tb_surat_keluar where tgl_surat BETWEEN '2018-12-01' AND '2018-12-31'), (Select SUM(pengolah) as januari From tb_surat_keluar where tgl_surat BETWEEN '2018-01-01' AND '2018-01-31' )
//SELECT COUNT(id_keluar) AS jumlah, MONTH(tgl_surat) as bulan from tb_surat_keluar GROUP BY MONTH(tgl_surat)
//