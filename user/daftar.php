<?php
	session_start();
	if (isset($_SESSION['ses_user'])=="") {
		
	}else{
	echo "<meta http-equiv='refresh'content='0; url=index.php?page=Halaman Utama'>";
	}

	require_once "koneksi.php";
	if (isset($_POST['btnSimpan'])) {
		
		$sql = mysql_query("SELECT * FROM user WHERE username='".$_POST['email']."'") or die (mysql_error());
			$cek1=mysql_num_rows($sql);
			$data_u=mysql_fetch_array($sql);

			if ($cek1 >=1 ){
			
				echo "<div class='alert alert-danger'>
							<a href='' class='close' data-dismiss='alert'>&times;</a>Username sudah terdaftar ! .... jika ini adalah akun anda, coba klik lupa password pada halaman login				</div>";
			
			} else {
				
				$sql_insert = "Insert into user values(
					'',
					'".$_POST['nama_user']."',
					'".$_POST['jekel_user']."',
					'".$_POST['email']."',
					'".$_POST['password']."',
					'".$_POST['hp_user']."',
					'".$_POST['ayah_user']."',
					'".$_POST['ibu_user']."')";
				$query_insert = mysql_query($sql_insert) or die (mysql_error());
			
				if ($query_insert) {
					
					
						echo "<div class='alert alert-success'>
								<a href='' class='close' data-dismiss='alert'>&times;</a>Selamat !.. Anda telah terdaftar.		</div>";
						echo "<meta http-equiv='refresh' content='3; url=login.php'>";
							
					
				}else{
					echo "<div class='alert alert-danger'>
							<a href='' class='close' data-dismiss='alert'>&times;</a>Pendaftaran telah Gagal !				</div>";
				}
				
			}
			
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

    <title>Asisten Pelajar | Daftar</title>

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
			<form method="post" class="form-horizontal form-label-left" novalidate>
              <h1>Pendaftaran</h1>
					  <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="4,50" name="nama_user" placeholder="Nama" required="" type="text">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						</div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" >
                              <input type="radio" name="jekel_user" value="male" checked="checked"> <i class='fa fa-male'></i> Laki-laki
                            </label>
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jekel_user" value="female"> <i class='fa fa-female'></i> Perempuan
                            </label>
                          </div>
                        </div>
                      </div><br>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="email" id="email" name="email" required="required" placeholder="Email / Username" class="form-control col-md-7 col-xs-12">
                          <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
						</div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="email" id="email2" name="confirm_email" placeholder="Re-Email" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12">
                          <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"><span class="fa fa-repeat right"></span></span>
						</div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input id="password" type="password" name="password" placeholder="Password" data-validate-length-range="6,50" class="form-control col-md-7 col-xs-12" required="required">
                          <span class="fa fa-key form-control-feedback right" aria-hidden="true"></span>
						</div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input id="password2" type="password" name="password2" placeholder="Re-Password" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                          <span class="fa fa-key form-control-feedback right" aria-hidden="true"><span class="fa fa-repeat right"></span></span>
						</div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="tel" id="telephone" name="hp_user" required="required" placeholder="No HP. contoh : +62 0852-2580-6733" data-validate-length-range="10,20" class="form-control col-md-7 col-xs-12" data-inputmask="'mask': '+99 9999-9999-9999'" >
                          <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
						</div>
                      </div><br>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="4,50" name="ayah_user" placeholder="Nama Ayah" required="" type="text">
                          <span class="fa fa-group form-control-feedback right" aria-hidden="true"><span class="fa fa-male right"></span></span>
						</div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="4,50" name="ibu_user" placeholder="Nama Ibu" required="" type="text">
                          <span class="fa fa-group form-control-feedback right" aria-hidden="true"><span class="fa fa-female right"></span></span>
						</div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-12">
                          <a href="login.php"><button type="button" class="btn btn-primary">Sudah Punya Akun</button></a>
                          <button id="send" type="submit" name="btnSimpan" class="btn btn-success" onClick="return confirm('Yakin ingin daftar ?');">Buat Akun</button>
                        </div>
                      </div>

              <div class="clearfix"></div>
			    <div class="separator">
                
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
	<!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="js/custom.js"></script>

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
	
	<!-- jquery.inputmask -->
    <script>
      $(document).ready(function() {
        $(":input").inputmask();
      });
    </script>
    <!-- /jquery.inputmask -->
  </body>
</html>