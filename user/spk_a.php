<?php
	$sql = mysql_query("SELECT * FROM spk_c WHERE id_user='".$_SESSION["ses_user"]."'") or die (mysql_error());
	$cek=mysql_num_rows($sql);
		
	if ($cek <=2 ){
			echo "<div class='alert alert-warning'>
						<a href='' class='close' data-dismiss='alert'>&times;</a>Kriteria minimal 3 buah, mohon Tambahkan Kriteria ! </div>";
			echo "<meta http-equiv='refresh'content='3; url=index.php?page=Tambah Kriteria'>";		
	}
	
	$sql = mysql_query("SELECT * FROM spk_c,spkb WHERE spk_c.id_user='".$_SESSION["ses_user"]."' and spk_c.id_c=spkb.id_c1") or die (mysql_error());
	$cek=mysql_num_rows($sql);
		
	if ($cek <=0 ){
			$sql = mysql_query("select*from spk_c where id_user='".$_SESSION["ses_user"]."' order by id_c desc")
							or die (mysql_error());
							
			while ($datas = mysql_fetch_array($sql)) {
					 
				$sql2 = mysql_query("select*from spk_c where id_user='".$_SESSION["ses_user"]."' order by id_c desc")
								or die (mysql_error());
								
				while ($datas2 = mysql_fetch_array($sql2)) {
						 
					$sql_insert_c = "Insert into spkb values(
						'',
						'".$datas['id_c']."',
						'".$datas2['id_c']."',
						'1')";
					$query_insert_c = mysql_query($sql_insert_c) or die (mysql_error());

				}
			}
	}
	
	if($_GET['page']=="Tambah Alternatif") {
		
		$btn_lbl="Tambah";
		$btn_v="tambah";

		$nama_a = "";
		$id_a= "";
		$nilai_spk= "";
		
	} else {
		
		if (isset($_GET['ejviejnrjinencij'])) {
	
		}else{
			echo "<div class='alert alert-danger'>
						<a href='' class='close' data-dismiss='alert'>&times;</a>Beralih ! </div>";
			echo "<meta http-equiv='refresh'content='0; url=index.php?page=Halaman Utama'>";
		}
		
		$btn_lbl="Simpan";
		$btn_v="ubah";
		
		$sql_dt_a_ubh = mysql_query("select*from spk_a where id_user='".$_SESSION["ses_user"]."' and id_a='".$_GET["ejviejnrjinencij"]."'")
						or die (mysql_error());
		$data_dt_a_ubh = mysql_fetch_array($sql_dt_a_ubh);
		
		$nama_a = $data_dt_a_ubh['nama_a'];
		$id_a = $data_dt_a_ubh['id_a'];
		
	}
	
	if (isset($_POST['btntmbhins'])) {
		
		if($_GET['page']=="Tambah Alternatif") {
		
				$sql_insert_a = "Insert into spk_a values(
					'',
					'".$_POST['nama_a']."',
					'".$_SESSION['ses_user']."')";
				$query_insert_a = mysql_query($sql_insert_a) or die (mysql_error());

				$sql_dt_spk_a = mysql_query("select*from spk_a where id_user='".$_SESSION["ses_user"]."' order by id_a desc")
						or die (mysql_error());
				$data_dt_spk_a = mysql_fetch_array($sql_dt_spk_a);
				
				if ($query_insert_a) {
					
					$sql_dt_spk_i = mysql_query("select*from spk_c where id_user='".$_SESSION["ses_user"]."' order by id_c desc")
						or die (mysql_error());
						while ($data_dt_spk_i = mysql_fetch_array($sql_dt_spk_i)) {
						
						$sql_insert_spk = "Insert into spk values(
							'',
							'".$_POST[$data_dt_spk_i['id_c']]."',
							'".$data_dt_spk_a['id_a']."',
							'".$data_dt_spk_i['id_c']."')";
						$query_insert_spk = mysql_query($sql_insert_spk) or die (mysql_error());
					
						}
		
					if ($query_insert_spk) {
						
						echo "<div class='alert alert-success'><a href='' class='close' data-dismiss='alert'>&times;</a>Data telah berhasil ditambahkan.		</div>";
						echo "<meta http-equiv='refresh' content='1; url=index.php?page=Tambah Alternatif'>";
								
						$sql_insert_log = "Insert into log(id_user,isi_log) values(
							'".$_SESSION['ses_user']."',
							'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)')";
						$query_insert_log = mysql_query($sql_insert_log) or die (mysql_error());

					} else {
						echo "<div class='alert alert-danger'>
							  <a href='' class='close' data-dismiss='alert'>&times;</a>Proses gagal spk !		</div>";
					}
					
				} else {
					echo "<div class='alert alert-danger'>
						  <a href='' class='close' data-dismiss='alert'>&times;</a>Proses gagal !		</div>";
				}
				
		}else{
			
				$sql_update_a = "update spk_a set
					nama_a ='".$_POST['nama_a']."'
					where id_a ='".$_GET["ejviejnrjinencij"]."'";
				$query_update_a = mysql_query($sql_update_a) or die (mysql_error());
			
				if ($query_update_a) {
					
					$sql_dt_spk_i = mysql_query("select*from spk where id_a='".$_GET["ejviejnrjinencij"]."' order by id_c desc")
						or die (mysql_error());
						while ($data_dt_spk_i = mysql_fetch_array($sql_dt_spk_i)) {
						
						$sql_update_spk = "update spk set
							nilai_spk ='".$_POST[$data_dt_spk_i['id_c']]."'
							where id_spk ='".$data_dt_spk_i['id_spk']."'";
						$query_update_spk = mysql_query($sql_update_spk) or die (mysql_error());
					
						}
		
					echo "<div class='alert alert-success'><a href='' class='close' data-dismiss='alert'>&times;</a>Data telah berhasil diubah.		</div>";
					echo "<meta http-equiv='refresh' content='1; url=index.php?page=Tambah Alternatif'>";
							
					$sql_insert_log = "Insert into log(id_user,isi_log) values(
						'".$_SESSION['ses_user']."',
						'Fasilitas Bantu Pilih Sekolah (Ubah Alternatif)')";
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
                     <?php
					 require_once "bobot.php";
					?>
					<strong>Data Alternatif (minimal 3 buah) :<br></strong><br>
					 <table id="datatable-responsive" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Aksi</th>
						  <th>Nama Instansi</th>
						  <?php
							$sql_tmpl_c = mysql_query("select*from spk_c where id_user='".$_SESSION["ses_user"]."' order by id_c desc")
							or die (mysql_error());
						
							while ($data_tmpl_c = mysql_fetch_array($sql_tmpl_c)) {
								echo "<th>".$data_tmpl_c['nama_c']."</th>"; 
						    }
						  ?>
                        </tr>
                      </thead>
                      <tbody>
					    <?php
							$sql_tmpl_a = mysql_query("select*from spk_a where id_user='".$_SESSION["ses_user"]."' order by id_a desc")
							or die (mysql_error());
						
							while ($data_tmpl_a = mysql_fetch_array($sql_tmpl_a)) {
						?>
                        <tr>
						  <td>
							<a class="btn btn-info btn-sm pull-right" href="?page=Ubah Alternatif&ejviejnrjinencij=<?php echo $data_tmpl_a['id_a'];?>">
							  <span class="glyphicon glyphicon-pencil"></span>
							</a><a class="btn btn-danger btn-sm" href="?page=gjvfuy8yhiugyu8gibyvf&wihewnwbciuehw8ehuh2=<?php echo $data_tmpl_a['id_a'];?>" onClick="return confirm('Data ini tidak dapat dikembalikan. Yakin ingin menghapus permanen data ?');">
							  <span class="glyphicon glyphicon-trash"></span>
							</a>
						  </td>
						  <td><?php echo $data_tmpl_a['nama_a']; ?></td>
                          <?php 
								$sql_tmpl_a_dt = mysql_query("select*from spk where id_a='".$data_tmpl_a["id_a"]."' order by id_a desc")
									or die (mysql_error());
								
									while ($data_tmpl_a_dt = mysql_fetch_array($sql_tmpl_a_dt)) {
										echo "<td>".$data_tmpl_a_dt['nilai_spk']."</td>"; 
									}
							?>
                        </tr>
                        <?php
							}
						?>
                      </tbody>
                    </table>
                    <div class="ln_solid"></div>
					<form method="post" class="form-horizontal form-label-left" novalidate>
							  <Strong>Alternatif :</Strong>
								<div class="item form-group">
								<div class="col-md-6 col-sm-6 col-xs-6">
								  <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="3,50" name="nama_a" placeholder="Masukkan  Nama Instansi disini..." required="" type="text" value="<?php echo $nama_a;?>">
								</div>
							  </div>
					          <?php
								$sql_dt_spk = mysql_query("select*from spk_c where id_user='".$_SESSION["ses_user"]."' order by id_c desc")
									or die (mysql_error());
									while ($data_dt_spk = mysql_fetch_array($sql_dt_spk)) {
							  ?>
								<div class="item form-group">
									<p>Nilai <?php echo $data_dt_spk['nama_c']." *".$data_dt_spk['minmax_c']."*"; ?></p>
									<div class="col-md-6 col-sm-6 col-xs-6">
									<?php
										$sql_dt_a_ubh_1 = mysql_query("select*from spk where id_a='".$id_a."' and id_c='".$data_dt_spk['id_c']."'")
														or die (mysql_error());
										$data_dt_a_ubh_1 = mysql_fetch_array($sql_dt_a_ubh_1);
										$nilai_spk = $data_dt_a_ubh_1['nilai_spk'];
									?>
										<input type="number" id="number" value="<?php echo $nilai_spk; ?>" name="<?php echo $data_dt_spk['id_c']; ?>" required="required" min="1" max="999999999" data-validate-minmax="1,999999999" class="form-control col-md-7 col-xs-12">
									</div>
								</div>
							  <?php
									}
							  ?>
							  <div class="ln_solid"></div>
							  <div class="form-group">
								<div class="col-md-12 col-md-offset-2">
								  <button id="send" name="btntmbhins" type="submit" class="btn btn-success" onClick="return confirm('Yakin <?php echo $btn_v;?> data Alternatif ?');"><?php echo $btn_lbl;?></button>
								  <a href="?page=Tambah Kriteria"><button type="button" class="btn btn-warning">Kembali</button></a>
								  <?php
									$sql2 = mysql_query("SELECT * FROM spk_a WHERE id_user='".$_SESSION["ses_user"]."'") or die (mysql_error());
									$cek2=mysql_num_rows($sql2);
										
									if ($cek2 >=3 ){
									?>
										<a href="#"><button type="button" class="btn btn-default">Selesai</button></a>
									<?php
									}else{}
									?>
								</div>
							  </div>
						  </form>
                    <div class="ln_solid"></div>
					<strong>NB :</strong><br>
					 <p>jika kriteria pada alternatif bernilai selain numerik. maka, anda bisa membuat keterangan. seperti pada contoh dibawah ini :<br>A bernilai 91-100<br>AB = 81-90<br>BC = 50-70<br>dst. (sesuai kebutuhan anda)</p>
                  </div>
				  </div>
                </div>
              </div>
			   <?php
					 require_once "detail_bobot.php";
					?>
            </div>
          </div>
        
    
</body>
</html>