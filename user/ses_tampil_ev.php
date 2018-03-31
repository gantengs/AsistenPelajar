<?php
if(isset($_GET['jnfjencekn'])) {
	switch ($_GET['jnfjencekn']){
		case 'wdbwjbhdw':
		$_SESSION["ses_ex"]="Belum Selesai";
		break;

		case 'axbjhcnjenjcn':
		$_SESSION["ses_ex"]="Sudah Selesai";
		break;

		case 'sjdncjndcnjcdsw':
		$_SESSION["ses_ex"]="Semua";
		break;
		
		default :
		
		break;
	}
	
}else { 
		
}

if(isset($_GET['ytdtdtjjnbjhfrtr65tftydrdygdsdsfyvtvy'])) {
	$_SESSION["ses_ctk_ev"]=$_SESSION["ses_ex"];
	echo "<meta http-equiv='refresh'content='0; url=cetak_ev.php'>";
}else{
	$_SESSION["ses_tampil_ev"]=$_SESSION["ses_ex"];
	echo "<meta http-equiv='refresh'content='0; url=?page=Pencarian'>";
}
?>