<?php 
session_start(); 
	include "koneksi.php";
 
	$username = $_POST['username']; 
	$password = md5($_POST['password']); 
	 
	
	    	$cek1 = mysql_query("select * from user where username='$username' and password='$password'"); 
			if($cek1=mysql_fetch_array($cek1)){
			$_SESSION['jenis'] = strtolower($cek1['jenis']);
			$_SESSION['username'] = $cek1['username']; 
			  $_SESSION['password'] = $cek1['password']; 
			  $_SESSION['nama'] = $cek1['nama']; 
			  $_SESSION['id'] = $cek1['id_user']; 
			  
			  echo "<script>document.location.href='../index.php';</script>";
			}else{
			
	    	echo "<script>alert('Maaf, Username atau Password anda Salah');</script>";
	echo "<script>document.location.href='../login.php';</script>";
	    	}
	    	

	
	
	?> 