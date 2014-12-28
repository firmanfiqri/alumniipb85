<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('m_daftar');
    }
	
    public function index() {
		
		$data['queryfakultas'] = $this->m_daftar->getAllFakultas()->result();
		$data['queryjurusan'] = $this->m_daftar->getAllProvinsi()->result();
		$data['queryprodi'] = $this->m_daftar->getAllProvinsi()->result();
		
        $this->load->view('layout/header');
        $this->load->view('layout/navbar_login');
        $this->load->view('v_home');
        $this->load->view('layout/footer');
    }
	
	public function ambil_daftar()
	{	
		$nama_lengkap =  $this->input->post('nama_lengkap');
		$nrp =  $this->input->post('nrp');
		
		
		//$this->m_perusahaan->insertPerusahaan($id_perusahaan, $nama_perusahaan, $nama_grup, $id_pulau, $id_provinsi, $kabupaten, $luas_il, $tanggal_il, $luas_hgu, $tanggal_hgu, $substrat, $tanggal_pelaksanaan, $kordinat_lat, $kordinat_long, $foto_hcv);
		
	}

}
