<?php
	require_once "koneksi.php";
	if (isset($_POST['btnSimpan'])) {
		$sql = mysql_query("SELECT * FROM user WHERE id_user='".$_SESSION["ses_user"]."' AND password='".$_POST["passwordlama"]."'") or die (mysql_error());
			$cekpass=mysql_num_rows($sql);
			
			if ($cekpass >=1 ){
		
				$sql = mysql_query("SELECT * FROM user WHERE username='".$_POST['email']."'") or die (mysql_error());
					$cek1=mysql_num_rows($sql);
					$data_u=mysql_fetch_array($sql);

					if ($cek1 >=1 ){
					
						$sql = mysql_query("SELECT * FROM user WHERE id_user='".$_SESSION['ses_user']."'") or die (mysql_error());
						$cek2=mysql_num_rows($sql);
						$data_u1=mysql_fetch_array($sql);

						if ($data_u['id_user']==$data_u1['id_user']){
					
							$sql_update = "update user set
								username='".$_POST['email']."',
								password='".$_POST['password']."'
								where id_user='".$_SESSION['ses_user']."'";
							$query_update = mysql_query($sql_update) or die (mysql_error());
						
							if ($query_update) {
										
									echo "<div class='alert alert-success'>
										<a href='index.php?page=Halaman Utama' class='close' data-dismiss='alert'>&times;</a>Simpan Berhasil		</div>";
									echo "<meta http-equiv='refresh' content='1; url=index.php?page=Halaman Utama'>";
														
													
									$sql_insert_log = "Insert into log(id_user,isi_log) values(
											'".$_SESSION['ses_user']."',
											'Ubah Username dan Password')";
									$query_insert_log = mysql_query($sql_insert_log) or die (mysql_error());
									
										
							}else{
									echo "<div class='alert alert-danger'>
										<a href='' class='close' data-dismiss='alert'>&times;</a>Simpan Gagal !				</div>";
							}
					
						}else{
							echo "<div class='alert alert-danger'>
									<a href='' class='close' data-dismiss='alert'>&times;</a>Username sudah digunakan....!				</div>";
					
						}	
							
					} else {
						$sql_update = "update user set
							username='".$_POST['email']."',
							password='".$_POST['password']."'
							where id_user='".$_SESSION['ses_user']."'";
						$query_update = mysql_query($sql_update) or die (mysql_error());
					
						if ($query_update) {
									
								echo "<div class='alert alert-success'>
									<a href='index.php?page=Halaman Utama' class='close' data-dismiss='alert'>&times;</a>Simpan Berhasil		</div>";
								echo "<meta http-equiv='refresh' content='1; url=index.php?page=Halaman Utama'>";
											
									
						}else{
								echo "<div class='alert alert-danger'>
									<a href='' class='close' data-dismiss='alert'>&times;</a>Simpan Gagal !				</div>";
						}
						
					}
			}else{
				echo "<div class='alert alert-danger'>
									<a href='' class='close' data-dismiss='alert'>&times;</a>Mohon Masukkan Password Lama anda dengan benar !				</div>";				
			}
	}
?>

<!DOCTYPE html>
<html lang="id">
<head>
	<title>Error</title>
</head>
<body class="login">
     <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data akun</h2>
                    
                    <div class="clearfix"></div>
                  </div>
				  <div style="overflow:scrol">
                  <div class="x_content">
					<form method="post" class="form-horizontal form-label-left" novalidate>
						  
							  <div class="item form-group">
								<div class="col-md-6 col-sm-8 col-xs-12">
								  <input type="email" value="<?php echo $data_user['username']; ?>" id="email" name="email" required="required" placeholder="Email / Username baru" class="form-control col-md-7 col-xs-12">
								  <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
								</div>
							  </div>
							  <div class="item form-group">
								<div class="col-md-6 col-sm-8 col-xs-12">
								  <input type="email" id="email2" name="confirm_email" placeholder="Re-Email baru" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12">
								  <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"><span class="fa fa-repeat right"></span></span>
								</div>
							  </div>
							  <div class="item form-group">
								<div class="col-md-6 col-sm-8 col-xs-12">
								  <input id="password" type="password" name="password" placeholder="Password baru" data-validate-length-range="6,50" class="form-control col-md-7 col-xs-12" required="required">
								  <span class="fa fa-key form-control-feedback right" aria-hidden="true"></span>
								</div>
							  </div>
							  <div class="item form-group">
								<div class="col-md-6 col-sm-8 col-xs-12">
								  <input id="password2" type="password" name="password2" placeholder="Re-Password baru" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
								  <span class="fa fa-key form-control-feedback right" aria-hidden="true"><span class="fa fa-repeat right"></span></span>
								</div>
							  </div>
							  <div class="item form-group">
								<div class="col-md-6 col-sm-8 col-xs-12">
								  <input id="password" type="password" name="passwordlama" placeholder="Password lama" data-validate-length-range="6,50" class="form-control col-md-7 col-xs-12" required="required">
								  <span class="fa fa-key form-control-feedback right" aria-hidden="true"></span>
								</div>
							  </div>
							  
							  <div class="ln_solid"></div>
							  <div class="form-group">
								<div class="col-md-12">
								  <a href="?page=Ubah Profil"><button type="button" class="btn btn-primary">Ubah Profil</button></a>
								  <button id="send" type="submit" name="btnSimpan" class="btn btn-success" onClick="return confirm('Yakin ingin mengubah profil anda ?');">Simpan</button>
								</div>
							  </div>
					</form>
				  </div>
                </div>
              </div>
            </div>
          </div>
  </body>
</html>