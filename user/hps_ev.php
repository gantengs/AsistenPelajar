<?php
	
		
		$sql_log_insert = mysql_query("select*from jenjang natural join instansi natural join kelas natural join subjek natural join even where id_ev='".$_GET["wihewnwbciuehw8ehuh2"]."'")
			or die (mysql_error());
		$data_log_insert = mysql_fetch_array($sql_log_insert);
								
		
		$sql_delete = "delete from even where id_ev='".$_GET["wihewnwbciuehw8ehuh2"]."'";
		$query_delete = mysql_query($sql_delete) or die (mysql_error());
	
		if ($query_delete) {
					
				echo "<div class='alert alert-success'>
					<a href='' class='close' data-dismiss='alert'>&times;</a>Hapus Berhasil		</div>";
				echo "<meta http-equiv='refresh'content='0; url=?page=".$_GET["uhbfdsgq"]."'>";
				
				$sql_insert_log = "Insert into log(id_user,isi_log) values(
					'".$_SESSION['ses_user']."',
					'".$data_log_insert['singkat_jnjg']." ".$data_log_insert['nama_ins']." (".$data_log_insert['nama_kls']." ".$data_log_insert['smtr_kls'].") Hapus Even ".$data_log_insert['nama_ev']." pada subjek ".$data_log_insert['nama_sub']."')";
				$query_insert_log = mysql_query($sql_insert_log) or die (mysql_error());
		
		}else{
				echo "<div class='alert alert-danger'>
					<a href='' class='close' data-dismiss='alert'>&times;</a>Hapus Gagal !				</div>";
		}
				
	
?>