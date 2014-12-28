<?php

class m_alumni extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getFakultas() {
        $query = $this->db->query("select * from fakultas order by nama_fakultas");
        return $query->result();
    }

    public function getJurusan() {
        $query = $this->db->query("select * from jurusan order by nama_jurusan");
        return $query->result();
    }

    public function getProdi() {
        $query = $this->db->query("select * from prodi order by nama_prodi");
        return $query->result();
    }

    public function getProfileAlumni($id) {
        $query = $this->db->query("select * from alumni a, prodi p, jurusan j, fakultas f where a.id_alumni = $id and a.id_prodi = p.id_prodi and p.id_jurusan = j.id_jurusan and j.id_fakultas = f.id_fakultas ");
        return $query->row();
    }

    public function cetNRPAlumni($nrp, $id) {
        $query = $this->db->query("select * from alumni where nrp = '$nrp' and id_alumni <> '$id'");
        return $query->num_rows();
    }

    public function updateDataAlumni($id, $nl, $np, $jk, $nrp, $kel, $prodi, $hp, $email, $profesi, $rumah, $kantor, $bidang) {
        $query = $this->db->query("update alumni a set a.nama_alumni = '$nl', a.nama_panggilan = '$np', a.jenis_kelamin='$jk', a.nrp='$nrp', a.kelompok='$kel', a.id_prodi='$prodi', a.alamat_rumah='$rumah', a.alamat_kantor = '$kantor', a.no_hp='$hp', a.email='$email', a.profesi = '$profesi', a.bidang_keahlian = '$bidang' where a.id_alumni = '$id'");
    }

    public function hapusFoto($id) {
        $query = $this->db->query("select foto from alumni where id_alumni = '$id'");
        $hasil = $query->row();
        if ($hasil->foto != "") {
            $foto_sebelum = "." . $hasil->foto;
            unlink($foto_sebelum);
            $query = $this->db->query("update alumni a set a.foto = NULL where a.id_alumni = '$id'");
        }
    }

    public function updateFoto($id, $foto) {
        $target = substr($foto, 1);
        $query = $this->db->query("update alumni a set a.foto = '$target' where a.id_alumni = '$id'");
    }

    public function updatePassword($id, $pass) {
        $query = $this->db->query("update alumni a set a.password = '$pass' where a.id_alumni = '$id'");
    }
    
    public function getAllEvent() {
        $query = $this->db->query("select * from event order by tanggal_event desc");
        return $query->result();
    }
    
    public function getListEvent() {
        $query = $this->db->query("select * from event where tanggal_event > NOW() order by tanggal_event desc");
        return $query->result();
    }
    
    public function getEvent($id) {
        $query = $this->db->query("select * from event where id_event = '$id'");
        return $query->row();
    }

}

?>
