<?php
	session_start();
include "modul/koneksi.php";
// include "modul/global.php";
$sql="SELECT * from user where id_user='$_SESSION[id]'";
$res=mysql_query($sql);
$arr=mysql_fetch_array($res);
?>
<!-- <script type="text/javascript"></script> -->

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?=$_GET['judul']?></h1>
				<!-- <a href="?mode=form"><button class="btn btn-primary">Tambah Data</button></a> -->
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
		<!-- <div class="row"> -->
			<table width="100%" class="table table-hover">
			<thead>
				<tr bgcolor="grey" style="color: lightgrey">			
					<th>No</th>
					<th>Nama Lengkap</th>
					<!-- <th>Email</th> -->
					<th>TTL</th>
					<th>Nama Univ/Sekolah</th>
					<!-- <th>Level Pendidikan</th> -->
					<th>Alamat</th>
					<th>Telpon</th>
					
				</tr>
			</thead>
			<!-- <form method="POST" action="modul/update.php?mode=update_job_sekeer&id=<?=$_GET['id']?>"> -->
			<tbody>
			<?php
				$no=1;
				$sql="SELECT nama,tempat_lahir,pendidikan,alamat,telepon,tgl_lahir,level_pendidikan,a.id_user as user_id,file,panggilan FROM tbl_lamar a inner join user b on a.id_user=b.id_user inner join tbl_cv c on b.id_user=c.id_user where id_lowongan='$_GET[id]' AND a.panggilan='1'" ;
				// echo $sql;
				$res=mysql_query($sql);
				while($arr=mysql_fetch_array($res)){
				$bgcolor=$no%2;
				if ($bgcolor!=0) {
					$bgcolor="white";
				}else{
					$bgcolor="lightgrey";
				}
			?>
				<tr bgcolor="<?=$bgcolor?>">	
					<td><?=$no?></td>
					<td ><?=$arr['nama']?></td>			
					<td ><?=$arr['tempat_lahir'].",".$arr['tgl_lahir']?></td>
					<td><?=$arr['pendidikan']."(".$arr['level_pendidikan'].")"?></td>
					<td><?=$arr['alamat']?></td>
					<td><?=$arr['telepon']?></td>
				</tr>
			<?php 	
				$no++;
			} 
			?>
			</tbody>
		</table>
		</form>
			</div><!--/.row-->
