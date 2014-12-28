<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alumni extends CI_Controller {

    public function index() {
        $this->about();
    }
    
    public function about(){
        $this->load->view('layout/header');
        $this->load->view('layout/navbar_login');
        $this->load->view('alumni/v_home_alumni');
        $this->load->view('layout/footer');
    }
    
    public function profile(){
        $this->load->view('layout/header');
        $this->load->view('layout/navbar_login');
        $this->load->view('alumni/v_profile');
        $this->load->view('layout/footer');
    }
    
    public function event(){
        $this->load->view('layout/header');
        $this->load->view('layout/navbar_login');
        $this->load->view('alumni/v_list_event');
        $this->load->view('layout/footer');
    }
    
    public function detail_event(){
        $this->load->view('layout/header');
        $this->load->view('layout/navbar_login');
        $this->load->view('alumni/v_detil_event');
        $this->load->view('layout/footer');
    }
    
    public function history(){
        $this->load->view('layout/header');
        $this->load->view('layout/navbar_login');
        $this->load->view('alumni/v_history');
        $this->load->view('layout/footer');
    }

}
