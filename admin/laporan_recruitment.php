
<?php

		switch ($_GET['mode']) {
			case 'form';
				form();
				break;
			case 'lihat2';
				lihat2();
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
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Laporan Lowongan</h1>
				<!-- <a href="?mode=form"><button class="btn btn-primary">Tambah Data</button></a> -->
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
		<!-- <div class="row"> -->
			<table class="table table-striped table-bordered data">
			<thead>
				<tr>			
					<th>No</th>
					<th>Id Post<br>Lowongan</th>
					<!-- <th>Email</th> -->
					<th>Judul</th>
					<th>Jenis</th>
					<th>Provinsi</th>
					<th>Job Sekeer</th>
					
				</tr>
			</thead>
			<tbody>
			<?php
				$no=1;
				$sql="SELECT * FROM lowongan where id_comp='$_SESSION[id]'" ;
				$res=mysql_query($sql);
				while($arr=mysql_fetch_array($res)){
						if($arr['jenis']=="ft"){
							$cetak="Full Time";
						}elseif($arr['jenis']=="pt"){
							$cetak="Part Time";
						}
				$sql1="SELECT count(*) as banyak from tbl_lamar where id_lowongan='$arr[id_lowongan]'";
				$res1=mysql_query($sql1);
				$arr1=mysql_fetch_array($res1);
			?>
				<tr>	
					<td><?=$no?></td>			
					<td width="10%"><?=$arr['id_lowongan']?></td>
					<td><a href="?mode=lihat2&judul=<?=$arr['judul']?>&id=<?=$arr['id_lowongan']?>"><?=$arr['judul']?></a></td>
					<td><?=$cetak?></td>
					<td><?=$arr['provinsi']?></td>
					<td><?=$arr1['banyak']?></td>
					<!--  -->
				</tr>
			<?php 
				$no++;
			} ?>
			</tbody>


		</table>
			</div><!--/.row-->
<?php
include 'footer.php';
}
function form(){

	include 'header.php';
?>
<script src='../tinymce/js/tinymce/tinymce.min.js'></script>
  <script>
  tinymce.init({
    selector: '#mytextarea',
     height: 300,
     menubar: "tools",
     toolbar: "nonbreaking",
   plugins: [
    // "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
    "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern","nonbreaking","lists, advlist"
  ],

  toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
  toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
  toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | visualchars visualblocks nonbreaking template pagebreak restoredraft",
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'],

  menubar: false,
  toolbar_items_size: 'small',

  style_formats: [{
    title: 'Bold text',
    inline: 'b'
  }, {
    title: 'Red text',
    inline: 'span',
    styles: {
      color: '#ff0000'
    }
  }, {
    title: 'Red header',
    block: 'h1',
    styles: {
      color: '#ff0000'
    }
  }, {
    title: 'Example 1',
    inline: 'span',
    classes: 'example1'
  }, {
    title: 'Example 2',
    inline: 'span',
    classes: 'example2'
  }, {
    title: 'Table styles'
  }, {
    title: 'Table row 1',
    selector: 'tr',
    classes: 'tablerow1'
  }],

  templates: [{
    title: 'Test template 1',
    content: 'Test 1'
  }, {
    title: 'Test template 2',
    content: 'Test 2'
  }]
  });
  </script>

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

			<form action="modul/simpan.php?mode=simpan_lowongan" method="POST" enctype="multipart/form-data">
				<tr>				
					<td width="10%"><?=$_GET['judul']?></td>
					<td>:</td>
					<td><input type="text" class="form-control" style="height: 30px;width: 80%;background-color: #d6e5ff;color: #002f82" name="judul" ></td>
				</tr>
				<tr>				
					<td>Isi</td>
					<td>:</td>
					<td><textarea id="mytextarea" type="text" class="form-control" style="background-color: #d6e5ff;color: #002f82;" name="isi"></textarea></td>
				</tr>
				<tr>				
					<td>Gaji</td>
					<td>:</td>
					<td><input type="text" class="form-control" style="height: 30px;width: 200px;background-color: #d6e5ff;color: #002f82"  name="gaji1" placeholder="Dari"><br><input type="text" class="form-control" style="height: 30px;width: 200px;background-color: #d6e5ff;color: #002f82"  name="gaji2" placeholder="Sampai"></td></td>

				</tr>
				<tr>				
					<td width="10%">Provinsi</td>
					<td>:</td>
					<td><input type="text" class="form-control" style="height: 30px;width: 200px;background-color: #d6e5ff;color: #002f82"  name="provinsi"></td>
				</tr>

				<tr>				
					<td width="10%">Jenis </td>
					<td>:</td>
					<td>
					<select style="height: 30px;width: 200px;background-color: #d6e5ff;color: #002f82"  name="jenis" class="form-control" max-length="10"  ><option value="ft">Full Time</option>
					<option value="pt">Part Time</option></select>
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
function lihat2(){
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
				<li class="active">Lihat job sekeer</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?=$_GET['judul']?></h1>
				<!-- <a href="?mode=form"><button class="btn btn-primary">Tambah Data</button></a> -->
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
		<!-- <div class="row"> -->
			<table class="table table-hover">
			<thead>
				<tr>			
					<th>No</th>
					<th>Nama Lengkap</th>
					<!-- <th>Email</th> -->
					<th>TTL</th>
					<th>Nama Univ/Sekolah</th>
					<!-- <th>Level Pendidikan</th> -->
					<th>Alamat</th>
					<th>Telpon</th>
					<th>Download Cv</th>
					
				</tr>
			</thead>
			<form method="POST" action="modul/update.php?mode=update_job_sekeer&id=<?=$_GET['id']?>">
			<tbody>
			<?php
				$no=1;
				$sql="SELECT nama,tempat_lahir,pendidikan,alamat,telepon,tgl_lahir,level_pendidikan,a.id_user as user_id,file,panggilan FROM tbl_lamar a inner join user b on a.id_user=b.id_user LEFT  join tbl_cv c on b.id_user=c.id_user where id_lowongan='$_GET[id]'" ;
				// echo $sql;
				$res=mysql_query($sql);
				while($arr=mysql_fetch_array($res)){
				$bgcolor=$no%2;
				if ($bgcolor!=0) {
					$bgcolor="#42c2f4";
				}else{
					$bgcolor="#aee4f9";
				}
			?>
				<tr bgcolor="<?=$bgcolor?>">	
					<td><input type="checkbox" name="ceklist[]" value="1" <?php if($arr['panggilan']=='1'){echo "checked";}?>>
					<input type="hidden" name="cek[]" value="<?=$no?>"><input type="hidden" value="<?=$arr['user_id']?>" name="user[]"></td>
					<td ><?=$arr['nama']?></td>			
					<td ><?=$arr['tempat_lahir'].",".$arr['tgl_lahir']?></td>
					<td><?=$arr['pendidikan']."(".$arr['level_pendidikan'].")"?></td>
					<td><?=$arr['alamat']?></td>
					<td><?=$arr['telepon']?></td>
					<td><a class="btn btn-success btn-xs" href="../data/<?=$arr['file']?>" download>Download</a></td>
				</tr>
			<?php 	
				$no++;
			} 
			?>
			</tbody>
		</table>
		<?php
		if(mysql_num_rows($res)>0){
		?>
		<button onclick="return confirm('Apakah Anda Yakin Data Sudah Benar?')" type="submit" class="btn btn-success" style="width: 100%;">Masukan Ke List Panggilan</button>
		<?php
		}else{
			echo "<center>Tidak Ada Data Pelamar</center>";
		}
		?>
		</form>
			</div><!--/.row-->
<?php
include 'footer.php';
}
