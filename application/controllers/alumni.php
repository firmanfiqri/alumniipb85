<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alumni extends CI_Controller {

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
        $this->header(2);
        $this->load->view('alumni/v_profile');
        $this->footer();
    }
    
    public function event(){
        $this->header(3);
        $this->load->view('alumni/v_list_event');
        $this->footer();
    }
    
<<<<<<< HEAD
    public function detail_event(){
        $this->load->view('layout/header');
        $this->load->view('layout/navbar_login');
=======
    public function detil_event(){
        $this->header(3);
>>>>>>> bdf5f482231e0b3ca64d8bc14ab1220f18bfb428
        $this->load->view('alumni/v_detil_event');
        $this->footer();
    }
    
    public function history(){
        $this->header(4);
        $this->load->view('alumni/v_history');
        $this->footer();
    }

}
