<?php 

class m_login extends CI_Model{	
	function cek_login($table,$where){		
        return $this->db->get_where($table,$where);
        if($cek > 0){
            $data_session = array(
                'nama' => $username,
                'status' => "login"
                );
        
            $this->session->set_userdata($data_session);
            redirect(base_url("admin/Admin"));
        }else{
            echo "Username dan password salah ";
        }
	}	
}