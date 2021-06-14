<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>UKM POLINEMA</title>
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
<meta name="keywords" content="Pencarian" />
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
				<div class="main-title-head">
					<h3>Hasil Pencarian</h3>
					<div class="clearfix"></div>
				</div>
					<div class="technology">
						<div class="tech-main">
						<?php 
						//$banyak = count($search_berita->result_array());
						//echo "Ditemukan <b>".$banyak."</b> data dari hasil pencarian dengan kata <b>".$search."</b>";
						if (count($search_berita->result_array()) > 0) {
							foreach ($search_berita->result() as $row) {
								$isi = $row->isi;
								$id = $row->id_berita;
								$judul = $row->judul_berita;
								$tgl = tgl_indo($row->tgl_post);
								$link = set_linkurl($id,$judul);
								$isi = substr($isi, 0, 300);
						 ?>
							<div class="col-md-4 tech">
								<a href="berita/detail/<?php echo $link; ?>"><img src="image/berita/<?php echo $row->gambar; ?>" alt="" /></a>
								<a class="power" href="berita/detail/<?php echo $link; ?>"><?php echo $judul; ?></a>
							</div>
						
							<div class="clearfix"></div>
							<?php }
						} else {
						 ?>
						 <div class="alert alert-danger alert-dismissable">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  Pencarian data dengan kata <strong><?php echo $search; ?></strong> tidak ditemukan
						</div>
						<?php } ?>
						</div>
					</div>
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