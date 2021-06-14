<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_video extends CI_Model {

  function tampil_video(){
    $query = $this->db->query("SELECT * FROM tbl_video ORDER BY id_video DESC ");
    return $query;
  }
  function simpan_video(){
    $kategori = $this->input->post('tbl_video');
    $data = array('id_video' => $video);
    $this->db->insert('tbl_video', $data);
  }
  function hapus_video($id){
      $this->db->where('id_video', $id);
      $this->db->delete('video');
  }

}
