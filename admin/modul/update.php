<?php
session_start();
include 'koneksi.php';

switch ($_GET['mode']) {
	case 'update_user':
		update_user();
		break;
	case 'update_paket':
		update_paket();
		break;
	case 'update_konsul':
		update_konsul($_GET['id']);
		break;
	case 'update_lowongan':
		update_lowongan($_GET['id']);
		break;
	case 'update_job_sekeer':
		update_job_sekeer($_GET['id']);
		break;
	case 'update_pass':
		update_pass($_SESSION['id']);
		break;
	case 'update_event':
		update_event($_GET['id']);
		break;
	default:
	case 'update_banner':
		update_banner($_GET['id']);
		break;
	case 'update_harga':
		update_harga();
		break;

	default:
		
		break;
}

function update_pass($id){
	$pass_lama=md5($_POST['pass_lama']);
	$pass_baru=$_POST['pass_baru'];
	$pass_baru1=$_POST['pass_baru1'];

	if($pass_lama<>$_SESSION['password']){
		echo "<script>alert('Password lama anda salah!')</script>";
		echo "<script>document.location.href='../ganti_password.php'</script>";
	}elseif($pass_baru<>$pass_baru1){
		echo "<script>alert('Password baru anda tidak cocok dengan konfirmasi!')</script>";
		echo "<script>document.location.href='../ganti_password.php'</script>";
	}else{
		mysql_query("UPDATE user set password='".md5($pass_baru)."' where id_user='$id'");
		echo "<script>alert('Password baru anda sudah diperbarui!')</script>";
		echo "<script>document.location.href='logout.php'</script>";
	}
}

function update_event($id){
	$judul=$_POST['judul'];
	$isi=$_POST['isian'];
	$tanggal=$_POST['tanggal'];
	if($_FILES['gambar']['name']==null){
		$filename=$_POST['gambarold'];
	}else{
		$filename=$_FILES['gambar']['name'];
	}
	$sql=	"UPDATE event set 
			judul='$judul',
			isi='$isi',
			gambar='$filename',
			tanggal='$tanggal',
			id_user='$_SESSION[id]'
			WHERE id_event='$id'";
	// echo $sql;die();
	$res=mysql_query($sql);
	if($res){
	move_uploaded_file($_FILES['gambar']['tmp_name'],"../event/$filename");
	}
	echo "<script>document.location.href='../event.php?mode='</script>";
}

function update_banner($id){
	$judul=$_POST['judul'];
	$tanggal=$_POST['tanggal'];
	if($_FILES['gambar']['name']==null){
		$filename=$_POST['gambarold'];
	}else{
		$filename=$_FILES['gambar']['name'];
	}
	$sql=	"UPDATE banner set 
			judul='$judul',
			gambar='$filename',
			tanggal='$tanggal',
			id_user='$_SESSION[id]'
			WHERE id_banner='$id'";
	// echo $sql;die();
	$res=mysql_query($sql);
	if($res){
	move_uploaded_file($_FILES['gambar']['tmp_name'],"../banner/$filename");
	}
	echo "<script>document.location.href='../banner.php?mode='</script>";
}

function update_user(){
	$id=$_POST['id'];
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
	
	// $deskripsi=trim($_POST['deskripsi']);
	// echo $_POST['deskripsi'];
	if(isset($_POST['deskripsi'])){
		$desk=",deskripsi='$_POST[deskripsi]'";
	}else{
		$desk="";
	}

	if($_POST['jenis']!='Perusahaan'){
		$level_pendidikan=$_POST['level_pendidikan'];
		$pendidikan=$_POST['pendidikan'];
		$web="";
	}else{
		$level_pendidikan="";
		$pendidikan="";
		$web=$_POST['website'];

	}

	$filename=$_FILES['foto']['name'];
	if($filename==""){
		$gbr=$_GET['gbr'];
	}else{
		$gbr=$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'],"../user/".$filename);
	}
	if($_POST['password']<>""){
		$expass=",password='$password'";
	}else{
		$expass="";
	}

	$filename=$_FILES['foto']['name'];

		$sql="UPDATE user SET nama='$nama',nik='$id_pengenal',tempat_lahir='$tempat',tgl_lahir='$tanggal',alamat='$alamat',telepon='$telepon
		',email='$email',username='$username',password='$password',jenis='$jenis',foto='$gbr',level_pendidikan='$level_pendidikan',pendidikan='$pendidikan',website='$web' $expass $desk WHERE id_user='$id'";
		// echo $sql;die();
		mysql_query($sql);
		echo "<script>document.location.href='../user.php?mode=&jenis=$jenis'</script>";


}

