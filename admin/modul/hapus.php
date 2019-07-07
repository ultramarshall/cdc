<?php
		session_start();
		// include '../modul/prosesLogin.php';
		include 'koneksi.php';

		$mode=$_GET['mode'];
		$id=$_GET['id'];
		
		switch($mode){
			case 'hapus_user';
				hapus_user($id);
			break;
			case 'hapus_lowongan';
				hapus_psn();
			break;
			case 'hapus_konsul':
				hapus_konsul($id);
			break;
			case 'hapus_event':
				hapus_event($id);
			break;
		}
		


function hapus_user($id){

	$sql_1="Delete from user where id_user='$id'";
	// echo $sql_1;die();
	$tembelek=mysql_query($sql_1);
	echo "<script>document.location.href='../user.php?mode=&jenis=$_GET[jenis]'</script>";
}

function hapus_event($id){

	$sql_1="Delete from event where id_event='$id'";
	// echo $sql_1;die();
	$tembelek=mysql_query($sql_1);
	echo "<script>document.location.href='../event.php?mode='</script>";
}

function hapus_konsul($id){

	$sql_1="Delete from konsul where id_konsul='$id'";
	// echo $sql_1;die();
	$tembelek=mysql_query($sql_1);
	echo "<script>document.location.href='../konseling.php'</script>";
}

function hapus_psn(){
	$kd=$_GET['id'];
	$sql="delete from lowongan where id_lowongan='$kd'";
	mysql_query($sql);
	echo "<script>document.location.href='../lowongan.php?mode='</script>";
}

?>