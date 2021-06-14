<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_galeri extends CI_Model {

	var $gallerypath;
  	var $gallery_path_url;
  	var $gallery = 'berita_foto';

	function __construct(){
	    parent::__construct();
	    $this->load->helper('tglindo_helper');

	    $this->gallerypath = realpath(APPPATH . '../image/galeri');
		$this->gallery_path_url = base_url().'image/galeri/';
	}

	function tampil_galeri(){
		$query = $this->db->query("SELECT * FROM galeri_foto ORDER BY id_galeri DESC ");
		return $query;
	}

	function tampil_galeri_un($un){
		$query = $this->db->query("SELECT * FROM galeri_foto
			 												 INNER JOIN user ON user.username=galeri_foto.username
															 WHERE galeri_foto.username='$un'
															 ORDER BY id_galeri DESC ");
		return $query;
	}

	function simpan_galeri($un){
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
		$tgl = date('Y-m-d');
		$hari = nama_hari();
		date_default_timezone_set('Asia/Jakarta');
		$jam = date('H:i:s');
		$created = $this->input->post('penulis');
		$gambar = $_FILES['userfile']['name'];

		$data = array('judul_galeri' => $judul,
	                  'tgl_post' => $tgl,
	                  'hari' => $hari,
	                  'jam' => $jam,
	                  'created' => $penulis,
				      		  'foto_galeri' => $gambar,
									  'username' => $un);
		$this->db->insert('galeri_foto', $data);
	}

	function tampil_edit($id){
	    return $this->db->get_where('galeri_foto', array('id_galeri' => $id))->row();
	}

	function tampil_edit_un($id, $un){
	    return $this->db->get_where('galeri_foto', array('id_galeri' => $id, 'username' => $un));
	}

	function ubah_galeri($id){
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
			$tgl = date('Y-m-d');
			$hari = nama_hari();
			date_default_timezone_set('Asia/Jakarta');
			$jam = date('H:i:s');
			$created = $this->input->post('penulis');
			$gambar = $_FILES['userfile']['name'];

			$data = array('judul_galeri' => $judul,
	                  'tgl_post' => $tgl,
	                  'hari' => $hari,
	                  'jam' => $jam,
	                  'edited' => $created,
				      'foto_galeri' => $gambar);
    		$this->db->where('id_galeri', $id);
			$this->db->update('galeri_foto', $data);
	    } else {
		  	$judul = $this->input->post('judul');
			$tgl = date('Y-m-d');
			$hari = nama_hari();
			date_default_timezone_set('Asia/Jakarta');
			$jam = date('H:i:s');
		  	$created = $this->input->post('penulis');

			$data = array('judul_galeri' => $judul,
	                  'tgl_post' => $tgl,
	                  'hari' => $hari,
	                  'edited' => $created,
	                  'jam' => $jam);
    		$this->db->where('id_galeri', $id);
			$this->db->update('galeri_foto', $data);
	    }
	}

	function hapus_galeri($id){
	    $this->db->where('id_galeri', $id);
	    $this->db->delete('galeri_foto');
	}

	function get_gallery() {
        $this->db->from($this->gallery);
        $query = $this->db->get();


        return $query->result();
    }



}
