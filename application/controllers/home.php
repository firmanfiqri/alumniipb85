<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
            $this->load->view('layout/header');
            $this->load->view('layout/navbar');            
            $this->load->view('v_home');            
            $this->load->view('layout/footer');
	}
}
