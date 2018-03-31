<?php
	require_once "koneksi.php";
	if (isset($_POST['btnSimpan'])) {
		
		$sql_update = "update user set
			nama_user='".$_POST['nama_user']."',
			jekel_user='".$_POST['jekel_user']."',
			hp_user='".$_POST['hp_user']."',
			ayah_user='".$_POST['ayah_user']."',
			ibu_user='".$_POST['ibu_user']."'
			where id_user='".$_SESSION['ses_user']."'";
		$query_update = mysql_query($sql_update) or die (mysql_error());
	
		if ($query_update) {
					
				echo "<div class='alert alert-success'>
					<a href='index.php?page=Halaman Utama' class='close' data-dismiss='alert'>&times;</a>Simpan Berhasil		</div>";
				echo "<meta http-equiv='refresh' content='1; url=index.php?page=Halaman Utama'>";
											
								
				$sql_insert_log = "Insert into log(id_user,isi_log) values(
						'".$_SESSION['ses_user']."',
						'Ubah Profil')";
				$query_insert_log = mysql_query($sql_insert_log) or die (mysql_error());
									
					
		}else{
				echo "<div class='alert alert-danger'>
					<a href='' class='close' data-dismiss='alert'>&times;</a>Simpan Gagal !				</div>";
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
                    <h2>Data diri</h2>
                    
                    <div class="clearfix"></div>
                  </div>
				  <div style="overflow:scrol">
                  <div class="x_content">
					<form method="post" class="form-horizontal form-label-left" novalidate>
						  <div class="item form-group">
								<div class="col-md-6 col-sm-8 col-xs-12">
								  <input id="name" value="<?php echo $data_user['nama_user']; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="4,50" name="nama_user" placeholder="Nama" required="" type="text">
								  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
								</div>
							  </div>
							  <div class="item form-group">
								<div class="col-md-6 col-sm-8 col-xs-12">
								  <div id="gender" class="btn-group" data-toggle="buttons">
									<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" >
									  <input type="radio" name="jekel_user" value="male" <?php if($data_user['jekel_user']=="male"){echo "checked='checked'";} ?> > <i class='fa fa-male'></i> Laki-laki
									</label>
									<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
									  <input type="radio" name="jekel_user" value="female" <?php if($data_user['jekel_user']=="female"){echo "checked='checked'";} ?> > <i class='fa fa-female'></i> Perempuan
									</label>
								  </div>
								</div>
							  </div>
							  <div class="item form-group">
								<div class="col-md-6 col-sm-8 col-xs-12">
								  <input type="tel" id="telephone" value="<?php echo $data_user['hp_user']; ?>" name="hp_user" required="required" placeholder="No HP. contoh : +62 0852-2580-6733" data-validate-length-range="10,20" class="form-control col-md-7 col-xs-12" data-inputmask="'mask': '+99 9999-9999-9999'">
								  <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
								</div>
							  </div>
							  <div class="item form-group">
								<div class="col-md-6 col-sm-8 col-xs-12">
								  <input id="name" value="<?php echo $data_user['ayah_user']; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="4,50" name="ayah_user" placeholder="Nama Ayah" required="" type="text">
								  <span class="fa fa-group form-control-feedback right" aria-hidden="true"><span class="fa fa-male right"></span></span>
								</div>
							  </div>
							  <div class="item form-group">
								<div class="col-md-6 col-sm-8 col-xs-12">
								  <input id="name" value="<?php echo $data_user['ibu_user']; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="4,50" name="ibu_user" placeholder="Nama Ibu" required="" type="text">
								  <span class="fa fa-group form-control-feedback right" aria-hidden="true"><span class="fa fa-female right"></span></span>
								</div>
							  </div>
							  <div class="ln_solid"></div>
							  <div class="form-group">
								<div class="col-md-12">
								  <a href="?page=Ubah Akun"><button type="button" class="btn btn-primary">Ubah Username & Password</button></a>
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