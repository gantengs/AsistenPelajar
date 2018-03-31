<?php
session_start();
if (isset($_SESSION['ses_user'])=="") {
	
}else{
echo "<meta http-equiv='refresh'content='0; url=index.php?page=Halaman Utama'>";
}

if (isset($_SESSION['ses_lupa'])=="") {
	echo "<meta http-equiv='refresh'content='0; url=login.php'>";
}else{

}

if (isset($_SESSION['ses_lupa_1'])=="") {
	echo "<meta http-equiv='refresh'content='0; url=lupa_pswd_1.php'>";
}else{

}

if (isset($_SESSION['ses_lupa_2'])=="") {
	echo "<meta http-equiv='refresh'content='0; url=lupa_pswd_2.php'>";
}else{

}
?>

<?php
require_once "koneksi.php";
if (isset($_POST['btnnext'])) {
	
	$sql_update = "update user set
			password='".$_POST['password']."'
			where id_user='".$_SESSION['ses_lupa_2']."'";
		$query_update = mysql_query($sql_update) or die (mysql_error());
	
		if ($query_update) {
				
				unset($_SESSION['ses_lupa']);
				
				echo "<div class='alert alert-success'>
					<a href='index.php?page=Halaman Utama' class='close' data-dismiss='alert'>&times;</a>Simpan Berhasil		</div>";
				echo "<meta http-equiv='refresh'content='0; url=lupa_batal.php'>";
				
		
				$sql_insert_log = "Insert into log(id_user,isi_log) values(
					'".$_SESSION['ses_lupa_2']."',
					'Atur Ulang Password Mengggunakan fasilitas Lupa Password')";
				$query_insert_log = mysql_query($sql_insert_log) or die (mysql_error());
			
		} else {
		echo "<div class='alert alert-danger'>
				<a href='' class='close' data-dismiss='alert'>&times;</a>Simpan Gagal !...		</div>";
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

    <title>Asisten Pelajar | Ganti Password</title>

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
              <h1>Ganti Password</h1>
					  <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="nama_user" value="<?php echo $_SESSION["ses_name_2"]; ?>" type="text" readonly="readonly">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
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
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-12 col-md-offset-3">
                          <a href="lupa_batal.php"><button type="button" class="btn btn-primary">Batal</button></a>
                          <button id="send" name="btnnext" type="submit" class="btn btn-success" onClick="return confirm('Yakin ingin memperbarui password anda ?');">Ubah</button>
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