<?php
	include 'header.php';
	
	if(!isset($_GET['mode'])){
?>
<div class="container" style="width: 90%">
<center><h2><b>LOGIN</b></h2></center>
<div align ="center">
<table  class="table table-resposive" style="width:100%">
	<form method="POST" action="modul/prosesLogin.php">
	<tr>
		<td align="center">Username</td>
		<td width="2%">:</td>
		<td><input type="text" style="background-color: #fbb045" name="username" class="form-control" width="100%" required></td>
	</tr>
	<tr>
		<td align="center">Password</td>
		<td width="2%">:</td>
		<td><input type="Password" style="background-color: #fbb045" name="password" class="form-control" width="100%" required></td>
	</tr>
	<tr>
		<td align="center"><button style="background-color: #ff8400"  class="btn btn-md btn-sm btn-primary" name="submit" type="submit">Login</button></td>
		<td></td>
		<td style="text-align:right;margin-bottom: 100%"><font style="color: #fbb045"><a href="?mode=regist">Belum Punya Akun?</a></font></td>
	</tr>

	</form>
</table>
</div>
</div>
<?php
	}elseif($_GET['mode']=='regist'){
?>

<div class="container">
	<br>
	<div class="col col-md-12" style="color: white;" align="left">
		<a href="?mode=cari_alumni">
			<input type="button" value="Dafar Sebagai Alumni"  class="btn btn-success btn-md" name="cek" id="cek">
		</a>
		<!-- Anda Alumni ITI ? Daftar Sebagai Alumni. -->
	</div>
<center><h2><b>DAFTAR</b></h2></center>
<div align ="center">
<table  class="table table-resposive" style="width:1000px">
<form action="modul/simpan.php?mode=simpan_user" enctype="multipart/form-data" method="post">
	<tr>
		<td align="center">Nama Lengkap</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="text" style="background-color: #fbb045" name="nama" class="form-control" width="100%"></td>
	</tr>
	<tr>
		<td align="center">NIK</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="text" style="background-color: #fbb045" name="id" class="form-control" width="100%"></td>
	</tr>
	<tr>
		<td align="center">Tempat Lahir</td>
		<td width="2%">:</td>
		<td width="55%"><input type="text" style="background-color: #fbb045;" name="tempat" class="form-control" ></td>
		<td width="45%">
		<input type="text" style="background-color: #fbb045" id="datetimepicker1" name="tanggal" class="form-control" width="100%" readonly>
		</td>
	</tr>
	<tr>
		<td align="center">Alamat</td>
		<td width="2%">:</td>
		<td colspan="2"><textarea style="background-color: #fbb045" name="alamat" class="form-control" width="100%"></textarea></td>
	</tr>
	<tr>
		<td align="center">Email</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="email" style="background-color: #fbb045" name="email" class="form-control" width="100%"></td>
	</tr>
	<tr>
		<td align="center">telp</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="text" style="background-color: #fbb045" name="tlp" class="form-control" width="100%"><input type="hidden" style="background-color: #fbb045" name="jenis" value="Pelamar" class="form-control" width="100%"></td>
	</tr>
	<tr>
		<td align="center">Pas Foto</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="file" style="background-color: #fbb045" name="foto"  width="100%"></td>
	</tr>
	<tr>
		<td align="center">Username</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="text" style="background-color: #fbb045" name="username" class="form-control" width="100%"></td>
	</tr>
	<tr>
		<td align="center">Password</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="Password" style="background-color: #fbb045" name="password" class="form-control" width="100%"></td>
	</tr>
	<tr>
		<td align="center"><button style="background-color: #ff8400"  class="btn btn-md btn-sm btn-primary" name="submit" type="submit">Daftar</button></td>
		<td></td>
	</tr>
	</form>
</table>
</div>
</div>
<?php
	}elseif($_GET['mode']=='cari_alumni'){
?>
<br>
<div class="container">
	<div class="row">
		<div class="col col-md col-3">
			<label>Masukan NRP Anda :</label>
		</div>
		<form method="POST" action="?mode=cari">
		<div class="col col-md col-6">
			<input type="number" name="cari" style="width: 50%;background-color:#fbb045 " class="form-control">
		</div>
		<div class="col col-md col-3">
			<button class="btn btn-md btn-primary" style="background-color: #ff8400">Cari Data Saya</button>
		</div>
	</div>
	</form>
</div>
<br>	

<?php
}elseif ($_GET['mode']=='cari') {
$nim=$_POST['cari'];
$sql="Select * from alumni where nim='$nim'";
$res=mysql_query($sql);
$row=mysql_fetch_array($res);
if(mysql_num_rows($res)>0){
$email=str_replace('?','',$row['email']);
?>
<div class="container">
<br>
	
<center><h2><b>Data Alumni</b></h2></center>
<div align ="center">
<table  class="table table-resposive" style="width:1000px">
<form action="modul/simpan.php?mode=simpan_alumni" enctype="multipart/form-data" method="post">
	<tr>
		<td align="center">Nama Lengkap</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="text" style="background-color: #fbb045" name="nama" value="<?=$row['nama']?>" class="form-control" width="100%"></td>
	</tr>
	<tr>
		<td align="center">NRP</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="number" style="background-color: #fbb045" name="nrp" value="<?=$row['nim']?>" class="form-control" width="100%" readonly></td>
	</tr>
	<tr>
		<td align="center">Tahun Angkatan</td>
		<td width="2%">:</td>
		<td >
		<input type="text" style="background-color: #fbb045" name="dari" value="<?=$row['angkatan']?>" class="form-control"  placeholder="Dari" readonly>
		</td>
		<td>
		<input type="text" style="background-color: #fbb045" name="sampai" class="form-control bulantahun" placeholder="Sampai" readonly required>
		</td>
		</div>
		</td>
	</tr>
	<tr>
		<td align="center">Program Studi</td>
		<td width="2%">:</td>
		<td width="55%"><input type="text" style="background-color: #fbb045;" name="prodi" value="<?=$row['prodi']?>" class="form-control" readonly></td>
		<td width="45%">
		</td>
	</tr>
	<tr>
		<td align="center">Alamat</td>
		<td width="2%">:</td>
		<td colspan="2"><textarea style="background-color: #fbb045" name="alamat" class="form-control" width="100%"></textarea></td>
	</tr>
	<tr>
		<td align="center">Email</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="email" style="background-color: #fbb045" name="email" class="form-control" value="<?=$email?>" width="100%"></td>
	</tr>
	<tr>
		<td align="center">Telpon</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="text" style="background-color: #fbb045" value="<?=$row['telepon']?>" name="tlp" class="form-control" width="100%"></td>
	</tr>
	<tr>
		<td align="center">Kota</td>
		<td width="2%">:</td>
		<td colspan="2">
		<input type="text" style="background-color: #fbb045" class="form-control" name="kota"  width="100%">
		</td>
	</tr>
	<tr>
		<td align="center">Pendidikan Terakhir</td>
		<td width="2%">:</td>
		<td colspan="2">
		<select class="form-control" style="background-color: #fbb045" name="pendidikan" >
			<option value="">--Pendidikan Terakhir--</option>
			<option value="S1">S1 (Starata 1)</option>
			<option value="S2">S2 (Starata 2)</option>
			<option value="S3">S3 (Starata 3)</option>
		</select>
		</td>
	</tr>
	<tr>
		<td align="center">Username</td>
		<td width="2%">:</td>
		<td colspan="2">
		<input type="text" style="background-color: #fbb045" class="form-control" name="username"  width="100%">
		</td>
	</tr>
	<tr>
		<td align="center">Password</td>
		<td width="2%">:</td>
		<td colspan="2">
		<input type="password" style="background-color: #fbb045" class="form-control" name="password"  width="100%">
		</td>
	</tr>
	<tr>
		<td align="center"><button style="background-color: #ff8400" onclick="return confirm('Apakah Data Sudah Benar?')"  class="btn btn-md btn-sm btn-primary" name="submit" type="submit">Daftar</button></td>
		<td></td>
	</tr>
	</form>
</table>
</div>
</div>
<?php
}else{
	echo "<script>alert('Maaf Data NIM Tidak Di kenal!')</script>";
	echo "<script>document.location.href='?mode=cari_alumni'</script>";	
}
}elseif($_GET['mode']=='data_pelengkap'){
?>
<div class="container">
	<br>
	<!-- <div class="col col-md-12" style="color: white;" align="left">
		<a href="?mode=cari_alumni">
			<input type="button" value="Dafar Sebagai Alumni"  class="btn btn-success btn-md" name="cek" id="cek">
		</a>
	</div> -->
<center><h2><b>Data Tambahan Alumni</b></h2></center>
<div align ="center">
<table  class="table table-resposive" style="width:1000px">
<form action="modul/simpan.php?mode=simpan_user" enctype="multipart/form-data" method="post">
	<tr>
		<td align="center">Nama Lengkap</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="text" style="background-color: #fbb045" name="nama" class="form-control" width="100%"></td>
	</tr>
	<tr>
		<td align="center">NIK</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="text" style="background-color: #fbb045" name="id" class="form-control" width="100%"></td>
	</tr>
	<tr>
		<td align="center">Tempat Lahir</td>
		<td width="2%">:</td>
		<td width="55%"><input type="text" style="background-color: #fbb045;" name="tempat" class="form-control" ></td>
		<td width="45%">
		<input type="text" style="background-color: #fbb045" id="datetimepicker1" name="tanggal" class="form-control" width="100%" readonly>
		</td>
	</tr>
	<tr>
		<td align="center">Alamat</td>
		<td width="2%">:</td>
		<td colspan="2"><textarea style="background-color: #fbb045" name="alamat" class="form-control" width="100%"></textarea></td>
	</tr>
	<tr>
		<td align="center">Email</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="email" style="background-color: #fbb045" name="email" class="form-control" width="100%"></td>
	</tr>
	<tr>
		<td align="center">telp</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="text" style="background-color: #fbb045" name="tlp" class="form-control" width="100%"><input type="hidden" style="background-color: #fbb045" name="jenis" value="Pelamar" class="form-control" width="100%"></td>
	</tr>
	<tr>
		<td align="center">Pas Foto</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="file" style="background-color: #fbb045" name="foto"  width="100%"></td>
	</tr>
	<tr>
		<td align="center">Username</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="text" style="background-color: #fbb045" name="username" class="form-control" width="100%"></td>
	</tr>
	<tr>
		<td align="center">Password</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="Password" style="background-color: #fbb045" name="password" class="form-control" width="100%"></td>
	</tr>
	<tr>
		<td align="center"><button style="background-color: #ff8400"  class="btn btn-md btn-sm btn-primary" name="submit" type="submit">Daftar</button></td>
		<td></td>
	</tr>
	</form>
</table>
</div>
</div>

<?php			
echo "<script>window.open('data-pelengkap-alumni.php','aa','width=300px,height=500px')</script>";
}	
include 'footer.php';
?>