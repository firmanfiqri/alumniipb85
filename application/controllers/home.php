<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_daftar');

        if ($this->session->userdata('is_logged_in')) {
            if ($this->session->userdata('status') == -1) {
                redirect(base_url() . "admin");
            } else {
                redirect(base_url() . "alumni");
            }
        }
    }

    public function index() {
        $data['queryfakultas'] = $this->m_daftar->getAllFakultas()->result();
        $data['queryjurusan'] = $this->m_daftar->getAllJurusan()->result();
        $data['queryprodi'] = $this->m_daftar->getAllProdi()->result();
        $data['queryevent'] = $this->m_daftar->getAllEvent()->result();

        $this->load->view('layout/header');
        $this->load->view('layout/navbar_login');
        $this->load->view('v_home', $data);
        $this->load->view('layout/footer');
    }

    public function ambil_daftar() {
        if($this->input->post('email') != "") {
            $nama_lengkap = $this->input->post('nama_lengkap');
            $nrp = $this->input->post('nrp');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $prodi = $this->input->post('prodi');
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));

            if ($this->m_daftar->cekEmail($email) == 1) {
                echo "<script type='text/javascript'>alert('Maaf email $email telah terdaftar!');
				window.location.href='" . base_url() . "';
				</script>";
					}else if ($this->m_daftar->cekNRP($nrp) == 1) {
						echo "<script type='text/javascript'>alert('Maaf no NRP $nrp telah terdaftar!');
				window.location.href='" . base_url() . "';
				</script>";
            } else {
                $this->m_daftar->insertAlumni($nama_lengkap, $nrp, $jenis_kelamin, $prodi, $email, $password);
                $this->sendMail($email,$nama_lengkap);
                echo "<script type='text/javascript'>alert('Selamat anda berhasil mendaftar! Silahkan aktivasi akun melalui email anda.');
				window.location.href='" . base_url() . "';
				</script>";
            }
        }else{
            redirect(base_url());
        }
    }

    private function sendMail($email,$nama_lengkap) {
        $kode_verifikasi = rand(12345, 56789);
        $id = $this->m_daftar->getIdByEmail($email);        
        $this->m_daftar->updateKodeAktivasi($id,$kode_verifikasi);

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

        $this->email->subject('Aktivasi Akun Alumni IPB 85');
        $this->email->message("Hi $nama_lengkap,<br><br>Terima Kasih telah mendaftarkan diri sebagai alumni IPB 1985. Segera lakukan aktivasi akun dengan mengakses tautan dibawah ini.<br><br><a href='" . base_url() . "aktivasi/akun/".$id."/".$kode_verifikasi."'>Aktivasi</a><br><br>Jika anda merasa tidak mendaftarkan diri menjadi alumni mohon abaikan pesan ini.<br><br>Apabila ada pertanyaan silahkan hubungi admin@admin.com");

        $this->email->send();

        //echo $this->email->print_debugger();
    }

}
