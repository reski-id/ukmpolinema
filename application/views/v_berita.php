<div class="col-md-9 total-news">
					<div class="slider">
						<script src="assets/web/js/responsiveslides.min.js"></script>
						 <script>
							// You can also use "$(window).load(function() {"
							$(function () {
							  $("#conference-slider").responsiveSlides({
								auto: true,
								manualControls: '#slider3-pager',
							  });
							});
						</script>
						 <div class="conference-slider">
							<!-- Slideshow 3 -->
							<ul class="conference-rslide" id="conference-slider">
							<?php foreach ($slide->result() as $sl) { 
								$id = $sl->id_berita;
								$judul = $sl->judul_berita;
								$link = set_linkurl($id,$judul);
								?>
							  <li>
							  	<a href="berita/detail/<?php echo $link; ?>">
							  		<img src="image/berita/<?php echo $sl->gambar;?>" alt="<?php echo $sl->gambar;?>" style="width: 636px; height: 350px;">
							  	</a>
							  </li>
							  <?php } ?>
							</ul>
							<!-- Slideshow 3 Pager -->
							<ul id="slider3-pager">
							<?php foreach ($slide->result() as $sl) { ?>
							  <li><a href="#"><img src="image/berita/thumbnails/<?php echo $sl->gambar;?>" alt="<?php echo $sl->gambar;?>" style="width: 130px; height: 75px;"></a></li>
							  <?php } ?>
							</ul>
							<!--
							<div class="breaking-news-title">
								<p>Lorem ipsum dolor sit amet, consectetur Nulla quis lorem neque, mattis venenatis lectus. </p>
							</div> -->
						</div> 
						<h5 class="breaking">Kegiatan Terbaru</h5>
					</div>	
				
						
						<div class="latest-articles">
							<div class="main-title-head">
								<h3>kegiatan Sebelumnya</h3>
								<a href="berita/Internasional">More  +</a>
								<div class="clearfix"></div>
							</div>
							<div class="world-news-grids">
								<?php 
								foreach ($b_sebel->result() as $row) {
								$isi = $row->isi;
								$id = $row->id_berita;
								$judul = $row->judul_berita;
								$link = set_linkurl($id,$judul);
								$isi = substr($isi, 0, 100);
								 ?>
								<div class="world-news-grid">
									<img src="image/berita/thumbnails/<?php echo $row->gambar; ?>" alt="" />
									<a href="berita/detail/<?php echo $link; ?>" class="title"><?php echo $judul; ?> </a>
									<?php echo $isi; ?>...
									<a href="berita/detail/<?php echo $link; ?>">Selengkapnya</a>
								</div>
								<?php } ?>
								<div class="clearfix"></div>
							</div>
						</div>
						
						
					
					
					<div class="clearfix"></div>	
				</div>
				</div>