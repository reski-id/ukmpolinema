<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Berita Foto</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form action="<?php echo base_url();?>webmin/edit_berita_foto/<?php echo $hasil->id_foto;?>" method="POST" enctype="multipart/form-data">
        <div class="box-body">
        <!--
          <div class="form-group">
    				<label>Judul</label>
    				<input type="text" class="form-control" name="judul" value="<?php echo $hasil->judul_berita_foto ?>">
    				<div></div>
    			</div> -->
          <div class="form-group">
            <label>Galeri</label>
            <select name="galeri" class="form-control">
              <?php 
              $id = $hasil->id_galeri;
              $sql = $this->db->get_where('galeri_foto', array('id_galeri' => $id))->row();
               ?>
              <option value="<?php echo $sql->id_galeri; ?>"><?php echo $sql->judul_galeri; ?></option>
              <?php foreach ($d_galeri->result() as $d) { ?>
              <option value="<?php echo $d->id_galeri;?>"><?php echo $d->judul_galeri; ?></option>
              <?php } ?>
            </select>
            <div><?php echo form_error('galeri'); ?></div>
          </div>
          <div class="form-group">
            <label>Caption Gambar</label>
            <textarea class="form-control ckeditor" name="isi" cols="30" rows="3"><?php echo $hasil->isi;?></textarea>
            <div><?php echo form_error('isi'); ?></div>
          </div>
          <div class="form-group">
            <label>Foto</label>
            <input type="file" class="form-control" name="userfile">
            <div>
              * ) Foto Sebelumnya <br>
              <img src="<?php echo base_url();?>image/bfoto/thumbnails/<?php echo $hasil->foto_berita_foto; ?>">
            </div>
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