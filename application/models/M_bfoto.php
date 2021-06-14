<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bfoto extends CI_Model {

	var $gallerypath;
  	var $gallery_path_url;

	function __construct(){
	    parent::__construct();
	    $this->load->helper('tglindo_helper');

	    $this->gallerypath = realpath(APPPATH . '../image/bfoto');
		$this->gallery_path_url = base_url().'image/bfoto/';
	}

	function tampil_bfoto(){
		$query = $this->db->query("SELECT * FROM berita_foto, galeri_foto WHERE berita_foto.id_galeri=galeri_foto.id_galeri  ORDER BY id_foto DESC ");
		return $query;
	}

	function tampil_bfoto_un($un){
		$query = $this->db->query("SELECT * FROM berita_foto
															 INNER JOIN user ON user.username=berita_foto.username
															 INNER JOIN galeri_foto ON berita_foto.id_galeri=galeri_foto.id_galeri
															 WHERE berita_foto.username='$un'
															 ORDER BY berita_foto.id_foto DESC ");

		return $query;
	}

	function simpan_bfoto($un){
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

		$data = array('isi' => $isi,
	                  'foto_berita_foto' => $gambar,
	                  'id_galeri' => $idgaleri,
										'username' => $un);
		$this->db->insert('berita_foto', $data);
	}

	function tampil_edit($id){
	    return $this->db->get_where('berita_foto', array('id_foto' => $id))->row();
	}

	function tampil_edit_un($id, $un){
	    return $this->db->get_where('berita_foto', array('id_foto' => $id, 'username' => $un));
	}

	function ubah_bfoto($id){
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

			$data = array('isi' => $isi,
		                  'foto_berita_foto' => $gambar,
		                  'id_galeri' => $idgaleri);
    		$this->db->where('id_foto', $id);
			$this->db->update('berita_foto', $data);
	    } else {
		  	$judul = $this->input->post('judul');
			$isi = $this->input->post('isi');
			$idgaleri = $this->input->post('galeri');

			$data = array('isi' => $isi,
		                  'id_galeri' => $idgaleri);
    		$this->db->where('id_foto', $id);
			$this->db->update('berita_foto', $data);
	    }
	}

	function hapus_bfoto($id){
	    $this->db->where('id_foto', $id);
	    $this->db->delete('berita_foto');
	}



}
