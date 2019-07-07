<?php
include 'koneksi.php';



function balik_tgl($tgl){
	$tanggal=explode('-',$tgl);
	$tgl=$tanggal[2]."-".$tanggal[1]."-".$tanggal[0];
	return $tgl;
}

// $res=intipah("Select * from konsul");
// 	foreach ($res as $data) {
// 		echo "1";
// 	}
?>