<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alumni extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("m_alumni");
                
        if (!$this->session->userdata('is_logged_in')) {
            redirect(base_url());
        } else if ($this->session->userdata('is_logged_in')) {
            if ($this->session->userdata('status') == -1) {
                redirect(base_url() . "admin");
            }
        }
    }

    public function index() {
        $this->about();
    }

    private function header($lv) {
        $data['lv'] = $lv;
        $this->load->view('layout/header');
        $this->load->view('layout/navbar_alumni', $data);
    }

    private function footer() {
        $this->load->view('layout/footer');
    }

    public function about() {
        $this->header(1);
        $data['event'] = $this->m_alumni->getEventAlumni();
        $this->load->view('alumni/v_home_alumni', $data);
        $this->footer();
    }

    public function profile() {
        $data['edit'] = false;
        $data['sukses_edit'] = false;

        if ($this->input->post('edit')) {
            $data['edit'] = true;

            $id_alumni = $this->session->userdata('id_alumni');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $nama_panggilan = $this->input->post('nama_panggilan');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $nrp = $this->input->post('kode_fak').".".$this->input->post('angkatan').".".$this->input->post('nrp');
            $kelompok = $this->input->post('kelompok');
            $hp = $this->input->post('hp');
            $jurusan = $this->input->post('jurusan');
            $profesi = $this->input->post('profesi');
            $instansi = $this->input->post('instansi');
            $bidang_usaha = $this->input->post('bidang_usaha');
            $email = $this->input->post('email');
            $alamat_rumah = $this->input->post('alamat_rumah');
            $alamat_kantor = $this->input->post('alamat_kantor');
            $bidang_keahlian = $this->input->post('bidang_keahlian');
            $password_baru = $this->input->post('pwd_baru');
            $password_baru = md5($password_baru);
                   
            
            if ($this->m_alumni->cetNRPAlumni($nrp, $id_alumni) == 1) {
                $data['sukses_edit'] = false;
            } else {
                $this->m_alumni->updateDataAlumni($id_alumni, $nama_lengkap, $nama_panggilan, $jenis_kelamin, $nrp, $kelompok, $jurusan, $hp, $email, $profesi, $alamat_rumah, $alamat_kantor, $bidang_keahlian,$instansi,$bidang_usaha);
                //Ubah Foto
                if ($_FILES['foto']['name'] != "") {
                    $foto = $_FILES['foto'];

                    $dir = './assets/foto/profile/';
                    if (!file_exists($dir)) {
                        mkdir($dir);
                    }

                    $start = strpos($_FILES['foto']['type'], "/");
                    $type = substr($_FILES['foto']['type'], ($start + 1));
                    $file_target = $dir . $nrp . "." . $type;

                    $this->m_alumni->hapusFoto($id_alumni);
                    move_uploaded_file($_FILES['foto']['tmp_name'], $file_target);

                    $this->m_alumni->updateFoto($id_alumni, $file_target);
                }

                // Ubah password
                if ($this->input->post('pwd_baru')) {
                    $this->m_alumni->updatePassword($id_alumni, $password_baru);
                }

                $data['sukses_edit'] = true;
                //insert
                $this->session->set_userdata('status', 1);
            }
        }
        $id_alumni = $this->session->userdata('id_alumni'); // session
        $data['data_profile'] = $this->m_alumni->getProfileAlumni($id_alumni);
        $data['fakultas'] = $this->m_alumni->getFakultas();
        $data['jurusan'] = $this->m_alumni->getJurusan();

        $this->header(2);
        $this->load->view('alumni/v_profile', $data);
        $this->footer();
    }

    public function event() {
        $data['event'] = $this->m_alumni->getListEvent();
        $this->header(3);
        $this->load->view('alumni/v_list_event', $data);
        $this->footer();
    }

    public function detail_event($id) {
        if ($this->session->userdata('status') == 1|| $this->session->userdata('status') == 2) {
            if ($id != "") {
                $data['semua_event'] = $this->m_alumni->getAllEvent();
                $data['event'] = $this->m_alumni->getEvent($id);
                $data['IsPesertaEvent'] = $this->m_alumni->IsPesertaEvent($this->session->userdata('id_alumni'),$id);
                if (strtotime($data['event']->tanggal_event) > strtotime(date("y-m-d"))) {
                    $this->header(3);
                    $this->load->view('alumni/v_detil_event', $data);
                    $this->footer();
                } else {
                    redirect(base_url());
                }
            } else {
                redirect(base_url());
            }
        } else {
            redirect(base_url() . 'alumni/event');
        }
    }

    public function daftar_event($id) {
        if ($this->session->userdata('status') == 1 || $this->session->userdata('status') == 2) {
            if ($id != "") {
                $data['semua_event'] = $this->m_alumni->getAllEvent();
                $data['event'] = $this->m_alumni->getEvent($id);
                if (strtotime($data['event']->tanggal_event) > strtotime(date("y-m-d"))) {
                    $this->header(3);
                    $this->load->view('alumni/v_daftar_event', $data);
                    $this->footer();
                } else {
                    redirect(base_url() . "alumni/event");
                }
            } else {
                redirect(base_url() . "alumni/event");
            }
        } else {
            redirect(base_url() . 'alumni/event');
        }
    }
    
    
    public function daftar_gratis($id) {
        if ($this->session->userdata('status') == 1 || $this->session->userdata('status') == 2) {
            if ($id != "") {
                $id_alumni = $this->session->userdata('id_alumni');
                $id_event = $id;
                $noreg = "";

                $event = $this->m_alumni->getEvent($id_event);
                $pieces = explode(" ", $event->nama_event);
                $max = sizeof($pieces);
                for ($i = 0; $i < $max; $i++) {
                    $noreg = $noreg . $pieces[$i][0];
                }
                
                $jumlah_peserta = $this->m_alumni->getJumlahPesertaEvent($id_event);
                $jumlah_peserta++;
                $jumlah_peserta+=10000;

                $noreg = $noreg . $jumlah_peserta;
                $noreg = strtoupper($noreg);
                
                $this->m_alumni->tambahPesertaEventGratis($id_alumni, $id_event,$noreg);

                echo "<script type='text/javascript'>alert('Selamat anda berhasil mendaftar! Cek history untuk memastikan.');
		window.location.href='" . base_url() . "alumni/history';
		</script>";
            } else {
                redirect(base_url() . "alumni");
            }
        } else {
            redirect(base_url() . 'alumni');
        }
    }

    public function daftar() {
        if ($this->session->userdata('status') == 1 || $this->session->userdata('status') == 2) {
            if ($this->input->post('daftar')) {
                $id_alumni = $this->session->userdata('id_alumni');
                $email = $this->session->userdata('email');
                $id_event = $this->input->post('id_event');
                $dewasa = $this->input->post('dewasa_ikut');
                $anak = $this->input->post('anak_ikut');
                $tgl_tiba = $this->input->post('tgl_tiba');
                $noreg = "";

                $event = $this->m_alumni->getEvent($id_event);
                $pieces = explode(" ", $event->nama_event);
                $max = sizeof($pieces);
                for ($i = 0; $i < $max; $i++) {
                    $noreg = $noreg . $pieces[$i][0];
                }

                $jumlah_peserta = $this->m_alumni->getJumlahPesertaEvent($id_event);
                $jumlah_peserta++;
                $jumlah_peserta+=10000;

                $noreg = $noreg . $jumlah_peserta;
                $noreg = strtoupper($noreg);

                $nama_lengkap = $this->session->userdata('nama_alumni');
                $this->sendMail($email, $nama_lengkap, $event->nama_event);
                $this->m_alumni->tambahPesertaEvent($id_alumni, $id_event, $noreg, $dewasa, $anak, $tgl_tiba);

                echo "<script type='text/javascript'>alert('Selamat anda berhasil mendaftar! Cek email untuk informasi lebih lanjut.');
		window.location.href='" . base_url() . "alumni/history';
		</script>";
            } else {
                redirect(base_url() . "alumni/event");
            }
        } else {
            redirect(base_url() . 'alumni/event');
        }
    }

    private function sendMail($email, $nama_lengkap, $nama_event) {

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

        $this->email->subject('Pendaftaran Event');
        $this->email->message("Hi $nama_lengkap,<br><br>Terima Kasih telah mendaftarkan diri pada event $nama_event. <br>Segera lakukan pembayaran ke rekening BCA 0987654321 a/n Fadhilah kemudian konfirmasi pembayaran melalui tautan dibawah ini<br><br><a href='" . base_url() . "alumni/history/'><input type='button' value='Konfirmasi' name='submit' id='submit' style='width:100px; height:30px;' /></a><br><br>Apabila ada pertanyaan silahkan hubungi admin@admin.com");

        $this->email->send();

        //echo $this->email->print_debugger();
    }

    public function history() {
        $id_alumni = $this->session->userdata('id_alumni');
        $data['history'] = $this->m_alumni->getHistoryEvent($id_alumni);

        $this->header(4);
        $this->load->view('alumni/v_history', $data);
        $this->footer();
    }

    public function konfirmasi($noreg) {
        if ($this->session->userdata('status') == 1|| $this->session->userdata('status') == 2) {
            if ($noreg != "") {
                if ($this->m_alumni->cekNoreg($noreg) == 1) {
                    $this->header(4);
                    $data['peserta'] = $this->m_alumni->getDetailPeserta($noreg);
                    $data['semua_event'] = $this->m_alumni->getAllEvent();
                    $this->load->view('alumni/v_konfirmasi_pembayaran', $data);
                    $this->footer();
                } else {
                    redirect(base_url() . "alumni/history");
                }
            } else {
                redirect(base_url() . "alumni/history");
            }
        } else {
            redirect(base_url() . 'alumni/history');
        }
    }

    public function submit_konfirmasi() {
        if ($this->session->userdata('status') == 1|| $this->session->userdata('status') == 2) {
            if ($this->input->post('konfirmasi')) {
                $id_peserta_event = $this->input->post('id_peserta_event');
                $noreg = $this->input->post('noreg');
                $bank_kami = $this->input->post('bank_kami');
                $atas_nama = $this->input->post('atas_nama');
                $jumlah_transfer = $this->input->post('jumlah_transfer');
                $tgl_transfer = $this->input->post('tgl_transfer');

                $this->m_alumni->setKonfirmasiPembayaran($id_peserta_event, $bank_kami, $atas_nama, $jumlah_transfer, $tgl_transfer);
                
                if ($_FILES['foto']['name'] != "") {
                    $foto = $_FILES['foto'];

                    //pindah foto
                    $dir = './assets/foto/bukti_pembayaran/';
                    if (!file_exists($dir)) {
                        mkdir($dir);
                    }

                    $start = strpos($_FILES['foto']['type'], "/");
                    $type = substr($_FILES['foto']['type'], ($start + 1));
                    $file_target = $dir . $noreg . "." . $type;

                    move_uploaded_file($_FILES['foto']['tmp_name'], $file_target);

                    $file_target = substr($file_target, 1);

                    $this->m_alumni->setBuktiPembayaran($id_peserta_event, $file_target);
                }

                echo "<script type='text/javascript'>alert('Terima kasih telah melakukan konfirmasi pembayaran.');
		window.location.href='" . base_url() . "alumni/history';
		</script>";
            } else {
                redirect(base_url() . "alumni/history");
            }
        } else {
            redirect(base_url() . 'alumni/history');
        }
    }

}
