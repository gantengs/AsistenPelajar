<?php
$server = "localhost"; // mengatur nama server
$user = "root"; // mengatur username (default: root)
$pass = ""; // mengatur password (default: "")
$db = "db_asisten_pelajar"; // mengatur nama database
// membuat $koneksi yang menghubungkan $server, $user, $pass
$koneksi = mysql_connect($server, $user, $pass);
if ($koneksi) { // jika $koneksi tak ada masalah maka...
// echo "Koneksi Berhasil";
} else {
echo "Koneksi Gagal";
}
mysql_select_db($db) // memilih database
or die ("Database Tidak Ada: ".mysql_error()); //jika database tak ada
?>