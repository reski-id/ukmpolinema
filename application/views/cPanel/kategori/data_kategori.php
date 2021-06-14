<div class="row">
  <div class="col-md-12">
    <a href="<?php echo base_url();?>webmin/tambah_kategori">
      <button class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Kategori</button><br><br>
    </a>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Kategori</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="kategori" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No.</th>
            <th>Nama Kategori</th>
            <th>Pilihan</th>
          </tr>
          </thead>
          <tbody>
          <?php 
          $no = 1;
          foreach ($d_kategori->result() as $row) {
           ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row->nm_kategori; ?></td>
            <td>
              <a href="<?php echo base_url();?>webmin/edit_kategori/<?php echo $row->id_kategori; ?>"><button class="btn btn-info btn-flat btn-xs"><i class="fa fa-pencil-square-o"></i></button></a> 
              <a href="<?php echo base_url();?>webmin/hapus_kategori/<?php echo $row->id_kategori; ?>" onclick="return confirm('Anda yakin ingin menghapus kategori <?php echo $row->nm_kategori; ?> ?')"><button class="btn btn-danger btn-flat btn-xs"><i class="fa fa-trash"></i></button></a>
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