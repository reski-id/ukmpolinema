<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>image/user/<?php echo $foto_user;?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $nama_lengkap;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <?php
        if ($level == 'user') {
         ?>
        <li class="treeview">
          <a href="<?php echo base_url();?>webmin">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>Berita</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>webmin/tambah_berita"><i class="fa fa-plus"></i>Tambah Berita</a></li>
            <li><a href="<?php echo base_url();?>webmin/berita"><i class="fa fa-inbox"></i>Data Berita</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>Komentar</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url();?>webmin/komentar"><i class="fa fa-inbox"></i>Data Komentar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-object-ungroup"></i> <span>Berita Foto</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>webmin/tambah_berita_foto"><i class="fa fa-plus"></i>Tambah Berita Foto</a></li>
            <li><a href="<?php echo base_url();?>webmin/berita_foto"><i class="fa fa-inbox"></i>Data Berita Foto</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-picture-o"></i> <span>Galeri Foto</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>webmin/tambah_galeri"><i class="fa fa-plus"></i>Tambah Galeri</a></li>
            <li><a href="<?php echo base_url();?>webmin/galeri"><i class="fa fa-inbox"></i>Data Galeri Foto</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-video-camera"></i> <span>Video</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>webmin/tambah_video"><i class="fa fa-plus"></i>Tambah Video</a></li>
            <li><a href="<?php echo base_url();?>webmin/video"><i class="fa fa-inbox"></i>Data Video</a></li>
          </ul>

        </li>
        <li class="treeview">
          <a href="<?php echo base_url();?>webmin/profil/<?php echo $username; ?>">
            <i class="fa fa-user"></i> <span>Profil</span>
          </a>
        </li>
        <!--
        <li class="treeview">
          <a href="#">
            <i class="fa fa-sliders"></i> <span>Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>webmin/tambah_menu"><i class="fa fa-plus"></i>Tambah Menu</a></li>
            <li><a href="<?php echo base_url();?>webmin/menu"><i class="fa fa-inbox"></i>Data Menu</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-qrcode"></i> <span>Submenu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>webmin/tambah_submenu"><i class="fa fa-plus"></i>Tambah Submenu</a></li>
            <li><a href="<?php echo base_url();?>webmin/submenu"><i class="fa fa-inbox"></i>Data Submenu</a></li>
          </ul>
        </li> -->
        <?php } else { ?>
        <li class="treeview">
          <a href="<?php echo base_url();?>webmin">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>Berita</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="<?php echo base_url();?>webmin/tambah_berita"><i class="fa fa-plus"></i>Tambah Berita</a></li> -->
            <li><a href="<?php echo base_url();?>webmin/berita"><i class="fa fa-inbox"></i>Data Berita</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>Komentar</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url();?>webmin/komentar"><i class="fa fa-inbox"></i>Data Komentar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-object-ungroup"></i> <span>Berita Foto</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="<?php echo base_url();?>webmin/tambah_berita_foto"><i class="fa fa-plus"></i>Tambah Berita Foto</a></li> -->
            <li><a href="<?php echo base_url();?>webmin/berita_foto"><i class="fa fa-inbox"></i>Data Berita Foto</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-picture-o"></i> <span>Galeri Foto</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>webmin/tambah_galeri"><i class="fa fa-plus"></i>Tambah Galeri</a></li>
            <li><a href="<?php echo base_url();?>webmin/galeri"><i class="fa fa-inbox"></i>Data Galeri Foto</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tasks"></i> <span>Kategori</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>webmin/tambah_kategori"><i class="fa fa-plus"></i>Tambah Kategori</a></li>
            <li><a href="<?php echo base_url();?>webmin/kategori"><i class="fa fa-inbox"></i>Data Kategori</a></li>
          </ul>
        </li>
        <!--
        <li class="treeview">
          <a href="#">
            <i class="fa fa-sliders"></i> <span>Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>webmin/tambah_menu"><i class="fa fa-plus"></i>Tambah Menu</a></li>
            <li><a href="<?php echo base_url();?>webmin/menu"><i class="fa fa-inbox"></i>Data Menu</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-qrcode"></i> <span>Submenu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>webmin/tambah_submenu"><i class="fa fa-plus"></i>Tambah Submenu</a></li>
            <li><a href="<?php echo base_url();?>webmin/submenu"><i class="fa fa-inbox"></i>Data Submenu</a></li>
          </ul>
        </li>
        -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Manajemen User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>webmin/tambah_user"><i class="fa fa-plus"></i>Tambah User</a></li>
            <li><a href="<?php echo base_url();?>webmin/user"><i class="fa fa-inbox"></i>Data User</a></li>
          </ul>

        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-video-camera"></i> <span>Video</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="<?php echo base_url();?>webmin/tambah_video"><i class="fa fa-plus"></i>Tambah Video</a></li> -->
            <li><a href="<?php echo base_url();?>webmin/video"><i class="fa fa-inbox"></i>Data Video</a></li>
          </ul>

        </li>


        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
