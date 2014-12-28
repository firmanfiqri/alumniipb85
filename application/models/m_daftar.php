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

	//INSERT & UPDATE
	public function insertAlumni($nama_lengkap, $nrp, $jenis_kelamin, $prodi, $email, $password) {
        $query = $this->db->query("insert into alumni (nama_alumni,nrp,jenis_kelamin,id_prodi,email,password) values('$nama_lengkap', '$nrp', '$jenis_kelamin', '$prodi', '$email', '$password');");
        return $query;
    }
	
}
