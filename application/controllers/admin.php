<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_alumni');

        if (!$this->session->userdata('is_logged_in')) {
            redirect(base_url());
        } else if ($this->session->userdata('is_logged_in')) {
            if ($this->session->userdata('status') != -1) {
                redirect(base_url() . "alumni");
            }
        }
    }

    public function header($lv) {
        $data['lv'] = $lv;
        $this->load->view('layout/header');
        $this->load->view('layout/navbar_admin', $data);
    }

    public function index() {

        $data['queryalumni'] = $this->m_admin->getAllAlumni()->result();

        $this->header(1);
        $this->load->view('admin/v_kelola_alumni', $data);
        $this->load->view('layout/footer');
    }

    public function detail_profile($id_alumni) {
        $data['data_profile'] = $this->m_alumni->getProfileAlumni($id_alumni);

        $this->header(1);
        $this->load->view('admin/v_profile', $data);
        $this->load->view('layout/footer');
    }

    public function reset_password() {

        $id_alumni = $this->input->post('id_alumni_reset');

        $ambilquery = $this->m_admin->getEmailById($id_alumni)->row();
        $email = md5($ambilquery->email);

        $this->m_admin->updatePassword($id_alumni, $email);

        echo "<script type='text/javascript'>alert('Password telah direset!');
		window.location.href='" . base_url() . "admin';
		</script>";
    }

    public function hapus_alumni() {

        $id_alumni = $this->input->post('id_alumni_hapus');

        $this->m_admin->deleteAlumniLink($id_alumni);
        $this->m_admin->deleteAlumni($id_alumni);

        echo "<script type='text/javascript'>alert('Data alumni telah dihapus!');
		window.location.href='" . base_url() . "admin';
		</script>";
    }

    public function event() {
        $data['queryevent'] = $this->m_admin->getAllEvent()->result();

        $this->header(2);
        $this->load->view('admin/v_kelola_event', $data);
        $this->load->view('layout/footer');
    }

    public function add_event() {
        $nama_event = $this->input->post('nama_event');
        $deskripsi = $this->input->post('deskripsi');
        $tanggal_event = $this->input->post('tanggal_event');
        $tempat_event = $this->input->post('tempat_event');
        $biaya = $this->input->post('biaya');
        $keterangan = $this->input->post('keterangan_event');
        $kategori = $this->input->post('kategori');
		$file_target = "";
        //Ubah Foto
        if ($_FILES['foto']['name'] != "") {
            $foto = $_FILES['foto'];

            $dir = './assets/foto/event/';
            if (!file_exists($dir)) {
                mkdir($dir);
            }

            $start = strpos($_FILES['foto']['type'], "/");
            $type = substr($_FILES['foto']['type'], ($start + 1));
            $file_target = $dir . time() . "." . $type;

            move_uploaded_file($_FILES['foto']['tmp_name'], $file_target);

            $file_target = substr($file_target, 1);
        }

		$this->m_admin->insertEvent($nama_event, $deskripsi, $tanggal_event, $tempat_event, $file_target, $biaya, $keterangan, $kategori);

        echo "<script type='text/javascript'>alert('Anda berhasil menambahkan event!');
		window.location.href='" . base_url() . "admin/event';
		</script>";
    }

    public function lihat_edit_event($id_event) {
        $data['editevent'] = $this->m_admin->getEvent($id_event)->row();

        $this->header(2);
        $this->load->view('admin/v_edit_event', $data);
        $this->load->view('layout/footer');
    }

    public function edit_event() {
        $id_event = $this->input->post('id_event');
        $nama_event = $this->input->post('nama_event');
        $deskripsi = $this->input->post('deskripsi');
        $tanggal_event = $this->input->post('tanggal_event');
        $tempat_event = $this->input->post('tempat_event');
        $biaya = $this->input->post('biaya');
        $keterangan = $this->input->post('keterangan_event');
        $kategori = $this->input->post('kategori');

        //Ubah Foto
        if ($_FILES['foto']['name'] != "") {
            $foto = $_FILES['foto'];

            $dir = './assets/foto/event/';
            if (!file_exists($dir)) {
                mkdir($dir);
            }

            $start = strpos($_FILES['foto']['type'], "/");
            $type = substr($_FILES['foto']['type'], ($start + 1));
            $file_target = $dir . time() . "." . $type;

            $this->m_admin->hapusFoto($id_event);
            move_uploaded_file($_FILES['foto']['tmp_name'], $file_target);

            $file_target = substr($file_target, 1);
            $this->m_admin->updateFoto($id_event, $file_target);
        }

        $this->m_admin->updateEvent($id_event, $nama_event, $deskripsi, $tanggal_event, $tempat_event, $biaya, $keterangan, $kategori);

        echo "<script type='text/javascript'>alert('Anda berhasil mengubah event!');
		window.location.href='" . base_url() . "admin/event';
		</script>";
    }

    public function detail_event($id_event) {
        $data['event'] = $this->m_admin->getEvent($id_event)->row();

        $this->header(2);
        $this->load->view('admin/v_detil_event', $data);
        $this->load->view('layout/footer');
    }

    public function hapus_event() {

        $id_event = $this->input->post('id_event_hapus');

        $this->m_admin->deleteEventLink($id_event);

        $this->m_admin->deleteEvent($id_event);

        echo "<script type='text/javascript'>alert('Data event telah dihapus!');
		window.location.href='" . base_url() . "admin/event';
		</script>";
    }

    public function konfirmasi_pembayaran() {

        if (!$this->input->post('id_event')) {
            $id_event = 4;
        } else {
            $id_event = $this->input->post('id_event');
        }

        $ambilquery = $this->m_admin->getEvent($id_event)->row();
        if (!$ambilquery) {
            $data['nama_event'] = "";
            $data['id_event'] = 0;
        } else {
            $data['nama_event'] = $ambilquery->nama_event;
            $data['id_event'] = $ambilquery->id_event;
        }

        $data['queryevent'] = $this->m_admin->getAllEvent()->result();
        $data['querypembayaran'] = $this->m_admin->getAllPembayaran($id_event)->result();

        $this->header(4);
        $this->load->view('admin/v_kelola_pembayaran', $data);
        $this->load->view('layout/footer');
    }

    public function konfirmasi_status() {
        $id_peserta_event = $this->input->post('id_peserta_event');

        $this->m_admin->updateStatusBayar($id_peserta_event);
		
		$ambilquery = $this->m_admin->getPembayaran($id_peserta_event)->row();

		$email = $ambilquery->email;
		$nama_lengkap = $ambilquery->nama_alumni;
		$noreg = $ambilquery->no_registrasi;
		$nama_event = $ambilquery->nama_event;
		
		$this->sendMail($email, $nama_lengkap, $noreg, $nama_event);

        echo "<script type='text/javascript'>alert('Pembayaran telah dikonfirmasi!');
		window.location.href='" . base_url() . "admin/data_peserta';
		</script>";	
    }

    public function detail_pembayaran() {
        $this->header(3);
        $this->load->view('admin/v_detail_pembayaran');
        $this->load->view('layout/footer');
    }
    
    private function sendMail($email, $nama_lengkap, $noreg, $event) {

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.mail.yahoo.com',
            'smtp_port' => 465,
            'smtp_user' => 'fadhilah.ilmi@yahoo.com',
            'smtp_pass' => 'Rahmanda10',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('fadhilah.ilmi@yahoo.com', 'Fadhilah');
        $this->email->to($email);

        $this->email->subject('Konfirmasi Pembayaran');
        $this->email->message("Hi $nama_lengkap,<br><br>Pembayaran untuk event $event dengan no registrasi $noreg telah kami konfirmasi.<br>Kami tunggu kehadiran anda.<br><br>Apabila ada pertanyaan silahkan hubungi admin@admin.com");

        $this->email->send();

        //echo $this->email->print_debugger();
    }
	
	public function kirim_notifikasi() {
		$id_alumni = $this->input->post('id_alumni_notifikasi');
		$status_notifikasi = $this->input->post('status_notifikasi');
		
        $ambilquery = $this->m_admin->getEmailById($id_alumni)->row();
		$email = $ambilquery->email;
		$nama_lengkap = $ambilquery->nama_alumni;
		$kode_verifikasi = $ambilquery->status;
		
		if($status_notifikasi == 1){
			$pesan="Sebagai informasi, akun yang anda miliki belum melakukan pendaftaran <b>Acara Reuni Akbar IPB 1988</b>. Mohon segera lakukan pendaftaran.";
		}else if($status_notifikasi == 0){
			$pesan="Sebagai informasi, akun yang anda miliki belum melengkapi data profil yang dibutuhkan. Mohon segera melengkapi data profil.";
		}else{
			$pesan="Sebagai informasi, akun yang anda miliki belum melakukan aktivasi. Mohon segera lakukan aktivasi dengan mengakses tautan di bawah ini.<br><br><a href='" . base_url() . "aktivasi/akun/".$id_alumni."/".$kode_verifikasi."'><input type='button' value='Aktivasi' name='submit' id='submit' style='width:100px; height:30px;' /></a>";
		}
		
		$this->sendMail_notifikasi($email, $nama_lengkap, $pesan);
		
		redirect();
    }
	
	private function sendMail_notifikasi($email, $nama_lengkap, $pesan) {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.mail.yahoo.com',
            'smtp_port' => 465,
            'smtp_user' => 'fadhilah.ilmi@yahoo.com',
            'smtp_pass' => 'Rahmanda10',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('fadhilah.ilmi@yahoo.com', 'Fadhilah');
        $this->email->to($email);

        $this->email->subject('Pesan Notifikasi');
        $this->email->message("Hi $nama_lengkap,<br><br>$pesan<br><br>Apabila ada pertanyaan silahkan hubungi admin@admin.com");

        $this->email->send();

        //echo $this->email->print_debugger();
    }
	
	public function data_peserta() {

        if (!$this->input->post('id_event')) {
            $id_event = 4;
        } else {
            $id_event = $this->input->post('id_event');
        }

        $ambilquery = $this->m_admin->getEvent($id_event)->row();
        if (!$ambilquery) {
            $data['nama_event'] = "";
            $data['id_event'] = 0;
        } else {
            $data['nama_event'] = $ambilquery->nama_event;
            $data['id_event'] = $ambilquery->id_event;
        }
		
        $ambilquery = $this->m_admin->getAllPembayaran($id_event)->result();
		$nama_semua = array();
		$email_semua = array();
		foreach($ambilquery as $row){
			$nama_semua[] = $row->nama_alumni;
			$email_semua[] = $row->email;
		}
		
		$data['nama_semua'] = $nama_semua;
		$data['email_semua'] = $email_semua;
		$data['queryevent'] = $this->m_admin->getAllEvent()->result();
        $data['querypembayaran'] = $this->m_admin->getAllPembayaran($id_event)->result();
        
        $this->header(3);
        $this->load->view('admin/v_kelola_peserta', $data);
        $this->load->view('layout/footer');
    }
	
	public function kirim_notifikasi_event() {
		$id_alumni = $this->input->post('id_alumni_notifikasi');
		$status_notifikasi = $this->input->post('status_notifikasi');
		
        $ambilquery = $this->m_admin->getEmailById($id_alumni)->row();
		$email = $ambilquery->email;
		$nama_lengkap = $ambilquery->nama_alumni;
		//$kode_verifikasi = $ambilquery->status;
		
		if($status_notifikasi == 0){
			$pesan="Sebagai informasi, akun yang anda miliki belum melakukan pembayaran pada <b>Acara Reuni Akbar IPB 1988</b>. Mohon segera lakukan pembayaran, selanjutnya melakukan konfirmasi pembayaran.";
		}else{
			$pesan="Sebagai informasi, akun yang anda miliki belum melakukan konfirmasi. Mohon segera lakukan konfirmasi pembayaran secepatnya.<br><br>";
		}
		
		$this->sendMail_notifikasi($email, $nama_lengkap, $pesan);
		
		echo "<script type='text/javascript'>
		window.location.href='" . base_url() . "admin/data_peserta';
		</script>";	
    }
	
	public function email_semua() {
	
		$nama_event = $this->input->post('nama_event');
		$pesan = $this->input->post('pesan');
		$email_semua = unserialize($this->input->post('email_semua'));
		$nama_semua = unserialize($this->input->post('nama_semua'));
		
		$i = 0;
		for($i=0;$i<sizeof($email_semua);$i++){
			$this->sendMail_semua($email_semua[$i], $nama_semua[$i], $nama_event, $pesan);
		}
		
		echo "<script type='text/javascript'>
		window.location.href='" . base_url() . "admin/data_peserta';
		</script>";	
    }
	
	private function sendMail_semua($email, $nama_lengkap, $nama_event, $pesan) {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.mail.yahoo.com',
            'smtp_port' => 465,
            'smtp_user' => 'fadhilah.ilmi@yahoo.com',
            'smtp_pass' => 'Rahmanda10',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('fadhilah.ilmi@yahoo.com', 'Fadhilah');
        $this->email->to($email);

        $this->email->subject("Pesan Notifikasi ($nama_event)");
        $this->email->message("Hi $nama_lengkap,<br><br>$pesan<br><br>Apabila ada pertanyaan silahkan hubungi admin@admin.com");

        $this->email->send();

        //echo $this->email->print_debugger();
    }

}
