<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title><?php echo $hasil->judul_galeri; ?></title>
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
<meta name="keywords" content="<?php echo $hasil->judul_galeri; ?>" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->

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
	$tgl = tgl_indo($hasil->tgl_post);
	$id = $hasil->id_galeri;
	$judul = $hasil->judul_galeri;
	$link = set_linkurl($id,$judul);
	 ?>
	<div class="grids">
		<div class="msingle-grid box">
			<div class="grid-header">
				<h3><?php echo $hasil->judul_galeri; ?> </h3>
				<ul>
				<li><span>Post By <?php echo $hasil->created ?> <?php echo $hasil->hari; ?>, <?php echo $tgl ?></span></li>
				</ul>
			</div>
			<div class="singlepage">

			<?php 
			foreach ($d_foto->result() as $d) {
			 ?>
			
			 <ol>
				<a href="image/bfoto/<?php echo $d->foto_berita_foto; ?>"><img src="image/bfoto/<?php echo $d->foto_berita_foto; ?>" /></a>
				<?php echo $d->isi; ?> </ol>
				
				<div class="clearfix"> </div>
				<hr>
			<?php } ?>
			</div>
						
		</div>
	
			<div class="clearfix"> </div>
	</div>
	<div>
		<h4>Share : </h4>
		<!-- facebook -->
		 <a id="button" onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo 'Judul'; ?>&amp;p[summary]=&amp;p[url]=<?php echo base_url();?>berita/detail/<?php echo $link; ?>; ?>&amp;&p[images][0]=', 'sharer', 'toolbar=0,status=0,width=550,height=400');" target="_parent" href="javascript: void(0)"> <img src="image/fb.png" style="width: 40px; height: 40px;"></a>
		<!-- twitter -->
		<a class="twitter popup" href="http://twitter.com/share?source=sharethiscom&text=<?php echo $judul;?>&url=<?php echo base_url();?>berita/detail/<?php echo $link; ?>; ?>&via=berbagiyuks"><img src="image/twitter.png" style="width: 40px; height: 40px;"></a>
		<!-- google+ -->
		<a href="javascript:void(0);" onclick="popUp=window.open('https://plus.google.com/share?url=<?php echo base_url();?>berita/detail/<?php echo $link; ?>; ?> ','popupwindow','scrollbars=yes,width=800,height=400');popUp.focus();return false"><img src="image/googleplus.png" style="width: 40px; height: 40px;"></a>
		
	</div>
	<br>
			<!-- Tempat komentar -->
			
			<!-- /Tempat komentar -->
			</div>	

				<?php include 'template/v_sidebar.php'; ?>
			</div>
			<!-- Footer -->
			<?php include 'template/v_footer.php'; ?>
			<!-- Footer -->
		</div>
	</div>
</body>
</html>