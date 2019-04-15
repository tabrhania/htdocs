<?php

class Dashboard extends CI_Controller {
    public function index()
    {   
        $this->load->view('admin/dashboard');
    }
    public function barang ()
    {
        $this->load->view('admin/master/barang');
    }
}