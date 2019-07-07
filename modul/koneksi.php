<?php
date_default_timezone_set('Asia/Jakarta');

$server = "localhost";
$username = "root";
$password = "12345678";
$database = "cdc-iti_terbaru";

// Koneksi dan memilih database di server
$con=mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
$enkripfile = "../js/dist/docs/file/";

?>