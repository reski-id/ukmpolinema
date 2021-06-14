<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	var $gallerypath;
  	var $gallery_path_url;

	function __construct(){
	    parent::__construct();
	    $this->load->helper('tglindo_helper');

	    $this->gallerypath = realpath(APPPATH . '../image/user');
		$this->gallery_path_url = base_url().'image/user/';
	}

	function tampil_user(){
		$query = $this->db->query("SELECT * FROM user ORDER BY id_user DESC ");
		return $query;
	}

	function tampil_profil($username){
		$query = $this->db->query("SELECT * FROM user WHERE username='$username' ");
		return $query;
	}

	function simpan_user(){
	    $konfigurasi = array('allowed_types' =>'jpg|jpeg|gif|png|bmp',
				             'upload_path' => $this->gallerypath);
		$this->load->library('upload', $konfigurasi);
		$this->upload->do_upload();
		$datafile = $this->upload->data();

		$konfigurasi = array('source_image' => $datafile['full_path'],
	                         'new_image' => $this->gallerypath . '/thumbnails',
				             'maintain_ration' => true,
				             'width' => 130,
			                 'height' =>100);

	    $this->load->library('image_lib', $konfigurasi);
		$this->image_lib->resize();

		$level = $this->input->post('level');
		$username = $this->input->post('username');
		$nama = $this->input->post('nama');
		$pass = md5($this->input->post('pass'));
		$gambar = $_FILES['userfile']['name'];

		$data = array('nama_lengkap' => $nama,
	                  'username' => $username,
	                  'foto_user' => $gambar,
	                  'level' => $level,
	                  'password' => $pass);
		$this->db->insert('user', $data);
	}

	function tampil_edit($id){
	    return $this->db->get_where('berita_foto', array('id_foto' => $id))->row();
	}

	function ubah_user($id){
		$gambar = $_FILES['userfile']['name'];
		if(!empty($gambar)){
		  $konfigurasi = array('allowed_types' =>'jpg|jpeg|gif|png|bmp',
					           'upload_path' => $this->gallerypath);

		  $this->load->library('upload', $konfigurasi);
		  $this->upload->do_upload();
		  $datafile = $this->upload->data();

		  $konfigurasi = array('source_image' => $datafile['full_path'],
					           'new_image' => $this->gallerypath . '/thumbnails',
				               'maintain_ration' => true,
					           'width' => 130,
					           'height' =>100);

		  	$this->load->library('image_lib', $konfigurasi);
		  	$this->image_lib->resize();

		  	$judul = $this->input->post('judul');
			$isi = $this->input->post('isi');
			$idgaleri = $this->input->post('galeri');
			$gambar = $_FILES['userfile']['name'];

			$data = array('judul_berita_foto' => $judul,
		                  'isi' => $isi,
		                  'foto_berita_foto' => $gambar,
		                  'id_galeri' => $idgaleri);
    		$this->db->where('id_foto', $id);
			$this->db->update('berita_foto', $data);
	    } else {
		  	$judul = $this->input->post('judul');
			$isi = $this->input->post('isi');
			$idgaleri = $this->input->post('galeri');

			$data = array('judul_berita_foto' => $judul,
		                  'isi' => $isi,
		                  'id_galeri' => $idgaleri);
    		$this->db->where('id_foto', $id);
			$this->db->update('berita_foto', $data);
	    }
	}

	function hapus_user($id){
	    $this->db->where('id_user', $id);
	    $this->db->delete('user');
	}

	function cek_password(){
		$pass = md5($this->input->post('lama'));
		$user = $this->input->post('username');
		$query = $this->db->query(" SELECT * FROM user WHERE username='$user' AND password='$pass'");
		return $query;
	}

	function ubah_pass(){
		$pass = md5($this->input->post('baru'));
		$user = $this->input->post('username');

		$data = array('password' => $pass);
		$this->db->where('username', $user);
		$this->db->update('user', $data);
	}



}
