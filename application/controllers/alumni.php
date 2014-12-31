<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alumni extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model("m_alumni");
        
		if(!$this->session->userdata('is_logged_in')){
			redirect(base_url());
		}else if ($this->session->userdata('is_logged_in')) {
            if ($this->session->userdata('status') == -1) {
                redirect(base_url() . "admin");
            }
        }
    }

    public function index() {
        $this->about();
    }

    public function header($lv) {
        $data['lv'] = $lv;
        $this->load->view('layout/header');
        $this->load->view('layout/navbar_alumni', $data);
    }

    public function footer() {
        $this->load->view('layout/footer');
    }

    public function about() {
        $this->header(1);
        $this->load->view('alumni/v_home_alumni');
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
            $nrp = $this->input->post('nrp');
            $kelompok = $this->input->post('kelompok');
            $prodi = $this->input->post('prodi');
            $hp = $this->input->post('hp');
            $email = $this->input->post('email');
            $profesi = $this->input->post('profesi');
            $alamat_rumah = $this->input->post('alamat_rumah');
            $alamat_kantor = $this->input->post('alamat_kantor');
            $bidang_keahlian = $this->input->post('bidang_keahlian');
            $password_baru = $this->input->post('pwd_baru');

            if ($this->m_alumni->cetNRPAlumni($nrp,$id_alumni) == 1) {
                $data['sukses_edit'] = false;
            } else {
                $this->m_alumni->updateDataAlumni($id_alumni,$nama_lengkap, $nama_panggilan, $jenis_kelamin, $nrp, $kelompok, $prodi, $hp, $email, $profesi, $alamat_rumah, $alamat_kantor, $bidang_keahlian);
                //Ubah Foto
                if ($_FILES['foto']['name']!="") {
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
                    
                    $this->m_alumni->updateFoto($id_alumni,$file_target);
                }

                // Ubah password
                if ($this->input->post('pwd_baru')) {
                    $this->m_alumni->updatePassword($id_alumni,$password_baru);
                }

                $data['sukses_edit'] = true;
                //insert
            }
        }
        $id_alumni = $this->session->userdata('id_alumni'); // session
        $data['data_profile'] = $this->m_alumni->getProfileAlumni($id_alumni);
        $data['fakultas'] = $this->m_alumni->getFakultas();
        $data['jurusan'] = $this->m_alumni->getJurusan();
        $data['prodi'] = $this->m_alumni->getProdi();

        $this->header(2);
        $this->load->view('alumni/v_profile', $data);
        $this->footer();
    }

    public function event() {
        $data['event'] = $this->m_alumni->getListEvent();        
        
        $this->header(3);
        $this->load->view('alumni/v_list_event',$data);
        $this->footer();
    }

    public function detail_event($id) {
        $data['semua_event'] = $this->m_alumni->getAllEvent(); 
        $data['event'] = $this->m_alumni->getEvent($id);
        
        $this->header(3);
        $this->load->view('alumni/v_detil_event',$data);
        $this->footer();
    }

    public function history() {
        $this->header(4);
        $this->load->view('alumni/v_history');
        $this->footer();
    }

}
