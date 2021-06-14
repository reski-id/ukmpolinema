<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Komentar</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="kategori" class="table table-bordered table-striped">
          <center><div class="berhasil" style="color: green;"></div></center>
          <thead>
          <tr>
            <th>No.</th>
            <th>Nama Lengkap</th>
            <th>Isi Komentar</th>
            <th>Status Tampil</th>
            <th>Pilihan</th>
          </tr>
          </thead>
          <tbody>
          <?php 
          $no = 1;
          foreach ($d_komentar->result() as $row) {
           ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row->nama_lengkap;?></td>
            <td><?php echo $row->isi_komentar; ?></td>
            <td>
              <?php if ($row->tampil == 'N') { ?>
              <form>
                <input type="radio" data-id="<?php echo $row->id_komentar; ?>" name="status" class="ya" value="Y" >Y
                <input type="radio" data-id="<?php echo $row->id_komentar; ?>" name="status" class="tidak" value="N" checked>N
              </form>
              <?php } else { ?>
              <form>
                <input type="radio" data-id="<?php echo $row->id_komentar; ?>" name="status" class="ya" value="Y" checked>Y
                <input type="radio" data-id="<?php echo $row->id_komentar; ?>" name="status" class="tidak" value="N" >N
              </form>
              <?php } ?>
            </td>
            <td>
              <a onclick="return confirm('Anda yakin ingin menghapus Komentar ini ?')" href="<?php echo base_url();?>webmin/hapus_komentar/<?php echo $row->id_komentar; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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