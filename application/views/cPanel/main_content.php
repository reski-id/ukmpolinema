<?php
switch ($jenis) {
	case 'home':
		include 'home/home.php';
		break;
	case 'Kategori':
		include 'kategori/data_kategori.php';
		break;
	case 'Tambah Kategori':
		include 'kategori/tambah_kategori.php';
		break;
	case 'Edit Kategori':
		include 'kategori/edit_kategori.php';
		break;
	case 'Video':
		include 'video/data_video.php';
		break;
	case 'Tambah Video':
		include 'video/tambah_video.php';
		break;
	case 'Galeri':
		include 'galeri_foto/data_galeri.php';
		break;
	case 'Tambah Galeri':
		include 'galeri_foto/tambah_galeri.php';
		break;
	case 'Edit Galeri':
		include 'galeri_foto/edit_galeri.php';
		break;
	case 'Berita Foto':
		include 'berita_foto/data_berita_foto.php';
		break;
	case 'Tambah Berita Foto':
		include 'berita_foto/tambah_berita_foto.php';
		break;
	case 'Edit Berita Foto':
		include 'berita_foto/edit_berita_foto.php';
		break;
	case 'Berita':
		include 'berita/data_berita.php';
		break;
	case 'Tambah Berita':
		include 'berita/tambah_berita.php';
		break;
	case 'Edit Berita':
		include 'berita/edit_berita.php';
		break;
	case 'Menu Utama':
		include 'menu/data_menu.php';
		break;
	case 'Tambah Menu':
		include 'menu/tambah_menu.php';
		break;
	case 'Edit Menu':
		include 'menu/edit_menu.php';
		break;
	case 'SubMenu Utama':
		include 'submenu/data_submenu.php';
		break;
	case 'Tambah SubMenu':
		include 'submenu/tambah_submenu.php';
		break;
	case 'Edit SubMenu':
		include 'submenu/edit_submenu.php';
		break;
	case 'Komentar':
		include 'komentar/data_komentar.php';
		break;
	case 'User':
		include 'user/data_user.php';
		break;
	case 'Tambah User':
		include 'user/tambah_user.php';
		break;
	case 'Profil':
		include 'profil.php';
		break;

	}

 ?>
