<?php
if(isset($_GET['sawwrxrerzrddtrcfhgvbjhbgyryzsefxfctrc'])) {
	
	$sql_ev_cek = mysql_query("SELECT * FROM jenjang natural join instansi natural join kelas natural join subjek natural join even where id_user='".$_SESSION["ses_user"]."' and id_ev='".$_GET['sawwrxrerzrddtrcfhgvbjhbgyryzsefxfctrc']."' and id_kls='".$_SESSION["ses_nav_data"]."' ") or die (mysql_error());
	$cek_ev=mysql_num_rows($sql_ev_cek);
	$data_log_insert = mysql_fetch_array($sql_ev_cek);
	
	if ($cek_ev >=1 ){
		
		switch ($_GET['fcfckxfccgvhggsessesesbjbj']){
			case 'sdccgcgdxtcrcgfcfvgvhgv':
			$sts="Belum Selesai";
			break;

			case 'ytcvtctxtcjtfgctyvycrccytgvvyv':
			$sts="Sudah Selesai";
			break;

			default :
			
			break;
		}
		
		$sql_update = "update even set
			selesai_ev='".$sts."'
			where id_ev='".$_GET['sawwrxrerzrddtrcfhgvbjhbgyryzsefxfctrc']."'";
		$query_update = mysql_query($sql_update) or die (mysql_error());
			if ($query_update) {
					
				echo "<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert'>&times;</a>Tanda berhasil diubah	</div>";
				echo "<meta http-equiv='refresh'content='1; url=?page=".$_GET["uhbfdsgq"]."'>";
							
				
				$sql_insert_log = "Insert into log(id_user,isi_log) values(
					'".$_SESSION['ses_user']."',
					'Ubah status Even ".$data_log_insert['nama_ev']." menjadi ".$sts." pada subjek ".$data_log_insert['nama_sub']." ".$data_log_insert['singkat_jnjg']." ".$data_log_insert['nama_ins']." (".$data_log_insert['nama_kls']." ".$data_log_insert['smtr_kls'].") ')";
				$query_insert_log = mysql_query($sql_insert_log) or die (mysql_error());
			
			
			}else{
				echo "<div class='alert alert-danger'>
					<a href='' class='close' data-dismiss='alert'>&times;</a> Gagal !				</div>";
			}
			
	}else{
		echo "<div class='alert alert-danger'>
					<a href='' class='close' data-dismiss='alert'>&times;</a> Data tidak valid !				</div>";
	}
	
}else { 
		
}
		
		
				
	
?>