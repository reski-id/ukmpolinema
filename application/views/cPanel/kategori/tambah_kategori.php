<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-plus"></i>Tambah Kategori</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url();?>webmin/tambah_kategori" method="POST">
              <div class="box-body">
                <div class="form-group">
					<label>Nama Kategori</label>
					<input type="text" class="form-control" name="kategori">
					<div><?php echo form_error('kategori'); ?></div>
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