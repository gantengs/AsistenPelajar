<?php
	
		require_once "val_spk.php";
					
				
		$sql_log_insert = mysql_query("select*from spk_c where id_c='".$_GET["wihewnwbciuehw8ehuh2"]."'")
			or die (mysql_error());
		$data_log_insert = mysql_fetch_array($sql_log_insert);
								
		
		$sql_delete = "delete from spk_c where id_c='".$_GET["wihewnwbciuehw8ehuh2"]."'";
		$query_delete = mysql_query($sql_delete) or die (mysql_error());
	
		if ($query_delete) {
				
				echo "<div class='alert alert-success'>
					<a href='' class='close' data-dismiss='alert'>&times;</a>Hapus Berhasil		</div>";
				echo "<meta http-equiv='refresh'content='0; url=?page=Tambah Kriteria'>";
				
				$sql_insert_log = "Insert into log(id_user,isi_log) values(
					'".$_SESSION['ses_user']."',
					'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria ".$data_log_insert['nama_c']." *".$data_log_insert['minmax_c']."*)')";
				$query_insert_log = mysql_query($sql_insert_log) or die (mysql_error());
		
		}else{
				echo "<div class='alert alert-danger'>
					<a href='' class='close' data-dismiss='alert'>&times;</a>Hapus Gagal !				</div>";
		}
				
	
?>