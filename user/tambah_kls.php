<?php
	if (isset($_GET['hbvjklsbhsjsbhb'])) {
	
	}else{
		echo "<div class='alert alert-danger'>
					<a href='' class='close' data-dismiss='alert'>&times;</a>Beralih ! </div>";
		echo "<meta http-equiv='refresh'content='0; url=index.php?page=Halaman Utama'>";
	}
	
	if($_GET['page']=="Tambah Kelas/Semester") {
		
		$btn_lbl="Tambah";
		$btn_v="tambah";

		$tgl_kls = $_SESSION["ses_tgl_ev"];
		$nama_kls = "1";
		$smtr_kls = "Ganjil";
		
	} else {
		
		if (isset($_GET['ejviejnrjinencij'])) {
	
		}else{
			echo "<div class='alert alert-danger'>
						<a href='' class='close' data-dismiss='alert'>&times;</a>Beralih ! </div>";
			echo "<meta http-equiv='refresh'content='0; url=index.php?page=Halaman Utama'>";
		}
		
		$btn_lbl="Simpan";
		$btn_v="ubah";
		
		$sql_dt_kls_ubh = mysql_query("select*from jenjang natural join instansi natural join kelas where id_user='".$_SESSION["ses_user"]."' and id_kls='".$_GET["ejviejnrjinencij"]."'")
						or die (mysql_error());
		$data_dt_kls_ubh = mysql_fetch_array($sql_dt_kls_ubh);
		
		$tgl_kls = $data_dt_kls_ubh['tgl_kls'];
		$nama_kls = $data_dt_kls_ubh['nama_kls'];
		$smtr_kls = $data_dt_kls_ubh['smtr_kls'];
		
	}
	
	if (isset($_POST['btntmbhkls'])) {
		$sql_valid_kls = mysql_query("SELECT * FROM instansi WHERE id_ins='".$_POST['id_ins']."'") or die (mysql_error());
		$data_valid_kls = mysql_fetch_array($sql_valid_kls);
						
		$cek_ins=$data_valid_kls['id_jnjg'];
		$cek_kls=$_POST['nama_kls'];
		$cek_kls_smtr=$_POST['smtr_kls'];
		
		$cek_kls_valid=1;
		
		if($cek_ins>=15){
			
			if($cek_kls % 2 == 0){
				$cek_kls_smtr="Genap";
			}else{
				$cek_kls_smtr="Ganjil";
			}
			
		}else if($cek_ins>=10){
			if($cek_kls>=13 || $cek_kls<=9){
				echo "<div class='alert alert-warning'>
						  <a href='' class='close' data-dismiss='alert'>&times;</a>Pada tingkat SLTA. Hanya ada kelas 10,11,dan 12.		</div>";
				$cek_kls_valid=0;
		
			}
		}else if($cek_ins>=7){
			if($cek_kls>=10 || $cek_kls<=6){
				echo "<div class='alert alert-warning'>
						  <a href='' class='close' data-dismiss='alert'>&times;</a>Pada tingkat SLTP. Hanya ada kelas 7,8,dan 9.		</div>";
				$cek_kls_valid=0;
		
			}
		}else{
			if($cek_kls>=7){
				echo "<div class='alert alert-warning'>
						  <a href='' class='close' data-dismiss='alert'>&times;</a>Pada tingkat Dasar. Hanya ada kelas 1,2,3,4,5,dan 6.		</div>";
				$cek_kls_valid=0;
		
			}
		}
		
		if ($cek_kls_valid==1){
		
			if($_GET['page']=="Tambah Kelas/Semester") {
	
				$sql_insert_kls = "Insert into kelas values(
					'',
					'".$_POST['nama_kls']."',
					'".$cek_kls_smtr."',
					'".$_POST['tgl_kls']."',
					'".$_POST['id_ins']."',
					'no')";
				$query_insert_kls = mysql_query($sql_insert_kls) or die (mysql_error());
			
				if ($query_insert_kls) {
					$sql_dt_kls_1 = mysql_query("select*from jenjang natural join instansi natural join kelas where id_user='".$_SESSION["ses_user"]."' and id_ins='".$_POST['id_ins']."' order by id_kls desc")
						or die (mysql_error());
					$data_dt_kls_1 = mysql_fetch_array($sql_dt_kls_1);
					echo "<div class='alert alert-success'><a href='' class='close' data-dismiss='alert'>&times;</a>".$data_dt_kls_1['singkat_jnjg']." ".$data_dt_kls_1['nama_ins']." (".$data_dt_kls_1['nama_kls']." ".$data_dt_kls_1['smtr_kls'].") Telah berhasil ditambahkan.		</div>";
					echo "<meta http-equiv='refresh' content='3; url=index.php?page=Tambah Subjek&hbvjklsbhsjsbhb=".$data_dt_kls_1['id_kls']."'>";
								
					$sql_insert_log = "Insert into log(id_user,isi_log) values(
						'".$_SESSION['ses_user']."',
						'Tambah Kelas/Semester ".$data_dt_kls_1['singkat_jnjg']." ".$data_dt_kls_1['nama_ins']." (".$data_dt_kls_1['nama_kls']." ".$data_dt_kls_1['smtr_kls'].") ')";
					$query_insert_log = mysql_query($sql_insert_log) or die (mysql_error());
	
				} else {
					echo "<div class='alert alert-danger'>
						  <a href='' class='close' data-dismiss='alert'>&times;</a>Proses gagal !		</div>";
				}
			}else{
				
				$sql_update_kls = "update kelas set
					nama_kls ='".$_POST['nama_kls']."',
					smtr_kls ='".$cek_kls_smtr."',
					tgl_kls ='".$_POST['tgl_kls']."',
					id_ins ='".$_POST['id_ins']."'
					where id_kls ='".$_GET["ejviejnrjinencij"]."'";
				$query_update_kls = mysql_query($sql_update_kls) or die (mysql_error());
			
				if ($query_update_kls) {
					$sql_dt_kls_2 = mysql_query("select*from jenjang natural join instansi natural join kelas where id_user='".$_SESSION["ses_user"]."' and id_kls='".$_GET["ejviejnrjinencij"]."'")
						or die (mysql_error());
					$data_dt_kls_2 = mysql_fetch_array($sql_dt_kls_2);
					echo "<div class='alert alert-success'><a href='' class='close' data-dismiss='alert'>&times;</a>".$data_dt_kls_ubh['singkat_jnjg']." ".$data_dt_kls_ubh['nama_ins']." (".$data_dt_kls_ubh['nama_kls']." ".$data_dt_kls_ubh['smtr_kls'].") Telah berhasil diubah menjadi ".$data_dt_kls_2['singkat_jnjg']." ".$data_dt_kls_2['nama_ins']." (".$data_dt_kls_2['nama_kls']." ".$data_dt_kls_2['smtr_kls'].").		</div>";
					echo "<meta http-equiv='refresh' content='4; url=index.php?page=Halaman Utama'>";
							
					$sql_insert_log = "Insert into log(id_user,isi_log) values(
						'".$_SESSION['ses_user']."',
						'Ubah Kelas/Semester ".$data_dt_kls_ubh['singkat_jnjg']." ".$data_dt_kls_ubh['nama_ins']." (".$data_dt_kls_ubh['nama_kls']." ".$data_dt_kls_ubh['smtr_kls'].") menjadi ".$data_dt_kls_2['singkat_jnjg']." ".$data_dt_kls_2['nama_ins']." (".$data_dt_kls_2['nama_kls']." ".$data_dt_kls_2['smtr_kls'].") ')";
					$query_insert_log = mysql_query($sql_insert_log) or die (mysql_error());
	
				} else {
					echo "<div class='alert alert-danger'>
						  <a href='' class='close' data-dismiss='alert'>&times;</a>Proses gagal !		</div>";
				}
				
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="id">
<head>
	<title>Error</title>
