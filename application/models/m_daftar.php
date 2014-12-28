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
	
	//INSERT & UPDATE
	
	
}
