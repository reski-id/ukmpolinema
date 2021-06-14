<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah User</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form action="<?php echo base_url();?>webmin/tambah_user" method="POST" enctype="multipart/form-data">
        <div class="box-body">
          <!--
          <div class="form-group">
    				<label>Judul</label>
    				<input type="text" class="form-control" name="judul">
    				<div></div>
    			</div> -->
					<div class="form-group">
            <label>Level User</label>
            <select class="form-control" name="level">
							<option value="">-- Pilih Level User --</option>
							<option value="admin">Super Admin</option>
							<option value="user">Admin</option>
            </select>
            <div><?php echo form_error('level'); ?></div>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
            <div><?php echo form_error('username'); ?></div>
          </div>
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control">
            <div><?php echo form_error('nama'); ?></div>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" name="pass" class="form-control">
            <div><?php echo form_error('pass'); ?></div>
          </div>
          <div class="form-group">
            <label>Foto</label>
            <input type="file" class="form-control" name="userfile" required>
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
