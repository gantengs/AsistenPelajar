<?php
	
	$sql_hapus = "DELETE FROM log WHERE id_user='".$_SESSION["ses_user"]."'";
	$query_hapus = mysql_query($sql_hapus) or die (mysql_error());
		
		if ($query_hapus) {
			
			$sql_insert_log = "Insert into log(id_user,isi_log) values(
					'".$_SESSION['ses_user']."',
					'Membersihkah Catatan Aktifitas (Log Aktifitas)')";
			$query_insert_log = mysql_query($sql_insert_log) or die (mysql_error());
		
			echo "<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert'>&times;
				</a>Hapus Berhasil
				</div>";
			echo "<meta http-equiv='refresh'content='1; url=?page=".$_GET['uhbfdsgq']."'>";
			
		}else{
			echo"<script>alert('Hapus gagal !')</script>";
		}
?> 