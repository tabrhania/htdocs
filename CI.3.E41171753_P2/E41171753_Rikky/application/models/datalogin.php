<?php 
 
class datalogin extends CI_Model{
	function ambil_data(){
		return $this->db->get('tb_users');
	}
}