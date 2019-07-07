
<?php

		switch ($_GET['mode']) {
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
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Lowongan</h1>
				<a href="?mode=form"><button class="btn btn-primary">Tambah Data</button></a>
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
					<th>Dibutuhkan</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$no=1;
				$sql="SELECT id_lowongan,judul,jenis,provinsi,job_sekeer FROM lowongan where id_comp='$_SESSION[id]'" ;
				// echo $sql;
				$res=mysql_query($sql);
				while($arr=mysql_fetch_array($res)){
						if($arr['jenis']=="ft"){
							$cetak="Full Time";
						}elseif($arr['jenis']=="pt"){
							$cetak="Part Time";
						}
			?>
				<tr>	
					<td><?=$no?></td>			
					<td width="10%"><?=$arr['id_lowongan']?></td>
					<td><?=$arr['judul']?></td>
					<td><?=$cetak?></td>
					<td><?=$arr['provinsi']?></td>
					<td><?=$arr['job_sekeer']?>&nbsp;Orang</td>
					
					<td><a href="?mode=form&jenis=Perusahaan&id=<?=$arr['id_lowongan']?>&t=<?=md5('term')?>" class="btn btn-xs btn-info">Edit</a> || <a href="modul/hapus.php?mode=hapus_lowongan&id=<?=$arr['id_lowongan']?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')" class="btn btn-xs btn-danger">Hapus</a></td>
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
				$query="Select * from lowongan where id_lowongan='$_GET[id]'";
				$res=mysql_query($query);
				$row=mysql_fetch_array($res);
				$gaji=explode("-",$row['gaji']);
				// echo $gaji[0];
				echo "<form action=\"modul/update.php?mode=update_lowongan&id=$_GET[id]\" method=\"POST\" enctype=\"multipart/form-data\">";
			}else{
				echo "<form action=\"modul/simpan.php?mode=simpan_lowongan\" method=\"POST\" enctype=\"multipart/form-data\">";
			}
			?>
<!-- 			<form action="modul/simpan.php?mode=simpan_lowongan" method="POST" enctype="multipart/form-data"> -->
				<tr>				
					<td width="10%">Judul </td>
					<td>:</td>
					<td><input type="text" class="form-control" <?php if(isset($_GET['t'])){echo "value=\"$row[judul]\"";}else{ echo "value=''"; } ?> style="height: 30px;width: 80%;background-color: #d6e5ff;color: #002f82" name="judul" ></td>
				</tr>
				<tr>				
					<td>Isi</td>
					<td>:</td>
					<td><textarea id="mytextarea" type="text" class="form-control" style="background-color: #d6e5ff;color: #002f82;" name="isi"><?php if(isset($_GET['t'])){echo "$row[judul]";}else{ echo ""; } ?></textarea></td>
				</tr>
				<tr>				
					<td>Gaji</td>
					<td>:</td>
					<td><input type="text" class="form-control" style="height: 30px;width: 200px;background-color: #d6e5ff;color: #002f82" <?php if(isset($_GET['t'])){echo "value=\"$gaji[0]\"";}else{ echo "value=\"0\""; } ?>  name="gaji1" placeholder="Dari"><br>
					<input type="text" class="form-control" style="height: 30px;width: 200px;background-color: #d6e5ff;color: #002f82" <?php if(isset($_GET['t'])){echo "value=\"$gaji[1]\"";}else{ echo "value=\"0\""; } ?>  name="gaji2" placeholder="Sampai"></td></td>

				</tr>
				<tr>				
					<td width="10%">Provinsi</td>
					<td>:</td>
					<td><input type="text" class="form-control" <?php if(isset($_GET['t'])){echo "value=\"$row[provinsi]\"";}else{ echo "value=''"; } ?> style="height: 30px;width: 200px;background-color: #d6e5ff;color: #002f82"  name="provinsi"></td>
				</tr>
				<tr>				
					<td width="10%">Banyaknya Orang</td>
					<td>:</td>
					<td><input type="number" class="form-control" <?php if(isset($_GET['t'])){echo "value=\"$row[job_sekeer]\"";}else{ echo "value=\"0\""; } ?> style="height: 30px;width: 200px;background-color: #d6e5ff;color: #002f82" id="banyak"  name="banyak"></td>
				</tr>

				<tr>				
					<td width="10%">Jenis </td>
					<td>:</td>
					<td>
					<select style="height: 30px;width: 200px;background-color: #d6e5ff;color: #002f82"  name="jenis" class="form-control" max-length="10"  >
					<option value="ft" <?php if(isset($_GET['t'])){if($row['jenis']=="ft") echo "selected";}?>>Full Time</option>
					<option value="pt" <?php if(isset($_GET['t'])){if($row['jenis']=="pt") echo "selected";}?>>Part Time</option>
					</select>
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
