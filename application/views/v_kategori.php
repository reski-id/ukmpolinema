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
<meta name="keywords" content="The News Reporter Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
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
					<h3>Berita <?php echo $k ?></h3>
					<div class="clearfix"></div>
				</div>
					<div class="technology">
						<div class="tech-main">
						<?php foreach ($b_kat->result() as $sl) { 
						$id = $sl->id_berita;
						$judul = $sl->judul_berita;
						$link = set_linkurl($id,$judul);
						?>
							<div class="col-md-4 tech">
								<a href="berita/detail/<?php echo $link; ?>"><img src="image/berita/<?php echo $sl->gambar; ?>" alt="" /></a>
								<a class="power" href="berita/detail/<?php echo $link; ?>"><?php echo $judul; ?></a>
							</div>
						<?php } ?>
							<div class="clearfix"></div>
						</div>
					</div>
				<div class="posts">
					<div class="left-posts">						
						<div class="latest-articles">
							<div class="main-title-head">
								<h3>Berita Lainnya</h3>
								<div class="clearfix"></div>
							</div>
							<div class="world-news-grids">
							<?php foreach ($b_sebel->result() as $sl) { 
							$id = $sl->id_berita;
							$judul = $sl->judul_berita;
							$link = set_linkurl($id,$judul);
							$isi = $sl->isi;
							$isi = substr($isi, 0, 100);
							?>
								<div class="world-news-grid">
									<img src="image/berita/<?php echo $sl->gambar; ?>" alt="" />
									<a href="berita/detail/<?php echo $link; ?>" class="title"><?php echo $judul; ?></a>
									<?php echo $isi; ?>
									<a href="berita/detail/<?php echo $link; ?>">Selengkapnya</a>
								</div>
							<?php } ?>
								<div class="clearfix"></div>
							</div>
						</div>
					
					</div>
					<div class="right-posts">
						<div class="editorial">
							<h3>top news</h3>
							<?php foreach ($b_top->result() as $sl) { 
							$id = $sl->id_berita;
							$judul = $sl->judul_berita;
							$link = set_linkurl($id,$judul);
							?>
							<div class="editor">
								<a href="berita/detail/<?php echo $link; ?>"><img src="image/berita/<?php echo $sl->gambar; ?>" alt="" /></a>
								<a href="berita/detail/<?php echo $link; ?>"><?php echo $judul; ?></a>
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="clearfix"></div>	
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