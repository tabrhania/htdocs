<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Calllibrary extends CI_Controller {
	
	function index(){
		$this->load->library('newlibrary');
		$this->newlibrary->nama_saya();
                echo "<br/>";
                $this->newlibrary->jurusan_saya("Teknologi Informasi");
	}
 
}