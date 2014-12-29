<?php

class m_login extends CI_Model {

    function __construct() {
        parent::__construct();
    }
	
    public function validasi_login($email, $password){
            $query = $this->db->query("
                    select email, password from alumni where email = '$email' and password = '$password'
            ");
            if($query->num_rows() == 1){
                    return true;
            }else{
                    return false;
            }
    }
	
}
