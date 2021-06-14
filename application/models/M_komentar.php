<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_komentar extends CI_Model {

	function simpan(){
		$nama = $this->input->post('nama');
		$komentar = $this->input->post('komentar');
		$idberita = $this->input->post('idberita');
		$tgl = date('Y-m-d');
		date_default_timezone_set('Asia/Jakarta');
		$jam = date('H:i:s');
		
		$data = array('nama_lengkap' => $nama,
	                  'isi_komentar' => $komentar,
	                  'tgl' => $tgl,
	                  'jam' => $jam,
	                  'id_berita' => $idberita);
		$this->db->insert('komentar', $data);
	}

	function komentar_web($idberita){
		$query = $this->db->query("SELECT * FROM komentar WHERE id_berita='$idberita' AND tampil='Y' ");
		return $query;
	}

	function komentar_admin(){
		$query = $this->db->query("SELECT * FROM komentar ORDER BY id_komentar DESC");
		return $query;
	}
	function hapus_komentar($id){
	    $this->db->where('id_komentar', $id);
	    $this->db->delete('komentar');
	}

}
