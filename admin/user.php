
<?php
// echo $_GET['mode'];
		switch ($_GET['mode']) {
			case 'form';
				form();
				break;
			case 'approve';
				approve();
				break;
			case 'harga';
				harga();
				break;	
			default:
				lihat();
				break;
		}

function approve(){

	include 'modul/koneksi.php';
	$sql="UPDATE user set status=2 where id_user=$_GET[id]";
	// echo $sql;
	mysql_query($sql);
	echo "<script>document.location.href='user.php?mode=&jenis=$_GET[jenis]';</script>";
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
				<h1 class="page-header"><?=$_GET['jenis']?></h1>
				<a href="?mode=form&jenis=<?=$_GET['jenis']?>"><button class="btn btn-primary">Tambah Data</button></a>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
		<!-- <div class="row"> -->
			<table class="table table-striped table-bordered data">
			<?php
				if($_GET['jenis']=="Perusahaan"){
			?>
			<thead>
				<tr>			
					<th>Nama Perusahaan</th>
					<!-- <th>Email</th> -->
					<th>Telepon</th>
					<th>Kapasitas</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$sql="SELECT * FROM user where jenis ='$_GET[jenis]' " ;
				$res=mysql_query($sql);
				while($arr=mysql_fetch_array($res)){
			?>
				<tr>				
					<td><?=$arr['nama']?></td>
					
					<td><?=$arr['telepon']?></td>
					<td><a href="?mode=harga&id=<?=$arr['id_user']?>"><?=$arr['kapasitas']?></a></td>
					<td><?php if($arr['status']){echo "Aktif";}else{echo "<font color=red>Tidak Aktif</font>";}?></td>
					<td><a href="?mode=form&jenis=Perusahaan&id=<?=$arr['id_user']?>&t=<?=md5('term')?>" class="btn btn-xs btn-info">Edit</a> || <a href="modul/hapus.php?mode=hapus_user&id=<?=$arr['id_user']?>&jenis=<?=$_GET['jenis']?>" onclic		k="return confirm('Anda Yakin Ingin Menghapus Data Ini?')" class="btn btn-xs btn-danger">Hapus</a></td>
				</tr>
			<?php } ?>
			</tbody>

			<?php		
				}else{
			?>
			<thead>
				<tr>			
					<th>Nama</th>
					<th>Email</th>
					<th>Telepon</th>
					<th>Jenis</th>
					<th>Status</th>
					<th>Action</th>

				</tr>
			</thead>
			<tbody>
			<?php
				$sql="SELECT * FROM user where jenis  like '%$_GET[jenis]%' order by id_user desc" ;
				$res=mysql_query($sql);
				while($arr=mysql_fetch_array($res)){
					$sql3=mysql_query("SELECT * FROM pembayaran where id_user='$arr[id_user]'");
					$arr3=mysql_fetch_array($sql3);
					if($arr3['foto']!=''){
						$link="resi/$arr3[foto]";
					}else{
						$link="resi/no-image.png";
					}
			?>
				<tr>				
					<td><?=$arr['nama']?></td>
					<td><?=$arr['email']?></td>
					<td><?=$arr['telepon']?></td>
					<td><?=$arr['jenis']?></td>
					
					<td><?php if($arr['status']==2){echo "Aktif";}elseif($arr['status']==0){echo "<font color=red>Tidak Aktif</font>";}elseif($arr['status']==1){echo "<a href='$link'>Menunggu Approval</a>";}?></td>
					<td><?php if($arr['status']==1){echo "<a href='?mode=approve&id=$arr[id_user]&jenis=$_GET[jenis]' class='btn btn-xs btn-success'>Approve</a> || ";} ?><a href="?mode=form&jenis=<?=$_GET['jenis']?>&id=<?=$arr['id_user']?>&t=<?=md5('term')?>" class="btn btn-xs btn-info">Edit</a> || <a href="modul/hapus.php?mode=hapus_user&id=<?=$arr['id_user']?>&jenis=<?=$_GET['jenis']?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')" class="btn btn-xs btn-danger">Hapus</a> ||<!--  <a onclick="window.open('hasil_kuesioner.php?id=<?=$arr['id_user']?>','aa','width=700,height=900')" class="btn btn-xs btn-primary">Hasil Kuesioner</a> --></td>
				</tr>
			<?php } ?>
			</tbody>
			<?php } ?>
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
				<h3 class="page-header">&nbsp;&nbsp;Form Data <?=$_GET['jenis']?></h3>
				<!-- <a href="?mode=form"><button class="btn btn-primary">Tambah Data</button></a> -->
			<!-- </div> -->
		</div><!--/.row-->
		
		<div class="panel panel-container">
		<!-- <div class="row"> -->
			<table class="table table-striped ">
			
			<tbody>
			<?php
					if(isset($_GET['t'])){
					$sql1="Select * from user where id_user=$_GET[id]";
					$res1=mysql_query($sql1);
					$arr1=mysql_fetch_array($res1);
					}
				if(isset($_GET['t'])){
			?>
			<form action="modul/update.php?mode=update_user&gbr=<?=$arr1['foto']?>" method="POST" enctype="multipart/form-data">
			<?php
			}else{
			?>	
			<form action="modul/simpan.php?mode=simpan_user" method="POST" enctype="multipart/form-data">
			<?php
				}
			?>
			
				<tr>				
					<td width="10%">Nama <?php if($_GET['jenis']=="Perusahaan"){echo "Perusahaan";}?></td>
					<td>:</td>
					<td><input type="text" class="form-control" style="height: 30px;width: 80%;background-color: #d6e5ff;color: #002f82" name="nama" value="<?php if(isset($_GET['t'])){ echo "$arr1[nama]"; }?>"></td>
				</tr>
				<tr>				
					<td><?php if($_GET['jenis']=="Perusahaan"){echo "(SIUP)";}else{echo "No.Ktp";}?></td>
					<td>:</td>
					<td><input type="text" class="form-control" style="height: 30px;width: 200px;background-color: #d6e5ff;color: #002f82" value="<?php if(isset($_GET['t'])){ echo "$arr1[nik]"; }?>" name="id"></td>
				</tr>
				<tr>				
					<td width="10%">Tempat Lahir</td>
					<td>:</td>
					<td><input type="text" class="form-control" style="height: 30px;width: 200px;background-color: #d6e5ff;color: #002f82" value="<?php if(isset($_GET['t'])){ echo "$arr1[tempat_lahir]"; }?>" name="tempat"></td>
				</tr>

				<tr>				
					<td width="10%">Tanggal <?php if($_GET['jenis']=="Perusahaan"){echo "Berdiri";}else{echo "Lahir";}?></td>
					<td>:</td>
					<td>
					<input type="text" style="height: 30px;width: 200px;background-color: #d6e5ff;color: #002f82" id="datetimepicker1" value="<?php if(isset($_GET['t'])){ echo "$arr1[tgl_lahir]"; }?>" name="tanggal" class="form-control" max-length="10"  readonly>
					</td>
				</tr>
				<tr>				
					<td>Alamat  <?php if($_GET['jenis']=="Perusahaan"){echo "Kantor Utama";}?> </td>
					<td>:</td>
					<td><textarea type="text"  class="form-control" style="background-color: #d6e5ff;color: #002f82" name="alamat"><?php if(isset($_GET['t'])){ echo "$arr1[alamat]"; }?></textarea></td>
				</tr>
				<tr>				
					<td>Telepon</td>
					<td>:</td>
					<td><input type="text" class="form-control" style="height: 30px;width: 200px;background-color: #d6e5ff;color: #002f82" value="<?php if(isset($_GET['t'])){ echo "$arr1[telepon]"; }?>" name="tlp" required></td>
				</tr>
				<tr>				
					<td>Email</td>
					<td>:</td>
					<td><input type="email" class="form-control" style="height: 30px;width: 50%;background-color: #d6e5ff;color: #002f82" name="email" value="<?php if(isset($_GET['t'])){ echo "$arr1[email]"; }?>" required></td>
				</tr>
				<tr>
					<td><?php if($_GET['jenis']=="Perusahaan"){echo "Logo Perusahaan";}else{echo "Pas Foto";}?></td>
					<td>:</td>
					<td><?php if(isset($_GET['t'])){ echo "<img src=user/$arr1[foto] style=width:50%;>"; }?><input type="file" name="foto" class="form-control"></td>	
				</tr>
				<?php if($_GET['jenis']=="Perusahaan"){?>
				<tr>
					<td>Kapasitas Posting</td>
					<td>:</td>
					<td><input type="number" class="form-control" style="height: 30px;width: 25%;background-color: #d6e5ff;color: #002f82" value="<?php if(isset($_GET['t'])){ echo "$arr1[kapasitas]"; }else{echo 0;}?>" name="kapasitas" disabled></td>
				</tr>
				<tr>
					<td>Deskripsi Perusahaan</td>
					<td>:</td>
					<td><textarea class="form-control" id="mytextarea" style="width: 95%" name="deskripsi"> <?php if(isset($_GET['t'])){ echo "$arr1[deskripsi]"; }?></textarea></td>
				</tr>
				<tr>
					<td>Website</td>
					<td>:</td>
					<td><input type="text" class="form-control" style="height: 30px;width: 25%;background-color: #d6e5ff;color: #002f82" value="<?php if(isset($_GET['t'])){ echo "$arr1[website]"; }?>" name="website" ></td>
				</tr>


				<?php }?>
				<?php if($_GET['jenis']!="Perusahaan"){?>
				<tr>
					<td>Level Pendidikan</td>
					<td>:</td>
					<td><SELECT class="form-control" style="height: 30px;width: 25%;background-color: #d6e5ff;color: #002f82" value="<?php if(isset($_GET['t'])){ echo "$arr1[level_pendidikan]"; }else{echo "";}?>" name="level_pendidikan" required>
						<option value="<?php if(isset($_GET['t'])){ echo "$arr1[level_pendidikan]"; }else{echo "";}?>"><?php if(isset($_GET['t'])){ echo "$arr1[level_pendidikan]"; }else{echo "level_pendidikan";}?></option>
							<option value="SLTA">SLTA</option>
							<option value="D3">D3</option>
							<option value="S1">S1</option>
							<option value="S2">S2</option>

					</SELECT></td>
				</tr>
				<tr>
					<td>Nama Sekolah/Univ</td>
					<td>:</td>
					<td><Input class="form-control"  style="height: 30px;width: 50%;background-color: #d6e5ff;color: #002f82" name="pendidikan" value="<?php if(isset($_GET['t'])){ echo "$arr1[pendidikan]"; }?>"></td>
				</tr>

				<?php }
					if($_GET['jenis']=="Admin"){
				?>
				<tr>
					<td>Jenis user</td>
					<td>:</td>
					<td>
					<select name="jenis" class="form-control" style="height: 30px;width: 200px;background-color: #d6e5ff;color: #002f82">
						<option value="Super_Admin" <?php if(isset($_GET['t']) && $arr1['jenis']=="Super_Admin"){ echo "selected"; }?> >Super Admin</option>
						<option value="Admin" <?php if(isset($_GET['t']) && $arr1['jenis']=="Admin"){ echo "selected"; }?> >Admin</option>
					</select>
						
					</select>
					</td>
				</tr>

				<?php }else{ ?>
					<input type="hidden" class="form-control" value="<?=$_GET['jenis']?>" style="height: 30px;width: 80%;background-color: #d6e5ff;color: #002f82" name="jenis">
				<?php 
					}
				?>
				<tr>
					<td>Username</td>
					<td>:</td>
					<td><input type="text" name="username" class="form-control" style="height: 30px;width: 200px;background-color: #d6e5ff;color: #002f82" value="<?php if(isset($_GET['t'])){ echo "$arr1[username]"; }?>"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td>:</td>
					<td><input type="password" name="password" class="form-control" style="height: 30px;width: 200px;background-color: #d6e5ff;color: #002f82"></td>
				</tr>
				<?php if(isset($_GET['t'])){ echo "<input name='id' type='hidden' value='$arr1[id_user]'>"; }?>
				<tr>
					<td><button class="btn btn-md btn-primary" type="submit">Save</button></td>
				</tr>
				</form>
			</tbody>
		</table>
			</div><!--/.row-->
<script>
  $( function() {
    $( "#datetimepicker1" ).datepicker({
        format: "dd-mm-yyyy",
                    autoclose:true
    });

  } );
  </script>

<?php
include 'footer.php';
}

