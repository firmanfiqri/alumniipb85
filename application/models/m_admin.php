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
	
	public function getAllEvent() {
        $query = $this->db->query("select * from event;");
        return $query;
    }
	
	public function getEvent($id_event) {
        $query = $this->db->query("select * from event where id_event='$id_event';");
        return $query;
    }
	
	public function getAllPembayaran($id_event) {
        $query = $this->db->query("select * from peserta_event where id_event='$id_event';");
        return $query;
    }
	
	public function getPembayaran($id_peserta_event) {
        $query = $this->db->query("select a.email, a.nama_alumni, pe.no_registrasi, e.nama_event from peserta_event pe, event e, alumni a where pe.id_peserta_event='$id_peserta_event' and pe.id_event=e.id_event and pe.id_alumni=a.id_alumni;");
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
	
	public function deleteAlumniLink($id_alumni) {
        $query = $this->db->query("delete from peserta_event where id_alumni='$id_alumni';");
        return $query;
    }
	
	public function hapusFoto($id) {
        $query = $this->db->query("select foto_event from event where id_event = '$id'");
        $hasil = $query->row();
        if ($hasil->foto_event != "") {
            $foto_sebelum = "." . $hasil->foto_event;
            unlink($foto_sebelum);
            $query = $this->db->query("update event e set e.foto_event = NULL where e.id_event = '$id'");
        }
    }
	
	public function updateFoto($id, $foto) {
        $query = $this->db->query("update event e set e.foto_event = '$foto' where e.id_event = '$id'");
    }
	
	public function insertEvent($nama_event, $deskripsi, $tanggal_event, $tempat_event, $file_target, $biaya, $keterangan) {
        $query = $this->db->query("insert into event (nama_event,deskripsi,tanggal_event,tempat_event,foto_event,biaya,keterangan) values ('$nama_event', '$deskripsi', '$tanggal_event', '$tempat_event', '$file_target', '$biaya', '$keterangan');");
        return $query;
    }
	
	public function updateEvent($id_event, $nama_event, $deskripsi, $tanggal_event, $tempat_event, $biaya, $keterangan) {
        $query = $this->db->query("update event set nama_event='$nama_event', deskripsi='$deskripsi', tanggal_event='$tanggal_event', tempat_event='$tempat_event', biaya='$biaya', keterangan='$keterangan' where id_event='$id_event';");
        return $query;
    }
	
	public function deleteEvent($id_event) {
        $query = $this->db->query("delete from event where id_event='$id_event';");
        return $query;
    }
	
	public function deleteEventLink($id_event) {
        $query = $this->db->query("delete from peserta_event where id_event='$id_event';");
        return $query;
    }
	
	public function updateStatusBayar($id_peserta_event) {
        $query = $this->db->query("update peserta_event set status_pembayaran=2 where id_peserta_event='$id_peserta_event';");
        return $query;
    }
	
}
