<?php 
switch ($jenis) {
	case 'home':
		include 'v_berita.php';
		break;
	case 'cari':
		include 'tes_cari.php';
		break;
	case 'teknologi':
		include 'v_berita_teknologi.php';
		break;
	case 'politik':
		include 'v_berita_politik.php';
		break;
	case 'internasional':
		include 'v_berita_internasional.php';
		break;
	case 'olahraga':
		include 'v_berita_olahraga.php';
		break;
	case 'bisnis':
		include 'v_berita_bisnis.php';
		break;
	case 'otomotif':
		include 'v_berita_otomotif.php';
		break;
	case 'entertainment':
		include 'v_berita_entertainment.php';
		break;
	case 'property':
		include 'v_berita_property.php';
		break;


	}

 ?>