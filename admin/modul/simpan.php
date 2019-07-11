<?php
die();
		session_start();
		// include '../modul/prosesLogin.php';
		include 'koneksi.php';
		// session_start();

		$mode=$_GET['mode'];
		switch($mode){
			case 'simpan_user';
			simpan_user();
			break;
			case 'simpan_lowongan';
			simpan_lowongan();
			break;
			case 'simpan_slide';
			simpan_slide();
			break;
			case 'simpan_event';
			simpan_event();
			break;
			case 'cart';
			cart($_GET['id']);
			break;
			case 'checkout';
			checkout();
			break;
			case 'simpan_pesan';
			simpan_pesan();
			break;
			case 'simpan_gambar';
			simpan_gambar();
			break;
			case 'upload_resi';
			upload_resi($_GET['id']);
			break;
			case 'simpan_psn';
			simpan_psn();
			break;
			case 'simpan_konsul';
			simpan_konsul();
			break;
			case 'simpan_kuesioner';
			simpan_kuesioner();
			break;
			case 'simpan_banner';
			simpan_banner();
			break;
		}
		

function simpan_lowongan(){

	$judul=strtolower($_POST['judul']);
	$isi=$_POST['isi'];
	$gaji=$_POST['gaji1']."-".$_POST['gaji2'];
	$provinsi=strtolower($_POST['provinsi']);
	$jenis=$_POST['jenis'];
	$job_sekeer=$_POST['banyak'];
	date_default_timezone_set('Asia/Jakarta');
	$tanggal=date('d-M-Y');
	$jam=date('H:i:s');

	$sql1="SELECT count(*) as kapasitas FROM lowongan where id_comp='$_SESSION[id]'";
	$res1=mysql_query($sql1);
	$arr1=mysql_fetch_array($res1);

	$sql2="SELECT * FROM user where id_user='$_SESSION[id]'";
	$res2=mysql_query($sql2);
	$arr2=mysql_fetch_array($res2);
	// echo $arr1['kapasitas']."<=".$arr2['kapasitas'];
	// die();
	if($arr1['kapasitas']<$arr2['kapasitas'] && $arr2['kapasitas']<>0){	
	$sql="INSERT into lowongan (judul,isi,gaji,provinsi,jenis,job_sekeer,id_comp,tanggal,jam) values ('$judul','$isi','$gaji','$provinsi','$jenis','$job_sekeer','$_SESSION[id]','$tanggal','$jam')";
	$res=mysql_query($sql);
	$updatesql="UPDATE user set kapasitas=kapasitas-1 where id_user='$_SESSION[id]'";
	mysql_query($updatesql);
	if($res){
		echo "<script>alert('Berhasil Memposting Lowongan')</script>";
		echo "<script>document.location.href='../lowongan.php?mode='</script>";
	}else{
		echo "<script>alert('Gagal Memposting Lowongan')</script>";
		echo "<script>document.location.href='../lowongan.php?mode='</script>";
	}
	}else{
			echo "<script>alert('Maaf Quota Posting Anda Telah Habis,Mohon Untuk Menambah Kapasitas Posting Anda')</script>";
			echo "<script>document.location.href='../lowongan.php?mode='</script>";
	}
}


