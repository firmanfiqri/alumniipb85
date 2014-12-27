<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contoh extends CI_Controller {

    public function index() {
        //$this->load->view('contoh/v_contoh');
        $this->load->view('layout/header');
        $this->load->view('layout/navbar_login');
        $this->load->view('layout/body');
        $this->load->view('layout/footer');
    }

}
