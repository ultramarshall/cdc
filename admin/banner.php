
<?php
// echo $_GET['mode'];
		switch ($_GET['mode']) {
			case 'form';
				form();
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
				<li class="active">Banner</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Banner</h1>
				<a href="?mode=form&id="><button class="btn btn-primary">Tambah Data</button></a>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
		<!-- <div class="row"> -->
			<table class="table table-striped table-bordered data">
			
			<thead>
				<tr>			
					<th>No</th>
					<th>Judul</th>
					<th>Gambar</th>
					<th>Urutan Tampil</th>
					<th>Diupdate oleh</th>
					<th>#</th>

				</tr>
			</thead>
			<tbody>
			<?php
				$sql="SELECT * FROM banner a inner join user b on a.id_user=b.id_user" ;
				$res=mysql_query($sql);
				$no=1;
				while($arr=mysql_fetch_array($res)){
					// $sql3=mysql_query("SELECT * FROM pembayaran where id_user='$arr[id_user]'");
					// $arr3=mysql_fetch_array($sql3);
					// if($arr3['foto']!=''){
					// 	$link="resi/$arr3[foto]";
					// }else{
					// 	$link="resi/no-image.png";
					// }
			?>
				<tr>
					<td><?=$no?></td>				
					<td><?=$arr['judul']?></td>
					<td><?=$arr['gambar']?></td>
					<td><?=$arr['tanggal']?></td>
					<td><?=$arr['nama']?></td>
					
					<td><a href="?mode=form&jenis=pelamar&id=<?=$arr['id_banner']?>&t=<?=md5('term')?>" class="btn btn-xs btn-info">Edit</a> || <a href="modul/hapus.php?mode=hapus_banner&id=<?=$arr['id_banner']?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')" class="btn btn-xs btn-danger">Hapus</a></td>
				</tr>
			<?php $no++; } ?>
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
				<h3 class="page-header">&nbsp;&nbsp;Form Data Event</h3>
				<!-- <a href="?mode=form"><button class="btn btn-primary">Tambah Data</button></a> -->
			<!-- </div> -->
		</div><!--/.row-->
		
		<div class="panel panel-container">
		<!-- <div class="row"> -->
			<table class="table table-striped ">
			
			<tbody>
			<?php
				if(isset($_GET['t'])){
					$sql1="Select * from banner where id_banner=$_GET[id]";
					$res1=mysql_query($sql1);
					$arr1=mysql_fetch_array($res1);
					echo "<form action=\"modul/update.php?mode=update_banner&id=$_GET[id]\" method=\"POST\" enctype=\"multipart/form-data\">";
				}else{
					echo "<form action=\"modul/simpan.php?mode=simpan_banner\" method=\"POST\" enctype=\"multipart/form-data\">";
				}
			?>
			
			<!-- <form action="modul/simpan.php?mode=simpan_banner" method="POST" enctype="multipart/form-data"> -->
			
				<tr>				
					<td width="10%">Nama Judul</td>
					<td>:</td>
					<td><input type="text" class="form-control" style="height: 30px;width: 80%;background-color: #d6e5ff;color: #002f82" name="judul" value="<?php if(isset($_GET['t'])){ echo "$arr1[judul]"; }?>"></td>
				</tr>
				<tr>				
					<td width="10%">Gambar</td>
					<td>:</td>
					<td><input type="file" class="form-control" name="gambar" style="height: 30px;width: 200px;background-color: #d6e5ff;color: #002f82" value="<?php if(isset($_GET['t'])){ echo "$arr1[gambar]"; }?>" ></td>
				</tr>
				<?php
					if(isset($_GET['t'])){
						echo "<tr>
							<td></td>
							<td></td>
							<td colspan='3'>
								<img src='banner/$arr1[gambar]' style=width:50%>
							<input type='hidden' name='gambarold' value='$arr1[gambar]'> 
							</td>
						</tr>
						";
					}
				?>

				<tr>				
					<td width="10%">Urutan Banner</td>
					<td>:</td>
					<td>
					<input type="number" style="height: 30px;width: 200px;background-color: #d6e5ff;color: #002f82"  value="<?php if(isset($_GET['t'])){ echo "$arr1[tanggal]"; }?>" name="tanggal" class="form-control" max-length="2"  >
					</td>
				</tr>

				
					<td><button class="btn btn-md btn-primary" type="submit">Save</button></td>
				</tr>
				</form>
			</tbody>
		</table>
			</div><!--/.row-->
<script>
  $( function() {
    $( "#datetimepicker1" ).datepicker({
        format: "yyyy-mm-dd",
                    autoclose:true
    });

  } );
  </script>

<?php
include 'footer.php';
}

?>
