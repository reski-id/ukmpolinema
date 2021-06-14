<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title><?php echo $hasil->judul_berita; ?></title>
<base href="<?php echo base_url(); ?>"></base>
<link href="assets/web/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="assets/web/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<script src="assets/web/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/web/js/jquery.leanModal.min.js"></script>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $hasil->judul_berita; ?>" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<script>
jQuery(document).ready(function($) {
 $('.popup').click(function(event) {
 var width = 575,
 height = 400,
 left = ($(window).width() - width) / 2,
 top = ($(window).height() - height) / 2,
 url = this.href,
 opts = 'status=1' +
 ',width=' + width +
 ',height=' + height +
 ',top=' + top +
 ',left=' + left;
  
 window.open(url, 'twitter', opts);
  
 return false;
 });
 });
</script>

</head>
<body>
	<!-- header-section-starts -->
	<div class="container">	
		<div class="news-paper">
			
			<?php include 'template/v_menu.php'; ?>
			<!-- script for menu -->
			<div class="clearfix"></div>
			<div class="main-content">		
				
				<div class="col-md-9 total-news">
	<?php 
	$gambar = $hasil->gambar;
	$tgl = tgl_indo($hasil->tgl_post);
	$id = $hasil->id_berita;
	$judul = $hasil->judul_berita;
	$link = set_linkurl($id,$judul);
	 ?>
	<div class="grids">
		<div class="msingle-grid box">
			<div class="grid-header">
				<h3><?php echo $hasil->judul_berita; ?> </h3>
				<h3>LOKASI : <?php echo $hasil->nm_kategori; ?> </h3>

				<ul>
				<li><span>Post By <?php echo $hasil->created ?> <?php echo $hasil->hari; ?>, <?php echo $tgl ?></span> <strong>Dilihat : <?php echo $hasil->views; ?></strong></li>
				</ul>
			</div>
			<div class="singlepage">
							<img src="image/berita/<?php echo $hasil->gambar; ?>" />
							<?php echo $hasil->isi; ?>
							<div>
								<h4>Share : </h4>
								<!-- facebook -->
								 <a id="button" onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo 'Judul'; ?>&amp;p[summary]=&amp;p[url]=<?php echo base_url();?>berita/detail/<?php echo $link; ?>&amp;&p[images][0]=', 'sharer', 'toolbar=0,status=0,width=550,height=400');" target="_parent" href="javascript: void(0)"> <img src="image/fb.png" style="width: 40px; height: 40px;"></a>
								<!-- twitter -->
								<a class="twitter popup" href="http://twitter.com/share?source=sharethiscom&text=<?php echo $judul;?>&url=<?php echo base_url();?>berita/detail/<?php echo $link; ?>&via=berbagiyuks"><img src="image/twitter.png" style="width: 40px; height: 40px;"></a>
								<!-- google+ -->
								<a href="javascript:void(0);" onclick="popUp=window.open('https://plus.google.com/share?url=<?php echo base_url();?>berita/detail/<?php echo $link; ?>','popupwindow','scrollbars=yes,width=800,height=400');popUp.focus();return false"><img src="image/googleplus.png" style="width: 40px; height: 40px;"></a>
								
							</div>
							<div class="clearfix"> </div>
						</div>
						
		</div>
	
			<div class="clearfix"> </div>
	</div>
	<br>
	
				<div class="content-form">
					 <h3>Tinggalkan Komentar</h3>
					<form action="berita/simpan_komentar/" method="POST">
						<input type="text" name="nama" placeholder="Nama"/>
						<div><?php echo form_error('nama'); ?></div>
						<input type="hidden" name="judul_berita" value="<?php echo $link; ?>">
						<input type="hidden" name="idberita" value="<?php echo $id; ?>">
						<textarea placeholder="Message" name="komentar"></textarea>
						<div><?php echo form_error('komentar'); ?></div>
						<input type="submit" name="simpan" value="Kirim"/>
				   </form>
				</div>
				<br><br>
				<div>
					<?php 
					$this->load->model('m_komentar');
					$data = $this->m_komentar->komentar_web($id);
					foreach ($data->result() as $k) { 
					 ?>
					<div><b><?php echo $k->nama_lengkap; ?></b> <i><?php echo $k->tgl; ?> - <?php echo $k->jam; ?></i></div>
					<div><?php echo $k->isi_komentar; ?></div>
					<hr >
					<?php } ?>
				</div>
			</div>	

				<!-- sidebar -->
				<div class="col-md-3 side-bar">
							
					<div class="videos">
					<div class="main-title-head">
							<h5>Artikel Terkait</h5>
							<div class="clearfix"></div>
						</div>						
						<?php

						// koneksi ke database
						//mysql_connect('localhost', 'root', '');
						//mysql_select_db('dbberita');

						
						    // batas threshold 40%
						    $threshold = 40;
						    // jumlah maksimum artikel terkait yg ditampilkan 3 buah
						    $maksArtikel = 3;

						    // array yang nantinya diisi judul artikel terkait
						    $listArtikel = Array();

						    // membaca judul artikel dari ID tertentu (ID artikel acuan)
						    // judul ini nanti akan dicek kemiripannya dengan artikel yang lain
						    $query = "SELECT judul_berita FROM berita WHERE id_berita = '$id'";
						    $hasil = $this->db->query($query);
						    $hasil = $hasil->row();
						    $judul = $hasil->judul_berita;

						    // membaca semua data artikel selain ID artikel acuan
						    $query = "SELECT id_berita, judul_berita FROM berita WHERE id_berita <> '$id'";
						    $hasil = $this->db->query($query);

						    foreach ($hasil->result() as $data)
						    {
						        // cek similaritas judul artikel acuan dengan judul artikel lainnya
						        similar_text($judul, $data->judul_berita, $percent);
						        if ($percent >= $threshold)
						        {
						            // jika prosentase kemiripan judul di atas threshold
						            if (count($listArtikel) <= $maksArtikel)
						            {
						               // jika jumlah artikel belum sampai batas maksimum, tambahkan ke dalam array
						            	$l = set_linkurl($data->id_berita,$data->judul_berita); 
						               $listArtikel[] = "<a href='berita/detail/".$l."' class='title'>".$data->judul_berita."</a>";
						            }
						        }
						    } 

						    // jika array listartikel tidak kosong, tampilkan listnya
						    // jika kosong, maka tampilkan 'tidak ada artikel terkait'
						    if (count($listArtikel) > 0)
						    {
						        echo "<ul>";
						        for ($i=0; $i<=count($listArtikel)-1; $i++)
						        {
						            echo $listArtikel[$i];
						        }
						        echo "</ul>";
						    }
						    else echo "<p>Tidak ada artikel terkait</p>";
						
						?>

						
						<div class="clearfix"></div>
					</div>
					<br><br>
					<div class="clearfix"></div>
					<div class="popular">
						<div class="main-title-head">
							<h5>popular</h5>
							<h4> Most    read</h4>
							<div class="clearfix"></div>
						</div>		
						<div class="popular-news">
						<?php foreach ($b_pop->result() as $sl) { 
						$id = $sl->id_berita;
						$judul = $sl->judul_berita;
						$link = set_linkurl($id,$judul);
						$tgl = tgl_indo($sl->tgl_post);
						?>
							<div class="popular-grid">
								<i><?php echo $tgl; ?> </i>
								<p><?php echo $judul; ?> <a href="berita/detail/<?php echo $link; ?>">Selengkapnya</a></p>
							</div>
						<?php } ?>
							<a class="more" href="<?php echo base_url();?>">More  +</a>
						</div>
					</div>
					
					<div class="clearfix"></div>
				</div>	
				<div class="clearfix"></div>
				<!-- /sidebar -->
				
			</div>
			<!-- Footer -->
			<?php include 'template/v_footer.php'; ?>
			<!-- Footer -->
		</div>
	</div>
</body>
</html>