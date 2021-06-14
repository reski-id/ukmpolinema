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
					
				<div class="contact-section">
					<div class="contact-section-head">
						<h3>Contact us</h3>
					</div>
					<div class="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109999.82879367232!2d-97.60761925385881!3d30.50704909528786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1424169481181" frameborder="0" style="border:0"></iframe>
					</div>
					<div class="contact-form-bottom">
						<div class="col-md-4 address">
							<address>
								<h5>Address:</h5>
								<p>Himalaya Company</p>
								<p>77 Mass. Ave., E14/E15</p>
								<p class="bottom">Cambridge, MA 02139-4307 USA</p>
								<h5>Phone:</h5>
								<p>615.987.1234</p>
							</address>
						</div>
						<div class="col-md-4 contact-form">
						<form>
								<div class="contact-form-row">
									<div>
										<span>Name</span>
										<input type="text" class="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
									</div>
									<div>
										<span>Email</span>
										<input type="text" class="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
									</div>
									<div>
										<span>Phone</span>
										<input type="text" class="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
									</div>
									<input type="submit" value="Submit" />
									<div class="clearfix"> </div>
								</div>
						</form>
					</div>
					<div class="col-md-4 contact-form-row ccomments">
						<div>
							<span>Enter text</span>
							<textarea value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"></textarea>
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