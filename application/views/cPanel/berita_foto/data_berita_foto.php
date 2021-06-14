<div class="row">
  <div class="col-md-12">
    <a href="<?php echo base_url();?>webmin/tambah_berita_foto">
      <?php
      if ($level == 'user') {?>
      <button class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Berita Foto</button><br><br>
      <?php
      } ?>
    </a>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Berita Foto</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="kategori" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No.</th>
            <th>Galeri</th>
            <th>Isi</th>
            <th>Foto</th>
            <th>Post By</th>
            <th>Pilihan</th>
          </tr>
          </thead>
          <tbody>
          <?php
          $no = 1;
          foreach ($d_bfoto->result() as $row) {
            if ($row->username == NULL){
              $nama_lengkap = "-";
            }else{
              $nama_lengkap = $this->db->get_where('user', array('username' => $row->username))->row()->nama_lengkap;
            }
           ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row->judul_galeri;?></td>
            <td><?php echo $row->isi; ?></td>
            <td><img src="<?php echo base_url();?>image/bfoto/thumbnails/<?php echo $row->foto_berita_foto; ?>"></td>
            <td><?php echo $nama_lengkap; ?></td>
            <td>
              <a href="<?php echo base_url();?>webmin/edit_berita_foto/<?php echo $row->id_foto; ?>"><button class="btn btn-info btn-flat btn-xs"><i class="fa fa-pencil-square-o"></i></button></a>
              <a href="<?php echo base_url();?>webmin/hapus_berita_foto/<?php echo $row->id_foto; ?>/<?php echo $row->foto_berita_foto; ?>" onclick="return confirm('Anda yakin ingin menghapus berita berjudul <?php echo $row->judul_berita_foto; ?> ?')"><button class="btn btn-danger btn-flat btn-xs"><i class="fa fa-trash"></i></button></a>
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
