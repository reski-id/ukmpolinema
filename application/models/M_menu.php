<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_menu extends CI_Model {

	function tampil_menu(){
		$query = $this->db->query("SELECT * FROM menu ORDER BY id_menu DESC ");
		return $query;
	}
	function simpan_menu(){
		$menu = $this->input->post('menu');
		$urlmenu = $this->input->post('url');
		$data = array('menu' => $menu,
					  'url_menu' => $urlmenu);
		$this->db->insert('menu', $data);
	}
	function tampil_edit($id){
	    return $this->db->get_where('menu', array('id_menu' => $id))->row();
	}
	function ubah_menu($id){
		$menu = $this->input->post('menu');
		$urlmenu = $this->input->post('url');
		
		$data = array('menu' => $menu,
					  'url_menu' => $urlmenu);

	    $this->db->where('id_menu', $id);
		$this->db->update('menu', $data);
	}
	function hapus_menu($id){
	    $this->db->where('id_menu', $id);
	    $this->db->delete('menu');
	}

}
