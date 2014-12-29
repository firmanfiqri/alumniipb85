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

    public function sendMail() {
        $kode_verifikasi = rand(12345,56789);
        
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.mail.yahoo.com',
            'smtp_port' => 465,
            'smtp_user' => 'fadhilah.ilmi@yahoo.com',
            'smtp_pass' => 'Rahmanda10',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('fadhilah.ilmi@yahoo.com', 'Fadhilah');
        $this->email->to('firman.fiqri@gmail.com');

        $this->email->subject('Verifikasi Email');
        $this->email->message("Terima Kasih telah mendaftarkan diri sebagai alumni IPB 1985<br><br>Klik link dibawah ini untuk melakukan verifikasi email anda.<br><br><a href='".base_url()."'login/verifikasi/>Verifikasi</a>");

        $this->email->send();

        echo $this->email->print_debugger();
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
