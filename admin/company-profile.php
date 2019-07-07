
<?php
		$mode=isset($_GET['mode']);
		switch ($mode) {
			case 'form';
				form();
				break;	
			default:
				lihat();
				break;
		}

function lihat(){
	include 'header.php';
?>
<!-- <script type="text/javascript"></script> -->

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Profile</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Profile</h1>
				<font color="red"><i>*Apabila Ada Kesalahan data mohon hubungi admin</i></font>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
		<!-- <div class="row"> -->
			<table width="100%">
			<tbody>
			<?php
				$no=1;
				$sql="SELECT *  from user where id_user='$_SESSION[id]'" ;
				// echo $sql;
				$res=mysql_query($sql);
				$arr=mysql_fetch_array($res);
				?>
				<tr>
					<td width="20%">Nama</td>
					<td>:</td>
					<td><input type="text" class="form-control" value="<?=$arr['nama']?>" name="nama" readonly><br></td>
				</tr>
				<tr>
					<td>TTL</td>
					<td>:</td>
					<td><input type="text" class="form-control" value="<?=$arr['tempat_lahir'].", ".$arr['tgl_lahir']?>" name="nama" readonly><br></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><textarea class="form-control"  name="nama" readonly><?=$arr['alamat']?></textarea><br></td>
				</tr>
				<tr>
					<td>Telp</td>
					<td>:</td>
					<td><input type="text" class="form-control" value="<?=$arr['telepon']?>" name="nama" readonly><br></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><input type="text" class="form-control" value="<?=$arr['email']?>" name="nama" readonly><br></td>
				</tr>
				<?php
				if($_SESSION['jenis']!="Perusahaan"){
				?>
				<tr>
					<td>Pendidikan Terakhir</td>
					<td>:</td>
					<td><div class="form-inline"><input type="text" class="form-control" value="<?=$arr['level_pendidikan']?>" name="nama" readonly>&nbsp;Nama Sekolah&nbsp;<input type="text" class="form-control" value="<?=$arr['pendidikan']?>" name="nama" readonly></div><br></td>
				</tr>
				<?php }else{ ?>
				<tr>
					<td>Deskripsi</td>
					<td>:</td>
					<td><?=$arr['deskripsi']?><br></td>
				</tr>
				<tr>
					<td>Website</td>
					<td>:</td>
					<td><?=$arr['website']?><br></td>
				</tr>
				<?php } ?>
				<tr>
					<td>Foto</td>
					<td>:</td>
					<td><img width="150px" src="user/<?=$arr['foto']?>"></td>
				</tr>
			</tbody>


		</table>
			</div><!--/.row-->
<?php
include 'footer.php';
}
function form(){

	include 'header.php';
?>
<style>
	.tinymce-content p {
    padding: 0;
    margin: 2px 0;
}
</style>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Input Data</li>
			</ol>
		</div><!--/.row-->
		
						<div class="row">
			<!-- <div class="col-lg-1				2"> -->
				<h3 class="page-header">&nbsp;&nbsp;Form Data Lowongan</h3>
				<!-- <a href="?mode=form"><button class="btn btn-primary">Tambah Data</button></a> -->
			<!-- </div> -->
		</div><!--/.row-->
		
		<div class="panel panel-container">
		<!-- <div class="row"> -->
			<table class="table table-striped ">
			
			<tbody>
			<?php
			if(isset($_GET['t'])){
				// $query="Select * from lowongan where id_lowongan='$_GET[id]'";
				// $res=mysql_query($query);
				// $row=mysql_fetch_array($res);
				// $gaji=explode("-",$row['gaji']);
				// // echo $gaji[0];
				// echo "<form action=\"modul/update.php?mode=update_lowongan&id=$_GET[id]\" method=\"POST\" enctype=\"multipart/form-data\">";
			}else{
				echo "<form action=\"modul/simpan.php?mode=simpan_gambar\" method=\"POST\" enctype=\"multipart/form-data\">";
			}
			?>
			
				<tr>				
					<td width="10%">Perusahaan </td>
					<td>:</td>
					<td>
					<select name="perusahaan" class="form-control" style="height: 30px;width: 80%;background-color: #d6e5ff;color: #002f82">
					<?php
					$q="Select id_user,nama from user where jenis='Perusahaan'";
					$r=mysql_query($q);
					while ($data=mysql_fetch_array($r)) {
						echo "<option value=\"$databar[id_user]\">$data[nama]</option>";	
					}
					?>
					</select>
					</td>
				</tr>
				<tr>				
					<td>Profile</td>
					<td>:</td>
					<td>
						<table>
						<?php
							$a=1;
							for($z=5;$a<=$z;$a++){
						?>
							<tr>
								<td><input class="form-control" type="file" name="gambar[]" ></td>
							</tr>
						<?php
						}
						?>
						</table>
					</td>
				</tr>
				<tr>
					<td><button class="btn btn-md btn-primary" type="submit">Save</button></td>
				</tr>
				</form>
			</tbody>
		</table>
			</div><!--/.row-->

<?php

include 'footer.php';
}
?>
