
<div class="row">
  <div class="col-md-12">
    <a href="<?php echo base_url();?>webmin/tambah_video">
      <?php
      if ($level == 'user') {?>
      <button class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Video</button><br><br>
      <?php
      } ?>
    </a>
    <div class="box">
      <div class="box-header">
          <h3 class="box-title">Data Video</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="Video" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th width="10">No.</th>
            <th>Judul</th>
            <th width="160">Video</th>
            <th width="160">Tanggal Pelaksanaan</th>
            <th width="250">Post By</th>
            <th width="5%">Pilihan</th>
          </tr>
          </thead>
          <tbody>
          <?php
          $no = 1;
          foreach ($d_video->result() as $row) {
            if ($row->username == NULL){
              $nama_lengkap = "-";
            }else{
              $nama_lengkap = $this->db->get_where('user', array('username' => $row->username))->row()->nama_lengkap;
            }
           ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row->judul; ?></td>
            <td>
              <?php if ($row->url == ""){ ?>
                        Video NULL
              <?php }else{ ?>
                        <iframe width="160" height="115" src="<?php echo $row->url;?>" frameborder="0" allowfullscreen></iframe><br/>
              <?php } ?>
            </td>
            <td><?php echo tgl_indo($row->tgl_pelaksanaan); ?></td>
            <td><?php echo $nama_lengkap; ?></td>
            <td>
              <a href="<?php echo base_url();?>webmin/hapus_video/<?php echo $row->id_video; ?>" onclick="return confirm('Anda yakin ingin menghapus Video <?php echo $row->id_video; ?> ?')"><button class="btn btn-danger btn-flat btn-xs"><i class="fa fa-trash"></i></button></a>
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
