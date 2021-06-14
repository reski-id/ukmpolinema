<div class="row">
  <div class="col-md-12">
    <a href="<?php echo base_url();?>webmin/tambah_submenu">
      <button class="btn btn-primary"><i class="fa fa-plus"></i>Tambah SubMenu</button><br><br>
    </a>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data SubMenu</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="kategori" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No.</th>
            <th>Menu</th>
            <th>SubMenu</th>
            <th>Url submenu</th>
            <th>Pilihan</th>
          </tr>
          </thead>
          <tbody>
          <?php 
          $no = 1;
          foreach ($d_submenu->result() as $row) {
           ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row->menu; ?></td>
            <td><?php echo $row->submenu; ?></td>
            <td><?php echo $row->url_submenu; ?></td>
            <td>
              <a href="<?php echo base_url();?>webmin/edit_submenu/<?php echo $row->id_sub; ?>"><button class="btn btn-info btn-flat btn-xs"><i class="fa fa-pencil-square-o"></i></button></a> 
              <a href="<?php echo base_url();?>webmin/hapus_menu/<?php echo $row->id_sub; ?>" onclick="return confirm('Anda yakin ingin menghapus submenu <?php echo $row->submenu; ?> ?')"><button class="btn btn-danger btn-flat btn-xs"><i class="fa fa-trash"></i></button></a>
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