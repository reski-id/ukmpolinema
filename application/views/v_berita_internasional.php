<div class="col-md-9 total-news">

				<div class="main-title-head">
					<h3>INFORMASI KEGIATAN</h3>
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
						<div class="world-news-grid col-md-3">
							<img src="image/berita/thumbnails/<?php echo $row->gambar; ?>" alt="" />
							<a href="berita/detail/<?php echo $link; ?>" class="title"><?php echo $judul; ?> </a>
							<?php echo $isi; ?>...
							<a href="berita/detail/<?php echo $link; ?>">Selengkapnya</a>
						</div>
						<?php
						} ?>
						<div class="clearfix"></div>
					</div>

	</div>

	<div class="col-md-3 side-bar">

		<div class="videos">
		<div class="main-title-head">
				<h5>Artikel Terkait</h5>
				<div class="clearfix"></div>
			</div>
			<?php

			// koneksi ke database
			//mysql_connect('localhost', 'root', '');
			//mysql_select_db('dbberita');


					// batas threshold 40%
					$threshold = 40;
					// jumlah maksimum artikel terkait yg ditampilkan 3 buah
					$maksArtikel = 3;

					// array yang nantinya diisi judul artikel terkait
					$listArtikel = Array();

					// membaca judul artikel dari ID tertentu (ID artikel acuan)
					// judul ini nanti akan dicek kemiripannya dengan artikel yang lain
					$query = "SELECT judul_berita FROM berita WHERE id_berita = '$id'";
					$hasil = $this->db->query($query);
					$hasil = $hasil->row();
					$judul = $hasil->judul_berita;

					// membaca semua data artikel selain ID artikel acuan
					$query = "SELECT id_berita, judul_berita FROM berita WHERE id_berita <> '$id'";
					$hasil = $this->db->query($query);

					foreach ($hasil->result() as $data)
					{
							// cek similaritas judul artikel acuan dengan judul artikel lainnya
							similar_text($judul, $data->judul_berita, $percent);
							if ($percent >= $threshold)
							{
									// jika prosentase kemiripan judul di atas threshold
									if (count($listArtikel) <= $maksArtikel)
									{
										 // jika jumlah artikel belum sampai batas maksimum, tambahkan ke dalam array
										$l = set_linkurl($data->id_berita,$data->judul_berita);
										 $listArtikel[] = "<a href='berita/detail/".$l."' class='title'>".$data->judul_berita."</a>";
									}
							}
					}

					// jika array listartikel tidak kosong, tampilkan listnya
					// jika kosong, maka tampilkan 'tidak ada artikel terkait'
					if (count($listArtikel) > 0)
					{
							echo "<ul>";
							for ($i=0; $i<=count($listArtikel)-1; $i++)
							{
									echo $listArtikel[$i];
							}
							echo "</ul>";
					}
					else echo "<p>Tidak ada artikel terkait</p>";

			?>


	<div class="clearfix"></div>
		</div>
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
