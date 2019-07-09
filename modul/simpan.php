<?php
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
			case 'simpan_cv';
			simpan_cv();
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
			case 'upload_resi';
			upload_resi();
			break;
			case 'simpan_psn';
			simpan_psn();
			break;
			case 'simpan_alumni';
			simpan_alumni();
			break;
			case 'booking_konsul':
				booking_konsul();
			break;
			case 'simpan_kuesioner':
				simpan_kuesioner();
			break;
		}
		

function simpan_alumni(){
$nama=$_POST['nama'];
$id_pengenal=$_POST['nrp'];
$angkatan=$_POST['dari']."-".$_POST['sampai'];
$alamat=$_POST['alamat'].", ".$_POST['kota'];
$tlp=$_POST['tlp'];
$email=$_POST['email'];
$pendidikan=$_POST['pendidikan'];
$username=$_POST['username'];
$password=md5($_POST['password']);
$sql123="SELECT * from user where nik='$id_pengenal'";
$res123=mysql_query($sql123);
if(mysql_num_rows($res123)>0){
echo "<script>alert('Data Gagal Disimpan, Anda sudah pernah mendaftar.Mohon hubungi admin CDC untuk Informasi lebih lanjut')</script>";
echo "<script>document.location.href='../login.php?mode=cari_alumni'</script>";
}else{

$sql="Insert into user (nama,nik,alamat,telepon,email,username,password,jenis,status,level_pendidikan,pendidikan) values ('$nama','$id_pengenal','$alamat','$tlp','$email','$username','$password','pelamar','0','$pendidikan','Institut Teknologi Indonesia')";
	$res=mysql_query($sql);
	if($res){
	$sql1="SELECT * from user order by id_user DESC";
	$res1=mysql_query($sql1);
	$arr1=mysql_fetch_array($res1);
	mysql_query("Insert into pembayaran (id_user) values('$arr1[id_user]')");
	echo "<script>alert('Data Berhasil Disimpan, Silahkan pilih tombol login.')</script>";
	echo "<script>document.location.href='../login.php'</script>";
	}else{
	echo "<script>alert('Data Gagal Disimpan')</script>";
	echo "<script>document.location.href='../login.php?mode=cari_alumni'</script>";
	}
	}
}

function simpan_kuesioner(){
	$sql="insert into tbl_kuesioner values ('','".$_SESSION['id']."','$_POST[no_1]','$_POST[no_2]','$_POST[no_3]','$_POST[no_4]','$_POST[no_5]','$_POST[no_6]','$_POST[no_7]','$_POST[no_8]','$_POST[no_9]','$_POST[no_10]','$_POST[no_11]','1$_POST[no_12]','$_POST[no_13]','$_POST[no_14]','$_POST[no_15]')";
	mysql_query($sql) or mysql_errno();
	echo "<script>history.back(-1)</script>";
}
	// echo "111";

function booking_konsul(){
date_default_timezone_set('Asia/Jakarta');
	$tanggal=date('Y-m-d');
	$jam=date('H:i:s');
	$sql_hit="Select * from konsul a where a.id_konsul='".$_POST['id']."' ";
	$res_hit=mysql_query($sql_hit);
	$r_hit=mysql_fetch_array($res_hit);
	if(mysql_num_rows($res_hit) < $r_hit['kapasitas']){
	$sql_cek="select * from detail_konsul where id_konsul='".$_POST['id']."' and id_user='".$_SESSION['id']."'";
	$res_cek=mysql_query($sql_cek);
	if(mysql_num_rows($res_cek) > 0){
		echo "Anda Sudah pernah mendaftar";
		exit();
	}else{
	$sql="INSERT into detail_konsul (id_konsul,id_user,tanggal) values ('".$_POST['id']."','".$_SESSION['id']."','$tanggal')";
	$res=mysql_query($sql);
	if($res){
		echo "Sukses booking";
	}	
	}
	}else{
		echo "Kelas Penuh!";	
	}
}


