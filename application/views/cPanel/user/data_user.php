<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data User</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="kategori" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No.</th>
            <th>Foto</th>
            <th>Username</th>
            <th>Nama Lengkap</th>
            <th>Level User</th>
            <th>Pilihan</th>
          </tr>
          </thead>
          <tbody>
          <?php
          $no = 1;
          foreach ($d_user->result() as $row) {
           ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><img src="<?php echo base_url();?>image/user/<?php echo $row->foto_user;?>" style="width: 50px; height: 50px;"></td>
            <td><?php echo $row->username;?></td>
            <td><?php echo $row->nama_lengkap; ?></td>
            <td><?php if ($row->level == "admin"){echo'Super Admin';}else{echo'Admin';} ?></td>
            <td>
              <a onclick="return confirm('Anda yakin ingin menghapus user ini <?php echo $row->nama_lengkap; ?> ?')" href="<?php echo base_url();?>webmin/hapus_user/<?php echo $row->id_user; ?>/<?php echo $row->foto_user; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          <?php $no++; } ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
