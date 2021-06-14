
      <div class="row">
  <div class="col-md-12">
    <a href="http://localhost/ukm/webmin/tambah_video">
      <button class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Video</button><br><br>
    </a>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Video</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="kategori" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No.</th>
            <th>Judul</th>
            <th>Video</th>

            <th>Pilihan</th>
          </tr>
          </thead>
         <tbody>
          <?php
          $no = 1;
          foreach ($data->result() as $row) {
           ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row->judul ?></td>
            <td><iframe width="560" height="315" src="<?php echo $row->url;?>" frameborder="0" allowfullscreen></iframe></td>
            <td>

              <a href="<?php echo base_url();?>webmin/hapus_video/<?php echo $row->id_video; ?>" onclick="return confirm('Anda yakin ingin menghapus ?')"><button class="btn btn-danger btn-flat btn-xs"><i class="fa fa-trash"></i></button></a>
            </td>
          </tr>
          <?php $no++; } ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>      <!-- /.row -->
    
