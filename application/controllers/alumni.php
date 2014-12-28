<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alumni extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model("m_alumni");
        
		if(!$this->session->userdata('is_logged_in')){
			redirect(base_url()."home");
		}
    }
    
    public function index() {
        $this->about();
    }
    
    public function header($lv){
        $data['lv'] = $lv;
        $this->load->view('layout/header');
        $this->load->view('layout/navbar_alumni',$data);
    }
    public function footer(){
        $this->load->view('layout/footer');
    }

    public function about(){
        $this->header(1);
        $this->load->view('alumni/v_home_alumni');
        $this->footer();
    }
    
    public function profile(){
        if ($this->input->post('edit')) {
            
        }
        $id_alumni = 1; // session
        $data['data_profile'] = $this->m_alumni->getProfileAlumni($id_alumni);
        $data['fakultas'] = $this->m_alumni->getFakultas();
        $data['jurusan'] = $this->m_alumni->getJurusan();
        $data['prodi'] = $this->m_alumni->getProdi();
        
        $this->header(2);
        $this->load->view('alumni/v_profile',$data);
        $this->footer();
    }
    
    public function event(){
        $this->header(3);
        $this->load->view('alumni/v_list_event');
        $this->footer();
    }
    
    public function detail_event(){
        $this->header(3);
        $this->load->view('alumni/v_detil_event');
        $this->footer();
    }
    
    public function history(){
        $this->header(4);
        $this->load->view('alumni/v_history');
        $this->footer();
    }

}
