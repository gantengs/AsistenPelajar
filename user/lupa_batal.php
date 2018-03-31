<?php
session_start();

if (isset($_SESSION['ses_lupa'])=="") {
	
}else{

	require_once "koneksi.php";
	$sql_insert_log = "Insert into log(id_user,isi_log) values(
		'".$_SESSION['ses_lupa']."',
		'Membatalkan fasilitas Lupa Password')";
	$query_insert_log = mysql_query($sql_insert_log) or die (mysql_error());

}
	

unset($_SESSION['ses_lupa']);
unset($_SESSION['ses_name']);
unset($_SESSION['ses_lupa_1']);
unset($_SESSION['ses_name_1']);
unset($_SESSION['ses_lupa_2']);
unset($_SESSION['ses_name_2']);
echo "<meta http-equiv='refresh'content='0; url=login.php'>";
?>