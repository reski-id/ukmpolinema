<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_submenu extends CI_Model {

	function tampil_submenu(){
		$query = $this->db->query("SELECT * FROM submenu ORDER BY id_sub DESC ");
		return $query;
	}
	function simpan_submenu(){
		$submenu = $this->input->post('submenu');
		$menu = $this->input->post('menu');
		$urlmenu = $this->input->post('url');
		$data = array('submenu' => $submenu,
					  'menu' => $menu,
					  'url_submenu' => $urlmenu);
		$this->db->insert('submenu', $data);
	}
	function tampil_edit($id){
	    return $this->db->get_where('submenu', array('id_sub' => $id))->row();
	}
	function ubah_submenu($id){
		$submenu = $this->input->post('submenu');
		$menu = $this->input->post('menu');
		$urlmenu = $this->input->post('url');
		$data = array('submenu' => $submenu,
					  'menu' => $menu,
					  'url_submenu' => $urlmenu);

	    $this->db->where('id_sub', $id);
		$this->db->update('submenu', $data);
	}
	function hapus_submenu($id){
	    $this->db->where('id_sub', $id);
	    $this->db->delete('submenu');
	}

}
