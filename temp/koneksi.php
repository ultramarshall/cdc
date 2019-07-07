<?php
$server = "mysql.hostinger.com";
$username = "u749155674_cdc";
$password = "sullistyana2";
$database = "u749155674_cdc";

// Koneksi dan memilih database di server
$con=mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
$enkripfile = "../js/dist/docs/file/";

?>