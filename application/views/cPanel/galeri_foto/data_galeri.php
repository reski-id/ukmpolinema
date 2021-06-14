<div class="row">
  <div class="col-md-12">
    <a href="<?php echo base_url();?>webmin/tambah_galeri">
      <button class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Galeri</button><br><br>
    </a>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Galeri Foto</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="kategori" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No.</th>
            <th>Tgl Posting</th>
            <th>judul</th>
            <th>Foto</th>
            <th>Post By</th>
            <th>Pilihan</th>
          </tr>
          </thead>
          <tbody>
          <?php
          $no = 1;
          foreach ($d_galeri->result() as $row) {
           ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo tgl_indo($row->tgl_post); ?></td>
            <td><?php echo $row->judul_galeri; ?></td>
            <td><img src="<?php echo base_url();?>image/galeri/thumbnails/<?php echo $row->foto_galeri; ?>"></td>
            <td><?php echo $row->created; ?></td>
            <td>
              <a href="<?php echo base_url();?>webmin/edit_galeri/<?php echo $row->id_galeri; ?>"><button class="btn btn-info btn-flat btn-xs"><i class="fa fa-pencil-square-o"></i></button></a>
              <a href="<?php echo base_url();?>webmin/hapus_galeri/<?php echo $row->id_galeri; ?>/<?php echo $row->foto_galeri; ?>" onclick="return confirm('Anda yakin ingin menghapus galeri berjudul <?php echo $row->judul_galeri; ?> ?')"><button class="btn btn-danger btn-flat btn-xs"><i class="fa fa-trash"></i></button></a>
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
