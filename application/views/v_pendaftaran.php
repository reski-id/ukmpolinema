<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Portal | UKM</title>
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
					
				<div class="contact-section">
					<div class="contact-section-head">
						<h3>Pendaftaran</h3>
					</div>
					
					<div class="contact-form-bottom">
						<div class="col-md-4 address">
							<address>
								Pendaftaran UKM baru 
							</address>
						</div>
						<div class="col-md-4 contact-form">
						<form method="post" action="berita/proses_add_anggota">
								<div class="contact-form-row">
									<div>
										<span>Nama</span>
										<input type="text" class="text" value="" name="nama" >
									</div>
									<div>
										<span>NIM</span>
										<input type="text" class="text" value="" name="nim" >
										
									</div>
									<div>
										<span>Ukam</span>
										<input type="text" class="text" value="" name="ukm" >
										
									</div>
									<div>
										<span>Jurusan</span>
										<input type="text" class="text" value="" name="jurusan" >
										
									</div>
									<div>
							<span>Alamat</span>
							<textarea value="" name="alamat"></textarea>
						</div>
						<div>
							<span>Alasan</span>
							<textarea value="" name="alasan"></textarea>
						</div>
									<input type="submit" value="DAFTAR" />
									<div class="clearfix"> </div>
								</div>
					</div>
					<div class="col-md-4 contact-form-row ccomments">
						
					</div>
						</form>
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