<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Berita</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form action="<?php echo base_url();?>webmin/edit_berita/<?php echo $hasil->id_berita;?>" method="POST" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
    				<label>Judul</label>
    				<input type="text" class="form-control" name="judul" value="<?php echo $hasil->judul_berita;?>">
            <input type="hidden" name="penulis" value="<?php echo $nama_lengkap;?>">
    				<div><?php echo form_error('judul'); ?></div>
    			</div>
          <div class="form-group">
            <label>Lokasi</label>
            <select name="kategori" class="form-control">
              <option value="<?php echo $hasil->nm_kategori;?>"><?php echo $hasil->nm_kategori;?></option>
              <?php foreach ($d_kategori->result() as $d) { ?>
              <option value="<?php echo $d->nm_kategori;?>"><?php echo $d->nm_kategori; ?></option>
              <?php } ?>
            </select>
            <div><?php echo form_error('kategori'); ?></div>
          </div>
          <div class="form-group">
            <label>Isi Berita</label>
            <textarea class="form-control ckeditor" name="isi" cols="30" rows="3"><?php echo $hasil->isi;?></textarea>
            <div><?php echo form_error('isi'); ?></div>
          </div>
          <div class="form-group">
            <label>Gambar berita</label>
            <input type="file" class="form-control" name="userfile">
            <div>
              * ) Foto Sebelumnya <br>
              <img src="<?php echo base_url();?>image/berita/thumbnails/<?php echo $hasil->gambar; ?>">
            </div>
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <input type="submit" name="simpan" class="btn btn-primary btn-flat" value="Ubah">
          <input type="reset" class="btn btn-danger btn-flat" value="Batal">
        </div>
      </form>
    </div>        
	</div>
</div>