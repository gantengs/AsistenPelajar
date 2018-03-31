<?php
session_start();
if (isset($_SESSION['ses_user'])=="") {
	
}else{
echo "<meta http-equiv='refresh'content='3; url=index.php?page=Halaman Utama'>";
}

require_once "koneksi.php";
if (isset($_POST['btnLogin'])) {

	if (isset($_SESSION['ses_user'])=="") {
		
		$sql = mysql_query("SELECT * FROM user WHERE username='".$_POST['email']."'AND password='".$_POST['password']."'") or die (mysql_error());
		$cek=mysql_num_rows($sql);
		$data_u=mysql_fetch_array($sql);
		$sqltgl = mysql_query("SELECT curdate()") or die (mysql_error());
		$data_tgl=mysql_fetch_array($sqltgl);

		if ($cek >=1 ){
			$_SESSION["ses_user"]=$data_u["id_user"];
			$_SESSION["ses_tgl_ev"]=$data_tgl["curdate()"];
			$_SESSION["ses_tampil_ev"]="Semua";
			$sql_in = mysql_query("select*from jenjang natural join instansi natural join kelas where id_user='".$_SESSION["ses_user"]."' and hps_ins='no' and hps_kls='no' order by tgl_kls desc limit 1")
				or die (mysql_error());
				$data_in = mysql_fetch_array($sql_in);
			$_SESSION["ses_nav_data"]=$data_in["id_kls"];
						
			echo "<meta http-equiv='refresh'content='0; url=index.php?page=Halaman Utama'>";

			
			$sql_insert_log = "Insert into log(id_user,isi_log) values(
				'".$_SESSION['ses_user']."',
				'Masuk')";
			$query_insert_log = mysql_query($sql_insert_log) or die (mysql_error());
						

		} else {
			echo "<div class='alert alert-danger'>
				<a href='' class='close' data-dismiss='alert'>&times;</a>Username dan Password tidak Valid !		</div>";
		}
		
	}else{
		echo "<div class='alert alert-danger'>
		<a href='' class='close' data-dismiss='alert'>&times;</a>Anda sudah Masuk sebelumnya !		</div>";
		echo "<meta http-equiv='refresh'content='3; url=index.php?page=Halaman Utama'>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Asisten Pelajar | Masuk</title>

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

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post">
				<h1>Masuk</h1>
					<div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="email" id="email" name="email" required="required" class="form-control" placeholder="Username" />
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input id="password" type="password" name="password" class="form-control" placeholder="Password" required="required" />
						<span class="fa fa-key form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="form-group">
                        <div class="col-md-6">
                          <button id="send" type="submit" class="btn btn-success" name="btnLogin">Masuk</button>
						</div>
						<div class="col-md-12">
                          <a class="reset_pass" href="lupa_pswd.php">Lupa Password Anda ?</a>
						</div>
                    </div>

              <div class="clearfix"></div>
			    <div class="separator">
                <p class="change_link">Tidak Punya Akun ?
                  <a href="daftar.php" class="to_register"> Buat Akun </a>
                </p>
				<div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-graduation-cap"></i> Asisten Pelajar !</h1>
                  <p>©2016 All Rights Reserved. Asisten Pelajar !</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

