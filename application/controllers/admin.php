<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->model('m_admin');
		
    }
	
	public function index() {
        
		$data['queryalumni'] = $this->m_admin->getAllAlumni()->result();
		
		$this->load->view('layout/header');
        $this->load->view('layout/navbar_admin');
        $this->load->view('admin/v_kelola_alumni',$data);
        $this->load->view('layout/footer');
    }
	
	public function detail_profile() {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar_admin');
        $this->load->view('admin/v_profile');
        $this->load->view('layout/footer');
    }
	
	public function event() {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar_admin');
        $this->load->view('admin/v_kelola_event');
        $this->load->view('layout/footer');
    }
	
	public function edit_event() {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar_admin');
        $this->load->view('admin/v_edit_event');
        $this->load->view('layout/footer');
    }
	
	public function detail_event() {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar_admin');
        $this->load->view('admin/v_detil_event');
        $this->load->view('layout/footer');
	}
	
	public function konfirmasi_pembayaran() {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar_admin');
        $this->load->view('admin/v_kelola_pembayaran');
        $this->load->view('layout/footer');
	}
	
	public function detail_pembayaran() {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar_admin');
        $this->load->view('admin/v_detail_pembayaran');
        $this->load->view('layout/footer');
	}
	
}
