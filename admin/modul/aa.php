<?php
include 'koneksi.php';

function tes($query)
{
	$res=mysql_query($query);
	$res=mysql_fetch_array($res);
	return $res;
}

$dat=tes("SELECT * FROM bank");
foreach ($dat as $data) {
	echo "1<br>";
}
?>