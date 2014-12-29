<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_daftar');
        $this->load->model('m_login');
    }

    public function validasi() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $query = $this->m_login->validasi_login($email, $password);

        if ($query == true) {
            $ambilquery = $this->m_daftar->getAlumniById($this->input->post('email'))->row();

            $data['id_alumni'] = $ambilquery->id_alumni;
            $data['nama_alumni'] = $ambilquery->nama_alumni;
            $data['password'] = $ambilquery->password;
            $data['status'] = $ambilquery->status;
            $data['is_logged_in'] = true;

            $this->session->set_userdata('id_alumni', $ambilquery->id_alumni);
            $this->session->set_userdata('nama_alumni', $ambilquery->nama_alumni);
            $this->session->set_userdata('password', $ambilquery->password);
            $this->session->set_userdata('status', $ambilquery->status);
            $this->session->set_userdata('is_logged_in', true);

            echo "<script type='text/javascript'>alert('Selamat datang " . $ambilquery->nama_alumni . "!');
			window.location.href='" . base_url() . "';
			</script>";
        } else {
            echo "<script type='text/javascript'>
			alert('Email dan Password tidak cocok.');
			window.location.href='" . base_url() . "';
			</script>";
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
