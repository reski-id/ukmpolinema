<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	function __construct(){
	    parent::__construct();
	    $this->load->helper('cleanurl_helper');
		$this->load->helper('tglindo_helper');
	    $this->load->model('m_berita');
	    $this->load->model('m_komentar');
	    $this->load->model('M_galeri');
	}


	public function index()
	{
		$data['slide'] = $this->m_berita->t_slide();
		$data['b_inter'] = $this->m_berita->b_inter();
		$data['b_pol'] = $this->m_berita->b_politik();
		$data['b_olah'] = $this->m_berita->b_olahraga();
		$data['b_pop'] = $this->m_berita->b_popular();
		$data['b_tek'] = $this->m_berita->b_tekno(2);
		$data['b_tek1'] = $this->m_berita->b_tekno2(2,2);
		$data['b_gal'] = $this->m_berita->b_galeri();
		$data['b_sebel'] = $this->m_berita->b_sebelumnya();
		$data['b_sid'] = $this->m_berita->b_side();
		$data['jenis'] = 'home';
		$this->load->view('v_index', $data);
	}

	public function about()
	{
		$this->load->view('v_about');
	}

	public function contact()
	{
		$this->load->view('v_contact');
	}
		public function profile()
	{
		$this->load->view('v_profile');
	}

public function video()
	{
		$data['data']=$this->db->get('tbl_video');
		$this->load->view('v_video',$data);
	}
