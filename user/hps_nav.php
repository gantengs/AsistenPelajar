<?php
if(isset($_GET['gvhvvghlyftgtkfckftgkf'])) {
	switch ($_GET['gvhvvghlyftgtkfckftgkf']){
		case 'fcfgdrsrrtr65e4dr6d':
		$yesno="yes";
		$log_insert_x="Menghapus";
		break;

		case 'hcnehuwhiwencehunc':
		$yesno="no";
		$log_insert_x="Mengembalikan";
		break;

		default :
		
		break;
	}
	
}else { 
		
}

if(isset($_GET['tyf56ftyf67gtytfytftygu'])) {
	switch ($_GET['tyf56ftyf67gtytfytftygu']){
		case 'ftxrfr656tyfidtrd5dcyx':
			$navtabel="instansi";
			$navtabel_id="ins";
			
			$sql_log_insert = mysql_query("select*from instansi natural join jenjang where id_ins='".$_GET["fcchcgcfccdxzeswzrfdxtrd"]."'")
				or die (mysql_error());
			$data_log_insert = mysql_fetch_array($sql_log_insert);
			$log_insert_y= " ".$data_log_insert['singkat_jnjg']." ".$data_log_insert['nama_ins']." ";
			
		break;

		case 'tyftdtctd65td7dtcgyuyg':
			$navtabel="kelas";
			$navtabel_id="kls";
			
			$sql_log_insert = mysql_query("select*from kelas natural join instansi natural join jenjang where id_kls='".$_GET["fcchcgcfccdxzeswzrfdxtrd"]."'")
				or die (mysql_error());
			$data_log_insert = mysql_fetch_array($sql_log_insert);
			$log_insert_y= " (".$data_log_insert['nama_kls']." ".$data_log_insert['smtr_kls'].") pada ".$data_log_insert['singkat_jnjg']." ".$data_log_insert['nama_ins']." ";
			
		break;

		case 'ygvgtdrftgcvytfdydtfyvfygvtf':
			$navtabel="subjek";
			$navtabel_id="sub";
			
			$sql_log_insert = mysql_query("select*from subjek natural join kelas natural join instansi natural join jenjang where id_sub='".$_GET["fcchcgcfccdxzeswzrfdxtrd"]."'")
				or die (mysql_error());
			$data_log_insert = mysql_fetch_array($sql_log_insert);
			$log_insert_y= " ".$data_log_insert['nama_sub']." pada ".$data_log_insert['singkat_jnjg']." ".$data_log_insert['nama_ins']." (".$data_log_insert['nama_kls']." ".$data_log_insert['smtr_kls'].") ";
			
		break;

		default :
		
		break;
	}
	
}else { 
		
}

$sql_update = "update ".$navtabel." set
	hps_".$navtabel_id."='".$yesno."'
	where id_".$navtabel_id."='".$_GET["fcchcgcfccdxzeswzrfdxtrd"]."'";
$query_update = mysql_query($sql_update) or die (mysql_error());

if ($query_update) {
					
		echo "<div class='alert alert-success'>
			<a href='' class='close' data-dismiss='alert'>&times;</a>Berhasil		</div>";
		echo "<meta http-equiv='refresh'content='0; url=?page=".$_GET["uhbfdsgq"]."'>";
					
		$sql_in = mysql_query("select*from jenjang natural join instansi natural join kelas where id_user='".$_SESSION["ses_user"]."' and hps_ins='no' and hps_kls='no' order by tgl_kls desc limit 1")
			or die (mysql_error());
			$data_in = mysql_fetch_array($sql_in);
		$_SESSION["ses_nav_data"]=$data_in["id_kls"];	
		
		
		
		$sql_insert_log = "Insert into log(id_user,isi_log) values(
			'".$_SESSION['ses_user']."',
			'".$log_insert_x." data".$log_insert_y."')";
		$query_insert_log = mysql_query($sql_insert_log) or die (mysql_error());
		
}else{
		echo "<div class='alert alert-danger'>
			<a href='' class='close' data-dismiss='alert'>&times;</a>Gagal !				</div>";
}
				
?>