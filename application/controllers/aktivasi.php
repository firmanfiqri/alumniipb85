<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aktivasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_daftar');
    }
    
    public function index() {
        redirect(base_url());
    }
    
    public function akun(){
        $id = $this->uri->segment(3);
        $kode = $this->uri->segment(4);
        if($id != "" || $kode != ""){
            $this->m_daftar->aktivasiAkun($id);
            echo "<script type='text/javascript'>alert('Anda telah berhasil mengaktifkan akun! Silahkan login.');
		window.location.href='" . base_url() . "';
		</script>";
        }else{
            echo "<script type='text/javascript'>
		window.location.href='" . base_url() . "';
		</script>";
        }
    }

}