public function galeris()
	{
		$data['b_gal'] = $this->m_berita->b_galeri();
		$data['gambar']= $this->M_galeri->get_gallery();
		$this->load->view('galeri',$data);
	}


	public function detail($id)
	{
		$data['hasil'] = $this->m_berita->detail_berita($id);
		$data['b_pop'] = $this->m_berita->b_popular();
		$data['b_sid'] = $this->m_berita->b_side();
		$this->load->view('v_detail_berita', $data);
	}

	public function galeri($id)
	{
		$data['hasil'] = $this->m_berita->j_galeri($id)->row();
		$data['d_foto'] = $this->m_berita->detail_foto($id);
		$data['b_pop'] = $this->m_berita->b_popular();
		$data['b_sid'] = $this->m_berita->b_side();
		$this->load->view('v_detail_foto', $data);
	}

	public function teknologi()
	{
		$data['b_tek'] = $this->m_berita->b_tekno(6);
		$data['b_gal'] = $this->m_berita->b_galeri();
		$data['b_sebel'] = $this->m_berita->teknologi_seb(6,6);
		$data['b_top'] = $this->m_berita->tek_popular();
		$data['jenis'] = 'teknologi';
		$data['b_pop'] = $this->m_berita->b_popular();
		$data['b_sid'] = $this->m_berita->b_side();
		$this->load->view('v_index', $data);
	}

	public function politik()
	{
		$data['b_pol'] = $this->m_berita->k_data(3,'politik');
		$data['b_sebel'] = $this->m_berita->k_data2(2,3,'politik');
		$data['b_top'] = $this->m_berita->data_popular('politik');
		$data['jenis'] = 'politik';
		$data['b_pop'] = $this->m_berita->b_popular();
		$data['b_sid'] = $this->m_berita->b_side();
		$this->load->view('v_index', $data);
	}

	public function internasional()
	{
		$data['b_int'] = $this->m_berita->k_data(6,'internasional');
		$data['b_sebel'] = $this->m_berita->k_data2(6,6,'internasional');
		$data['b_top'] = $this->m_berita->data_popular('internasional');
		$data['jenis'] = 'internasional';
		$data['b_sebel'] = $this->m_berita->b_all();
		$data['b_pop'] = $this->m_berita->b_popular();
		$data['b_sid'] = $this->m_berita->b_side();
		$this->load->view('v_index', $data);
	}

	public function olahraga()
	{
		$data['b_olah'] = $this->m_berita->k_data(6,'olahraga');
		$data['b_sebel'] = $this->m_berita->k_data2(6,6,'olahraga');
		$data['b_top'] = $this->m_berita->data_popular('olahraga');
		$data['jenis'] = 'olahraga';
		$data['b_pop'] = $this->m_berita->b_popular();
		$data['b_sid'] = $this->m_berita->b_side();
		$this->load->view('v_index', $data);
	}

	public function bisnis()
	{
		$data['b_bis'] = $this->m_berita->k_data(6,'bisnis');
		$data['b_sebel'] = $this->m_berita->k_data2(6,6,'bisnis');
		$data['b_top'] = $this->m_berita->data_popular('bisnis');
		$data['jenis'] = 'bisnis';
		$data['b_pop'] = $this->m_berita->b_popular();
		$data['b_sid'] = $this->m_berita->b_side();
		$this->load->view('v_index', $data);
	}

	public function otomotif()
	{
		$data['b_oto'] = $this->m_berita->k_data(6,'otomotif');
		$data['b_sebel'] = $this->m_berita->k_data2(6,6,'otomotif');
		$data['b_top'] = $this->m_berita->data_popular('otomotif');
		$data['jenis'] = 'otomotif';
		$data['b_pop'] = $this->m_berita->b_popular();
		$data['b_sid'] = $this->m_berita->b_side();
		$this->load->view('v_index', $data);
	}

	public function entertainment()
	{
		$data['b_enter'] = $this->m_berita->k_data(6,'entertainment');
		$data['b_sebel'] = $this->m_berita->k_data2(6,6,'entertainment');
		$data['b_top'] = $this->m_berita->data_popular('entertainment');
		$data['jenis'] = 'entertainment';
		$data['b_pop'] = $this->m_berita->b_popular();
		$data['b_sid'] = $this->m_berita->b_side();
		$this->load->view('v_index', $data);
	}

	public function property()
	{
		$data['b_prop'] = $this->m_berita->k_data(6,'property');
		$data['b_sebel'] = $this->m_berita->k_data2(6,6,'property');
		$data['b_top'] = $this->m_berita->data_popular('property');
		$data['jenis'] = 'property';
		$data['b_pop'] = $this->m_berita->b_popular();
		$data['b_sid'] = $this->m_berita->b_side();
		$this->load->view('v_index', $data);
	}

	public function kategori($nama)
	{
		$data['b_kat'] = $this->m_berita->k_data(6,$nama);
		$data['b_sebel'] = $this->m_berita->k_data2(6,6,$nama);
		$data['b_top'] = $this->m_berita->data_popular($nama);
		$data['b_pop'] = $this->m_berita->b_popular();
		$data['b_sid'] = $this->m_berita->b_side();
		$data['k'] = $nama;
		$this->load->view('v_kategori', $data);
	}

	public function simpan_komentar()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('komentar', 'Komentar', 'required');

	    if ($this->form_validation->run() == TRUE) {
	      if ($this->input->post('simpan')) {
	      	$link = $this->input->post('judul_berita');
	        $this->m_komentar->simpan();
	        //redirect('berita/detail/'.$link);
	        ?>
	        <script type="text/javascript">
	        	alert("Komentar akan ditampilkan jika di izinkan admin !");
	        	window.location="<?php echo base_url()?>berita/detail/<?php echo $link ?>";
	        </script>
	        <?php
	      }
	    }
	}

	public function cari()
	{

		$page=$this->uri->segment(3);
	    $batas=6;
		if(!$page):
		  $offset = 0;
		else:
		  $offset = $page;
		endif;

		$data['search']="";
		$post_kata = $this->input->post('search');
		if(!empty($post_kata)){
		  $data['search'] = $this->input->post('search');
		  $this->session->set_userdata('pencarian_judul', $data['search']);
		}
		else{
		  $data['search'] = $this->session->userdata('pencarian_judul');
	    }

		$data['search_berita'] = $this->m_berita->cari_berita($batas,$offset,$data['search']);
		$tot_hal = $this->m_berita->tot_hal('berita','judul_berita',$data['search']);

		$config['base_url'] = base_url() . '/berita/cari/';
		$config['total_rows'] = $tot_hal->num_rows();
	    $config['per_page'] = $batas;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Selanjutnya';
		$config['prev_link'] = 'Sebelumnya';
	    $this->pagination->initialize($config);
		$data["paginator"] =$this->pagination->create_links();

	    //$data["browser"] = $this->agent->browser().' '.$this->agent->version();
	    //$data['kategori'] = $this->m_kategori->tampil_kategori();
	    $data['b_tek'] = $this->m_berita->b_tekno(6);
	    $data['jenis'] = 'cari';
		$data['b_pop'] = $this->m_berita->b_popular();
		$data['b_sid'] = $this->m_berita->b_side();
		$this->load->view('tes_cari', $data);
	}



}
