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
        $data['data_profile'] = $this->m_alumni->getProfileAlumni($id_alumni);
		
		$this->header(1);
        $this->load->view('admin/v_profile',$data);
        $this->load->view('layout/footer');
    }
	
	public function event() {
        $this->header(2);
		$this->load->view('admin/v_kelola_event');
        $this->load->view('layout/footer');
    }
	
	public function edit_event() {
        $this->header(2);
		$this->load->view('admin/v_edit_event');
        $this->load->view('layout/footer');
    }
	
	public function detail_event() {
        $this->header(2);
		$this->load->view('admin/v_detil_event');
        $this->load->view('layout/footer');
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
