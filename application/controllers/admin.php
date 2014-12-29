<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->model('m_admin');
		$this->load->model('m_alumni');
		
    }
	
	public function header($lv) {
        $data['lv'] = $lv;
        $this->load->view('layout/header');
        $this->load->view('layout/navbar_admin', $data);
    }
	
	public function index() {
        
		$data['queryalumni'] = $this->m_admin->getAllAlumni()->result();
		
		$this->header(1);
        $this->load->view('admin/v_kelola_alumni',$data);
        $this->load->view('layout/footer');
    }
	
	public function detail_profile($id_alumni) {
        $data['data_profile'] = $this->m_alumni->getProfileAlumni($id_alumni);
		
		$this->header(1);
        $this->load->view('admin/v_profile',$data);
        $this->load->view('layout/footer');
    }
	
	public function reset_password($id_alumni) {
	
		$ambilquery = $this->m_admin->getEmailById($id_alumni)->row();
		$email = $ambilquery->email;
		
        $this->m_admin->updatePassword($id_alumni, $email);
		
		echo "<script type='text/javascript'>alert('Password telah direset!');
		window.location.href='".base_url()."admin';
		</script>";
    }
	
	public function hapus_alumni($id_alumni) {
	
        $this->m_admin->deleteAlumni($id_alumni);
		
		echo "<script type='text/javascript'>alert('Data alumni telah dihapus!');
		window.location.href='".base_url()."admin';
		</script>";
    }
	
	public function event() {
        $data['queryevent'] = $this->m_admin->getAllEvent()->result();
		
		$this->header(2);
		$this->load->view('admin/v_kelola_event',$data);
        $this->load->view('layout/footer');
    }
	
	public function add_event() {
        $nama_event =  $this->input->post('nama_event');
        $deskripsi =  $this->input->post('deskripsi');
        $tanggal_event =  $this->input->post('tanggal_event');
        $tempat_event =  $this->input->post('tempat_event');
        $keterangan =  $this->input->post('keterangan');
		
		//Ubah Foto
		if ($_FILES['foto']['name']!="") {
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
		
		$this->m_admin->insertEvent($nama_event, $deskripsi, $tanggal_event, $tempat_event, $file_target, $keterangan);
		
		echo "<script type='text/javascript'>alert('Anda berhasil menambahkan event!');
		window.location.href='".base_url()."admin/event';
		</script>";
    }
	
	public function lihat_edit_event($id_event) {
        $data['editevent'] = $this->m_admin->getEvent($id_event)->row();
		
		$this->header(2);
		$this->load->view('admin/v_edit_event',$data);
        $this->load->view('layout/footer');
    }
	
	public function edit_event() {
        $id_event =  $this->input->post('id_event');
        $nama_event =  $this->input->post('nama_event');
        $deskripsi =  $this->input->post('deskripsi');
        $tanggal_event =  $this->input->post('tanggal_event');
        $tempat_event =  $this->input->post('tempat_event');
        $keterangan =  $this->input->post('keterangan');
		
		//Ubah Foto
		if ($_FILES['foto']['name']!="") {
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
		
		$this->m_admin->updateEvent($id_event, $nama_event, $deskripsi, $tanggal_event, $tempat_event, $keterangan);
		
		echo "<script type='text/javascript'>alert('Anda berhasil mengubah event!');
		window.location.href='".base_url()."admin/event';
		</script>";
    }
	
	public function detail_event($id_event) {
		$data['event'] = $this->m_admin->getEvent($id_event)->row();
		
        $this->header(2);
		$this->load->view('admin/v_detil_event',$data);
        $this->load->view('layout/footer');
	}
	
	public function hapus_event($id_event) {
	
        $this->m_admin->deleteEvent($id_event);
		
		echo "<script type='text/javascript'>alert('Data event telah dihapus!');
		window.location.href='".base_url()."admin/event';
		</script>";
    }
	
	public function konfirmasi_pembayaran() {
        $this->header(3);
		$this->load->view('admin/v_kelola_pembayaran');
        $this->load->view('layout/footer');
	}
	
	public function detail_pembayaran() {
        $this->header(3);
		$this->load->view('admin/v_detail_pembayaran');
        $this->load->view('layout/footer');
	}
	
}
