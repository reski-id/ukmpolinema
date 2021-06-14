<div class="row">
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Ubah Galeri</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form action="<?php echo base_url();?>webmin/edit_galeri/<?php echo $hasil->id_galeri;?>" method="POST" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label>Judul Galeri</label>
            <input type="text" class="form-control" name="judul" value="<?php echo $hasil->judul_galeri; ?>">
            <input type="hidden" name="penulis" value="<?php echo $nama_lengkap; ?>">
          </div>
          <div class="form-group">
            <label>Foto</label>
            <input type="file" class="form-control" name="userfile">
            <div>
              * ) Foto Sebelumnya <br>
              <img src="<?php echo base_url();?>image/galeri/thumbnails/<?php echo $hasil->foto_galeri; ?>">
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