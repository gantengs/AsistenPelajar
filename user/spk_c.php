<?php
	$sql = mysql_query("SELECT * FROM spk_a WHERE id_user='".$_SESSION["ses_user"]."'") or die (mysql_error());
	$cek=mysql_num_rows($sql);
		
	$sql2 = mysql_query("SELECT * FROM spk_c,spkb WHERE spk_c.id_user='".$_SESSION["ses_user"]."' and spk_c.id_c=spkb.id_c1") or die (mysql_error());
	$cek2=mysql_num_rows($sql2);
			
	if ($cek >=1 || $cek2 >=1){
			echo "<div class='alert alert-warning'>
						<a href='' class='close' data-dismiss='alert'>&times;</a>Peringatan !... Menambahkan atau Menghapus Kriteria dapat mengatur ulang nilai pembobotan dan menghapus semua data Alternatif. </div>";
	}
	
	$sql3 = mysql_query("SELECT * FROM spk_c WHERE id_user='".$_SESSION["ses_user"]."'") or die (mysql_error());
	$cek3=mysql_num_rows($sql3);
		
	if ($cek3 >=15 ){
		$frmoff = "disabled";
	}else{
		$frmoff = "";
	}
	
	$sql = mysql_query("SELECT * FROM spk_c WHERE id_user='".$_SESSION["ses_user"]."'") or die (mysql_error());
	$cek=mysql_num_rows($sql);
		
	if ($cek ==0 ){
		?><form method="post" class="form-horizontal form-label-left" novalidate>
				<button id="send" name="btn2" type="submit" class="btn btn-success" onClick="return confirm('Yakin ingin menggunakan kriteria yang disarankan sistem ?');">Gunakan Kriteria disarankan</button>
			</form>
		<?php
	}
	
	if (isset($_POST['btn2'])) {		
		
				$sql_insert_c = "Insert into spk_c values(
					'',
					'Biaya Masuk',
					'Rendah lebih baik',
					'".$_SESSION['ses_user']."')";
				$query_insert_c = mysql_query($sql_insert_c) or die (mysql_error());
			
				$sql_insert_c = "Insert into spk_c values(
					'',
					'Biaya per Semester',
					'Rendah lebih baik',
					'".$_SESSION['ses_user']."')";
				$query_insert_c = mysql_query($sql_insert_c) or die (mysql_error());
			
				$sql_insert_c = "Insert into spk_c values(
					'',
					'Akreditasi',
					'Tinggi lebih baik',
					'".$_SESSION['ses_user']."')";
				$query_insert_c = mysql_query($sql_insert_c) or die (mysql_error());
			
				$sql_insert_c = "Insert into spk_c values(
					'',
					'Jarak Instansi dengan Rumah',
					'Rendah lebih baik',
					'".$_SESSION['ses_user']."')";
				$query_insert_c = mysql_query($sql_insert_c) or die (mysql_error());
			
				if ($query_insert_c) {
					
					echo "<div class='alert alert-success'><a href='' class='close' data-dismiss='alert'>&times;</a>Data kriteria yang disarankan sistem telah berhasil ditambahkan.		</div>";
					echo "<meta http-equiv='refresh' content='1; url=index.php?page=Tambah Kriteria'>";
					
					$sql_insert_log = "Insert into log(id_user,isi_log) values(
						'".$_SESSION['ses_user']."',
						'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria, menggunakan kriteria yang disarankan sistem)')";
					$query_insert_log = mysql_query($sql_insert_log) or die (mysql_error());

				} else {
					echo "<div class='alert alert-danger'>
						  <a href='' class='close' data-dismiss='alert'>&times;</a>Proses gagal !		</div>";
				}
				
	}
	
	if($_GET['page']=="Tambah Kriteria") {
		
		$btn_lbl="Tambah";
		$btn_v="tambah";

		$minmax_c = "";
		$nama_c = "";
		
	} else {
		
		if (isset($_GET['ejviejnrjinencij'])) {
	
		}else{
			echo "<div class='alert alert-danger'>
						<a href='' class='close' data-dismiss='alert'>&times;</a>Beralih ! </div>";
			echo "<meta http-equiv='refresh'content='0; url=index.php?page=Halaman Utama'>";
		}
		
		$btn_lbl="Simpan";
		$btn_v="ubah";
		
		$sql_dt_c_ubh = mysql_query("select*from spk_c where id_user='".$_SESSION["ses_user"]."' and id_c='".$_GET["ejviejnrjinencij"]."'")
						or die (mysql_error());
		$data_dt_c_ubh = mysql_fetch_array($sql_dt_c_ubh);
		
		$minmax_c = $data_dt_c_ubh['minmax_c'];
		$nama_c = $data_dt_c_ubh['nama_c'];
		
	}
	
	if (isset($_POST['btntmbhins'])) {		
		
		if($_GET['page']=="Tambah Kriteria") {
		
				$sql_insert_c = "Insert into spk_c values(
					'',
					'".$_POST['nama_c']."',
					'".$_POST['minmax_c']."',
					'".$_SESSION['ses_user']."')";
				$query_insert_c = mysql_query($sql_insert_c) or die (mysql_error());
			
				if ($query_insert_c) {
					
					require_once "val_spk.php";
					
					echo "<div class='alert alert-success'><a href='' class='close' data-dismiss='alert'>&times;</a>Data telah berhasil ditambahkan.		</div>";
					echo "<meta http-equiv='refresh' content='1; url=index.php?page=Tambah Kriteria'>";
					
					$sql_insert_log = "Insert into log(id_user,isi_log) values(
						'".$_SESSION['ses_user']."',
						'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)')";
					$query_insert_log = mysql_query($sql_insert_log) or die (mysql_error());

				} else {
					echo "<div class='alert alert-danger'>
						  <a href='' class='close' data-dismiss='alert'>&times;</a>Proses gagal !		</div>";
				}
				
		}else{
			
				$sql_update_c = "update spk_c set
					nama_c ='".$_POST['nama_c']."',
					minmax_c ='".$_POST['minmax_c']."'
					where id_c ='".$_GET["ejviejnrjinencij"]."'";
				$query_update_c = mysql_query($sql_update_c) or die (mysql_error());
			
				if ($query_update_c) {
					echo "<div class='alert alert-success'><a href='' class='close' data-dismiss='alert'>&times;</a>Data telah berhasil diubah.		</div>";
					echo "<meta http-equiv='refresh' content='1; url=index.php?page=Tambah Kriteria'>";
							
					$sql_insert_log = "Insert into log(id_user,isi_log) values(
						'".$_SESSION['ses_user']."',
						'Fasilitas Bantu Pilih Sekolah (Ubah Kriteria)')";
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
                    <h2>Sistem Pendukung Keputusan</h2>
                    
                    <div class="clearfix"></div>
                  </div>
				  <div style="overflow:scrol">
                  <div class="x_content">
                     <strong>Data Kriteria (minimal 3 buah):</strong><br>
					 <?php 
					 $sql_tmpl_c = mysql_query("select*from spk_c where id_user='".$_SESSION["ses_user"]."' order by id_c desc")
							or die (mysql_error());
							
					 while ($data_tmpl_c = mysql_fetch_array($sql_tmpl_c)) {
					     
						echo " ".$data_tmpl_c['nama_c']." *".$data_tmpl_c['minmax_c']."*";?>
							<a class="btn btn-info btn-sm" href="?page=Ubah Kriteria&ejviejnrjinencij=<?php echo $data_tmpl_c['id_c'];?>">
							  <span class="glyphicon glyphicon-pencil"></span>
							</a><a class="btn btn-danger btn-sm" href="?page=gvgcxdfcgvyhvtghuytufyderwe5&wihewnwbciuehw8ehuh2=<?php echo $data_tmpl_c['id_c'];?>" onClick="return confirm('Data ini tidak dapat dikembalikan. Yakin ingin menghapus permanen data ?');">
							  <span class="glyphicon glyphicon-trash"></span>
							</a>
							<br>
						<?php
					 }
					 ?>
                    <div class="ln_solid"></div>
					<form method="post" class="form-horizontal form-label-left" novalidate>
							  <div class="item form-group">
								<div class="col-md-6 col-sm-6 col-xs-6">
								  <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="3,50" name="nama_c" placeholder="Masukkan Kriteria disini..." required="" type="text" value="<?php echo $nama_c;?>">
								</div>
							  </div>
					          <div class="item form-group">
								<div class="col-md-6 col-sm-6 col-xs-8">
									<select class="form-control" id="jnjg" name="minmax_c">
										<option value="Tinggi lebih baik" <?php if($minmax_c=="Tinggi lebih baik"){echo "selected";} ?> >Tinggi lebih baik</option>
										<option value="Rendah lebih baik" <?php if($minmax_c=="Rendah lebih baik"){echo "selected";} ?> >Rendah lebih baik</option>
									</select>
								</div>
							  </div>
					          <div class="ln_solid"></div>
							  <div class="form-group">
								<div class="col-md-12 col-md-offset-3">
								  <button <?php echo "".$frmoff.""; ?> id="send" name="btntmbhins" type="submit" class="btn btn-success" onClick="return confirm('Yakin <?php echo $btn_v;?> data kriteria ?');"><?php echo $btn_lbl;?></button>
								  <a href="?page=Tambah Alternatif"><button type="button" class="btn btn-primary">Lanjutkan</button></a>
								  
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