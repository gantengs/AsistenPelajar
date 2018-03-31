<?php
	if($_GET['page']=="Tambah Instansi") {
		
		$btn_lbl="Tambah";
		$btn_v="tambah";

		$id_jnjg = "";
		$nama_ins = "";
		
	} else {
		
		if (isset($_GET['ejviejnrjinencij'])) {
	
		}else{
			echo "<div class='alert alert-danger'>
						<a href='' class='close' data-dismiss='alert'>&times;</a>Beralih ! </div>";
			echo "<meta http-equiv='refresh'content='0; url=index.php?page=Halaman Utama'>";
		}
		
		$btn_lbl="Simpan";
		$btn_v="ubah";
		
		$sql_dt_ins_ubh = mysql_query("select*from jenjang natural join instansi where id_user='".$_SESSION["ses_user"]."' and id_ins='".$_GET["ejviejnrjinencij"]."'")
						or die (mysql_error());
		$data_dt_ins_ubh = mysql_fetch_array($sql_dt_ins_ubh);
		
		$id_jnjg = $data_dt_ins_ubh['id_jnjg'];
		$nama_ins = $data_dt_ins_ubh['nama_ins'];
		
	}
	
	if (isset($_POST['btntmbhins'])) {
		
		if($_GET['page']=="Tambah Instansi") {
		
				$sql_insert_ins = "Insert into instansi values(
					'',
					'".$_POST['nama_ins']."',
					'".$_SESSION['ses_user']."',
					'".$_POST['id_jnjg']."',
					'no')";
				$query_insert_ins = mysql_query($sql_insert_ins) or die (mysql_error());
			
				if ($query_insert_ins) {
					$sql_dt_jnjg_1 = mysql_query("select*from jenjang natural join instansi where id_user='".$_SESSION["ses_user"]."' and id_jnjg='".$_POST['id_jnjg']."' order by id_ins desc")
						or die (mysql_error());
					$data_dt_jnjg_1 = mysql_fetch_array($sql_dt_jnjg_1);
					echo "<div class='alert alert-success'><a href='' class='close' data-dismiss='alert'>&times;</a>".$data_dt_jnjg_1['singkat_jnjg']." ".$_POST['nama_ins']." Telah berhasil ditambahkan.		</div>";
					echo "<meta http-equiv='refresh' content='3; url=index.php?page=Tambah Kelas/Semester&hbvjklsbhsjsbhb=".$data_dt_jnjg_1['id_ins']."'>";
							
					$sql_insert_log = "Insert into log(id_user,isi_log) values(
						'".$_SESSION['ses_user']."',
						'Tambah Instansi ".$data_dt_jnjg_1['singkat_jnjg']." ".$_POST['nama_ins']." ')";
					$query_insert_log = mysql_query($sql_insert_log) or die (mysql_error());

				} else {
					echo "<div class='alert alert-danger'>
						  <a href='' class='close' data-dismiss='alert'>&times;</a>Proses gagal !		</div>";
				}
				
		}else{
			
				$sql_update_ins = "update instansi set
					nama_ins ='".$_POST['nama_ins']."',
					id_jnjg ='".$_POST['id_jnjg']."'
					where id_ins ='".$_GET["ejviejnrjinencij"]."'";
				$query_update_ins = mysql_query($sql_update_ins) or die (mysql_error());
			
				if ($query_update_ins) {
					$sql_dt_jnjg_2 = mysql_query("select*from jenjang natural join instansi where id_user='".$_SESSION["ses_user"]."' and id_ins='".$_GET["ejviejnrjinencij"]."'")
						or die (mysql_error());
					$data_dt_jnjg_2 = mysql_fetch_array($sql_dt_jnjg_2);
					echo "<div class='alert alert-success'><a href='' class='close' data-dismiss='alert'>&times;</a>".$data_dt_ins_ubh['singkat_jnjg']." ".$data_dt_ins_ubh['nama_ins']." Telah berhasil diubah menjadi ".$data_dt_jnjg_2['singkat_jnjg']." ".$_POST['nama_ins'].".		</div>";
					echo "<meta http-equiv='refresh' content='3; url=index.php?page=Halaman Utama'>";
								
					$sql_insert_log = "Insert into log(id_user,isi_log) values(
						'".$_SESSION['ses_user']."',
						'Ubah Instansi ".$data_dt_ins_ubh['singkat_jnjg']." ".$data_dt_ins_ubh['nama_ins']." menjadi ".$data_dt_jnjg_2['singkat_jnjg']." ".$_POST['nama_ins']." ')";
					$query_insert_log = mysql_query($sql_insert_log) or die (mysql_error());
	
				} else {
					echo "<div class='alert alert-danger'>
						  <a href='' class='close' data-dismiss='alert'>&times;</a>Proses gagal !		</div>";
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
                    <h2>Instansi</h2>
                    
                    <div class="clearfix"></div>
                  </div>
				  <div style="overflow:scrol">
                  <div class="x_content">
                    
                    <form method="post" class="form-horizontal form-label-left" novalidate>
					          <div class="item form-group">
								<div class="col-md-6 col-sm-6 col-xs-8">
									<select class="form-control" id="jnjg" name="id_jnjg">
										<?php
											$sql_dt_jnjg = mysql_query("select*from jenjang order by id_jnjg desc")
											or die (mysql_error());
											while ($data_dt_jnjg = mysql_fetch_array($sql_dt_jnjg)) {
										?>
										<option value="<?php echo $data_dt_jnjg['id_jnjg']; ?>" <?php if($data_dt_jnjg['id_jnjg']==$id_jnjg){echo "selected";} ?> ><?php echo $data_dt_jnjg['nama_jnjg']; ?></option>
										<?php
											}
										?>
									</select>
								</div>
							  </div>
							  <div class="item form-group">
								<div class="col-md-6 col-sm-6 col-xs-6">
								  <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="3,50" name="nama_ins" placeholder="  Nama Instansi" required="" type="text" value="<?php echo $nama_ins;?>">
								</div>
							  </div>
							  <div class="ln_solid"></div>
							  <div class="form-group">
								<div class="col-md-12 col-md-offset-3">
								  <button id="send" name="btntmbhins" type="submit" class="btn btn-success" onClick="return confirm('Yakin <?php echo $btn_v;?> data ?');"><?php echo $btn_lbl;?></button>
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