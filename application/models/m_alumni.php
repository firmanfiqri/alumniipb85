<?php

class m_alumni extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    public function getFakultas() {
        $query = $this->db->query("select * from fakultas");
        return $query->result();
    }
    
    public function getJurusan() {
        $query = $this->db->query("select * from jurusan");
        return $query->result();
    }
    
    public function getProdi() {
        $query = $this->db->query("select * from prodi");
        return $query->result();
    }    
    
    public function getProfileAlumni($id) {
        $query = $this->db->query("select * from alumni a, prodi p, jurusan j, fakultas f where a.id_alumni = $id and a.id_prodi = p.id_prodi and p.id_jurusan = j.id_jurusan and j.id_fakultas = f.id_fakultas ");
        return $query->row();
    }
    
}
?>
