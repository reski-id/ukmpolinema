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

				<div class="technology">
						<div class="tech-main">
						<?php foreach ($data->result() as $row) {
							if ($row->username == NULL){
								$nama_lengkap = "-";
							}else{
								$nama_lengkap = $this->db->get_where('user', array('username' => $row->username))->row()->nama_lengkap;
							}
						?>
							<div class="col-md-4 tech">
								<h3><?php echo $row->judul ?><br/></h3>
								<span>Post By <?php echo $nama_lengkap; ?>, <?php echo tgl_indo($row->tgl); ?></span><br>
								Tanggal Pelaksanaan : <?php echo tgl_indo($row->tgl_pelaksanaan); ?>
								<iframe width="360" height="315" src="<?php echo $row->url;?>" frameborder="0" allowfullscreen></iframe><br/>
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
