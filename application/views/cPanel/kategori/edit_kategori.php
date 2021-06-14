<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Kategori</h3>
      </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="<?php echo base_url();?>webmin/edit_kategori/<?php echo $hasil->id_kategori; ?>" method="POST">
          <div class="box-body">
            <div class="form-group">
      			<label>Nama Kategori</label>
      			<input type="text" class="form-control" name="kategori" value="<?php echo $hasil->nm_kategori ?>">
      		</div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Ubah</button>
            <button type="reset" class="btn btn-danger">Batal</button>
          </div>
        </form>
    </div>        
	</div>
</div>