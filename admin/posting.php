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
				<li class="active">Posting</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Posting</h1>
			</div>
		</div><!--/.row-->
		
		<fieldset style="background-color: lightblue">
		<font size="3"><b>&nbsp;Biaya Pendaftaran</b></font>
		<div class="panel panel-container">
				
		<!-- <div class="row"> -->
			<table class="table table-striped table-bordered data">
				<tr>
					<td colspan="4" bgcolor="yellow">Perusahaan &nbsp;</td>
					<!-- <td>&nbsp;</td> -->
					<!-- <td>&nbsp;</td> -->
				</tr>
				<tr>
					<td colspan="4">
		
		<div class="row" style="width: 100%;">
			<div >
				<h1 class="page-header">Harga Paket</h1>
				<!-- <a href="?mode=form&jenis=<?=$_GET['jenis']?>"><button class="btn btn-primary">Tambah Data</button></a> -->
			</div>
		</div><!--/.row-->
		
		<div class="container">
		<!-- <div class="row"> -->
			<div class="columns">
 <form action="modul/update.php?mode=update_harga&type=reguler&jenis=Perusahaan" method="POST">
  <ul class="price">
    <li class="header" style="background-color:#4CAF50">Reguler</li>
    <li class="grey">Harga.<input type="text" value="<?=number_format(tampil_harga('reguler','Perusahaan'))?>" style="background-color: lightgrey" class="form-control" name="harga"></li>
    <li>10 Posting Lowongan</li>
    <li>Unlimited Jobseeker</li>
    <li>Seluruh Indonesia</li>
    <li>1 Akun</li>
    <li class="grey"><button class="btn btn-success">Update Harga</button></li>
  </ul>
 </form>
</div>

<div class="columns">
<form action="modul/update.php?mode=update_harga&type=premium&jenis=Perusahaan" method="POST">
  <ul class="price">
    <li class="header">Premium</li>
    <li class="grey">Harga.<input type="text" style="background-color: lightgrey" value="<?=number_format(tampil_harga('premium','Perusahaan'))?>" class="form-control" name="harga"></li>
    <li>50 Posting Lowongan</li>
    <li>Unlimited job Seeker</li>
    <li>Seluruh Indonesia</li>
    <li>1 Akun</li>
    <li class="grey"><button class="btn btn-success">Update Harga</button></li>
  </ul>
</form>
</div>


			<!-- </div> -->

					</td>
				</tr>

				<tr >
					<td colspan="6" bgcolor="yellow" >Pelamar</td>
				</tr>
				<form action="modul/update.php?mode=update_harga&type=reguler&jenis=Pelamar" method="POST">
				<tr>
					<td width="5%">Pelamar</td>
					<td width="2px">:</td>
					<td><input type="text" style="width:250px;background-color: lightblue" value="<?=number_format(tampil_harga('reguler','Pelamar'))?>" name="harga" class="form-control"></td>
				</tr>
				<tr>
				<td></td>
				<td></td>
				<td>
					<button type="submit" class="btn btn-success">Update Harga</button>
				</td>
				</tr>
				</form>
		</table>
			</div><!--/.row-->
		</fieldset>
		<br>


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