function update_job_sekeer($id){
	$az=1;
	$id_user=$_POST['user'];
	$ceklist=$_POST['ceklist'];
	$cek=$_POST['cek'];
	mysql_query("UPDATE tbl_lamar set
			panggilan='0'
			where  id_lowongan='$id'");
	foreach ($ceklist as $a => $b) {
		$sql="UPDATE tbl_lamar set
			panggilan='$ceklist[$a]'
			where id_user='$id_user[$a]' AND id_lowongan='$id'";
	// echo $sql."</br>";
	$res=mysql_query($sql);
	}

	if($res){
			echo "<script>alert('Data List Diterima Diperbarui!')</script>";
		}else{
			echo "<script>alert('Data List Diterima Gagal Diperbarui!')</script>";
		}
		echo "<script>history.back(-1)</script>";


	// for($z=$cek;$a<=$z;$a++){
	// 	echo $cek;
	// }
}

function baliktgl($tgl){
	$tanggal=explode('-',$tgl);
	$tgl=$tanggal[2]."-".$tanggal[1]."-".$tanggal[0];
	return $tgl;
}

function update_lowongan($id){
	$judul=strtolower($_POST['judul']);
	$isi=$_POST['isi'];
	$gaji=$_POST['gaji1']."-".$_POST['gaji2'];
	$provinsi=strtolower($_POST['provinsi']);
	$jenis=$_POST['jenis'];
	$job_sekeer=$_POST['banyak'];
	date_default_timezone_set('Asia/Jakarta');
	$tanggal=date('d-M-Y');
	$jam=date('H:i:s');

	$sql="UPDATE lowongan set judul='$judul',isi='$isi',gaji='$gaji',provinsi='$provinsi',jenis='$jenis',job_sekeer='$job_sekeer',tanggal='$tanggal',jam='$jam' where id_lowongan='$id'";
	$res=mysql_query($sql);

	if($res){
			echo "<script>alert('Data Lowongan Diperbarui!')</script>";
		}else{
			echo "<script>alert('Data Lowongan Gagal Diperbarui!')</script>";
		}
		echo "<script>document.location.href='../lowongan.php?mode='</script>";


}

function update_konsul($id){
	$judul=$_POST['judul'];
	$keterangan=$_POST['keterangan'];
	$tanggal=baliktgl($_POST['tanggal']);
	$jam=$_POST['jam'];
	$ruangan=$_POST['ruangan'];
	$kapasitas=$_POST['kapasitas'];

		$query="UPDATE konsul set judul='$judul',keterangan='$keterangan',kapasitas='$kapasitas',tanggal='$tanggal',jam='$jam',ruangan='$ruangan' where id_konsul='$id'";
		// echo $query;die();
		$res=mysql_query($query);
		if($res){
			echo "<script>alert('Data Konsul Diperbarui!')</script>";
		}else{
			echo "<script>alert('Data Konsul Gagal Diperbarui!')</script>";
		}
		echo "<script>document.location.href='../konseling.php'</script>";
}

function update_paket(){
	if($_GET['paket']==1){
		$nilai=10;
	}elseif($_GET['paket']==2){
		$nilai=50;
	}
	$id=$_GET['id'];
	$sql="UPDATE user SET  kapasitas=kapasitas+$nilai where id_user='$id'";
	// echo $sql;
	// die();
	mysql_query($sql);
	echo "<script>document.location.href='../user.php?mode=&jenis=Perusahaan'</script>";

}

function update_harga(){
	$harga=str_replace(",","",$_POST['harga']);
	// $id=$_GET['id'];
	$sql="UPDATE harga SET  harga='$harga' where type='".$_GET['type']."' AND jenis='".$_GET['jenis']."'";
	// echo $sql;
	// die();
	mysql_query($sql);
	echo "<script>document.location.href='../posting.php?mode='</script>";

}


?>