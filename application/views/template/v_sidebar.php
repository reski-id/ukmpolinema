				<div class="col-md-3 side-bar">
							
					<div class="videos">
					<!-- <div class="main-title-head">
							<h5>Kategori</h5>
							<div class="clearfix"></div>
						</div>
						<?php foreach ($b_sid->result() as $sl) { 
						?>
								<a href="berita/kategori/<?php echo $sl->nm_kategori; ?>" class="title"><?php echo $sl->nm_kategori;?> </a>
						<?php } ?>
						
						<div class="clearfix"></div>
					</div> -->
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
							
						</div>
					</div>
					
					<div class="clearfix"></div>
				</div>	
				<div class="clearfix"></div>