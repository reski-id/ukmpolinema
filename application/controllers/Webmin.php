<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webmin extends CI_Controller {
	public function __construct() {
    parent::__construct();
        //session_start();
        $this->load->model('m_kategori');
        $this->load->model('m_galeri');
        $this->load->model('m_bfoto');
        $this->load->model('m_berita');
        $this->load->model('m_menu');
        $this->load->model('m_submenu');
        $this->load->model('m_login');
        $this->load->model('m_komentar');
        $this->load->model('m_user');
        $this->load->helper('tglindo_helper');
    }

    public function login_user()
    {
    	$data = array();
		$session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
		if ($session!="") {
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin'>";
		} else {
			$this->load->view('cPanel/login');
		}
    }

    public function login()
	{
		$hasil = $this->m_login->ceklogin();
		if (count($hasil->result_array())>0) {
			foreach ($hasil->result() as $row) {
				$sess_user = $row->username."|".$row->nama_lengkap."|".$row->foto_user."|".$row->level;
				$level = $row->level;
			}
			$_SESSION['user_data']=$sess_user;
			if ($level=="admin" || $level=="user") {
				$data = "berhasil";
				$kirim = array('pesan'=>$data,'status'=>true);
				echo json_encode($kirim);
			} else {
				$data = "gagal";
				$kirim = array('pesan'=>$data,'status'=>true);
				echo json_encode($kirim);
			}
		} else {
			$data = "akun tidak ada";
			$kirim = array('pesan'=>$data,'status'=>true);
			echo json_encode($kirim);
		}
	}

	public function logout()
	{
		session_destroy();
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
	}

	public function index()
	{
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin" || $data['level']=="user"){
	            //disini script semua proses
          		$data['jenis'] = 'home';
				$data['lokasi'] = 'Dashboard';
				$this->load->view('cPanel/template',$data);
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}

	public function kategori()
	{
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin"){
	            //disini script semua proses
          		$data['jenis'] = 'Kategori';
							$data['lokasi'] = 'Kategori';
							$data['d_kategori'] = $this->m_kategori->tampil_kategori();
							$this->load->view('cPanel/template',$data);
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}

	public function tambah_kategori()
	{
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin"){
	            //disini script semua proses
          		$this->form_validation->set_rules('kategori', 'Nama Kategori', 'required');

			    if ($this->form_validation->run() == TRUE) {
			      if ($this->input->post('simpan')) {
			        $this->m_kategori->simpan_kategori();
			        redirect('webmin/kategori');
			      }
			    }
				$data['jenis'] = 'Tambah Kategori';
				$data['lokasi'] = 'Kategori';
				$this->load->view('cPanel/template',$data);
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}

	public function edit_kategori($id=NULL)
	{
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin"){
	            //disini script semua proses
          		if ($_POST==NULL) {
					$data['hasil'] = $this->m_kategori->tampil_edit($id);
					$data['jenis'] = 'Edit Kategori';
					$data['lokasi'] = 'Kategori';
					$this->load->view('cPanel/template',$data);
				} else {
					$this->m_kategori->ubah_kategori($id);
					redirect('webmin/kategori');
				}
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}

  public function tambah_video()
  {
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	// if($data['level']=="admin" || $data['level']=="user"){
						if($data['level']=="user"){
	            //disini script semua proses
          		$data['jenis'] = 'Tambah Video';
							$data['lokasi'] = 'Tambah Video';
							$this->load->view('cPanel/template',$data);
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	// alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
								alert("Super Admin tidak berhak menambah video...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }
  }

  public function p_tambah_video()
  {

		$data = array();
				$session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
				if($session!=""){
						$pisah_info = explode("|", $session);
						$data['username'] = $pisah_info[0];
						$data['nama_lengkap'] = $pisah_info[1];
						$data['foto_user'] = $pisah_info[2];
						$data['level'] = $pisah_info[3];
						if($data['level']=="admin" || $data['level']=="user"){
							//disini script semua proses
							$judul=$this->input->post('judul');
							$tgl_pelaksanaan=$this->input->post('tgl_pelaksanaan');
					    $url=$this->input->post('url');

					    $data = array(
											'url' => $url ,
					            'judul' => $judul,
					            'tgl_pelaksanaan' => $tgl_pelaksanaan,
											'username' => $data['username']
					     );
					    $this->db->insert('tbl_video',$data);
					    redirect('webmin/video');
							//batas
						} else { ?>
							<script type="text/javascript" language="javascript">
								alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
							</script>
							<?php
							echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
						}
				} else { ?>
						<script type="text/javascript" language="javascript">
						alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
						</script>
					<?php
						echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
				}
  }

  public function video()
  {

			$data = array();
	        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
	        if($session!=""){
	          	$pisah_info = explode("|", $session);
	          	$data['username'] = $pisah_info[0];
	          	$data['nama_lengkap'] = $pisah_info[1];
	          	$data['foto_user'] = $pisah_info[2];
	          	$data['level'] = $pisah_info[3];
	          	if($data['level']=="admin" || $data['level']=="user"){
		            //disini script semua proses
	          		$data['jenis'] = 'Video';
								$data['lokasi'] = 'Video';
								if ($data['level']=="admin") {
										$vid = $this->db->get('tbl_video');
								}else{
										$vid = $this->db->query("SELECT * FROM tbl_video WHERE username='$data[username]'");
								}
								$data['d_video'] = $vid;
								$this->load->view('cPanel/template',$data);
		            //batas
	          	} else { ?>
	            	<script type="text/javascript" language="javascript">
	              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
	            	</script>
	          		<?php
	            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
	          	}
	        } else { ?>
	          	<script type="text/javascript" language="javascript">
	            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
	          	</script>
	        	<?php
	          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
	        }
  }

	public function hapus_video($id_video)
  {

		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin" || $data['level']=="user"){
	            //disini script semua proses
							if ($data['level']=="admin") {
									$this->db->query("DELETE FROM tbl_video where id_video='$id_video'");
							    redirect('webmin/video');
							}else{
									$cek_hasil 		 = $this->db->query("SELECT * FROM tbl_video WHERE username='$data[username]'")->num_rows();
									if ($cek_hasil == 0) {
										?>
											<script type="text/javascript" language="javascript">
												alert("Anda tidak berhak hapus video yang bukan milik Anda...!!!");
											</script>
											<?php
											echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/video'>";
									}else{
										$this->db->query("DELETE FROM tbl_video where id_video='$id_video'");
								    redirect('webmin/video');
									}
							}
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }
  }


	public function hapus_kategori($id=NULL)
	{
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin" || $data['level']=="user"){
	            //disini script semua proses
          		$this->m_kategori->hapus_kategori($id);
				redirect('webmin/kategori');
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}


	public function galeri()
	{
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin" || $data['level']=="user"){
	            //disini script semua proses
          		$data['jenis'] = 'Galeri';
							$data['lokasi'] = 'Galeri Foto';
							if ($data['level']=="admin") {
									$data['d_galeri'] = $this->m_galeri->tampil_galeri();
							}else{
									$data['d_galeri'] = $this->m_galeri->tampil_galeri_un($data['username']);
							}
							$this->load->view('cPanel/template',$data);
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}

	public function tambah_galeri()
	{
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin" || $data['level']=="user"){
	            //disini script semua proses
          		$this->form_validation->set_rules('judul', 'Judul', 'required');

			    if ($this->form_validation->run() == TRUE) {
			      if ($this->input->post('simpan')) {
			        $this->m_galeri->simpan_galeri($data['username']);
			        redirect('webmin/galeri');
			      }
			    }
				$data['jenis'] = 'Tambah Galeri';
				$data['lokasi'] = 'Galeri';
				$this->load->view('cPanel/template',$data);
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}

	public function edit_galeri($id=NULL)
	{
		if ($id == "") {
			redirect('webmin/galeri');
		}
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin" || $data['level']=="user"){
	            //disini script semua proses
          		if ($_POST==NULL) {
								if ($data['level']=="admin") {
										$data['hasil'] = $this->m_galeri->tampil_edit($id);
										if ($data['hasil']->id_galeri == "") {
 									 		redirect('webmin/galeri');
 									  }
										$data['jenis'] = 'Edit Galeri';
										$data['lokasi'] = 'Galeri';
										$this->load->view('cPanel/template',$data);
								}else{
		      					$cek_hasil 		 = $this->m_galeri->tampil_edit_un($id, $data['username']);
										$data['hasil'] = $cek_hasil->row();
										if ($cek_hasil->num_rows() == 0) {
											?>
					            	<script type="text/javascript" language="javascript">
					              	alert("Anda tidak berhak edit galeri yang bukan milik Anda...!!!");
					            	</script>
					          		<?php
					            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/galeri'>";
										}else{
			      					$data['jenis'] = 'Edit Galeri';
			      					$data['lokasi'] = 'Galeri';
			      					$this->load->view('cPanel/template',$data);
										}
								}
      				} else {
      					$this->m_galeri->ubah_galeri($id);
      					redirect('webmin/galeri');
      				}
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}


	public function hapus_galeri($id=NULL)
	{
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin" || $data['level']=="user"){
	            //disini script semua proses
							if ($data['level']=="admin") {
									$data['hasil'] = $this->m_galeri->tampil_edit($id);
										$img = $this->uri->segment(4);
									$path1 = './image/galeri/'.$img;
									$path2 = './image/galeri/thumbnails/'.$img;
									unlink($path1);
									unlink($path2);
									$this->m_galeri->hapus_galeri($id);
									redirect('webmin/galeri');
							}else{
									$cek_hasil 		 = $this->m_galeri->tampil_edit_un($id, $data['username']);
									$data['hasil'] = $cek_hasil->row();
									if ($cek_hasil->num_rows() == 0) {
										?>
											<script type="text/javascript" language="javascript">
												alert("Anda tidak berhak hapus galeri yang bukan milik Anda...!!!");
											</script>
											<?php
											echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/galeri'>";
									}else{
				          		$img = $this->uri->segment(4);
						        $path1 = './image/galeri/'.$img;
						        $path2 = './image/galeri/thumbnails/'.$img;
						        unlink($path1);
						        unlink($path2);
						        $this->m_galeri->hapus_galeri($id);
						        redirect('webmin/galeri');
									}
							}
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}

	public function berita_foto()
	{
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin" || $data['level']=="user"){
	            //disini script semua proses
          		$data['jenis'] = 'Berita Foto';
							$data['lokasi'] = 'Berita Foto';
							if ($data['level']=="admin") {
									$data['d_bfoto'] = $this->m_bfoto->tampil_bfoto();
							}else{
								$data['d_bfoto'] = $this->m_bfoto->tampil_bfoto_un($data['username']);
							}
							$this->load->view('cPanel/template',$data);
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}

	public function tambah_berita_foto()
	{
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	// if($data['level']=="admin" || $data['level']=="user"){
						if($data['level']=="user"){
	            //disini script semua proses
          		//$this->form_validation->set_rules('judul', 'Judul', 'required');
				$this->form_validation->set_rules('isi', 'Isi', 'required');
				$this->form_validation->set_rules('galeri', 'Galeri', 'required');

			    if ($this->form_validation->run() == TRUE) {
			      if ($this->input->post('simpan')) {
			        $this->m_bfoto->simpan_bfoto($data['username']);
			        redirect('webmin/berita_foto');
			      }
			    }
			    $data['d_galeri'] = $this->m_galeri->tampil_galeri(); //menampilkan data galeri
				$data['jenis'] = 'Tambah Berita Foto';
				$data['lokasi'] = 'Berita Foto';
				$this->load->view('cPanel/template',$data);
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	// alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
								alert("Super Admin tidak berhak menambah berita foto...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}

	public function edit_berita_foto($id=NULL)
	{
		if ($id == "") {
			redirect('webmin/berita_foto');
		}
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin" || $data['level']=="user"){
	            //disini script semua proses
          		if ($_POST==NULL) {
									$data['d_galeri'] = $this->m_galeri->tampil_galeri(); //menampilkan data galeri
									if ($data['level']=="admin") {
											$data['hasil'] = $this->m_bfoto->tampil_edit($id);
											if ($data['hasil']->id_foto == "") {
	 									 		redirect('webmin/berita_foto');
	 									 	}
											$data['jenis'] = 'Edit Berita Foto';
											$data['lokasi'] = 'Berita Foto';
											$this->load->view('cPanel/template',$data);
									}else{
											$cek_hasil 		 = $this->m_bfoto->tampil_edit_un($id, $data['username']);
											$data['hasil'] = $cek_hasil->row();
											if ($cek_hasil->num_rows() == 0) {
												?>
						            	<script type="text/javascript" language="javascript">
						              	alert("Anda tidak berhak edit berita foto yang bukan milik Anda...!!!");
						            	</script>
						          		<?php
						            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/berita_foto'>";
											}else{
												$data['jenis'] = 'Edit Berita Foto';
												$data['lokasi'] = 'Berita Foto';
												$this->load->view('cPanel/template',$data);
											}
									}
							} else {
								$this->m_bfoto->ubah_bfoto($id);
								redirect('webmin/berita_foto');
							}
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}

	public function hapus_berita_foto($id=NULL)
	{
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin" || $data['level']=="user"){
	            //disini script semua proses
							if ($data['level']=="admin") {
									$data['hasil'] = $this->m_bfoto->tampil_edit($id);
										$img = $this->uri->segment(4);
									$path1 = './image/bfoto/'.$img;
									$path2 = './image/bfoto/thumbnails/'.$img;
									unlink($path1);
									unlink($path2);
									$this->m_bfoto->hapus_bfoto($id);
									redirect('webmin/berita_foto');
							}else{
									$cek_hasil 		 = $this->m_bfoto->tampil_edit_un($id, $data['username']);
									$data['hasil'] = $cek_hasil->row();
									if ($cek_hasil->num_rows() == 0) {
										?>
				            	<script type="text/javascript" language="javascript">
				              	alert("Anda tidak berhak hapus berita foto yang bukan milik Anda...!!!");
				            	</script>
				          		<?php
				            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/berita_foto'>";
									}else{
				          		$img = $this->uri->segment(4);
						        $path1 = './image/bfoto/'.$img;
						        $path2 = './image/bfoto/thumbnails/'.$img;
						        unlink($path1);
						        unlink($path2);
						        $this->m_bfoto->hapus_bfoto($id);
						        redirect('webmin/berita_foto');
									}
							}
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}

	public function berita()
	{
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin" || $data['level']=="user"){
	            //disini script semua proses
          		$data['jenis'] = 'Berita';
							$data['lokasi'] = 'Berita';

							if ($data['level']=="admin") {
									$data['d_berita'] = $this->m_berita->tampil_berita();
							}else{
								  $data['d_berita'] = $this->m_berita->tampil_berita_un($data['username']);
							}
							$this->load->view('cPanel/template',$data);
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}


	public function tambah_berita()
	{
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	// if($data['level']=="admin" || $data['level']=="user"){
						if($data['level']=="user"){
	            //disini script semua proses
          		$this->form_validation->set_rules('judul', 'Judul', 'required');
				$this->form_validation->set_rules('isi', 'Isi', 'required');
				$this->form_validation->set_rules('kategori', 'Kategori', 'required');

			    if ($this->form_validation->run() == TRUE) {
			      if ($this->input->post('simpan')) {
			        $this->m_berita->simpan_berita($data['username']);
			        redirect('webmin/berita');
			      }
			    }
			    $data['d_kategori'] = $this->m_kategori->tampil_kategori(); //menampilkan data kategori
				$data['jenis'] = 'Tambah Berita';
				$data['lokasi'] = 'Berita';
				$this->load->view('cPanel/template',$data);
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	// alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
								alert("Super Admin tidak berhak menambah berita...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}

	public function edit_berita($id=NULL)
	{
		if ($id == "") {
			redirect('webmin/berita');
		}
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin" || $data['level']=="user"){
	            //disini script semua proses
          		if ($_POST==NULL) {
								$data['d_kategori'] = $this->m_kategori->tampil_kategori(); //menampilkan data kategori
								if ($data['level']=="admin") {
									 $data['hasil'] = $this->m_berita->tampil_edit($id);
									 if ($data['hasil']->id_berita == "") {
									 		redirect('webmin/berita');
									 }
									 $data['jenis'] = 'Edit Berita';
									 $data['lokasi'] = 'Berita';
									 $this->load->view('cPanel/template',$data);
								}else{
									$cek_hasil 		 = $this->m_berita->tampil_edit_un($id, $data['username']);
									$data['hasil'] = $cek_hasil->row();
									if ($cek_hasil->num_rows() == 0) {
										?>
				            	<script type="text/javascript" language="javascript">
				              	alert("Anda tidak berhak edit berita yang bukan milik Anda...!!!");
				            	</script>
				          		<?php
				            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/berita'>";
									}else{

										$data['jenis'] = 'Edit Berita';
										$data['lokasi'] = 'Berita';
										$this->load->view('cPanel/template',$data);

									}
								}


							} else {
								$this->m_berita->ubah_berita($id);
								redirect('webmin/berita');
							}
	            //batas
          } else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}

	public function hapus_berita($id=NULL)
	{
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin" || $data['level']=="user"){
	            //disini script semua proses
							if ($data['level']=="admin") {
								 $data['hasil'] = $this->m_berita->tampil_edit_un($id);
									 $img = $this->uri->segment(4);
								 $path1 = './image/berita/'.$img;
								 $path2 = './image/berita/thumbnails/'.$img;
								 unlink($path1);
								 unlink($path2);
								 $this->m_berita->hapus_berita($id);
								 redirect('webmin/berita');
							}else{
									$cek_hasil 		 = $this->m_berita->tampil_edit_un($id, $data['username']);
									$data['hasil'] = $cek_hasil->row();
									if ($cek_hasil->num_rows() == 0) {
										?>
				            	<script type="text/javascript" language="javascript">
				              	alert("Anda tidak berhak hapus berita yang bukan milik Anda...!!!");
				            	</script>
				          		<?php
				            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/berita'>";
									}else{

				          		$img = $this->uri->segment(4);
						        $path1 = './image/berita/'.$img;
						        $path2 = './image/berita/thumbnails/'.$img;
						        unlink($path1);
						        unlink($path2);
						        $this->m_berita->hapus_berita($id);
						        redirect('webmin/berita');

									}
							}
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}

	public function menu()
	{
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin" || $data['level']=="user"){
	            //disini script semua proses
          		$data['jenis'] = 'Menu Utama';
				$data['lokasi'] = 'Menu';
				$data['d_menu'] = $this->m_menu->tampil_menu();
				$this->load->view('cPanel/template',$data);
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}

	public function tambah_menu()
	{
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin" || $data['level']=="user"){
	            //disini script semua proses
          		$this->form_validation->set_rules('menu', 'Menu', 'required');
				$this->form_validation->set_rules('url', 'Url Menu', 'required');

			    if ($this->form_validation->run() == TRUE) {
			      if ($this->input->post('simpan')) {
			        $this->m_menu->simpan_menu();
			        redirect('webmin/menu');
			      }
			    }
				$data['jenis'] = 'Tambah Menu';
				$data['lokasi'] = 'Menu';
				$this->load->view('cPanel/template',$data);
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}

	public function edit_menu($id=NULL)
	{
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin" || $data['level']=="user"){
	            //disini script semua proses
          		if ($_POST==NULL) {
					$data['hasil'] = $this->m_menu->tampil_edit($id);
					$data['jenis'] = 'Edit Menu';
					$data['lokasi'] = 'Menu';
					$this->load->view('cPanel/template',$data);
				} else {
					$this->m_menu->ubah_menu($id);
					redirect('webmin/menu');
				}
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}

	public function hapus_menu($id=NULL)
	{
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin" || $data['level']=="user"){
	            //disini script semua proses
          		$this->m_menu->hapus_menu($id);
        		redirect('webmin/menu');
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}

	public function submenu()
	{
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin" || $data['level']=="user"){
	            //disini script semua proses
          		$data['jenis'] = 'SubMenu Utama';
				$data['lokasi'] = 'SubMenu';
				$data['d_submenu'] = $this->m_submenu->tampil_submenu();
				$this->load->view('cPanel/template',$data);
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}

	public function tambah_submenu()
	{
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin" || $data['level']=="user"){
	            //disini script semua proses
          		$this->form_validation->set_rules('submenu', 'SubMenu', 'required');
				$this->form_validation->set_rules('url', 'Url SubMenu', 'required');
				$this->form_validation->set_rules('menu', 'Menu', 'required');

			    if ($this->form_validation->run() == TRUE) {
			      if ($this->input->post('simpan')) {
			        $this->m_submenu->simpan_submenu();
			        redirect('webmin/submenu');
			      }
			    }
			    $data['d_menu'] = $this->m_menu->tampil_menu();
				$data['jenis'] = 'Tambah SubMenu';
				$data['lokasi'] = 'SubMenu';
				$this->load->view('cPanel/template',$data);
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}

	public function edit_submenu($id=NULL)
	{
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin" || $data['level']=="user"){
	            //disini script semua proses
          		if ($_POST==NULL) {
					$data['d_menu'] = $this->m_menu->tampil_menu();
					$data['hasil'] = $this->m_submenu->tampil_edit($id);
					$data['jenis'] = 'Edit SubMenu';
					$data['lokasi'] = 'SubMenu';
					$this->load->view('cPanel/template',$data);
				} else {
					$this->m_submenu->ubah_submenu($id);
					redirect('webmin/submenu');
				}
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

	}

	public function hapus_submenu($id=NULL)
	{
		$data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
          	$pisah_info = explode("|", $session);
          	$data['username'] = $pisah_info[0];
          	$data['nama_lengkap'] = $pisah_info[1];
          	$data['foto_user'] = $pisah_info[2];
          	$data['level'] = $pisah_info[3];
          	if($data['level']=="admin" || $data['level']=="user"){
	            //disini script semua proses
          		$this->m_submenu->hapus_submenu($id);
        		redirect('webmin/submenu');
	            //batas
          	} else { ?>
            	<script type="text/javascript" language="javascript">
              	alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
            	</script>
          		<?php
            	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
          	}
        } else { ?>
          	<script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
          	</script>
        	<?php
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }
	}

  public function komentar()
  {
    $data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
            $pisah_info = explode("|", $session);
            $data['username'] = $pisah_info[0];
            $data['nama_lengkap'] = $pisah_info[1];
            $data['foto_user'] = $pisah_info[2];
            $data['level'] = $pisah_info[3];
            if($data['level']=="admin" || $data['level']=="user"){
              //disini script semua proses
              $data['jenis'] = 'Komentar';
              $data['lokasi'] = 'Komentar';
              $data['d_komentar'] = $this->m_komentar->komentar_admin();
              $this->load->view('cPanel/template',$data);
              //batas
            } else { ?>
              <script type="text/javascript" language="javascript">
                alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
              </script>
              <?php
              echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
            }
        } else { ?>
            <script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
            </script>
          <?php
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

  }

  public function ubah_status_komentar()
  {
    $data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
            $pisah_info = explode("|", $session);
            $data['username'] = $pisah_info[0];
            $data['nama_lengkap'] = $pisah_info[1];
            $data['foto_user'] = $pisah_info[2];
            $data['level'] = $pisah_info[3];
            if($data['level']=="admin" || $data['level']=="user"){
              //disini script semua proses
              $id = $this->input->post('id');
              $status = $this->input->post('status');
              $d = array('tampil' => $status);
              $this->db->where('id_komentar', $id);
              $this->db->update('komentar', $d);
              echo "berhasil ubah status !";
              //batas
            } else { ?>
              <script type="text/javascript" language="javascript">
                alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
              </script>
              <?php
              echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
            }
        } else { ?>
            <script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
            </script>
          <?php
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

  }

  public function hapus_komentar($id)
  {
    $data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
            $pisah_info = explode("|", $session);
            $data['username'] = $pisah_info[0];
            $data['nama_lengkap'] = $pisah_info[1];
            $data['foto_user'] = $pisah_info[2];
            $data['level'] = $pisah_info[3];
            if($data['level']=="admin" || $data['level']=="user"){
              //disini script semua proses
              $this->m_komentar->hapus_komentar($id);
              redirect('webmin/komentar');
              //batas
            } else { ?>
              <script type="text/javascript" language="javascript">
                alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
              </script>
              <?php
              echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
            }
        } else { ?>
            <script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
            </script>
          <?php
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

  }

  public function user()
  {
    $data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
            $pisah_info = explode("|", $session);
            $data['username'] = $pisah_info[0];
            $data['nama_lengkap'] = $pisah_info[1];
            $data['foto_user'] = $pisah_info[2];
            $data['level'] = $pisah_info[3];
            if($data['level']=="admin"){
              //disini script semua proses
              $data['jenis'] = 'User';
              $data['lokasi'] = 'Manajemen User';
              $data['d_user'] = $this->m_user->tampil_user();
              $this->load->view('cPanel/template',$data);
              //batas
            } else { ?>
              <script type="text/javascript" language="javascript">
                alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
              </script>
              <?php
              echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
            }
        } else { ?>
            <script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
            </script>
          <?php
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

  }

  public function tambah_user()
  {
    $data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
            $pisah_info = explode("|", $session);
            $data['username'] = $pisah_info[0];
            $data['nama_lengkap'] = $pisah_info[1];
            $data['foto_user'] = $pisah_info[2];
            $data['level'] = $pisah_info[3];
            if($data['level']=="admin"){
              //disini script semua proses
							$this->form_validation->set_rules('level', 'Level', 'required');
              $this->form_validation->set_rules('username', 'Username', 'required');
              $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
              $this->form_validation->set_rules('pass', 'Password', 'required');
                if ($this->form_validation->run() == TRUE) {
                  if ($this->input->post('simpan')) {
                    $this->m_user->simpan_user();
                    redirect('webmin/user');
                  }
                }
              $data['jenis'] = 'Tambah User';
              $data['lokasi'] = 'Tambah User';
              $this->load->view('cPanel/template',$data);
              //batas
            } else { ?>
              <script type="text/javascript" language="javascript">
                alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
              </script>
              <?php
              echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
            }
        } else { ?>
            <script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
            </script>
          <?php
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

  }

  public function hapus_user($id)
  {
    $data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
            $pisah_info = explode("|", $session);
            $data['username'] = $pisah_info[0];
            $data['nama_lengkap'] = $pisah_info[1];
            $data['foto_user'] = $pisah_info[2];
            $data['level'] = $pisah_info[3];
            if($data['level']=="admin" || $data['level']=="user"){
              //disini script semua proses
              $img = $this->uri->segment(4);
              $path1 = './image/user/'.$img;
              $path2 = './image/user/thumbnails/'.$img;
              unlink($path1);
              unlink($path2);
              $this->m_user->hapus_user($id);
              redirect('webmin/user');
              //batas
            } else { ?>
              <script type="text/javascript" language="javascript">
                alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
              </script>
              <?php
              echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
            }
        } else { ?>
            <script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
            </script>
          <?php
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

  }

  public function profil($username)
  {
    $data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
            $pisah_info = explode("|", $session);
            $data['username'] = $pisah_info[0];
            $data['nama_lengkap'] = $pisah_info[1];
            $data['foto_user'] = $pisah_info[2];
            $data['level'] = $pisah_info[3];
            if($data['level']=="admin" || $data['level']=="user" ){
              //disini script semua proses
              $data['jenis'] = 'Profil';
              $data['lokasi'] = 'Data Profil';
              $data['hasil'] = $this->m_user->tampil_profil($username)->row();
              $this->load->view('cPanel/template',$data);
              //batas
            } else { ?>
              <script type="text/javascript" language="javascript">
                alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
              </script>
              <?php
              echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
            }
        } else { ?>
            <script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
            </script>
          <?php
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

  }

  public function ubah_password()
  {
    $data = array();
        $session = isset($_SESSION['user_data']) ? $_SESSION['user_data']:'';
        if($session!=""){
            $pisah_info = explode("|", $session);
            $data['username'] = $pisah_info[0];
            $data['nama_lengkap'] = $pisah_info[1];
            $data['foto_user'] = $pisah_info[2];
            $data['level'] = $pisah_info[3];
            if($data['level']=="admin" || $data['level']=="user" ){
              //disini script semua proses
              $this->form_validation->set_rules('lama', 'Password Lama', 'required');
              $this->form_validation->set_rules('baru', 'Password Baru', 'required');
                if ($this->form_validation->run() == TRUE) {
                  if ($this->input->post('simpan')) {
                    $hasil = $this->m_user->cek_password();
                    if (count($hasil->result_array())> 0) {
                      $this->m_user->ubah_pass();
                      ?>
                      <script type="text/javascript">
                        alert('Password berhasil di ubah !');
                        window.location='<?php echo base_url()?>webmin/logout/';
                      </script>
                      <?php
                    } else {
                      $d = $this->input->post('username');
                      ?>
                      <script type="text/javascript">
                        alert('Password lama salah');
                        window.location="<?php echo base_url();?>webmin/profil/<?php echo $d;?>";
                      </script>
                      <?php
                    }
                  }
                }

              $this->load->view('cPanel/template',$data);
              //batas
            } else { ?>
              <script type="text/javascript" language="javascript">
                alert("Anda tidak berhak masuk ke Control Panel Super Admin...!!!");
              </script>
              <?php
              echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
            }
        } else { ?>
            <script type="text/javascript" language="javascript">
            alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
            </script>
          <?php
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."webmin/login_user'>";
        }

  }


}
