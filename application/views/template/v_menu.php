<div class="header">
				<div class="header-left">
					<div class="logo">
						<a href="<?php echo base_url(); ?>">
							<h2>SISTEM INFORMASI MONITORING</h2>
							<h1>UKM <span>Polinema</span></h1>
						</a>
					</div>
				</div>
					<div class="social-icons">
						
						<li><div class="facebook"><div id="fb-root"></div>
							
							<div id="fb-root"></div>
							</div></li>
							<script>(function(d, s, id) {
							  var js, fjs = d.getElementsByTagName(s)[0];
							  if (d.getElementById(id)) return;
							  js = d.createElement(s); js.id = id;
							  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
							  fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));</script>
	   						
	   						

					</div>
					<div class="clearfix"></div>
				<div class="header-right">
					
					<!---pop-up-box---->  
					<link href="assets/web/css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
					<script src="assets/web/js/jquery.magnific-popup.js" type="text/javascript"></script>
					<!---//pop-up-box---->
					<div id="small-dialog1" class="mfp-hide">
						<div class="signup">
							<h3>Subscribe</h3>
							<h4>Enter Your Valid E-mail</h4>
							<input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" />
							<div class="clearfix"></div>
							<input type="submit"  value="Subscribe Now"/>
						</div>
					</div>	

                     <script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});
				</script>	
					<div class="search">
						<form action="<?php echo base_url() ?>berita/cari/" method="POST">
							<input type="text" name="search" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" placeholder="Pencarian" />
							<input type="submit" name="cari" value="">
						</form>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
				</div>
				<span class="menu"></span>
			<div class="menu-strip">
				<ul>           
					<li><a href="berita/">Home</a></li>
					<li><a href="berita/profile">Profile</a></li>
					<li><a href="berita/galeris">Galeri</a></li>
				<!-- 	<li><a href="berita/bisnis">Bisnis</a></li>
					<li><a href="berita/otomotif">Otomotif</a></li>
					<li><a href="berita/entertainment">entertainment</a></li>
					<li><a href="berita/Property">Property</a></li>
				 -->	<li><a href="berita/video">Video</a></li><!-- 
				 	<li><a href="berita/pendaftaran">Pendaftaran</a></li> -->
				</ul>
			</div>
			<!-- script for menu -->
				<script>
				$( "span.menu" ).click(function() {
				  $( ".menu-strip" ).slideToggle( "slow", function() {
				    // Animation complete.
				  });
				});
			</script>