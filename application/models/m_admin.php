<?php

class m_admin extends CI_Model {

    function __construct() {
        parent::__construct();
    }
	
	//SELECT
	public function getAllAlumni() {
        $query = $this->db->query("select * from alumni a, fakultas f, jurusan j, prodi p where a.id_prodi=p.id_prodi and p.id_jurusan=j.id_jurusan and j.id_fakultas=f.id_fakultas;");
        return $query;
    }
	
	public function getEmailById($id_alumni) {
        $query = $this->db->query("select email from alumni where id_alumni='$id_alumni';");
        return $query;
    }
	
	//INSERT & UPDATE	
	public function updatePassword($id_alumni, $email) {
        $query = $this->db->query("update alumni set password='$email'where id_alumni='$id_alumni';");
        return $query;
    }
	
	public function deleteAlumni($id_alumni) {
        $query = $this->db->query("delete from alumni where id_alumni='$id_alumni';");
        return $query;
    }
	
}
