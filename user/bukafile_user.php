<?php
if(isset($_GET['page'])) {
	switch ($_GET['page']){
		case 'Pencarian':
		require_once "cari.php";
		break;
		
		case 'Even':
		require_once "even.php";
		break;
		
		case 'Tambah Even':
		require_once "tambah_even.php";
		break;
		
		case 'Tambah Instansi':
		require_once "tambah_ins.php";
		break;
		
		case 'Tambah Kelas/Semester':
		require_once "tambah_kls.php";
		break;
				
		case 'Tambah Subjek':
		require_once "tambah_sub.php";
		break;
		
		case 'Ubah Even':
		require_once "tambah_even.php";
		break;
		
		case 'Ubah Instansi':
		require_once "tambah_ins.php";
		break;
		
		case 'Ubah Kelas/Semester':
		require_once "tambah_kls.php";
		break;
				
		case 'Ubah Subjek':
		require_once "tambah_sub.php";
		break;
		
		case 'Permintaan Fitur':
		require_once "minta.php";
		break;
		
		case 'Log Aktifitas':
		require_once "log.php";
		break;
		
		case 'Tambah Kriteria':
		require_once "spk_c.php";
		break;
		
		case 'Ubah Kriteria':
		require_once "spk_c.php";
		break;
		
		case 'Tambah Alternatif':
		require_once "spk_a.php";
		break;
		
		case 'Ubah Alternatif':
		require_once "spk_a.php";
		break;
		
		case 'Halaman Utama':
		require_once "rincian.php";
		break;

		case 'Ubah Profil':
		require_once "ubah_user.php";
		break;

		case 'Ubah Akun':
		require_once "ubah_akun_user.php";
		break;

		case 'jnfjencekn':
		require_once "ses_tampil_ev.php";
		break;

		case 'hdvtjbvhfnyg':
		require_once "ses_nav_data.php";
		break;

		case 'tdtfybtdsessmk':
		require_once "ses_tgl_ev.php";
		break;

		case 'krtxwwezhbfrre':
		require_once "hps_log.php";
		break;

		case 'jvekmknurhj4u4hrfehfebcfek':
		require_once "selesai_ev.php";
		break;

		case 'wjhedwukhu2h3uehiwjnwuhd':
		require_once "hps_ev.php";
		break;

		case 'fctrd4r4rdtddgswaq':
		require_once "hps_nav.php";
		break;

		case 'gvgcxdfcgvyhvtghuytufyderwe5':
		require_once "hps_c.php";
		break;

		case 'gjvfuy8yhiugyu8gibyvf':
		require_once "hps_a.php";
		break;

		case 'Logout':
		require_once "logout.php";
		break;
		
		default :
		echo "
			<meta http-equiv='refresh' content='1; url=index.php?page=Halaman Utama'>
			 ";
		echo "<div class='alert alert-danger'>
					<a href='' class='close' data-dismiss='alert'>&times;</a>URL Tidak Valid ! </div>";
		break;
	}
	
}else { echo "
			<meta http-equiv='refresh' content='1; url=index.php?page=Halaman Utama'>
			 ";
		echo "<div class='alert alert-danger'>
					<a href='' class='close' data-dismiss='alert'>&times;</a>URL Tidak Valid ! </div>";	 
		
}
?>