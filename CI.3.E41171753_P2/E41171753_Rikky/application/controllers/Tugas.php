<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Tugas extends CI_Controller {
	
	public function index(){
		echo "ini method index pada controller belajar | cara membuat controller pada codeigniter | MalasNgoding.com";
	}
 
	public function abc(){
		$this->load->view('view_tugas');
    }
    
    function __construct(){
		parent::__construct();		
		$this->load->model('datalogin');		
	}
 
	function user(){
		$data['user'] = $this->m_data->ambil_data()->result();
		$this->load->view('v_user.php',$data);
	}
 
}