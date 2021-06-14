<div class="row">
  <div class="col-md-12">
    <a href="<?php echo base_url();?>webmin/tambah_berita">
      <?php
      if ($level == 'user') {?>
      <button class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Berita</button><br><br>
      <?php
      } ?>
    </a>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Berita</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="kategori" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No.</th>
            <th>Tanggal Post</th>
            <th>Kategori</th>
            <th>Judul</th>
            <th>Foto</th>
            <th>Post By</th>
            <th>Pilihan</th>
          </tr>
          </thead>
          <tbody>
          <?php
          $no = 1;
          foreach ($d_berita as $row) {
           ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo tgl_indo($row->tgl_post); ?></td>
            <td><?php echo $row->nm_kategori;?></td>
            <td><?php echo $row->judul_berita; ?></td>
            <td><img src="<?php echo base_url();?>image/berita/thumbnails/<?php echo $row->gambar; ?>"></td>
            <td><?php echo $row->created; ?></td>
            <td>
              <a href="<?php echo base_url();?>webmin/edit_berita/<?php echo $row->id_berita; ?>"><button class="btn btn-info btn-flat btn-xs"><i class="fa fa-pencil-square-o"></i></button></a>
              <a href="<?php echo base_url();?>webmin/hapus_berita/<?php echo $row->id_berita; ?>/<?php echo $row->gambar; ?>" onclick="return confirm('Anda yakin ingin menghapus berita berjudul <?php echo $row->judul_berita; ?> ?')"><button class="btn btn-danger btn-flat btn-xs"><i class="fa fa-trash"></i></button></a>
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
