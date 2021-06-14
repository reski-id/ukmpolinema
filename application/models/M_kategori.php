<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

	function tampil_kategori(){
		$query = $this->db->query("SELECT * FROM kategori ORDER BY id_kategori DESC ");
		return $query;
	}
	function simpan_kategori(){
		$kategori = $this->input->post('kategori');
		$data = array('nm_kategori' => $kategori);
		$this->db->insert('kategori', $data);
	}
	function tampil_edit($id){
	    return $this->db->get_where('kategori', array('id_kategori' => $id))->row();
	}
	function ubah_kategori($id){
		$kategori = $this->input->post('kategori');
		  
		$data = array('nm_kategori' => $kategori);
	    $this->db->where('id_kategori', $id);
		$this->db->update('kategori', $data);
	}
	function hapus_kategori($id){
	    $this->db->where('id_kategori', $id);
	    $this->db->delete('kategori');
	}

}
