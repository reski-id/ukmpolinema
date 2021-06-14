<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function ceklogin()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$query = $this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
		return $query;
	}

}