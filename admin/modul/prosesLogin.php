<?php 
session_start(); 
	include "koneksi.php";
 
	$username = $_POST['username']; 
	$password = md5($_POST['password']); 
	 
			// echo "select * from pelamar where username='$username' and password='$password'";
			// die();
	    	$cek1 = mysql_query("select * from user where username='$username' and password='$password' AND jenis in ('Admin','Super_Admin','Perusahaan') ");

			if($cek1=mysql_fetch_array($cek1)){
			$_SESSION['username'] = $cek1['username']; 
			  $_SESSION['password'] = $cek1['password']; 
			  $_SESSION['nama'] = $cek1['nama']; 
			  $_SESSION['id'] = $cek1['id_user'];
			  $_SESSION['jenis'] = $cek1['jenis']; 
			  // echo $_SESSION['nama'];die();
			  echo "<script>document.location.href='../dashboard.php';</script>";
			}else{
			
	    	echo "<script>alert('Maaf, Username atau Password anda Salah');</script>";
	echo "<script>document.location.href='../index.php';</script>";
	    	}
	    	

	
	
	?> 