<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <!--<h3 class="box-title">Profil</h3> -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-striped">
          <tr>
            <th width="110">Foto</th>
            <td width="1%">:</td>
            <td><img src="<?php echo base_url();?>image/user/<?php echo $hasil->foto_user; ?>" style="width: 100px; height: 100px;"></td>
          </tr>
          <tr>
            <th>Level User</th>
            <td>:</td>
            <td><?php if ($hasil->level == "admin"){echo'Super Admin';}else{echo'Admin';} ?></td>
          </tr>
          <tr>
            <th>Username</th>
            <td>:</td>
            <td><?php echo $hasil->username; ?></td>
          </tr>
          <tr>
            <th>Nama Lengkap</th>
            <td>:</td>
            <td><?php echo $hasil->nama_lengkap; ?></td>
          </tr>
          <tr>
            <th>Password</th>
            <td>:</td>
            <td><button class="btn btn-warning" data-toggle="modal" data-target="#Mypass" data-backdrop="true">Ubah Password</button></td>
          </tr>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>

<!-- Modal -->
  <div class="modal fade" id="Mypass" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
    <form action="<?php echo base_url();?>webmin/ubah_password" method="POST">
      <div class="modal-content">
        <div class="modal-body">
          <div class="form-group">
            <label>Password Lama</label>
            <input type="password" name="lama" class="form-control" required>
            <input type="hidden" name="username" value="<?php echo $hasil->username; ?>">
            <?php echo form_error('lama'); ?>
          </div>
          <div class="form-group">
            <label>Password Baru</label>
            <input type="password" name="baru" class="form-control" required>
            <?php echo form_error('baru'); ?>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" name="simpan" class="btn btn-primary" value="Ubah">
        </div>
      </div>
    </form>
    </div>
  </div>
