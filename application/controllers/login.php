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
        $password = md5($this->input->post('password'));

        $query = $this->m_login->validasi_login($email, $password);

        if ($query == true) {
            $ambilquery = $this->m_daftar->getAlumniById($this->input->post('email'))->row();

            $data['id_alumni'] = $ambilquery->id_alumni;
            $data['nama_alumni'] = $ambilquery->nama_alumni;
            $data['password'] = $ambilquery->password;
            $data['status'] = $ambilquery->status;
            if ($ambilquery->status > 2) {
                echo "<script type='text/javascript'>alert('Mohon maaf email yang anda masukkan belum melakukan aktivasi.');
			window.location.href='" . base_url() . "';
			</script>";
            } else {
                $data['is_logged_in'] = true;

                $this->session->set_userdata('id_alumni', $ambilquery->id_alumni);
                $this->session->set_userdata('nama_alumni', $ambilquery->nama_alumni);
                $this->session->set_userdata('password', $ambilquery->password);
                $this->session->set_userdata('email', $ambilquery->email);
                $this->session->set_userdata('status', $ambilquery->status);
                $this->session->set_userdata('is_logged_in', true);

                echo "<script type='text/javascript'>alert('Selamat datang " . $ambilquery->nama_alumni . "!');
			window.location.href='" . base_url() . "';
			</script>";
            }
        } else {
            echo "<script type='text/javascript'>
			alert('Email dan Password tidak cocok.');
			window.location.href='" . base_url() . "';
			</script>";
        }
    }

    public function lupa_password() {
        $email = $this->input->post('email');
        $hp = $this->input->post('hp');

        if ($this->m_login->cek_akun_lupa_password($email, $hp)) {
            $length = 8;
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $password = substr(str_shuffle($chars), 0, $length);
            $md5_password = md5($password);
            
            $this->m_login->reset_password($email, $md5_password);
            $this->sendMail($email, $password);
            
            echo "<script type='text/javascript'>
			alert('Password telah diubah, silahkan cek email anda.');
			window.location.href='" . base_url() . "';
			</script>";
        } else {
            echo "<script type='text/javascript'>
			alert('Akun tidak valid.');
			window.location.href='" . base_url() . "';
			</script>";
        }
    }
    
    
    private function sendMail($email, $password) {

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
        $this->email->to($email);

        $this->email->subject('Reset Password Akun Alumni IPB 85');
        $this->email->message("Hi,<br><br>Berikut password baru anda untuk akun alumni IPB 1985.<br><br><strong>$password</strong><br><br>Segera login menggunakan password baru anda pada tautan <a href='" . base_url() . "'>ini</a>, kemudian ganti segera password anda.<br><br>Apabila anda merasa pesan ini bukan untuk anda, silahkan abaikan pesan ini.<br><br>Apabila ada pertanyaan silahkan hubungi admin@admin.com");

        $this->email->send();

        //echo $this->email->print_debugger();
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
