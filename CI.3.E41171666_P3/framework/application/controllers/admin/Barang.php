<?php

class Barang extends CI_Controller
{
    public function __construct()
    {   
        parent::__construct();  
        $this->load->model('admin/Barang_Model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data["barang"] = $this->Barang_Model->getAll();
        $this->load->view('admin/barang/barang' , $data);
        
    }
    public function add()
    {   
        $barang = $this->Barang_Model;
        $validation = $this->form_validation;
        $validation->set_rules($barang->rules());
        // if ($validation->run()){
        $barang->save();
        $this->session->set_flashdata('success' , 'berhasil disimpan');
        // redirect('admin/barang/');
        // }else{
            redirect('admin/barang/');
        
        
        
    }   
    // public function edit($idbarang)
    // {
    //     // if (isset($idbarang)) redirect('admin/barang');

    //     // $barang = $this->Barang_Model;
    //     // $validation = $this->form_validation;
    //     // $validation->set_rules($barang->rules());

    //     // if ($validation->run()) {
    //     //     $barang->update();
    //     //     $this->session->set_flashdata('success' , 'Berhasil Disimpan');
    //     // }
    //     // $data["barang"] = $barang->getById($idbarang);
    //     // if (!$data["barang"]) show_404();
    //     $where = array('idbarang' => $idbarang);
	// 	$data['barang'] = $this->Barang_Model->edit_data($where,'barang')->result();
	// 	$this->load->view('v_edit',$data);
    // }

    function update(){
        $idbarang = $this->input->post('idbarang');
        $kdbarang = $this->input->post('kdbarang');
        $nama = $this->input->post('nama');
        $deskripsi = $this->input->post('deskripsi');
        $stokbarang = $this->input->post('stokbarang');
        $hargabarang = $this->input->post('hargabarang');
     
        $data = array(
            'kdbarang' => $kdbarang,
            'nama' => $nama,
            'deskripsi' => $deskripsi,
            'stokbarang' => $stokbarang,
            'hargabarang' => $hargabarang
        );
     
        $where = array(
            'idbarang' => $idbarang
        );
     
        $this->Barang_Model->update_data($where,$data,'barang');
        redirect('admin/barang');
    }


    public function delete($idbarang)
    {
        $this->Barang_Model->delete($idbarang);
        $this->session->set_flashdata('flash','dihapus');
        redirect('admin/barang');
        // if (!isset($id)) show_404();
        // if ($this->Barang_Model->delete($id)){
        //     redirect(site_url('admin/master/barang'));
        // }
        

        // $idbarang = $this->uri->segment(4);
        // $this->Barang_Model->delete($idbarang);
        // $this->session->set_flashdata("OK","OK");
        // redirect('admin/barang');

    }


}