</head>
<body>
		          
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kelas/Semester</h2>
                    
                    <div class="clearfix"></div>
                  </div>
				  <div style="overflow:scrol">
                  <div class="x_content">
                    
                    <form method="post" class="form-horizontal form-label-left" novalidate>
					          <div class="item form-group">
								<div class="col-md-6 col-sm-6 col-xs-8">
									<p>Pilih Instansi</p>
									<select class="form-control" id="jnjg" name="id_ins">
										<?php
											$sql_dt_ins = mysql_query("select*from jenjang natural join instansi where id_user='".$_SESSION["ses_user"]."' and hps_ins='no' order by id_jnjg desc")
											or die (mysql_error());
											while ($data_dt_ins = mysql_fetch_array($sql_dt_ins)) {
										?>
										<option value="<?php echo $data_dt_ins['id_ins']; ?>" <?php if($data_dt_ins['id_ins']==$_GET['hbvjklsbhsjsbhb']){echo "selected";} ?> ><?php echo $data_dt_ins['singkat_jnjg']." ".$data_dt_ins['nama_ins']; ?></option>
										<?php
											}
										?>
									</select>
								</div>
							  </div>
							  <div class="item form-group">
								<div class="col-md-2">
								  <p>Kelas/Semester</p>
								  <input class="knob" data-width="100" data-height="120" data-cursor=true data-fgColor="#34495E" value="<?php echo $nama_kls; ?>" name="nama_kls">
								</div>
								<div class="col-md-9 col-sm-9 col-xs-9">
								  <br><br>
								  <div id="smtr" class="btn-group-vertical" data-toggle="buttons">
									<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" style="text-align:left;">
									  <input type="radio" name="smtr_kls" value="Ganjil" <?php if($smtr_kls=="Ganjil"){echo "checked='checked'";} ?> > <i class='fa fa-stop'></i>&nbsp;Ganjil
									</label>
									<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" style="text-align:left;">
									  <input type="radio" name="smtr_kls" value="Genap" <?php if($smtr_kls=="Genap"){echo "checked='checked'";} ?> > <i class='fa fa-pause'></i>&nbsp;Genap
									</label>
								  </div>
								</div>
							  </div>
							  <div class="item form-group">
								<p>Tanggal</p>
								<div class="col-md-6 col-sm-6 col-xs-6">
								  <input type="text" class="form-control" name="tgl_kls" data-validate-length="10" id="datepicker" value="<?php echo $tgl_kls; ?>" required="required"/>
							    </div>
							  </div>
							  <div class="ln_solid"></div>
							  <div class="form-group">
								<div class="col-md-12 col-md-offset-3">
								  <button id="send" name="btntmbhkls" type="submit" class="btn btn-success" onClick="return confirm('Yakin <?php echo $btn_v; ?> data ?');"><?php echo $btn_lbl; ?></button>
								</div>
							  </div>
						  </form>

                  </div>
				  </div>
                </div>
              </div>
            </div>
          </div>
        
    
</body>
</html>