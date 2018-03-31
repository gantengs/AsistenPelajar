<?php
	session_start();
	if (isset($_SESSION['ses_user'])=="") {
		echo "<meta http-equiv='refresh'content='0; url=login.php'>";
	}else{
	
	}

	require_once "koneksi.php";
	
	$sql_ctk_jdl = mysql_query("SELECT * FROM user natural join jenjang natural join instansi natural join kelas natural join subjek where id_user='".$_SESSION["ses_user"]."' and id_kls='".$_SESSION["ses_jd"]."' and hps_sub='no' and hps_kls='no' and hps_ins='no'") or die (mysql_error());
	$sql_ctk_jdl1 = mysql_query("SELECT * FROM user natural join jenjang natural join instansi natural join kelas natural join subjek where id_user='".$_SESSION["ses_user"]."' and id_kls='".$_SESSION["ses_jd"]."' and hps_sub='no' and hps_kls='no' and hps_ins='no'") or die (mysql_error());
	$cek_ctk_jdl=mysql_num_rows($sql_ctk_jdl);
	$data_ctk_jdl_head = mysql_fetch_array($sql_ctk_jdl);
	if ($cek_ctk_jdl >=1 ){
		
		
		
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
                    <div class="col-md-7 col-sm-7 col-xs-7"><h2>Jadwal : <?php echo $data_ctk_jdl_head['singkat_jnjg']; ?> <?php echo $data_ctk_jdl_head['nama_ins']; ?> <i>(<?php echo $data_ctk_jdl_head['nama_kls']; ?> <?php echo $data_ctk_jdl_head['smtr_kls']; ?>)</i></h2></div>
                    <div class="col-md-5 col-sm-5 col-xs-5"><h2><i class="fa fa-<?php echo $data_ctk_jdl_head['jekel_user']; ?>"> </i> <?php echo $data_ctk_jdl_head['nama_user']; ?></h2></div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					<div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                          <th rowspan="2">No</th>
                          <th rowspan="2">Subjek</th>
                          <th rowspan="2">Pengampu</th>
                          <th colspan="7">Jadwal</th>
                        </tr>
                        <tr>
                          <th>Senin</th>
                          <th>Selasa</th>
                          <th>Rabu</th>
                          <th>Kamis</th>
                          <th>Jumat</th>
                          <th>Sabtu</th>
                          <th>Minggu</th>
                        </tr>
						<?php
						$no=1;
						while ($data_ctk_jdl = mysql_fetch_array($sql_ctk_jdl1)) {
						?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $data_ctk_jdl['nama_sub']; ?></td>
                          <td><?php echo $data_ctk_jdl['pengampu_sub']; ?></td>
                          <td><?php if ($data_ctk_jdl['wkt_hari_sub']=="Senin"){echo $data_ctk_jdl['wkt_jam_sub'].".".$data_ctk_jdl['wkt_mnt_sub'];}else{echo "";} ?></td>
                          <td><?php if ($data_ctk_jdl['wkt_hari_sub']=="Selasa"){echo $data_ctk_jdl['wkt_jam_sub'].".".$data_ctk_jdl['wkt_mnt_sub'];}else{echo "";} ?></td>
                          <td><?php if ($data_ctk_jdl['wkt_hari_sub']=="Rabu"){echo $data_ctk_jdl['wkt_jam_sub'].".".$data_ctk_jdl['wkt_mnt_sub'];}else{echo "";} ?></td>
                          <td><?php if ($data_ctk_jdl['wkt_hari_sub']=="Kamis"){echo $data_ctk_jdl['wkt_jam_sub'].".".$data_ctk_jdl['wkt_mnt_sub'];}else{echo "";} ?></td>
                          <td><?php if ($data_ctk_jdl['wkt_hari_sub']=="Jumat"){echo $data_ctk_jdl['wkt_jam_sub'].".".$data_ctk_jdl['wkt_mnt_sub'];}else{echo "";} ?></td>
                          <td><?php if ($data_ctk_jdl['wkt_hari_sub']=="Sabtu"){echo $data_ctk_jdl['wkt_jam_sub'].".".$data_ctk_jdl['wkt_mnt_sub'];}else{echo "";} ?></td>
                          <td><?php if ($data_ctk_jdl['wkt_hari_sub']=="Minggu"){echo $data_ctk_jdl['wkt_jam_sub'].".".$data_ctk_jdl['wkt_mnt_sub'];}else{echo "";} ?></td>
                        </tr>
                        <?php
						$no++;
						}
						?>
                    </table>
					<div class="pull-right">
						Tanggal masuk : 
						<?php
								$sqltgl_kls_format_ctk = mysql_query("select DATE_FORMAT('".$data_ctk_jdl_head['tgl_kls']."', '%d %b %Y') as tgl")
								or die (mysql_error());
								$data_tgl_kls_format_ctk=mysql_fetch_array($sqltgl_kls_format_ctk);
								echo $data_tgl_kls_format_ctk['tgl']; 
						?>
					</div>
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