<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function index()
	{
            $this->load->view('layout/header');
            $this->load->view('layout/navbar');            
            $this->load->view('v_profile');            
            $this->load->view('layout/footer');
	}
}
