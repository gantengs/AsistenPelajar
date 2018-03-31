<?php

if(isset($_GET['rdtd56tftrdtrstgcb'])) {
	$_SESSION["ses_jd"]=$_GET["hdvtjbvhfnyg"];
	echo "<meta http-equiv='refresh'content='0; url=cetak_jdl.php'>";
}else{
	$_SESSION["ses_nav_data"]=$_GET["hdvtjbvhfnyg"];
	if($_GET['uhbfdsgq']=="Tambah Subjek") {
		echo "<meta http-equiv='refresh'content='0; url=?page=".$_GET["uhbfdsgq"]."&hbvjklsbhsjsbhb=".$_SESSION["ses_nav_data"]."'>";
	}else{
		echo "<meta http-equiv='refresh'content='0; url=?page=".$_GET["uhbfdsgq"]."'>";
	}
}
?>