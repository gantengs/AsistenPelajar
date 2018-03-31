

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php	echo " ".$_GET['page']." "; ?> | Asisten Pelajar</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
	<!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="../vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.skinSimple.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
	<!-- Bootstrap Colorpicker -->
    <link href="../vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
	
    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap-datepicker.css" />
	
	<link href="../documentation/images/icon.png" rel="shortcut icon">
  </head>

  <body class="nav-md">
<?php
session_start();
require_once "koneksi.php";

if (isset($_SESSION['ses_user'])=="") {
	echo "<div class='alert alert-danger'>
		<a href='' class='close' data-dismiss='alert'>&times;</a>Anda harus Masuk terlebih dahulu !		</div>";
	echo "<meta http-equiv='refresh'content='1; url=login.php'>";
}else{
				
	$user = $_SESSION['ses_user'];
	$SessionUser = mysql_query("SELECT * FROM user WHERE id_user = '$user'") or die(mysql_error());
	$data_user = mysql_fetch_array($SessionUser);

	$sql_1 = mysql_query("SELECT * FROM instansi WHERE id_user='".$_SESSION['ses_user']."'") or die (mysql_error());
	$cek_1=mysql_num_rows($sql_1);
	$data_cek_1 = mysql_fetch_array($sql_1);
	
	if($_GET['page']=="Tambah Instansi" || $_GET['page']=="Tambah Kelas/Semester") {
	}else{	
		if ($cek_1 >=1 ){
			
			$sql_2 = mysql_query("SELECT * FROM kelas natural join instansi WHERE id_user='".$_SESSION['ses_user']."'") or die (mysql_error());
			$cek_2=mysql_num_rows($sql_2);
				
			if ($cek_2 >=1 ){
				
			}else{
				echo "<div class='alert alert-danger'>
				<a href='' class='close' data-dismiss='alert'>&times;</a>Anda harus Mengisi data Kelas/Semester terlebih dahulu agar dapat menggunakan fitur-fitur pada Situs ini		</div>";
				echo "<meta http-equiv='refresh'content='3; url=?page=Tambah Kelas/Semester&hbvjklsbhsjsbhb=".$data_cek_1['id_ins']."'>";
			}
			
		}else{
			echo "<div class='alert alert-danger'>
			<a href='' class='close' data-dismiss='alert'>&times;</a>Anda harus Mengisi data Instansi dan Kelas/Semester terlebih dahulu agar dapat menggunakan fitur-fitur pada Situs ini		</div>";
			echo "<meta http-equiv='refresh'content='3; url=?page=Tambah Instansi'>";
		}
	}
	
?>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php?page=Halaman Utama" title="Halaman Utama" class="site_title"><i class="fa fa-graduation-cap"></i><span> Asisten Pelajar ! </span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3></h3>
                <ul class="nav side-menu">
                  <li><a title="Tampilkan Even untuk..."><i class="fa fa-home"></i> Navigasi Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <?php
							$sqlnav = mysql_query("select*from instansi natural join jenjang where id_user='".$_SESSION["ses_user"]."' and hps_ins='no' order by id_jnjg desc")
							or die (mysql_error());
						    while ($data_nav_ins = mysql_fetch_array($sqlnav)) {
						?>
						<li><a>* <?php echo $data_nav_ins['singkat_jnjg']." ".$data_nav_ins['nama_ins']; ?><span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <?php
								$sqlnav2 = mysql_query("select*from instansi natural join kelas where id_user='".$_SESSION["ses_user"]."' and id_ins='".$data_nav_ins['id_ins']."' and hps_kls='no' order by nama_kls desc")
								or die (mysql_error());
								while ($data_nav_kls = mysql_fetch_array($sqlnav2)) {
							?>
							<li>
							<?php
								$sqltgl_kls_format_nv = mysql_query("select DATE_FORMAT('".$data_nav_kls['tgl_kls']."', '%d %b %Y') as tgl")
								or die (mysql_error());
								$data_tgl_kls_format_nv=mysql_fetch_array($sqltgl_kls_format_nv);
							?>
							<a href="?page=hdvtjbvhfnyg&uhbfdsgq=<?php	echo "".$_GET['page'].""; ?>&hdvtjbvhfnyg=<?php echo $data_nav_kls['id_kls'];?>" title="Tanggal masuk : <?php echo $data_tgl_kls_format_nv['tgl'];?>">
							# <?php echo $data_nav_kls['nama_kls']." (".$data_nav_kls['smtr_kls'].")"; ?></a>
							</li>
							<?php
								}
							?>
                          </ul>
                        </li>
						<?php
							}
						?>
                    </ul>
                  </li>
				  <li><a href="index.php?page=Even" title="Menampilkan Even pada Kalender"><i class="fa fa-calendar"></i> Even <span class="fa fa-arrow-right"></span></a>
                  </li>
				  <li><a title="Terkait Instansi, Kelas/Semester, & Subjek"><i class="fa fa-cog"></i> Kelola <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="?page=Tambah Instansi"><i class="fa fa-plus"><span>Instansi</span></i></a>
                        </li>
                        <?php
							$sqlkel = mysql_query("select*from instansi natural join jenjang where id_user='".$_SESSION["ses_user"]."' and hps_ins='no' order by id_jnjg desc")
							or die (mysql_error());
						    while ($data_kel_ins = mysql_fetch_array($sqlkel)) {
						?>
						<li><a>* <?php echo $data_kel_ins['singkat_jnjg']." ".$data_kel_ins['nama_ins']; ?><span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="?page=Ubah Instansi&ejviejnrjinencij=<?php echo $data_kel_ins['id_ins'];?>"><i class="fa fa-edit"></i></a>
                            </li>
                            <li><a><i class="fa fa-trash"><span>...?</span></i></a>
							  <ul class="nav child_menu">
								<li class="sub_menu"><a href="?page=fctrd4r4rdtddgswaq&uhbfdsgq=<?php	echo "".$_GET['page'].""; ?>&fcchcgcfccdxzeswzrfdxtrd=<?php echo $data_kel_ins['id_ins'];?>&gvhvvghlyftgtkfckftgkf=fcfgdrsrrtr65e4dr6d&tyf56ftyf67gtytfytftygu=ftxrfr656tyfidtrd5dcyx" onClick="return confirm('Yakin menghapus data ?');"><i class="fa fa-hand-o-down"><i class="fa fa-trash"></i></i></a>
								</li>
							  </ul>
							</li>
							<li><a href="?page=Tambah Kelas/Semester&hbvjklsbhsjsbhb=<?php echo $data_kel_ins['id_ins'];?>"><i class="fa fa-plus"><span>Kelas/Semester</span></i></a>
							</li>
							<?php
								$sqlkel2 = mysql_query("select*from instansi natural join kelas where id_user='".$_SESSION["ses_user"]."' and id_ins='".$data_kel_ins['id_ins']."' and hps_kls='no' order by nama_kls desc")
								or die (mysql_error());
								while ($data_kel_kls = mysql_fetch_array($sqlkel2)) {
							?>
							<li><a># <?php echo $data_kel_kls['nama_kls']." (".$data_kel_kls['smtr_kls'].")"; ?><span class="fa fa-chevron-down"></span></a>
							  <ul class="nav child_menu">
								<li class="sub_menu"><a href="?page=Ubah Kelas/Semester&ejviejnrjinencij=<?php echo $data_kel_kls['id_kls']?>&hbvjklsbhsjsbhb=<?php echo $data_kel_ins['id_ins'];?>"><i class="fa fa-edit"></i></a>
								</li>
								<li><a><i class="fa fa-trash"><span>...?</span></i></a>
								  <ul class="nav child_menu">
									<li class="sub_menu"><a href="?page=fctrd4r4rdtddgswaq&uhbfdsgq=<?php	echo "".$_GET['page'].""; ?>&fcchcgcfccdxzeswzrfdxtrd=<?php echo $data_kel_kls['id_kls'];?>&gvhvvghlyftgtkfckftgkf=fcfgdrsrrtr65e4dr6d&tyf56ftyf67gtytfytftygu=tyftdtctd65td7dtcgyuyg" onClick="return confirm('Yakin menghapus data ?');"><i class="fa fa-hand-o-down"><i class="fa fa-trash"></i></i></a>
									</li>
								  </ul>
								</li>
								<li><a href="?page=Tambah Subjek&hbvjklsbhsjsbhb=<?php echo $data_kel_kls['id_kls'];?>"><i class="fa fa-plus"><span>Subjek</span></i></a>
								</li>
								<?php
									$sqlkel3 = mysql_query("select*from subjek natural join kelas where id_kls='".$data_kel_kls['id_kls']."' and hps_sub='no' order by nama_sub desc")
									or die (mysql_error());
									while ($data_kel_sub = mysql_fetch_array($sqlkel3)) {
								?>
								<li><a><span class="pull-right" style="background-color:<?php echo $data_kel_sub['warna_sub'];?>;"><p>&nbsp;&nbsp;</p></span>^ <?php echo $data_kel_sub['nama_sub'];?><span class="fa fa-chevron-down"></span></a>
								  <ul class="nav child_menu">
									<li class="sub_menu"><a href="?page=Ubah Subjek&ejviejnrjinencij=<?php echo $data_kel_sub['id_sub'];?>&hbvjklsbhsjsbhb=<?php echo $data_kel_kls['id_kls'];?>"><i class="fa fa-edit"></i></a>
									</li>
									<li><a><i class="fa fa-trash"><span>...?</span></i></a>
									  <ul class="nav child_menu">
										<li class="sub_menu"><a href="?page=fctrd4r4rdtddgswaq&uhbfdsgq=<?php	echo "".$_GET['page'].""; ?>&fcchcgcfccdxzeswzrfdxtrd=<?php echo $data_kel_sub['id_sub'];?>&gvhvvghlyftgtkfckftgkf=fcfgdrsrrtr65e4dr6d&tyf56ftyf67gtytfytftygu=ygvgtdrftgcvytfdydtfyvfygvtf" onClick="return confirm('Yakin menghapus data ?');"><i class="fa fa-hand-o-down"><i class="fa fa-trash"></i></i></a>
										</li>
									  </ul>
									</li>
								  </ul>
								</li>
								<?php
									}
								?>
							  </ul>
							</li>
							<?php
								}
							?>
                          </ul>
                        </li>
						<?php
							}
						?>
                    </ul>
				  </li>
				  <li><a title="Mengembalikan data yang telah terhapus"><i class="fa fa-trash-o"></i> Sampah <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <?php
							$sqlsm = mysql_query("select*from instansi natural join jenjang where id_user='".$_SESSION["ses_user"]."' order by id_jnjg desc")
							or die (mysql_error());
						    while ($data_sm_ins = mysql_fetch_array($sqlsm)) {
						?>
						<li><a>* <?php echo $data_sm_ins['singkat_jnjg']." ".$data_sm_ins['nama_ins']; ?><span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <?php
							if ($data_sm_ins['hps_ins']=="yes"){
							?>
							<li><a><i class="fa fa-repeat"></i></a>
							  <ul class="nav child_menu">
								<li class="sub_menu"><a href="?page=fctrd4r4rdtddgswaq&uhbfdsgq=<?php	echo "".$_GET['page'].""; ?>&fcchcgcfccdxzeswzrfdxtrd=<?php echo $data_sm_ins['id_ins'];?>&gvhvvghlyftgtkfckftgkf=hcnehuwhiwencehunc&tyf56ftyf67gtytfytftygu=ftxrfr656tyfidtrd5dcyx" onClick="return confirm('Yakin ingin mengembalikan data ?');"><i class="fa fa-hand-o-up"><i class="fa fa-trash"></i></i></a>
								</li>
							  </ul>
							</li>
							<?php
							}
								$sqlsm2 = mysql_query("select*from instansi natural join kelas where id_user='".$_SESSION["ses_user"]."' and id_ins='".$data_sm_ins['id_ins']."' order by nama_kls desc")
								or die (mysql_error());
								while ($data_sm_kls = mysql_fetch_array($sqlsm2)) {
							?>
							<li><a># <?php echo $data_sm_kls['nama_kls']." (".$data_sm_kls['smtr_kls'].")"; ?><span class="fa fa-chevron-down"></span></a>
							  <ul class="nav child_menu">
								<?php
								if ($data_sm_kls['hps_kls']=="yes"){
								?>
								<li><a><i class="fa fa-repeat"></i></a>
								  <ul class="nav child_menu">
									<li class="sub_menu"><a href="?page=fctrd4r4rdtddgswaq&uhbfdsgq=<?php	echo "".$_GET['page'].""; ?>&fcchcgcfccdxzeswzrfdxtrd=<?php echo $data_sm_kls['id_kls'];?>&gvhvvghlyftgtkfckftgkf=hcnehuwhiwencehunc&tyf56ftyf67gtytfytftygu=tyftdtctd65td7dtcgyuyg" onClick="return confirm('Yakin ingin mengembalikan data ?');"><i class="fa fa-hand-o-up"><i class="fa fa-trash"></i></i></a>
									</li>
								  </ul>
								</li>
								<?php
								}
									$sqlsm3 = mysql_query("select*from subjek natural join kelas where id_kls='".$data_sm_kls['id_kls']."' order by nama_sub desc")
									or die (mysql_error());
									while ($data_sm_sub = mysql_fetch_array($sqlsm3)) {
								?>
								<li><a><span class="pull-right" style="background-color:<?php echo $data_sm_sub['warna_sub'];?>;"><p>&nbsp;&nbsp;</p></span><?php echo $data_sm_sub['nama_sub'];?><span class="fa fa-chevron-down"></span></a>
								  <ul class="nav child_menu">
									<?php
									if ($data_sm_sub['hps_sub']=="yes"){
									?>
									<li><a><i class="fa fa-repeat"></i></span></a>
									  <ul class="nav child_menu">
										<li class="sub_menu"><a href="?page=fctrd4r4rdtddgswaq&uhbfdsgq=<?php	echo "".$_GET['page'].""; ?>&fcchcgcfccdxzeswzrfdxtrd=<?php echo $data_sm_sub['id_sub'];?>&gvhvvghlyftgtkfckftgkf=hcnehuwhiwencehunc&tyf56ftyf67gtytfytftygu=ygvgtdrftgcvytfdydtfyvfygvtf" onClick="return confirm('Yakin ingin mengembalikan data ?');"><i class="fa fa-hand-o-up"><i class="fa fa-trash"></i></i></a>
										</li>
									  </ul>
									</li>
									<?php
									}
									?>
								  </ul>
								</li>
								<?php
									}
								?>
							  </ul>
							</li>
							<?php
								}
							?>
                          </ul>
                        </li>
						<?php
							}
						?>
                    </ul>
				  </li>
				  <li><a href="javascript:void(0)"><i class="fa fa-calculator"></i> Prediksi Nilai <span class="label label-success pull-right">Segera hadir</span></a></li>
				  <li><a href="javascript:void(0)"><i class="fa fa-group"></i> Grup Diskusi <span class="label label-success pull-right">Segera hadir</span></a></li>
                 </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

           
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false" title="Klik untuk Keluar / Mengubah Akun anda">
                    <i class="fa fa-<?php echo $data_user['jekel_user']; ?>"> </i>
					<strong>
					<?php echo $data_user['nama_user']; ?>
					</strong>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="?page=Ubah Profil"><i class="glyphicon glyphicon-user pull-right"></i><i class="glyphicon glyphicon-pencil pull-right"></i> Kelola Profil</a></li>
                    <li><a href="?page=Log Aktifitas"><i class="fa fa-list-alt pull-right"></i> Log Aktifitas</a></li>
					<li><a href="?page=Tambah Kriteria"><i class="fa fa-line-chart pull-right"></i> Bantu memilih sekolah !<span class="label label-success pull-right">Beta</span></a></li>
					<li><a href="?page=Logout"  onClick="return confirm('Yakin ingin keluar ?');"><i class="fa fa-sign-out pull-right"></i> Keluar</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false" title="Semua Even">
                    <i class="glyphicon glyphicon-tasks"></i>
                    <?php
						$sql_dt = mysql_query("select*from even natural join subjek natural join kelas natural join instansi where id_user='".$_SESSION["ses_user"]."' and id_kls='".$_SESSION["ses_nav_data"]."' and hps_sub='no' order by tgl_ev")
						or die (mysql_error());
						$sql = mysql_query("select*from even natural join subjek natural join kelas natural join instansi where id_user='".$_SESSION["ses_user"]."' and id_kls='".$_SESSION["ses_nav_data"]."' and hps_sub='no' order by tgl_ev desc limit 5")
						or die (mysql_error());
						$jml_dt=mysql_num_rows($sql_dt);
					?>
					<span class="badge bg-blue"><?php echo $jml_dt; ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a href="?page=jnfjencekn&jnfjencekn=sjdncjndcnjcdsw&ytdtdtjjnbjhfrtr65tftydrdygdsdsfyvtvy=kjjbhvgv" target="blank">
                        <div class="text-center">
                          <strong>Semua</strong>
                          <i class="fa fa-print pull-right"> Cetak</i>
                        </div>
                      </a>
                    </li>
					<?php
						while ($data_cari = mysql_fetch_array($sql)) {
					?>
					<li>
                      <?php
							$sqltgl_kls_format_1 = mysql_query("select DATE_FORMAT('".$data_cari['tgl_ev']."', '%d %b %Y') as tgl")
							or die (mysql_error());
							$data_tgl_kls_format_1=mysql_fetch_array($sqltgl_kls_format_1);
					  ?>
					  <a href="?page=tdtfybtdsessmk&khxhjhergfbjr=<?php echo $data_cari['tgl_ev']; ?>">
                        <span>
                          <span><b><u><?php echo $data_cari['nama_sub']; ?></u> <?php echo $data_cari['nama_ev']; ?></b></span>
                          <span class="time"><?php echo $data_tgl_kls_format_1['tgl']; ?></span>
                        </span>
                        <span class="message">
                          <span class="pull-right" style="background-color:<?php echo $data_cari['warna_sub']; ?>;"><p>&nbsp;&nbsp;&nbsp;</p></span>								
							<?php echo $data_cari['des_ev']; ?>
                        </span>
                      </a>
                    </li>
					<?php 
					}
					?>
                    <li>
                      <a href="?page=jnfjencekn&jnfjencekn=sjdncjndcnjcdsw">
                        <div class="text-center">
                          <i class="fa fa-chevron-left pull-left"></i>
                          <strong>Tampilkan Semua</strong>
                          <i class="fa fa-chevron-right pull-right"></i>
                        </div>
                      </a>
                    </li>
                  </ul>
                </li>
				<li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false" title="Even Telah Selesai">
                    <i class="glyphicon glyphicon-tasks"></i>
                    <?php
						$sql_dts = mysql_query("select*from even natural join subjek natural join kelas natural join instansi where id_user='".$_SESSION["ses_user"]."' and id_kls='".$_SESSION["ses_nav_data"]."' and selesai_ev='Sudah Selesai' and hps_sub='no' order by tgl_ev")
						or die (mysql_error());
						$sql = mysql_query("select*from even natural join subjek natural join kelas natural join instansi where id_user='".$_SESSION["ses_user"]."' and id_kls='".$_SESSION["ses_nav_data"]."' and selesai_ev='Sudah Selesai' and hps_sub='no' order by tgl_ev desc limit 5")
						or die (mysql_error());
						$jml_dt_sdh=mysql_num_rows($sql_dts);
					?>
                    <span class="badge bg-green"><?php echo $jml_dt_sdh; ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a href="?page=jnfjencekn&jnfjencekn=axbjhcnjenjcn&ytdtdtjjnbjhfrtr65tftydrdygdsdsfyvtvy=kjjbhvgv" target="blank">
                        <div class="text-center">
                          <strong>Sudah Selesai</strong>
                          <i class="fa fa-print pull-right"> Cetak</i>
                        </div>
                      </a>
                    </li>
					<?php
						while ($data_cari_sdh = mysql_fetch_array($sql)) {
					?>
					<li>
                      <?php
							$sqltgl_kls_format_2 = mysql_query("select DATE_FORMAT('".$data_cari_sdh['tgl_ev']."', '%d %b %Y') as tgl")
							or die (mysql_error());
							$data_tgl_kls_format_2=mysql_fetch_array($sqltgl_kls_format_2);
					  ?>
					  <a href="?page=tdtfybtdsessmk&khxhjhergfbjr=<?php echo $data_cari_sdh['tgl_ev']; ?>">
                        <span>
                          <span><b><u><?php echo $data_cari_sdh['nama_sub']; ?></u> <?php echo $data_cari_sdh['nama_ev']; ?></b></span>
                          <span class="time"><?php echo $data_tgl_kls_format_2['tgl']; ?></span>
                        </span>
                        <span class="message">
                          <span class="pull-right" style="background-color:<?php echo $data_cari_sdh['warna_sub']; ?>;"><p>&nbsp;&nbsp;&nbsp;</p></span>								
							<?php echo $data_cari_sdh['des_ev']; ?>
                        </span>
                      </a>
                    </li>
					<?php 
					}
					?>
                    <li>
                      <a href="?page=jnfjencekn&jnfjencekn=axbjhcnjenjcn">
                        <div class="text-center">
                          <i class="fa fa-chevron-left pull-left"></i>
                          <strong>Tampilkan Semua</strong>
                          <i class="fa fa-chevron-right pull-right"></i>
                        </div>
                      </a>
                    </li>
                  </ul>
                </li>
				<li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false" title="Even Belum Selesai">
                    <i class="glyphicon glyphicon-tasks"></i>
                    <?php
						$sql_dtb = mysql_query("select*from even natural join subjek natural join kelas natural join instansi where id_user='".$_SESSION["ses_user"]."' and id_kls='".$_SESSION["ses_nav_data"]."' and selesai_ev='Belum Selesai' and hps_sub='no' order by tgl_ev")
						or die (mysql_error());
						$sql = mysql_query("select*from even natural join subjek natural join kelas natural join instansi where id_user='".$_SESSION["ses_user"]."' and id_kls='".$_SESSION["ses_nav_data"]."' and selesai_ev='Belum Selesai' and hps_sub='no' order by tgl_ev limit 5")
						or die (mysql_error());
						$jml_dt_blm=mysql_num_rows($sql_dtb);
					?>
                    <span class="badge bg-red"><?php echo $jml_dt_blm; ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a href="?page=jnfjencekn&jnfjencekn=wdbwjbhdw&ytdtdtjjnbjhfrtr65tftydrdygdsdsfyvtvy=kjjbhvgv" target="blank">
                        <div class="text-center">
                          <strong>Belum Selesai</strong>
                          <i class="fa fa-print pull-right"> Cetak</i>
                        </div>
                      </a>
                    </li>
					<?php
						while ($data_cari_blm = mysql_fetch_array($sql)) {
					?>
					<li>
                      <?php
							$sqltgl_kls_format_3 = mysql_query("select DATE_FORMAT('".$data_cari_blm['tgl_ev']."', '%d %b %Y') as tgl")
							or die (mysql_error());
							$data_tgl_kls_format_3=mysql_fetch_array($sqltgl_kls_format_3);
					  ?>
					  <a href="?page=tdtfybtdsessmk&khxhjhergfbjr=<?php echo $data_cari_blm['tgl_ev']; ?>">
                        <span>
                          <span><b><u><?php echo $data_cari_blm['nama_sub']; ?></u> <?php echo $data_cari_blm['nama_ev']; ?></b></span>
                          <span class="time"><?php echo $data_tgl_kls_format_3['tgl']; ?></span>
                        </span>
                        <span class="message">
                          <span class="pull-right" style="background-color:<?php echo $data_cari_blm['warna_sub']; ?>;"><p>&nbsp;&nbsp;&nbsp;</p></span>								
							<?php echo $data_cari_blm['des_ev']; ?>
                        </span>
                      </a>
                    </li>
					<?php 
					}
					?>
                    <li>
                      <a href="?page=jnfjencekn&jnfjencekn=wdbwjbhdw">
                        <div class="text-center">
                          <i class="fa fa-chevron-left pull-left"></i>
                          <strong>Tampilkan Semua</strong>
                          <i class="fa fa-chevron-right pull-right"></i>
                        </div>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <div class="row"> 
					<h3>
						<?php	echo " ".$_GET['page']." "; ?>
					</h3>
				</div>
				<div class="row"> 
					<?php
							$sql3 = mysql_query("select*from kelas natural join instansi natural join jenjang where id_user='".$_SESSION["ses_user"]."' and id_kls='".$_SESSION["ses_nav_data"]."'")
							or die (mysql_error());
							while ($data_nav_tmpl = mysql_fetch_array($sql3)) {
					?>
					<h4 style="color:red;"><?php
					echo $data_nav_tmpl["singkat_jnjg"]." ".$data_nav_tmpl["nama_ins"]." (".$data_nav_tmpl["nama_kls"]." ".$data_nav_tmpl["smtr_kls"].")";
					?>
					</h4>
					<?php 
							}
					?>
			    </div>
              </div>
			  <div class="title_right">
                <?php
				if(isset($_GET['page'])) {
					switch ($_GET['page']){
						case 'Pencarian':
							echo " ";
						break;
					default :
					echo "
						<div class='form-group pull-right top_search'>
						  <a class='btn btn-app' href='?page=Pencarian' title='Mencari Even tertentu ?... Klik disini !'>
							  <i class='fa fa-search'></i> Pencarian
							</a>
						</div>
						";
					Break;
					}
				}else { 
							echo " ";
				}
				?>
				
              </div>
            </div>
			<div class="clearfix"></div>
			<div class="row">
				<?php
				require_once "bukafile_user.php";
				?>
			</div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
			<a href="index.php?page=Halaman Utama" title="Halaman Utama">©2016 All Rights Reserved. <i class="fa fa-graduation-cap"></i> Asisten Pelajar ! </a>
		  </div><br>
          <div class="pull-left">
            <a href="index.php?page=Permintaan Fitur" title="Klik ! untuk ajukan fitur yang anda inginkan">FeedBack. Apa yang kurang ?... ||</a>
            <a href="#"><i class="fa fa-cogs"></i> Created By IT-16.</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
<?php
}
?>
    <!-- calendar modal -->
    <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
          </div>
          <div class="modal-body">
            <div id="testmodal" style="padding: 5px 20px;">
              <form id="antoform" class="form-horizontal calender" role="form">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="title">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary antosubmit">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
          </div>
          <div class="modal-body">

            <div id="testmodal2" style="padding: 5px 20px;">
              <form id="antoform2" class="form-horizontal calender" role="form">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title2" name="title2">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
                  </div>
                </div>

              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
    <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
    <!-- /calendar modal -->
        
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="../vendors/validator/validator.min.js"></script>
	<!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
	<!-- bootstrap-daterangepicker -->
    <script src="js/moment/moment.min.js"></script>
    <script src="js/datepicker/daterangepicker.js"></script>
	<!-- Ion.RangeSlider -->
    <script src="../vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <!-- jQuery Knob -->
    <script src="../vendors/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- easy-pie-chart -->
    <script src="../vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- Bootstrap Colorpicker -->
    <script src="../vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="js/custom.js"></script>
	
	<script src="js/bootstrap-datepicker.js"></script>    
    <script>
		$('#datepicker').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true,
			todayHighlight: true })
	</script>
	
	<!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
	
	<!-- bootstrap-daterangepicker -->
    <script>
      $(document).ready(function() {
        var cb = function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#reportrange_right span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        };

        var optionSet1 = {
          startDate: moment().subtract(29, 'days'),
          endDate: moment(),
          minDate: '01/01/2012',
          maxDate: '12/31/2015',
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          opens: 'right',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'MM/DD/YYYY',
          separator: ' to ',
          locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
          }
        };

        $('#reportrange_right span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

        $('#reportrange_right').daterangepicker(optionSet1, cb);

        $('#reportrange_right').on('show.daterangepicker', function() {
          console.log("show event fired");
        });
        $('#reportrange_right').on('hide.daterangepicker', function() {
          console.log("hide event fired");
        });
        $('#reportrange_right').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange_right').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });

        $('#options1').click(function() {
          $('#reportrange_right').data('daterangepicker').setOptions(optionSet1, cb);
        });

        $('#options2').click(function() {
          $('#reportrange_right').data('daterangepicker').setOptions(optionSet2, cb);
        });

        $('#destroy').click(function() {
          $('#reportrange_right').data('daterangepicker').remove();
        });

      });
    </script>

    <script>
      $(document).ready(function() {
        var cb = function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        };

        var optionSet1 = {
          startDate: moment().subtract(29, 'days'),
          endDate: moment(),
          minDate: '01/01/2012',
          maxDate: '12/31/2015',
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          opens: 'left',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'MM/DD/YYYY',
          separator: ' to ',
          locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
          }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function() {
          console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function() {
          console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });
        $('#options1').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function() {
          $('#reportrange').data('daterangepicker').remove();
        });
      });
    </script>

    <script>
      $(document).ready(function() {
        $('#single_cal1').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_1"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#single_cal2').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_2"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#single_cal3').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_3"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#single_cal4').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>

    <script>
      $(document).ready(function() {
        $('#reservation').daterangepicker(null, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>
    <!-- /bootstrap-daterangepicker -->
	
	<!-- validator -->
    <script>
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
          submit = false;
        }

        if (submit)
          this.submit();

        return false;
      });
    </script>
    <!-- /validator -->
	
	<!-- Ion.RangeSlider -->
    <script>
      $(document).ready(function() {
        $("#range_27").ionRangeSlider({
          type: "double",
          min: 1000000,
          max: 2000000,
          grid: true,
          force_edges: true
        });
        $("#range").ionRangeSlider({
          hide_min_max: true,
          keyboard: true,
          min: 0,
          max: 5000,
          from: 1000,
          to: 4000,
          type: 'double',
          step: 1,
          prefix: "$",
          grid: true
        });
        $("#range_25").ionRangeSlider({
          type: "double",
          min: 1000000,
          max: 2000000,
          grid: true
        });
        $(".range_26").ionRangeSlider({
          type: "double",
          min: 0,
          max: 100,
          step: 1,
          grid: true,
          grid_snap: false,
		  disable: true
        });
        $("#range_31").ionRangeSlider({
          type: "double",
          min: 0,
          max: 100,
          from: 30,
          to: 70,
          from_fixed: true
        });
        $(".range_min_max").ionRangeSlider({
          type: "double",
          min: 0,
          max: 100,
          from: 30,
          to: 70,
          max_interval: 50
        });
        $(".range_time24").ionRangeSlider({
          min: +moment().subtract(12, "hours").format("X"),
          max: +moment().format("X"),
          from: +moment().subtract(6, "hours").format("X"),
          grid: true,
          force_edges: true,
          prettify: function(num) {
            var m = moment(num, "X");
            return m.format("HH:mm");
          }
        });
      });
    </script>
    <!-- /Ion.RangeSlider -->
	
	<!-- jQuery Knob -->
    <script>
      $(function($) {

        $(".knob").knob({
          change: function(value) {
            //console.log("change : " + value);
          },
          release: function(value) {
            //console.log(this.$.attr('value'));
            console.log("release : " + value);
          },
          cancel: function() {
            console.log("cancel : ", this);
          },
          /*format : function (value) {
           return value + '%';
           },*/
          draw: function() {

            // "tron" case
            if (this.$.data('skin') == 'tron') {

              this.cursorExt = 0.3;

              var a = this.arc(this.cv) // Arc
                ,
                pa // Previous arc
                , r = 1;

              this.g.lineWidth = this.lineWidth;

              if (this.o.displayPrevious) {
                pa = this.arc(this.v);
                this.g.beginPath();
                this.g.strokeStyle = this.pColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
                this.g.stroke();
              }

              this.g.beginPath();
              this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
              this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
              this.g.stroke();

              this.g.lineWidth = 2;
              this.g.beginPath();
              this.g.strokeStyle = this.o.fgColor;
              this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
              this.g.stroke();

              return false;
            }
          }
        });

        // Example of infinite knob, iPod click wheel
        var v, up = 0,
          down = 0,
          i = 0,
          $idir = $("div.idir"),
          $ival = $("div.ival"),
          incr = function() {
            i++;
            $idir.show().html("+").fadeOut();
            $ival.html(i);
          },
          decr = function() {
            i--;
            $idir.show().html("-").fadeOut();
            $ival.html(i);
          };
        $("input.infinite").knob({
          min: 0,
          max: 100,
          stopper: false,
          change: function() {
            if (v > this.cv) {
              if (up) {
                decr();
                up = 0;
              } else {
                up = 1;
                down = 0;
              }
            } else {
              if (v < this.cv) {
                if (down) {
                  incr();
                  down = 0;
                } else {
                  down = 1;
                  up = 0;
                }
              }
            }
            v = this.cv;
          }
        });
      });
    </script>
    <!-- /jQuery Knob -->
	
	<!-- jquery.inputmask -->
    <script>
      $(document).ready(function() {
        $(":input").inputmask();
      });
    </script>
    <!-- /jquery.inputmask -->

	<!-- chart -->
	<script>
      $(function() {
        $('.chart').easyPieChart({
          easing: 'easeOutElastic',
          delay: 3000,
          barColor: '#26B99A',
          trackColor: '#fff',
          scaleColor: false,
          lineWidth: 20,
          trackWidth: 16,
          lineCap: 'butt',
          onStep: function(from, to, percent) {
            $(this.el).find('.percent').text(Math.round(percent));
          }
        });
      });
    </script>
	<!-- /chart -->
	
	<!-- Bootstrap Colorpicker -->
    <script>
      $(document).ready(function() {
        $('.demo1').colorpicker();
        $('.demo2').colorpicker();

        $('#demo_forceformat').colorpicker({
            format: 'rgba',
            horizontal: true
        });

        $('#demo_forceformat3').colorpicker({
            format: 'rgba',
        });

        $('.demo-auto').colorpicker();
      });
    </script>
    <!-- /Bootstrap Colorpicker -->
  </body>
</html>
