<?php
	if (isset($_GET['hbvjklsbhsjsbhb'])) {
	
	}else{
		echo "<div class='alert alert-danger'>
					<a href='' class='close' data-dismiss='alert'>&times;</a>Beralih ! </div>";
		echo "<meta http-equiv='refresh'content='0; url=index.php?page=Halaman Utama'>";
	}
	
	if($_GET['page']=="Tambah Subjek") {
		
		$btn_lbl="Tambah";
		$btn_v="tambah";

		$nama_sub = "";
		$pengampu_sub = "";
		$wkt_hari_sub = "Senin";
		$wkt_jam_sub = "";
		$wkt_mnt_sub = "";
		$warna_sub = "#1c5cba";
		
	} else {
		
		if (isset($_GET['ejviejnrjinencij'])) {
	
		}else{
			echo "<div class='alert alert-danger'>
						<a href='' class='close' data-dismiss='alert'>&times;</a>Beralih ! </div>";
			echo "<meta http-equiv='refresh'content='0; url=index.php?page=Halaman Utama'>";
		}
		
		$btn_lbl="Simpan";
		$btn_v="ubah";
		
		$sql_dt_sub_ubh = mysql_query("select*from jenjang natural join instansi natural join kelas natural join subjek where id_user='".$_SESSION["ses_user"]."' and id_sub='".$_GET["ejviejnrjinencij"]."'")
						or die (mysql_error());
		$data_dt_sub_ubh = mysql_fetch_array($sql_dt_sub_ubh);
		
		$nama_sub = $data_dt_sub_ubh['nama_sub'];
		$pengampu_sub = $data_dt_sub_ubh['pengampu_sub'];
		$wkt_hari_sub = $data_dt_sub_ubh['wkt_hari_sub'];
		$wkt_jam_sub = $data_dt_sub_ubh['wkt_jam_sub'];
		$wkt_mnt_sub = $data_dt_sub_ubh['wkt_mnt_sub'];
		$warna_sub = $data_dt_sub_ubh['warna_sub'];
		
	}
	
	if (isset($_POST['btntmbhsub'])) {
		
		if($_GET['page']=="Tambah Subjek") {
			
				$sql_insert_sub = "Insert into subjek values(
					'',
					'".$_POST['nama_sub']."',
					'".$_POST['pengampu_sub']."',
					'".$_POST['wkt_hari_sub']."',
					'".$_POST['wkt_jam_sub']."',
					'".$_POST['wkt_mnt_sub']."',
					'".$_POST['warna_sub']."',
					'".$_POST['id_kls']."',
					'no')";
				$query_insert_sub = mysql_query($sql_insert_sub) or die (mysql_error());
			
				if ($query_insert_sub) {
					$sql_dt_sub_1 = mysql_query("select*from jenjang natural join instansi natural join kelas natural join subjek where id_user='".$_SESSION["ses_user"]."' and id_kls='".$_POST['id_kls']."' order by id_sub desc")
						or die (mysql_error());
					$data_dt_sub_1 = mysql_fetch_array($sql_dt_sub_1);
					echo "<div class='alert alert-success'><a href='' class='close' data-dismiss='alert'>&times;</a> ".$_POST['nama_sub']." Telah berhasil ditambahkan pada ".$data_dt_sub_1['singkat_jnjg']." ".$data_dt_sub_1['nama_ins']." (".$data_dt_sub_1['nama_kls']." ".$data_dt_sub_1['smtr_kls'].")		</div>";
					echo "<meta http-equiv='refresh' content='3; url=index.php?page=Tambah Subjek&hbvjklsbhsjsbhb=".$_GET['hbvjklsbhsjsbhb']."'>";
										
					$sql_insert_log = "Insert into log(id_user,isi_log) values(
						'".$_SESSION['ses_user']."',
						'Tambah Subjek ".$_POST['nama_sub']." pada ".$data_dt_sub_1['singkat_jnjg']." ".$data_dt_sub_1['nama_ins']." (".$data_dt_sub_1['nama_kls']." ".$data_dt_sub_1['smtr_kls'].") ')";
					$query_insert_log = mysql_query($sql_insert_log) or die (mysql_error());
	
				} else {
					echo "<div class='alert alert-danger'>
						  <a href='' class='close' data-dismiss='alert'>&times;</a>Proses gagal !		</div>";
				}
		}else{
			
			$sql_update_sub = "update subjek set
					nama_sub ='".$_POST['nama_sub']."',
					pengampu_sub ='".$_POST['pengampu_sub']."',
					wkt_hari_sub ='".$_POST['wkt_hari_sub']."',
					wkt_jam_sub ='".$_POST['wkt_jam_sub']."',
					wkt_mnt_sub ='".$_POST['wkt_mnt_sub']."',
					warna_sub ='".$_POST['warna_sub']."',
					id_kls ='".$_POST['id_kls']."'
					where id_sub ='".$_GET["ejviejnrjinencij"]."'";
				$query_update_sub = mysql_query($sql_update_sub) or die (mysql_error());
			
				if ($query_update_sub) {
					$sql_dt_sub_2 = mysql_query("select*from jenjang natural join instansi natural join kelas natural join subjek where id_user='".$_SESSION["ses_user"]."' and id_sub='".$_GET["ejviejnrjinencij"]."'")
						or die (mysql_error());
					$data_dt_sub_2 = mysql_fetch_array($sql_dt_sub_2);
					echo "<div class='alert alert-success'><a href='' class='close' data-dismiss='alert'>&times;</a>".$data_dt_sub_ubh['nama_sub']." pada ".$data_dt_sub_ubh['singkat_jnjg']." ".$data_dt_sub_ubh['nama_ins']." (".$data_dt_sub_ubh['nama_kls']." ".$data_dt_sub_ubh['smtr_kls'].") Telah berhasil diubah menjadi ".$data_dt_sub_2['nama_sub']." pada ".$data_dt_sub_2['singkat_jnjg']." ".$data_dt_sub_2['nama_ins']." (".$data_dt_sub_2['nama_kls']." ".$data_dt_sub_2['smtr_kls'].").		</div>";
					echo "<meta http-equiv='refresh' content='5; url=index.php?page=Halaman Utama'>";
										
					$sql_insert_log = "Insert into log(id_user,isi_log) values(
						'".$_SESSION['ses_user']."',
						'Ubah Subjek ".$data_dt_sub_ubh['nama_sub']." pada ".$data_dt_sub_ubh['singkat_jnjg']." ".$data_dt_sub_ubh['nama_ins']." (".$data_dt_sub_ubh['nama_kls']." ".$data_dt_sub_ubh['smtr_kls'].") menjadi ".$data_dt_sub_2['nama_sub']." pada ".$data_dt_sub_2['singkat_jnjg']." ".$data_dt_sub_2['nama_ins']." (".$data_dt_sub_2['nama_kls']." ".$data_dt_sub_2['smtr_kls'].") ')";
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
                    <h2>Mapel/Makul</h2>
                    
                    <div class="clearfix"></div>
                  </div>
				  <div style="overflow:scrol">
                  <div class="x_content">
                    
                    <form method="post" class="form-horizontal form-label-left" novalidate>
					          <div class="item form-group">
								<p>Pilih Kelas/Semester</p>
								<div class="col-md-6 col-sm-6 col-xs-8">
									<select class="form-control" id="jnjg" name="id_kls">
										<?php
											$sql_dt_kls = mysql_query("select*from jenjang natural join instansi natural join kelas where id_user='".$_SESSION["ses_user"]."' and hps_kls='no' and hps_ins='no' order by id_jnjg desc")
											or die (mysql_error());
											while ($data_dt_kls = mysql_fetch_array($sql_dt_kls)) {
										?>
										<option value="<?php echo $data_dt_kls['id_kls']; ?>" <?php if($data_dt_kls['id_kls']==$_GET['hbvjklsbhsjsbhb']){echo "selected";} ?> ><?php echo $data_dt_kls['singkat_jnjg']." ".$data_dt_kls['nama_ins']." (".$data_dt_kls['nama_kls']." ".$data_dt_kls['smtr_kls'].")"; ?></option>
										<?php
											}
										?>
									</select>
								</div>
							  </div>
							  <div class="item form-group">
								<p>Nama singkat Subjek</p>
								<div class="col-md-5 col-sm-5 col-xs-6">
									<input id="name" class="form-control col-md-7 col-xs-12" maxlength="10" data-validate-length-range="1,10" name="nama_sub" placeholder="contoh : IPA" required="" type="text" value="<?php echo $nama_sub;?>">
								</div>
							  </div>
							  <div class="item form-group">
								<p>Nama Pengampu</p>
								<div class="col-md-5 col-sm-5 col-xs-6">
								  <input id="name" class="form-control col-md-7 col-xs-12" maxlength="30" name="pengampu_sub" placeholder="*boleh kosong*" type="text" value="<?php echo $pengampu_sub;?>">
								</div>
							  </div>
							  <div class="item form-group">
								<p>Jadwal</p>
								<div class="col-md-3 col-sm-4 col-xs-5">
									Hari
									<select class="form-control" id="jnjg" name="wkt_hari_sub">
										<option value="Senin" <?php if ($wkt_hari_sub=="Senin"){echo "selected";} ?> >Senin</option>
										<option value="Selasa" <?php if ($wkt_hari_sub=="Selasa"){echo "selected";} ?> >Selasa</option>
										<option value="Rabu" <?php if ($wkt_hari_sub=="Rabu"){echo "selected";} ?> >Rabu</option>
										<option value="Kamis" <?php if ($wkt_hari_sub=="Kamis"){echo "selected";} ?> >Kamis</option>
										<option value="Jumat" <?php if ($wkt_hari_sub=="Jumat"){echo "selected";} ?> >Jumat</option>
										<option value="Sabtu" <?php if ($wkt_hari_sub=="Sabtu"){echo "selected";} ?> >Sabtu</option>
										<option value="Minggu" <?php if ($wkt_hari_sub=="Minggu"){echo "selected";} ?> >Minggu</option>
									</select>
									
								</div>
							  </div>
							  <div class="item form-group">
								<div class="col-md-2 col-sm-3 col-xs-4">
								  Jam
									<input type="number" id="number" value="<?php echo $wkt_jam_sub; ?>" name="wkt_jam_sub" required="required" min="5" max="24" data-validate-minmax="5,24" class="form-control col-md-7 col-xs-12">
								</div>
							  </div>
							  <div class="item form-group">
								<div class="col-md-2 col-sm-3 col-xs-4">
								  Menit
									<input type="number" id="number" value="<?php echo $wkt_mnt_sub; ?>" name="wkt_mnt_sub" required="required" min="0" max="59"  data-validate-minmax="0,59" class="form-control col-md-7 col-xs-12">
								</div>
							  </div>
							  <div class="form-group">
								<p>Warna</p>
								<div class="col-md-5 col-sm-5 col-xs-6">
								  <div class="input-group demo2">
									<input type="text" value="<?php echo $warna_sub; ?>" class="input-group-addon form-control" name="warna_sub"/>
									<span class="input-group-addon"><i></i></span>
								  </div>
								</div>
							  </div>
							  <div class="ln_solid"></div>
							  <div class="form-group">
								<div class="col-md-12 col-md-offset-3">
								  <button id="send" name="btntmbhsub" type="submit" class="btn btn-success" onClick="return confirm('Yakin <?php echo $btn_v; ?> data ?');"><?php echo $btn_lbl; ?></button>
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