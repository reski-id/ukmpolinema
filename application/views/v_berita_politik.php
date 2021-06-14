<div class="col-md-9 total-news">
<div class="main-title-head">
	<h3>Berita Politik</h3>
	<div class="clearfix"></div>
</div>
					<div class="technology">
						<div class="tech-main">
						<?php foreach ($b_pol->result() as $sl) { 
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