<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model {

	var $gallerypath;
  	var $gallery_path_url;

	function __construct(){
	    parent::__construct();
	    $this->load->helper('tglindo_helper');

	    $this->gallerypath = realpath(APPPATH . '../image/berita');
		$this->gallery_path_url = base_url().'image/berita/';
	}

	function cari_berita($limit,$offset,$keyword){
		$this->db->select('*');
	    $this->db->from('berita');
	    $this->db->like('judul_berita', $keyword);
	    $this->db->limit($limit,$offset);
		$query = $this->db->get();
		return $query;
	}
	function tot_hal($tabel,$field,$kata){
		$query = $this->db->query("select * from $tabel where $field like '%$kata%'");
		return $query;
	}

	function detail_berita($id){
		$this->db->query("UPDATE berita set views=views+1 where id_berita='$id'");
	    $query = $this->db->query("SELECT * from berita where id_berita='$id'")->row();
		return $query;
	}
	function t_slide(){
		$query = $this->db->query("SELECT * FROM berita ORDER BY id_berita DESC LIMIT 4");
		return $query;
	}
	function b_popular(){
		$query = $this->db->query("SELECT * FROM berita ORDER BY views DESC LIMIT 10 ");
		return $query;
	}

	function b_inter(){
		$query = $this->db->query("SELECT * FROM berita WHERE nm_kategori = 'internasional' ORDER BY id_berita DESC LIMIT 3 ");
		return $query;
	}
	function b_politik(){
		$query = $this->db->query("SELECT * FROM berita WHERE nm_kategori = 'politik' ORDER BY id_berita DESC LIMIT 3 ");
		return $query;
	}
	function b_olahraga(){
		$query = $this->db->query("SELECT * FROM berita WHERE nm_kategori = 'olahraga' ORDER BY id_berita DESC LIMIT 3 ");
		return $query;
	}
	function b_tekno($limit){
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->limit($limit);
		$this->db->where('nm_kategori','teknologi');
		$this->db->order_by("id_berita","DESC");
		$query = $this->db->get();
		return $query;
	}
	function b_tekno2($limit,$offset){
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->limit($limit,$offset);
		$this->db->where('nm_kategori','teknologi');
		$this->db->order_by("id_berita","DESC");
		$query = $this->db->get_where();
		return $query;
	}

	function k_data($limit,$nilai){
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->limit($limit);
		$this->db->where('nm_kategori',$nilai);
		$this->db->order_by("id_berita","DESC");
		$query = $this->db->get();
		return $query;
	}
	function k_data2($limit,$offset,$nilai){
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->limit($limit,$offset);
		$this->db->where('nm_kategori',$nilai);
		$this->db->order_by("id_berita","DESC");
		$query = $this->db->get_where();
		return $query;
	}

	function data_popular($nilai){
		$query = $this->db->query("SELECT * FROM berita WHERE nm_kategori='$nilai' ORDER BY views DESC LIMIT 5 ");
		return $query;
	}

	function b_all(){
		$query = $this->db->query("SELECT * FROM berita ORDER BY id_berita DESC ");
		return $query;
	}

	function b_sebelumnya(){
		$query = $this->db->query("SELECT * FROM berita ORDER BY RAND() LIMIT 3");
		return $query;
	}
	function b_side(){
		$query = $this->db->query("SELECT * FROM kategori ORDER BY id_kategori DESC");
		return $query;
	}
	function b_galeri(){
		$this->db->select('*');
		$this->db->from('galeri_foto');
		$query = $this->db->get();
		return $query->result();
	}
	function j_galeri($id){
		$query = $this->db->query("SELECT * FROM galeri_foto WHERE id_galeri='$id'");
		return $query;
	}

	function detail_foto($id){
		$query = $this->db->query("SELECT * FROM berita_foto WHERE id_galeri='$id' ");
		return $query;
	}

	function teknologi_seb($limit,$offset){
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->limit($limit,$offset);
		$this->db->where('nm_kategori','teknologi');
		$this->db->order_by("id_berita","DESC");
		$query = $this->db->get_where();
		return $query;
	}

	function tek_popular(){
		$query = $this->db->query("SELECT * FROM berita WHERE nm_kategori='teknologi' ORDER BY views DESC LIMIT 5 ");
		return $query;
	}


	# ADMINISTRATOR

	function tampil_berita(){
		$query = $this->db->query("SELECT * FROM berita ORDER BY id_berita DESC ");

		return $query->result();
	}

	function tampil_berita_un($un){
		$query = $this->db->query("SELECT * FROM berita
															 INNER JOIN user ON user.username=berita.username
															 WHERE berita.username='$un'
															 ORDER BY berita.id_berita DESC ");

		return $query->result();
	}

	function simpan_berita($un){
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
		$nmkategori = $this->input->post('kategori');
		$tgl = date('Y-m-d');
		$hari = nama_hari();
		date_default_timezone_set('Asia/Jakarta');
		$jam = date('H:i:s');
		$created = $this->input->post('penulis');
		$gambar = $_FILES['userfile']['name'];

		$data = array('judul_berita' => $judul,
	                  'isi' => $isi,
	                  'nm_kategori' => $nmkategori,
	                  'hari' => $hari,
	                  'tgl_post' => $tgl,
	                  'jam' => $jam,
	                  'created' => $created,
	                  'gambar' => $gambar,
										'username' => $un);
		$this->db->insert('berita', $data);
	}

	function tampil_edit($id){
	    return $this->db->get_where('berita', array('id_berita' => $id))->row();
	}

	function tampil_edit_un($id, $un){
	    return $this->db->get_where('berita', array('id_berita' => $id, 'username' => $un));
	}

	function ubah_berita($id){
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
			$nmkategori = $this->input->post('kategori');
			$tgl = date('Y-m-d');
			$hari = nama_hari();
			date_default_timezone_set('Asia/Jakarta');
			$jam = date('H:i:s');
			$created = $this->input->post('penulis');
			$gambar = $_FILES['userfile']['name'];

			$data = array('judul_berita' => $judul,
		                  'isi' => $isi,
		                  'nm_kategori' => $nmkategori,
		                  'hari' => $hari,
		                  'tgl_post' => $tgl,
		                  'jam' => $jam,
		                  'edited' => $created,
		                  'gambar' => $gambar);
    		$this->db->where('id_berita', $id);
			$this->db->update('berita', $data);
	    } else {
		  	$judul = $this->input->post('judul');
			$isi = $this->input->post('isi');
			$nmkategori = $this->input->post('kategori');
			$tgl = date('Y-m-d');
			$hari = nama_hari();
			date_default_timezone_set('Asia/Jakarta');
			$jam = date('H:i:s');
			$created = $this->input->post('penulis');
			//$gambar = $_FILES['userfile']['name'];

			$data = array('judul_berita' => $judul,
		                  'isi' => $isi,
		                  'nm_kategori' => $nmkategori,
		                  'hari' => $hari,
		                  'tgl_post' => $tgl,
		                  'edited' => $created,
		                  'jam' => $jam);
    		$this->db->where('id_berita', $id);
			$this->db->update('berita', $data);
	    }
	}

	function hapus_berita($id){
	    $this->db->where('id_berita', $id);
	    $this->db->delete('berita');
	}



}
