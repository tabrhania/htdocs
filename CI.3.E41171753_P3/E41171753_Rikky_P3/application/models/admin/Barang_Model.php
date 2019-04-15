<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_Model extends CI_Model
{
    private $_table = "barang";

    public $idbarang;
    public $kdbarang;
    public $nama;
    public $deskripsi;
    public $stokbarang;
    public $hargabarang;

    // public $image = 'default.jpg';

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'nama',
            'rules' => 'required'],

            ['field' => 'hargabarang',
            'label' => 'hargabarang',
            'rules' => 'numeric'],

            ['field' => 'stokbarang',
            'label' => 'stokbarang',
            'rules' => 'numeric']

        ];
    }
    // Menampilkan DB
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($idbarang)
	{
		return $this->db->get_where($this->_table, ["idbarang"->$idbarang])->row();
	}

	//CREAT = menghasilkan data
	public function save()
	{
		$post = $this->input->post();
        // $this->idbarang = uniqid();
        $this->kdbarang = $post["kdbarang"];
		$this->nama = $post["nama"];
		$this->deskripsi = $post["deskripsi"];
        $this->stokbarang = $post["stokbarang"];
        $this->hargabarang = $post["hargabarang"];
		$this->db->insert($this->_table, $this);
    }

    function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
    }
    function update_data($where,$data,$table){
        // $post = $this->input->post();
        // $this->kdbarang = $post["kdbarang"];
		// $this->nama = $post["nama"];
		// $this->deskripsi = $post["deskripsi"];
        // $this->stokbarang = $post["stokbarang"];
        // $this->hargabarang = $post["hargabarang"];
        // $this->db->update($this->_table, $this, array('idbarang' => $post['idbarang']));
    
        // $this->Barang_Model->update_data($where,$data,'idbarang');
        // redirect('barang/index');
        
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    

 

    public function delete($idbarang)
    {
        $this->db->where('idbarang',$idbarang);
        $this->db->delete('barang');
    }
}
?>