function simpan_psn(){
	if(isset($_SESSION['id'])){
	$idUser = $_SESSION['id'];
	$tanggal = date("Y-m-d g:i:s");
	$sql = mysql_query("SELECT * from user where user_id='$idUser'");
	if($rs = mysql_fetch_array($sql)){
$username = $rs['username']; 
$jabatan = $rs['pengguna']; 
$password = $rs['password']; 
$nama =  $rs['nama']; 			  
$foto =  $rs['foto']; 			  
$alamat =  $rs['alamat']; 			  			  
$phone=  $rs['telepon']; 			  
$email=  $rs['email']; 			  

}
}else{
	 ob_start();  
 //mendapatkan detail ipconfing menggunakan CMD  
 system('ipconfig /all');  
 // mendapatkan output kedalam variable  
   $mycom=ob_get_contents();  
 // membersihkan output buffer  
   ob_clean();  
 $findme = "Physical";  
 // mencari perangkat fisik | menemukan posisi text perangkat fisik  
 //Search the "Physical" | Find the position of Physical text  
 $pmac = strpos($mycom, $findme);  
 // mendapatkan alamat peragkat fisik  
 $mac=substr($mycom,($pmac+36),17);  
 //menampilkan Mac Address  
	$idUser=$mac;
	$username =""; 
	$jabatan =""; 
	$password =""; 
	$nama =""; 			  
	$foto =""; 			  
	$alamat =""; 			  			  
	$phone=""; 			  
	$email=""; 	
}
	$pesan=$_POST['pesan'];
	$id_kurir=$_POST['id_kurir'];
	$id_transaksi=$_POST['id_transaksi'];
	date_default_timezone_set('Asia/Jakarta');
	$tanggal=date('d-M-Y');
	$jam=date('H:i:s');

	$sql="Select * from psn where id_transaksi='$id_transaksi'";
	// echo $sql;die();
	$res=mysql_query($sql);
	$arr=mysql_fetch_array($res);
	if(mysql_num_rows($res)>0){
	$sql1="INSERT into dtl_psn (id_psn,user_id,pesan,tanggal,jam) values ('$arr[id_psn]','$idUser','$pesan','$tanggal','$jam')";
	$res1=mysql_query($sql1);
	}else{
	$sql2="INSERT into psn (user1,user2,id_transaksi) values ('$idUser','$id_kurir','$id_transaksi')";
	$res2=mysql_query($sql2);

	$sql4="Select * from psn where id_transaksi='$id_transaksi'";
	// echo $sql;die();
	$res4=mysql_query($sql4);
	$arr4=mysql_fetch_array($res4);
	$sql3="INSERT into dtl_psn (id_psn,user_id,pesan,tanggal,jam) values ('$arr4[id_psn]','$idUser','$pesan','$tanggal','$jam')";
	$res3=mysql_query($sql3);
	// echo $sql2."<br>";echo $sql3;die();
	}
		echo "<script>document.location.href='../pesan-cus.php?id_t=$id_transaksi'</script>";
	// if($res){
	// 	echo "<script>alert('Berhasil Mengirim Pesan')</script>";
	// }else{
	// 	echo "<script>alert('Gagal Mengirim Pesan')</script>";
	// 	echo "<script>document.location.href='../index.php'</script>";
	// }
}

function simpan_gambar(){
	$perusahaan=$_POST['perusahaan'];
	$gambar=$_POST['gambar'];

	foreach ($gambar as $a => $b) {
		echo $gambar[$b];
	}
}

function simpan_kuesioner(){
	$sql="insert into tbl_kuesioner values ('','".$_SESSION[id]."','$_POST[no_1]','$_POST[no_2]','$_POST[no_3]','$_POST[no_4]','$_POST[no_5]','$_POST[no_6]','$_POST[no_7]','$_POST[no_8]','$_POST[no_9]','$_POST[no_10]','$_POST[no_11]','1$_POST[no_12]','$_POST[no_13]','$_POST[no_14]','$_POST[no_15]')";
	// mysqli_query($sql) or mysql_errno();
	// echo $sql;
	// die();
	echo "<script>history.back(-1)</script>";
}
	// echo "111";

function baliktgl($tgl){
	$tanggal=explode('-',$tgl);
	$tgl=$tanggal[2]."-".$tanggal[1]."-".$tanggal[0];
	return $tgl;
}

function simpan_konsul(){
	$judul=$_POST['judul'];
	$keterangan=$_POST['keterangan'];
	$tanggal=baliktgl($_POST['tanggal']);
	$jam=$_POST['jam'];
	$ruangan=$_POST['ruangan'];

		$query="INSERT INTO konsul (judul,keterangan,tanggal,jam,ruangan) values ('$judul','$keterangan','$tanggal','$jam','$ruangan')";
		// echo $query;die();
		$res=mysql_query($query);
		if($res){
			echo "<script>alert('Data Konsul Disimpan!')</script>";
		}else{
			echo "<script>alert('Data Konsul Gagal Disimpan!')</script>";
		}
		echo "<script>document.location.href='../konseling.php'</script>";
}

