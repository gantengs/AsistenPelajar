<?php 
if (isset($_POST['btnsrn'])) {
	$sql_insert_srn = "Insert into saran(id_user,isi_srn)values(
			'".$_SESSION['ses_user']."',
			'".$_POST['isi_srn']."')";
	$query_insert_srn = mysql_query($sql_insert_srn) or die (mysql_error());
		
	if ($query_insert_srn) {
				
		echo "<div class='alert alert-success'>
			<a href='' class='close' data-dismiss='alert'>&times;</a>Permintaan anda akan segera kami proses...		</div>";
		echo "<meta http-equiv='refresh' content='2; url=index.php?page=Permintaan Fitur'>";
		
		
				$sql_insert_log = "Insert into log(id_user,isi_log) values(
					'".$_SESSION['ses_user']."',
					'Kirim saran kepada Developer : ".$_POST['isi_srn']."')";
				$query_insert_log = mysql_query($sql_insert_log) or die (mysql_error());
			
					
	}else{
		echo "<div class='alert alert-danger'>
			<a href='' class='close' data-dismiss='alert'>&times;</a>Pengiriman Gagal !				</div>";
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
                    <h2>Fitur apa yang anda inginkan ?</h2>
                    
                    <div class="clearfix"></div>
                  </div>
				  <div style="overflow:scrol">
                  <div class="x_content">
                    
                    <form method="post" class="form-horizontal form-label-left" novalidate>
					          <div class="item form-group">
								<p>Terimakasih telah berpartisipasi dalam pengembangan Website ini !...</p>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<textarea id="textarea" required="required" data-validate-length-range="20,300" name="isi_srn" class="form-control col-md-7 col-xs-12" placeholder="Deskripsikan keinginan anda disini... 'minimal 20 karakter'" style="resize:vertical;"></textarea>
								</div>
							  </div>
							  <div class="ln_solid"></div>
							  <div class="form-group">
								<div class="col-md-12 col-md-offset-3">
								  <button id="send" name="btnsrn" type="submit" class="btn btn-success" onClick="return confirm('Kirimkan permintaan...');">Kirim</button>
								</div>
							  </div>
						  </form>
					 <div class="ln_solid"></div>
					 <strong>3 saran terakhir yang telah anda kirim :</strong><br>
					 <?php 
					 $sql_tmpl_srn = mysql_query("select*from saran where id_user='".$_SESSION["ses_user"]."' order by id_srn desc limit 3")
							or die (mysql_error());
							
					 while ($data_tmpl_srn = mysql_fetch_array($sql_tmpl_srn)) {
					     $sqltgl_srn_format = mysql_query("select DATE_FORMAT('".$data_tmpl_srn['tgl_srn']."', '%d %b %Y (%r)') as tgl, DATE_FORMAT('".$data_tmpl_srn['tgl_srn']."', '%w') as hari")
								or die (mysql_error());
								$data_tgl_srn_format=mysql_fetch_array($sqltgl_srn_format);
								if ($data_tgl_srn_format["hari"]=="1"){
									$hari_cr="Senin";
								}else if ($data_tgl_srn_format["hari"]=="2"){
									$hari_cr="Selasa";
								}else if ($data_tgl_srn_format["hari"]=="3"){
									$hari_cr="Rabu";
								}else if ($data_tgl_srn_format["hari"]=="4"){
									$hari_cr="Kamis";
								}else if ($data_tgl_srn_format["hari"]=="5"){
									$hari_cr="Jumat";
								}else if ($data_tgl_srn_format["hari"]=="6"){
									$hari_cr="Sabtu";
								}else{
									$hari_cr="Minggu";
								}
						echo "# ".$hari_cr.", ".$data_tgl_srn_format['tgl']."  ||  ".$data_tmpl_srn['isi_srn'].".<br>";
					 }
					 ?>
                  </div>
				  </div>
                </div>
              </div>
            </div>
          </div>
        
    
</body>
</html>