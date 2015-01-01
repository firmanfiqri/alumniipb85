<?php

class m_daftar extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //SELECT
    public function getAllFakultas() {
        $query = $this->db->query("select * from fakultas;");
        return $query;
    }

    public function getAllJurusan() {
        $query = $this->db->query("select * from jurusan;");
        return $query;
    }

    public function getAllProdi() {
        $query = $this->db->query("select * from prodi;");
        return $query;
    }

    public function getAlumniById($email) {
        $query = $this->db->query("select * from alumni where email='$email';");
        return $query;
    }
	
	public function getAllEvent() {
        $query = $this->db->query("select * from event where tanggal_event >= NOW() order by tanggal_event asc limit 4;");
        return $query;
    }

    //INSERT & UPDATE
    public function insertAlumni($nama_lengkap, $nrp, $jenis_kelamin, $prodi, $email, $password) {
        $query = $this->db->query("insert into alumni (nama_alumni,nrp,jenis_kelamin,id_prodi,email,password) values('$nama_lengkap', '$nrp', '$jenis_kelamin', '$prodi', '$email', '$password');");
        return $query;
    }
    
    public function cekEmail($email){        
        $query = $this->db->query("select * from alumni where email='$email'");
        return $query->num_rows();
    }
    
    public function getIdByEmail($email){
        $query = $this->db->query("select id_alumni from alumni where email='$email'");
        $hasil = $query->row();
        return $hasil->id_alumni;
    }
    
    public function cekNRP($nrp){        
        $query = $this->db->query("select * from alumni where nrp='$nrp'");
        return $query->num_rows();
    }
    
     public function updateKodeAktivasi($id,$kode_verifikasi){
        $query = $this->db->query("update alumni set status='$kode_verifikasi' where id_alumni='$id'"); 
     }
     
     public function aktivasiAkun($id){
        $query = $this->db->query("update alumni set status='0' where id_alumni='$id'"); 
     }

}