function simpan_user(){

	$nama=$_POST['nama'];
	$jenis=$_POST['jenis'];
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$id_pengenal=$_POST['id'];
	$email=$_POST['email'];
	$telepon=$_POST['tlp'];
	$alamat=$_POST['alamat'];
	$tempat=$_POST['tempat'];
	$tanggal=$_POST['tanggal'];
	if($_POST['jenis']!='Perusahaan'){
		$level_pendidikan=",'$_POST[level_pendidikan]'";
		$pendidikan=",'$_POST[pendidikan]'";
	}else{
		$level_pend="";
		$pendidikan="";

	}
	if(isset($_POST['deskripsi'])){
		$desk=$_POST['deskripsi'];
		$desc=",deskripsi";
		$deskripsi=",'$desk'";
	}else{
		$deskripsi="";
		$desk="";
		$desc="";
	}
	if(isset($_POST['website'])){
		$link=$_POST['website'];
		$website=",website";
		$url=",'$link'";
	}else{
		$link="";
		$website="";
		$url="";
	}

	if(isset($_POST['kapasitas'])){
		$kapasitas=$_POST['kapasitas'];
		$ext1=",'$kapasitas'";
		$ext=",kapasitas";
	}else{
		$kapasitas="";
		$ext="";
		$ext1="";
		// $deskripsi="";
	}
	$filename=$_FILES['foto']['name'];


	$sql="Insert into user (nama,nik,tempat_lahir,tgl_lahir,alamat,telepon,email,username,password,foto,jenis,status,pendidikan,level_pendidikan $desc $ext $website) values ('$nama','$id_pengenal','$tempat','$tanggal','$alamat','$telepon','$email','$username','$password','$filename','$jenis','0' $pendidikan $level_pendidikan $deskripsi $ext1 $url  )";
	// echo $password;
	// echo $sql;
	// die();
	$res=mysql_query($sql);
	move_uploaded_file($_FILES['foto']['tmp_name'],"../user/".$filename);
	if($res){
		echo "<script>alert('Data Berhasil Disimpan')</script>";
	}else{
		echo "<script>alert('Data Gagal Disimpan')</script>";
	}
	// echo $sql;
	// die();

	
	echo "<script>document.location.href='../user.php?mode=&jenis=$_POST[jenis]'</script>";

}

// function upload_resi($id){
// 	$filename=$_FILES['resi']['name'];
// 	// echo $filename;
// 	// die();
	
// 	$sql="UPDATE transaksi set bukti_foto='$filename',status='Menunggu Resi Dikonfirmasi' where id_transaksi='$id'";
// 	move_uploaded_file($_FILES['resi']['tmp_name'],"../admin/resi/$filename");
	
// 	mysql_query($sql);
// 	echo "<script>document.location.href='../menu-transaksi.php?mode='</script>";
// }


function simpan_event(){
	$judul=$_POST['judul'];
	$isi=$_POST['isian'];
	$tanggal=$_POST['tanggal'];
	$filename=$_FILES['gambar']['name'];
	// echo $filename;
	// die();
	
	$sql="INSERT INTO event (judul,isi,gambar,tanggal,id_user) values ('$judul','$isi','$filename','$tanggal','$_SESSION[id]')";
	// echo $sql;die();
	$res=mysql_query($sql);
	if($res){
	move_uploaded_file($_FILES['gambar']['tmp_name'],"../event/$filename");
	}
	echo "<script>document.location.href='../event.php?mode='</script>";
}

function simpan_banner(){
	$judul=$_POST['judul'];
	$tanggal=$_POST['tanggal'];
	$filename=$_FILES['gambar']['name'];
	// echo $filename;
	// die();
	
	$sql="INSERT INTO banner (judul,gambar,tanggal,id_user) values ('$judul','$filename','$tanggal','$_SESSION[id]')";
	// echo $sql;die();
	$res=mysql_query($sql);
	if($res){
	move_uploaded_file($_FILES['gambar']['tmp_name'],"../banner/$filename");
	}
	echo "<script>document.location.href='../banner.php?mode='</script>";
}

