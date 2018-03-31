<?php
	session_start();
	if (isset($_SESSION['ses_user'])=="") {
		echo "<meta http-equiv='refresh'content='0; url=login.php'>";
	}else{
	
	}

	require_once "koneksi.php";
	
	if ($_SESSION["ses_ctk_ev"]=="Semua"){
		$sql_ctk_ev1 = mysql_query("select*from even natural join subjek natural join kelas natural join instansi where id_user='".$_SESSION["ses_user"]."' and id_kls='".$_SESSION["ses_nav_data"]."' and hps_sub='no' order by tgl_ev")
		or die (mysql_error());
	}else{
		$sql_ctk_ev1 = mysql_query("select*from even natural join subjek natural join kelas natural join instansi where id_user='".$_SESSION["ses_user"]."' and id_kls='".$_SESSION["ses_nav_data"]."' and selesai_ev='".$_SESSION["ses_ctk_ev"]."' and hps_sub='no' order by tgl_ev")
		or die (mysql_error());
	}	
	$sql_ctk_ev = mysql_query("SELECT * FROM user natural join jenjang natural join instansi natural join kelas natural join subjek natural join even where id_user='".$_SESSION["ses_user"]."' and id_kls='".$_SESSION["ses_nav_data"]."' and hps_sub='no' and hps_kls='no' and hps_ins='no'") or die (mysql_error());
	$cek_ctk_ev=mysql_num_rows($sql_ctk_ev);
	$data_ctk_ev_head = mysql_fetch_array($sql_ctk_ev);
	if ($cek_ctk_ev >=1 ){
		
		
		
	}else{
		echo "<div class='alert alert-danger'>
					<a href='' class='close' data-dismiss='alert'>&times;</a> Data tidak valid !				</div>";
	}
?>

<!DOCTYPE html>
<html lang="id">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Asisten Pelajar | Cetak Jadwal</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
	
	<link href="../documentation/images/icon.png" rel="shortcut icon">
</head>
<body style="background-color:white;" onload="window.print()">
  <p></p>
    	<div class="col-md-2 col-sm-2">
        </div>
        <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="col-md-7 col-sm-7 col-xs-7"><h2>Even : <?php echo $data_ctk_ev_head["singkat_jnjg"]; ?> <?php echo $data_ctk_ev_head['nama_ins']; ?> <i>(<?php echo $data_ctk_ev_head['nama_kls']; ?> <?php echo $data_ctk_ev_head['smtr_kls']; ?>)</i></h2></div>
                    <div class="col-md-5 col-sm-5 col-xs-5"><h2><i class="fa fa-<?php echo $data_ctk_ev_head['jekel_user']; ?>"> </i> <?php echo $data_ctk_ev_head['nama_user']; ?></h2></div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					<h5>Daftar Even : <?php echo $_SESSION["ses_ctk_ev"]; ?></h5>
					<div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                          <th>No</th>
                          <th>Subjek</th>
                          <th colspan="2">Sts</th>
                          <th>Even</th>
                          <th>Pengampu</th>
                          <th>Tanggal</th>
                        </tr>
						<?php
						$no=1;
						while ($data_ctk_ev = mysql_fetch_array($sql_ctk_ev1)) {
						?>
                        <tr>
 						  <td><?php echo $no; ?></td>
                          <td><?php echo $data_ctk_ev['nama_sub']; ?>
						  </td>
						  <td style="background-color:<?php echo $data_ctk_ev['warna_sub']; ?> !important;" align="center">
						  </td>
                          <td style="background-color:<?php if ($data_ctk_ev['selesai_ev']=="Sudah Selesai"){echo "green";}else{echo "red";} ?>;" align="center">
						    <span  style="color:white;" class="glyphicon glyphicon-<?php if ($data_ctk_ev['selesai_ev']=="Sudah Selesai"){echo "ok";}else{echo "remove";} ?>"></span>
						  </td>
                          <td><?php echo $data_ctk_ev['nama_ev']; ?></td>
                          <td><?php echo $data_ctk_ev['pengampu_sub']; ?></td>
                          <?php
								$sqltgl_kls_format_ctk = mysql_query("select DATE_FORMAT('".$data_ctk_ev['tgl_ev']."', '%d %b %Y') as tgl, DATE_FORMAT('".$data_ctk_ev['tgl_ev']."', '%w') as hari")
								or die (mysql_error());
								$data_tgl_kls_format_ctk=mysql_fetch_array($sqltgl_kls_format_ctk);
								if ($data_tgl_kls_format_ctk["hari"]=="1"){
									$hari_ctk="Senin";
								}else if ($data_tgl_kls_format_ctk["hari"]=="2"){
									$hari_ctk="Selasa";
								}else if ($data_tgl_kls_format_ctk["hari"]=="3"){
									$hari_ctk="Rabu";
								}else if ($data_tgl_kls_format_ctk["hari"]=="4"){
									$hari_ctk="Kamis";
								}else if ($data_tgl_kls_format_ctk["hari"]=="5"){
									$hari_ctk="Jumat";
								}else if ($data_tgl_kls_format_ctk["hari"]=="6"){
									$hari_ctk="Sabtu";
								}else{
									$hari_ctk="Minggu";
								}
						  ?>
						  <td><?php echo $hari_ctk.", ".$data_tgl_kls_format_ctk['tgl']; ?></td>
                        </tr>
						<tr>
						  <td colspan="7"><strong>Deskripsi : </strong><?php echo $data_ctk_ev['des_ev']; ?></td>
                        </tr>
                        <?php
						$no++;
						}
						?>
                    </table>
					</div>
                  </div>
                </div>
              </div>
    
					
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
   
    <!-- Custom Theme Scripts -->
    <script src="js/custom.js"></script>
	

  </body>
</html>