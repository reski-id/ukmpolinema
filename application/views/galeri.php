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

			<div class="gallery">
							<div class="main-title-head">
								<h3>Gallery Foto</h3>
								<div class="clearfix"></div>
							</div>
							<div class="gallery-images">
								<div class="grid">
								  <ul>
								  <?php 
								foreach ($b_gal as $row) {
								
								 ?>
									 <ol>
										<a href="berita/galeri/<?php echo $row->id_galeri; ?>/<?php echo $row->judul_galeri; ?>"><img src="image/galeri/thumbnails/<?php echo $row->foto_galeri; ?>" alt="" /></a>
									 </ol>	
								<?php } ?>
								 </ul>
							 </div>
							 <link rel="stylesheet" href="assets/web/css/flexslider.css" type="text/css" media="screen" />
								<script type="text/javascript">
							 $(window).load(function() {
								$("#flexiselDemo1").flexisel({
									visibleItems: 3,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,    		
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: { 
										portrait: { 
											changePoint:480,
											visibleItems: 2
										}, 
										landscape: { 
											changePoint:640,
											visibleItems: 2
										},
										tablet: { 
											changePoint:768,
											visibleItems: 3
										}
									}
								});
								
							 });
							  </script>
							 <script type="text/javascript" src="assets/web/js/jquery.flexisel.js"></script>
						 </div>

							</div>
			<div class="clearfix"></div>
			<div class="main-content">		
					
				<div class="technology">
						<div class="tech-main">
						<?php foreach ($gambar as $row) { 
						?>
							<div class="col-md-4 tech">
								<?php echo $row->judul_berita_foto ?><br/>
								<img src="image/berita/<?php echo $row->foto_berita_foto ?>" alt="" /><br/>
							</div>
						<?php } ?>
							<div class="clearfix"></div>
						</div>
					</div>
					
					<div class="clearfix"></div>
				</div>
		</div>

				<?php //include 'template/v_sidebar.php'; ?>
			</div>
			<!-- Footer -->
			<?php include 'template/v_footer.php'; ?>
			<!-- Footer -->
		</div>
	</div>
</body>
</html>