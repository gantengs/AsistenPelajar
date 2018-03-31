<?php

	$sql_insert_log = "Insert into log(id_user,isi_log) values(
		'".$_SESSION['ses_user']."',
		'Keluar')";
	$query_insert_log = mysql_query($sql_insert_log) or die (mysql_error());
	
	
unset($_SESSION['ses_nav_data']);
unset($_SESSION['ses_tgl_ev']);
unset($_SESSION['ses_tampil_ev']);
unset($_SESSION['ses_ctk_ev']);
unset($_SESSION['ses_user']);
unset($_SESSION['ses_jd']);
echo "<meta http-equiv='refresh'content='0; url=login.php'>";


?>