function simpan_lowongan(){
	date_default_timezone_set('Asia/Jakarta');
	$tanggal=date('d-M-Y');
	$jam=date('H:i:s');

	$id_lowongan=$_POST['id_lowongan'];
	$sql="INSERT into tbl_lamar (id_lowongan,id_user,tanggal,jam) values ('$id_lowongan','$_SESSION[id]','$tanggal','$jam')";
	// echo $sql;die();
			mysql_query($sql);
		echo "<script>document.location.href='../lowongan.php'</script>";
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
	if(isset($_POST['kapasitas'])){
		$kapasitas=$_POST['kapasitas'];
		$ext1=",'$kapasitas'";
		$ext=",kapasitas";
		$deskripsi=$_POST['deskripsi'];
	}else{
		$kapasitas="";
		$ext="";
		$ext1="";
		$deskripsi="";
	}

	$filename=$_FILES['foto']['name'];


	$sql="Insert into user (nama,nik,tempat_lahir,tgl_lahir,alamat,telepon,email,username,password,foto,jenis,status,deskripsi $ext) values ('$nama','$id_pengenal','$tempat','$tanggal','$alamat','$telepon','$email','$username','$password','$filename','$jenis','0','$deskripsi' $ext1)";
	// echo $password;
	// echo $sql;
	// die();
	$res=mysql_query($sql);
	if($res){
		move_uploaded_file($_FILES['foto']['tmp_name'],"../admin/user/".$filename);
		$sql1="SELECT * from user order by id_user DESC";
		$res1=mysql_query($sql1);
		$arr1=mysql_fetch_array($res1);
		mysql_query("Insert into pembayaran (id_user) values('$arr1[id_user]')");
		echo "<script>alert('Data Berhasil Disimpan')</script>";
		echo "<script>document.location.href='../index.php'</script>";
	}else{
		echo "<script>alert('Data Gagal Disimpan')</script>";
		echo "<script>document.location.href='login.php?mode=regist'</script>";
	}
	// echo $sql;
	// die();

}

function upload_resi(){
	date_default_timezone_set('Asia/Jakarta');
	$tanggal=date('d-M-Y');
	$jam=date('H:i:s');

	$id_bank=$_POST['id_bank'];

		// echo $id_bank;
	$filename=$_FILES['resi']['name'];
	// echo $filename;
	// die();
	$cari="SELECT * FROM pembayaran where id_user='$_SESSION[id]'";
	$res=mysql_query($cari);
	if(mysql_num_rows($res)==0){
	$sql="INSERT into pembayaran (id_bank,id_user,waktu,foto) values ('$id_bank','$_SESSION[id]','$tanggal&nbsp;$jam','$filename')";
	// echo $sql;die();
	}else{
	$sql="UPDATE pembayaran set id_bank='$id_bank',waktu='$tanggal &nbsp; $jam',foto='$filename' where id_user='$_SESSION[id]'";
	}
	$res=mysql_query($sql);

	if($res){
	move_uploaded_file($_FILES['resi']['tmp_name'],"../admin/resi/$filename");
	$sql1="UPDATE user set status='1' where id_user='$_SESSION[id]'";
	mysql_query($sql1);
		echo "<script>alert('Resi Berhasil Diupload')</script>";
	}else{
		echo "<script>alert('Resi Gagal Diupload')</script>";
	}
	echo "<script>document.location.href='../index.php'</script>";
}

function simpan_cv(){
	if(isset($_SESSION['id'])){
	$idUser = $_SESSION['id'];
	$tanggal = date("Y-m-d g:i:s");

	$allowedExts = array("pdf", "doc", "docx");
    $extension = end(explode(".", $_FILES["file"]["name"]));
    if (($_FILES["file"]["type"] == "application/pdf") || ($_FILES["file"]["type"] == "application/msword") || ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") && ($_FILES["file"]["size"] < 2000000) && in_array($extension, $allowedExts))
    {
    	$filename=$_FILES["file"]["name"];
    	$cari="SELECT * from tbl_cv where id_user='$_SESSION[id]'";
    	$rescari=mysql_query($cari);
    	if(mysql_num_rows($rescari)>0){
    	$sql="UPDATE tbl_cv set file='$filename' where id_user='$_SESSION[id]'";
    	$res=mysql_query($sql);
    	if($res){
    		move_uploaded_file($_FILES["file"]["tmp_name"],"../data/".$filename);
    		}
    	}else{
    	$sql="INSERT into tbl_cv (id_user,file) values ('$_SESSION[id]','$filename')";
    	$res=mysql_query($sql);
    	if($res){
    		move_uploaded_file($_FILES["file"]["tmp_name"],"../data/".$filename);
    		}
    	}
    	// echo $sql;die();
  }else{

  	echo "<script>alert('Maaf type file harus doc,docx,atau pdf dan ukuran max 20MB')</script>";
  }
	// echo $_FILES["file"]["error"];
	// echo $_FILES["file"]["size"];
	// die();
	echo "<script>document.location.href='../profilku.php'</script>";

}
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