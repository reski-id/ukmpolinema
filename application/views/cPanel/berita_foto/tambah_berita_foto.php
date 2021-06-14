<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah Berita Foto</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form action="<?php echo base_url();?>webmin/tambah_berita_foto" method="POST" enctype="multipart/form-data">
        <div class="box-body">
          <!--
          <div class="form-group">
    				<label>Judul</label>
    				<input type="text" class="form-control" name="judul">
    				<div></div>
    			</div> -->
          <div class="form-group">
            <label>Galeri</label>
            <select name="galeri" class="form-control">
              <option value="">--Pilih Galeri--</option>
              <?php foreach ($d_galeri->result() as $d) { ?>
              <option value="<?php echo $d->id_galeri;?>"><?php echo $d->judul_galeri; ?></option>
              <?php } ?>
            </select>
            <div><?php echo form_error('galeri'); ?></div>
          </div>
          <div class="form-group">
            <label>Caption Gambar</label>
            <textarea class="form-control ckeditor" name="isi" cols="30" rows="3"></textarea>
            <div><?php echo form_error('isi'); ?></div>
          </div>
          <div class="form-group">
            <label>Foto</label>
            <input type="file" class="form-control" name="userfile">
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <input type="submit" name="simpan" class="btn btn-primary btn-flat" value="Simpan">
          <input type="reset" class="btn btn-danger btn-flat" value="Batal">
        </div>
      </form>
    </div>        
	</div>
</div>