function cart($id){
	if(isset($_SESSION['id'])){
	$idUser = $_SESSION['id'];
	$tanggal = date("Y-m-d g:i:s");

}else{
	 ob_start();  
 //mendapatkan detail ipconfing menggunakan CMD  
 system('ipconfig /all');  
 // mendapatkan output kedalam variable  
   $mycom=ob_get_contents();  
 // membersihkan output buffer  
   ob_clean();  
 $findme = "Physical";  
 // mencari perangkat fisik | menemukan posisi text perangkat fisik  
 //Search the "Physical" | Find the position of Physical text  
 $pmac = strpos($mycom, $findme);  
 // mendapatkan alamat peragkat fisik  
 $mac=substr($mycom,($pmac+36),17);  
 //menampilkan Mac Address  
	$idUser=$mac;
}

	if(isset($_POST['panjang'])){
	$panjang=$_POST['panjang'];
	$lebar=$_POST['lebar'];
	}elseif(isset($_POST['qty'])){
		$panjang='';
		$lebar='';
		$qty=$_POST['qty'];
	}
	$sql="Select * from cart where id_tanaman='$id' And id_user='$idUser'";
	// echo $sql;
	$res=mysql_query($sql);
	$arr=mysql_fetch_array($res);
	if(mysql_num_rows($res)>0){
			$tambah=$arr['jumlah']+$qty;
			$query="Update cart set jumlah='$tambah' where id_tanaman='$id' And id_user='$idUser'";
			$sql1=mysql_query($query);
	}else{
	$sql_1="select * from nama_tanaman where id='$id'";
	$tembelek=mysql_query($sql_1);
	$arrtem=mysql_fetch_array($tembelek);
	// echo $sql_1;
	$query="Insert into cart (id_tanaman,jumlah,harga,id_user,panjang,lebar) values ('$id','$qty','$arrtem[harga_tanaman]','$idUser','$panjang','$lebar')";
	mysql_query($query);
	}
	// echo $sql1;
	// die();
	echo "<script>document.location.href='../cart.php'</script>";

}

function checkout(){
	$bayar=$_POST['bayar'];
	$nama=$_POST['nama'];
	$tlp=$_POST['telepon'];
	$email=$_POST['email'];
	$alamat=$_POST['alamat'];
	$provinsi=$_POST['provinsi'];
	$idUser=$_GET['id'];
	date_default_timezone_set('Asia/Jakarta');
	$tanggal=date('d-M-Y');
	$jam=date('H:i:s');
	if($_POST['bayar']=='tf'){
	$status="Menunggu Transfer";
		}else{
	$status="Barang Dikirim";
		}

	$query="Insert into transaksi (id_user,nama_pembeli,telepon,email,alamat,provinsi,tanggal,jam,status,bukti_foto,metod) values ('$idUser','$nama','$tlp','$email','$alamat','$provinsi','$tanggal','$jam','$status','','$bayar')";
		// echo $query."<br>";
	$res=mysql_query($query);

	$querysel="Select * from transaksi where id_user='$idUser' order by id_transaksi DESC";
	// echo $querysel;
	$sel1=mysql_query($querysel);
	$arr1=mysql_fetch_array($sel1);
	
	if($bayar=='cod'){
	$selkur=mysql_query("SELECT * from user where pengguna='kurir' order by rand()");
	$arrsel=mysql_fetch_array($selkur);
	
	

	$inkur="INSERT into pengiriman (id_transaksi,id_kurir,status,tanggal,jam) values ('$arr1[id_transaksi]','$arrsel[user_id]','Barang Dikirim','$tanggal','$jam')";
	// echo $inkur."<br>";
	// die();	
	mysql_query($inkur);
	
	}	
	$querysel="Select * from cart where id_user='$idUser'";
	// echo $querysel;
	$select2=mysql_query($querysel);

	while($arr2=mysql_fetch_array($select2)){
		$lala="insert into beli (id_transaksi,id_tanaman,qty,harga,id_user,panjang,lebar) values ('$arr1[id_transaksi]','$arr2[id_tanaman]','$arr2[jumlah]','$arr2[harga]','$idUser','$arr2[panjang]','$arr2[lebar]')";
		// echo $lala;
		$resin1=mysql_query($lala);
	}
	
		$sqldelete="Delete from cart where id_user='$idUser'";
		// echo $sqldelete;
		mysql_query($sqldelete);
	// die();
		echo "<script>document.location.href='../menu-transaksi.php?mode='</script>";
	}	

?>