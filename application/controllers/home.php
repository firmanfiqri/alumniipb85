<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('m_daftar');
		
		if($this->session->userdata('is_logged_in')){
			redirect(base_url()."alumni");
		}
    }
	
    public function index() {
		
		$data['queryfakultas'] = $this->m_daftar->getAllFakultas()->result();
		$data['queryjurusan'] = $this->m_daftar->getAllJurusan()->result();
		$data['queryprodi'] = $this->m_daftar->getAllProdi()->result();
		
        $this->load->view('layout/header');
        $this->load->view('layout/navbar_login');
        $this->load->view('v_home',$data);
        $this->load->view('layout/footer');
    }
	
	public function ambil_daftar()
	{	
		$nama_lengkap =  $this->input->post('nama_lengkap');
		$nrp =  $this->input->post('nrp');
		$jenis_kelamin =  $this->input->post('jenis_kelamin');
		$prodi =  $this->input->post('prodi');
		$email =  $this->input->post('email');
		$password =  $this->input->post('password');
		
		$this->m_daftar->insertAlumni($nama_lengkap, $nrp, $jenis_kelamin, $prodi, $email, $password);
		
		echo "<script type='text/javascript'>alert('Selamat anda berhasil mendaftar!');
		window.location.href='".base_url()."';
		</script>";
		
	}

}
