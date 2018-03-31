<?php
	if($_GET['page']=="Tambah Even") {
		
		$btn_lbl="Tambah";
		$btn_v="tambah";

		$nama_ev = "";
		$tgl_ev = $_SESSION["ses_tgl_ev"];
		$des_ev = "";
		$id_sub = "";
		
	} else {
		
		if (isset($_GET['ejviejnrjinencij'])) {
	
		}else{
			echo "<div class='alert alert-danger'>
						<a href='' class='close' data-dismiss='alert'>&times;</a>Beralih ! </div>";
			echo "<meta http-equiv='refresh'content='0; url=index.php?page=Halaman Utama'>";
		}
		
		if (isset($_GET['uhbfdsgq'])) {
	
		}else{
			echo "<div class='alert alert-danger'>
						<a href='' class='close' data-dismiss='alert'>&times;</a>Beralih ! </div>";
			echo "<meta http-equiv='refresh'content='0; url=index.php?page=Halaman Utama'>";
		}
		
		$btn_lbl="Simpan";
		$btn_v="ubah";
		
		$sql_dt_ev_ubh = mysql_query("select*from even where id_ev='".$_GET["ejviejnrjinencij"]."'")
						or die (mysql_error());
		$data_dt_ev_ubh = mysql_fetch_array($sql_dt_ev_ubh);
		
		$nama_ev = $data_dt_ev_ubh['nama_ev'];
		$tgl_ev = $data_dt_ev_ubh['tgl_ev'];
		$des_ev = $data_dt_ev_ubh['des_ev'];
		$id_sub = $data_dt_ev_ubh['id_sub'];
		
	}
	
	if (isset($_POST['tambah_ev'])) {
		
		if($_GET['page']=="Tambah Even") {
				
			$_SESSION["ses_tgl_ev"]=$_POST['tgl_ev'];
			
			$sql_insert_ev = "Insert into even values(
					'',
					'".$_POST['nama_ev']."',
					'".$_POST['tgl_ev']."',
					'".$_POST['des_ev']."',
					'Belum Selesai',
					'".$_POST['id_sub']."')";
			$query_insert_ev = mysql_query($sql_insert_ev) or die (mysql_error());
					
			if ($query_insert_ev) {
					echo "<div class='alert alert-success'><a href='' class='close' data-dismiss='alert'>&times;</a>Even ".$_POST['nama_ev']." berhasil ditambahkan		</div>";
					echo "<meta http-equiv='refresh' content='2; url=index.php?page=Even'>";
					
					$sql_log_insert_2 = mysql_query("select*from even natural join subjek where id_sub='".$_POST['id_sub']."' order by id_ev desc")
						or die (mysql_error());
					$data_log_insert_2 = mysql_fetch_array($sql_log_insert_2);
					
					
					$sql_insert_log = "Insert into log(id_user,isi_log) values(
						'".$_SESSION['ses_user']."',
						'Tambah Even ".$data_log_insert_2['nama_ev']." pada subjek ".$data_log_insert_2['nama_sub']." ')";
					$query_insert_log = mysql_query($sql_insert_log) or die (mysql_error());

					
			} else {
					echo "<div class='alert alert-danger'>
						  <a href='' class='close' data-dismiss='alert'>&times;</a>Proses gagal !		</div>";
			}
			
		}else{
			
			$sql_log_insert = mysql_query("select*from even natural join subjek where id_ev='".$_GET["ejviejnrjinencij"]."'")
				or die (mysql_error());
			$data_log_insert = mysql_fetch_array($sql_log_insert);
			
			$sql_update_ev = "update even set
					nama_ev ='".$_POST['nama_ev']."',
					tgl_ev ='".$_POST['tgl_ev']."',
					des_ev ='".$_POST['des_ev']."',
					id_sub ='".$_POST['id_sub']."'
					where id_ev ='".$_GET["ejviejnrjinencij"]."'";
			$query_update_ev = mysql_query($sql_update_ev) or die (mysql_error());
		
			$sql_log_insert_1 = mysql_query("select*from jenjang natural join instansi natural join kelas natural join subjek natural join even where id_ev='".$_GET["ejviejnrjinencij"]."'")
				or die (mysql_error());
			$data_log_insert_1 = mysql_fetch_array($sql_log_insert_1);
			
			
			if ($query_update_ev) {
					echo "<div class='alert alert-success'><a href='' class='close' data-dismiss='alert'>&times;</a>Even ".$data_log_insert['nama_ev']." pada subjek ".$data_log_insert['nama_sub']." berhasil diubah menjadi ".$data_log_insert_1['nama_ev']." pada subjek ".$data_log_insert_1['nama_sub']." ".$data_log_insert_1['singkat_jnjg']." ".$data_log_insert_1['nama_ins']." (".$data_log_insert_1['nama_kls']." ".$data_log_insert_1['smtr_kls'].")		</div>";
					echo "<meta http-equiv='refresh' content='3; url=index.php?page=".$_GET["uhbfdsgq"]."'>";

					
					$sql_insert_log = "Insert into log(id_user,isi_log) values(
						'".$_SESSION['ses_user']."',
						'Ubah Even ".$data_log_insert['nama_ev']." pada subjek ".$data_log_insert['nama_sub']." menjadi ".$data_log_insert_1['nama_ev']." pada subjek ".$data_log_insert_1['nama_sub']." ".$data_log_insert_1['singkat_jnjg']." ".$data_log_insert_1['nama_ins']." (".$data_log_insert_1['nama_kls']." ".$data_log_insert_1['smtr_kls'].")')";
					$query_insert_log = mysql_query($sql_insert_log) or die (mysql_error());

					
			} else {
					echo "<div class='alert alert-danger'>
						  <a href='' class='close' data-dismiss='alert'>&times;</a>Proses gagal !		</div>";
			}
			
		}
	}	



		$sql_dt_sub = mysql_query("select*from subjek where id_kls='".$_SESSION["ses_nav_data"]."' and hps_sub='no' order by nama_sub")
		or die (mysql_error());
		$cek_dt_sub=mysql_num_rows($sql_dt_sub);
		if ($cek_dt_sub==0) {
			echo "<div class='alert alert-warning'><a href='' class='close' data-dismiss='alert'>&times;</a>Tidak terdapat Subjek yang terdeteksi / Subjek telah anda Hapus...	Mohon Tambahkan Subjek terlebih dahulu	</div>";
			echo "<meta http-equiv='refresh' content='3; url=index.php?page=Tambah Subjek&hbvjklsbhsjsbhb=".$_SESSION["ses_nav_data"]."'>";
				
		} else {
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
                    <h2>Tentang Even</h2>
                    
                    <div class="clearfix"></div>
                  </div>
				  <div style="overflow:scrol">
                  <div class="x_content">
                    
                    <form method="post" class="form-horizontal form-label-left" novalidate>
					          <div class="item form-group">
								<p>Pilih Subjek</p>
								<div class="col-md-6 col-sm-6 col-xs-8">
									<select class="form-control" id="jnjg" name="id_sub">
										<?php
											
											while ($data_dt_sub = mysql_fetch_array($sql_dt_sub)) {
										?>
										<option value="<?php echo $data_dt_sub['id_sub']; ?>" <?php if($data_dt_sub['id_sub']==$id_sub){echo "selected";} ?> ><?php echo $data_dt_sub['nama_sub']." (".$data_dt_sub['wkt_hari_sub'].") ".$data_dt_sub['pengampu_sub']."*."; ?></option>
										<?php
											}
										?>
									</select>
								</div>
							  </div>
							  <div class="item form-group">
								<p>Tanggal</p>
								<div class="col-md-6 col-sm-6 col-xs-6">
								  <input type="text" class="form-control" name="tgl_ev" data-validate-length-range="10,10" id="datepicker" value="<?php echo $tgl_ev;?>" required="required"/>
							    </div>
							  </div>
							  <div class="item form-group">
								<p>Even</p>
								<div class="col-md-6 col-sm-6 col-xs-6">
								  <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="3,50" name="nama_ev" placeholder="Judul Even" required="" type="text" value="<?php echo $nama_ev;?>" >
								</div>
							  </div>
							  <div class="item form-group">
								<p>Deskripsi</p>
								<div class="col-md-6 col-sm-6 col-xs-6">
								  <textarea id="textarea" name="des_ev" class="form-control col-md-7 col-xs-12" placeholder="Catatan tentang even... " style="resize:vertical;"><?php echo $des_ev;?></textarea>
								</div>
							  </div>
							  <div class="ln_solid"></div>
							  <div class="form-group">
								<div class="col-md-12 col-md-offset-3">
								  <button id="send" type="submit" name="tambah_ev" class="btn btn-success" onClick="return confirm('Yakin <?php echo $btn_v;?> data ?');"><?php echo $btn_lbl;?></button>
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