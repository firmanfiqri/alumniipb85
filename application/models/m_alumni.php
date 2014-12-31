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
        $query = $this->db->query("update alumni a set a.nama_alumni = '$nl', a.nama_panggilan = '$np', a.jenis_kelamin='$jk', a.nrp='$nrp', a.kelompok='$kel', a.id_prodi='$prodi', a.alamat_rumah='$rumah', a.alamat_kantor = '$kantor', a.no_hp='$hp', a.email='$email', a.profesi = '$profesi', a.bidang_keahlian = '$bidang', a.status = 1 where a.id_alumni = '$id'");
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
    
    public function getJumlahPesertaEvent($id) {
        $query = $this->db->query("select * from peserta_event where id_event = $id");
        return $query->num_rows();
    }
    
    public function tambahPesertaEvent($id_alumni,$id_event,$noreg,$dewasa,$anak,$tgl_tiba) {
        $query = $this->db->query("insert into peserta_event(id_alumni,id_event,no_registrasi,jumlah_dewasa,jumlah_anak,tanggal_tiba)values('$id_alumni','$id_event','$noreg','$dewasa','$anak','$tgl_tiba')");
    }
    
    public function getHistoryEvent($id_alumni){
        $query = $this->db->query("select * from peserta_event p, event e where p.id_event=e.id_event and p.id_alumni = $id_alumni");
        return $query->result();
    }
    
    public function cekNoreg($noreg){
        $query = $this->db->query("select * from peserta_event p where p.no_registrasi = '$noreg'");
        return $query->num_rows();
    }
    
    public function getDetailPeserta($noreg){
        $query = $this->db->query("select * from peserta_event p, event e where p.id_event=e.id_event and p.no_registrasi = '$noreg'");
        return $query->row();
    }
    
    public function setKonfirmasiPembayaran($id_peserta_event,$bank_kami,$atas_nama,$jumlah_transfer,$tgl_transfer){
        $query = $this->db->query("update peserta_event p set p.bank_kami = '$bank_kami', p.jumlah_transfer='$jumlah_transfer', p.atas_nama='$atas_nama',p.tanggal_transfer='$tgl_transfer',p.status_pembayaran='1' where p.id_peserta_event='$id_peserta_event'");
    }
    
    public function setBuktiPembayaran($id_peserta_event,$file_target){
        $query = $this->db->query("update peserta_event p set p.bukti_foto='$file_target',p.status_pembayaran='1' where p.id_peserta_event='$id_peserta_event'");
    }
    

}

?>