function harga(){
	include 'header.php';

?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
    box-sizing: border-box;
}

.columns {
    float: left;
    width: 33.3%;
    padding: 8px;
}

.price {
    list-style-type: none;
    border: 1px solid #eee;
    margin: 0;
    padding: 0;
    -webkit-transition: 0.3s;
    transition: 0.3s;
}

.price:hover {
    box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

.price .header {
    background-color: #111;
    color: white;
    font-size: 25px;
}

.price li {
    border-bottom: 1px solid #eee;
    padding: 20px;
    text-align: center;
}

.price .grey {
    background-color: #eee;
    font-size: 20px;
}

.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    font-size: 18px;
}

@media only screen and (max-width: 600px) {
    .columns {
        width: 100%;
    }
}
</style>
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
				<h1 class="page-header">Harga Paket</h1>
				<!-- <a href="?mode=form&jenis=<?=$_GET['jenis']?>"><button class="btn btn-primary">Tambah Data</button></a> -->
			</div>
		</div><!--/.row-->
		
		<div class="container">
		<!-- <div class="row"> -->
			<div class="columns">
  <ul class="price">
    <li class="header" style="background-color:#4CAF50">Reguler</li>
    <li class="grey">Rp. <?=number_format(tampil_harga('reguler','Perusahaan'))?></li>
    <li>10 Posting Lowongan</li>
    <li>Unlimited Jobseeker</li>
    <li>Seluruh Indonesia</li>
    <li>1 Akun</li>
    <li class="grey"><a href="modul/update.php?mode=update_paket&paket=1&id=<?=$_GET['id']?>" class="button">Pasang</a></li>
  </ul>
</div>

<div class="columns">
  <ul class="price">
    <li class="header">Premium</li>
    <li class="grey">Rp. <?=number_format(tampil_harga('premium','Perusahaan'))?></li>
    <li>50 Posting Lowongan</li>
    <li>Unlimited job Seeker</li>
    <li>Seluruh Indonesia</li>
    <li>1 Akun</li>
    <li class="grey"><a href="modul/update.php?mode=update_paket&paket=2&id=<?=$_GET['id']?>" class="button">Pasang</a></li>
  </ul>
</div>


			</div><!--/.row-->
<?php
include 'footer.php';
}
?>