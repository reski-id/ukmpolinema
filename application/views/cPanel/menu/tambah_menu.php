<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Menu</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url();?>webmin/tambah_menu" method="POST">
              <div class="box-body">
                <div class="form-group">
        					<label>Menu</label>
        					<input type="text" class="form-control" name="menu">
        					<div><?php echo form_error('menu'); ?></div>
      				  </div>
                <div class="form-group">
                  <label>Url Menu</label>
                  <input type="text" class="form-control" name="url">
                  <div><?php echo form_error('url'); ?></div>
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