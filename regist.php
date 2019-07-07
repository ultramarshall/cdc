<?php
include 'modul/koneksi.php';
session_start();
if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    $nama=$_SESSION['nama'];
    $username=$_SESSION['username'];
    $query="SELECT * from user where id_user='$id'";
    $result=mysql_query($query);
    $array=mysql_fetch_array($result);
    // if($array['status']==0){
    //   echo "<script>alert('Anda Sudah Terdaftar, Tapi Anda Belum Transfer.')</script>";
    //   echo "<script>document.location.href='regist.php'</script>";
    // }
}else{
    $id="";
    $nama="";
    $username="";
}

function tampil_harga($type,$jenis){
  $sql="Select harga from harga where type='$type' AND jenis='$jenis'";
  $res=mysql_query($sql);
  $arr=mysql_fetch_array($res);

  return $arr['harga'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Institut Teknologi Indonesia</title>
	
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="admin/css/datepicker3.css" rel="stylesheet">
    <!-- <script src="admin/js/bootstrap-datepicker.js"></script> -->
<!--     <link href="datepicker/css/bootstrap-datepicker.min.css">
    <link href="datepicker/css/bootstrap-datepicker.css"> -->
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     --><!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/logo-iti.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/logo-iti.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/logo-iti.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/logo-iti.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/logo-iti.png">
</head><!--/head-->
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

</head>
<body>

<body class="homepage">

    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                    <?php
                    if($id==""){
                    ?>
                        <div class="top-number"><a ><button type="button"  data-toggle="modal" data-target="#myModal1" class="btn btn-regular btn-md" style="color: red"><i class="fa fa-user"></i>&nbsp;Login</button></a></div>
                    <?php }else{
                            echo "<font color=white>Hallo,&nbsp;$_SESSION[nama]</font>";
                        } ?>
                    
                    </div>
                    <div class="col-sm-6 col-xs-8">
                       <div class="social">
                            
                            <!-- <div class="search">
                                <form role="form">
                                    <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                    <i class="fa fa-search"></i>
                                </form>
                           </div> -->
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img  src="css/img/logo-iti-kecil.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- <li ><a href="index.php">Home</a></li> -->
                        <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Informasi Karir <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="lowongan.php">Lowongan</a></li>
                                <li><a href="panggilan-tes.php">Panggilan Tes</a></li>
                                <li><a href="event.php">Event</a></li>
                            </ul>
                        </li> -->
                   <!--      <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Proses Perekrutan<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="blog-item.html">Karir Konseling</a></li>
                                <li><a href="pricing.html">Pelatihan</a></li>
                                <li><a href="404.html">Artikel Lowongan</a></li>
                                <li><a href="shortcodes.html">Profil Perusahaan</a></li>
                            </ul>
                        </li>
                       <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Layanan CDC <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="blog-item.html">Layanan CDC ITI</a></li>
                                <li><a href="pricing.html">Fitur dan Keuntungan</a></li>

                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Member <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="blog-item.html">Job Seeker</a></li>
                                <li><a href="pricing.html">Karywan</a></li>
                            </ul>
                        </li> -->
                        <?php
                            if($id!=""){
                        ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu Saya <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="profilku.php">Profil Saya</a></li>
                                <!-- <li><a href="blog-item.html">Lamaran Saya</a></li> -->
                                <li style="background-color: red"   ><a href="modul/logout.php" >Keluar</a></li>
                            </ul>
                        </li>

                        <?php } ?>
<!--                         <li><a href="blog.html">Blog</a></li> 
                        <li><a href="contact-us.html">Contact</a></li>                         -->
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
        <div style="background-color: orange;width: 100%">
                <marquee><font color="white">SELAMAT DATANG DI CAREER SYSTEM INSTITUT TEKNOLOGI INDONESIA</font></marquee>
		</div>
    </header>

    <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="background-color:#fff6bc;border-radius: 10px;">
        <div class="modal-header" style="background-color:#ff8f26;border-radius: 10px; ">
          <button type="button" class="close close-lg" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body" style="background-color: #fff6bc;">
          <table align="center" width="80%">
              <form action="modul/prosesLogin.php" method="POST">
              <tr>
                  <td>Username:</td>
                  <td><input type="text" name="username" class="form-control"></td>
              </tr>
              <tr>
                  <td>Password:</td>
                  <td><input type="Password" class="form-control" name="password"></td>
              </tr>
              <tr>
                  <td></td>
                  <td align="right"><a href="login.php?mode=regist"> Belum Punya Akun?Daftar.</a></td>
              </tr>
              <tr>
                  <td><button class="btn btn-md btn-primary">Login</button></td>
                  <td></td>
              </tr>
              </form>
          </table>
        </div>
        <div class="modal-footer" style="background-color:#ff8f26 ">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <div class="container">
  	<div class="row">
  		<?php
  			$sql1="SELECT * FROM user where id_user='$_SESSION[id]'";
  			$res1=mysql_query($sql1);
  			$arr1=mysql_fetch_array($res1);
  		?>
  		<table class="table table-hover" style="width: 100%">
  			<tr>
  				<td >ID  :</td>
  				<td><?=$arr1['id_user']?></td>
  			</tr>
  			<tr>
  				<td>Nama :</td>
  				<td><?=$arr1['nama']?></td>
  			</tr>
  			<tr>
  				<td>Tempat Tanggal Lahir :</td>
  				<td><?=$arr1['tempat_lahir'].",".$arr1['tgl_lahir']?></td>
  			</tr>
  			<tr>
  				<td>Alamat :</td>
  				<td><?=$arr1['alamat']?></td>
  			</tr>
  		</table>
  		<br>
  		<table class="table table-hover"  style="width:100%">
  			<thead>
  				<th width="5%">No</th>
  				<th>Keterangan</th>
  				<th>Jumlah</th>
  			</thead>
  			<tr>
  				<td width="10px">1.</td>
  				<td>Biaya Aktivasi Akun CDC-ITI</td>
          <?php 
            $harga=tampil_harga('reguler','Pelamar');
          ?>
  				<td>Rp. <?=number_format($harga)?></td>
  			</tr>

        <tr >
          <td width="10px">2.</td>
          <td>Kode Unik Pendaftaran</td>
          <?php 
            $harga=tampil_harga('reguler','Pelamar');
          ?>
          <td>Rp. <?=$_SESSION['id']?></td>
        </tr>

       <tr bgcolor="yellow">
          <td width="10px"></td>
          <td><font color="red"><b>Total</b></font></td>
          <?php 
            $total=$harga+$_SESSION['id'];
          ?>
          <td>Rp. <?=number_format($total)?></td>
        </tr>
  			
  			
  		</table>
      <br>
  		<table  style="width:100%;margin-left: 2%;" >
        
        <?php
        if($arr1['status']==0){
          $sql2="SELECT * from bank ";
          $res2=mysql_query($sql2);
          $no=1;
          while($arr2=mysql_fetch_array($res2)){
        ?>
        <form method="POST" enctype="multipart/form-data"  action="modul/simpan.php?mode=upload_resi" id="upload_resi">
        <tr>
          <td width="20px"><input type="radio" name="id_bank" value="<?=$arr2['id_bank']?>" required><img style="width: 20%" src="admin/user/<?=$arr2['gambar']?>" required>&nbsp;&nbsp;Bank&nbsp;<?=$arr2['nama_bank']?>&nbsp;(<?=$arr2['no_rek']?>)</td>
          <td></td>
        </tr>
        <?php
        $no++;
         }
          
          ?>
        <tr>
          <td><input type="file" name="resi"></td>
        </tr>
        <tr>
          <td><input type="submit" name="btn" value="Save" class="btn btn-primary"></td>
        </tr>
        <?php }else{?>
          <tr>
            <span class="label label-success">Menunggu Approval</span>
          </tr>
          <?php } ?>
        </form>
        
        
      </table>
      <br>
  	</div>
  </div>


<?php
	include 'footer.php';
  $sqlalumni="SELECT a.nama FROM  `user` a INNER JOIN alumni b ON a.nik = b.nim where id_user='$_SESSION[id]'  GROUP BY a.nama";
  $resalumni=mysql_query($sqlalumni);
  if(mysql_num_rows($resalumni)>0){
  $sqlkuesioner="SELECT id_user FROM  tbl_kuesioner where id_user='$_SESSION[id]'  GROUP BY a.nama";
  $reskuesioner=mysql_query($sqlkuesioner);
  if(mysql_num_rows($reskuesioner)<>0){
?>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">PENGUMUMAN</h4>
            </div>
            <div class="modal-body">
                  <p>Yang terhormat Saudara alumni, dalam rangka meningkatkan daya saing lulusan. Melalui tracer study ini akan dilakukan  pemetaan daya saing lulusan untuk penyempurnaan sistem pelacakan lulusan yang sudah tersedia. Berkaitan dengan hal  tersebut kami mohon agar Saudara dapat meluangkan waktu untuk mengisi dan menjawab pertanyaan dalam kuesioner ini. Jawaban berharga Anda akan membantu para mahasiswa dalam perencanaan studi dan karirnya serta berguna bagi para pengelola Program Studi untuk terus meningkatkan kualitas akademiknya dengan berbagai perencanaan strategis dan pengembangan program. Untuk kerjasama yang baik serta bantuannya, kami mengucapkan banyak terima kasih. 
                </p>
                <button id="oke"  class="btn btn-primary">Isi Kuesioner</button>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>

<div id="myModalku" class="modal fade">
    <div class="modal-dialog-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">KUESIONER UNTUK ALUMNI</h4>
            </div>
            <div class="modal-body">
                <div class="container" style="width: 100%">
                  <div class="row">
                    <form method="POST" action="modul/simpan.php?mode=simpan_kuesioner">
                    <table width="100%">
                      <tr>
                        <td width="1%">1.</td>
                        <td><label>Apakah Anda pernah bekerja ketika sedang studi di Institut Teknologi Indonesia</label></td>
                      </tr>
                      <tr>
                        <td colspan="2"><input type="radio" id="no1t" name="no_1" value="Ya">Ya&nbsp;<input type="radio" name="no_1" value="Tidak" id="no1f">Tidak</td>
                      </tr>
                      <tr>
                        <td width="1%">2.</td>
                        <td><label>Apakah Jenis Pekerjaan Tersebut?</label></td>
                      </tr>
                      <tr>
                        <td colspan="2"><input type="text" class="form-control bg1" name="no_2" ></td>
                      </tr>
                      <tr>
                        <td width="1%">3.</td>
                        <td><label>Apakah Anda saat ini tetap meneruskan usaha tersebut?</label></td>
                      </tr>
                      <tr>
                        <td colspan="2"><input type="radio" class="bg1" name="no_3" value="Ya">Ya&nbsp;<input type="radio" class="bg1" name="no_3" value="Tidak">Tidak</td>
                      </tr>
                      <tr>
                        <td width="1%">4.</td>
                        <td><label>Apakah Anda aktif mencari pekerjaan pada tahun akhir ketika studi?</label></td>
                      </tr>
                      <tr>
                        <td colspan="2"><input type="radio"  name="no_4" value="Ya">Ya&nbsp;<input type="radio"  name="no_4" value="Tidak">Tidak</td>
                      </tr>
                      <tr>
                        <td width="1%">5.</td>
                        <td><label>Darimana Anda memperoleh informasi kesempatan pekerjaan?</label></td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <table>
                            <tr>
                              <td>
                                <input type="radio" name="no_5" value="Media CDC – ITI ( Mading, Website / Milist )">
                              </td>
                              <td>Media CDC – ITI ( Mading, Website / Milist )</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_5" value="Bursa kerja di Perguruan Tinggi Lain">
                              </td>
                              <td>Bursa kerja di Perguruan Tinggi Lain</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_5" value="Iklan di media">
                              </td>
                              <td>Iklan di media</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_5" value="Keluarga/Teman/Kenalan">
                              </td>
                              <td>Keluarga/Teman/Kenalan</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_5" value="Pendekatan Perusahaan">
                              </td>
                              <td>Pendekatan Perusahaan</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_5" value="Perusahaan Melakukan Pendekatan">
                              </td>
                              <td>Perusahaan Melakukan Pendekatan</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_5" value="Internet">
                              </td>
                              <td>Internet</td>
                            </tr>
                          </table>
                        </td>
                      </tr>

                      <tr>
                        <td width="1%">6.</td>
                        <td><label>Apakah jenis pekerjaan yang Anda minati / harapkan ketika mencari pekerjaan?</label></td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <table>
                            <tr>
                              <td>
                                <input type="radio" name="no_6" value="Manufaktur">
                              </td>
                              <td>Manufaktur</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_6" value="Industri Kimia / Petrokimia">
                              </td>
                              <td>Industri Kimia / Petrokimia</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_6" value="Industri makanan">
                              </td>
                              <td>Industri makanan</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_6" value="Industri Tekstil">
                              </td>
                              <td>Industri Tekstil</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_6" value="Perbankan">
                              </td>
                              <td>Perbankan</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_6" value="Keuangan">
                              </td>
                              <td>Keuangan</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_6" value="Jasa">
                              </td>
                              <td>Jasa</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_6" value="Konsultas Teknik">
                              </td>
                              <td>Konsultan Tenik</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_6" value="Marketing">
                              </td>
                              <td>Marketing</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_6" value="Pendidikan">
                              </td>
                              <td>Pendidikan</td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td >7.</td>
                        <td><label>Apakah Nama Tempat Anda Bekerja?</label>
                        <br><input type="text" name="no_7" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <td >8.</td>
                        <td><label>Alamat Perusahaan tempat anda bekerja</label>
                        <br><textarea  name="no_8" class="form-control"></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td >9.</td>
                        <td><label>No.Tlp Perusahaan tempat anda bekerja</label>
                        <br><input type="number" name="no_9" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <td >10.</td>
                        <td><label>Apakah bidang utama perusahaan tersebut?</label>
                        <br><input type="text" name="no_10" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <td >11.</td>
                        <td><label>Posisi Jabatan Anda?</label>
                        <br><input type="text" name="no_11" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <td >12.</td>
                        <td><label>Deskripsi perusahaan anda</label>
                        <br><textarea  name="no_12" class="form-control"></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td >13.</td>
                        <td><label>Apakah keahlian yang terutama dituntut dalam jabatan / posisi Anda diatas? </label>
                        <br><input type="radio" name="no_13" value="Komunikasi Teknis"><label>Kompetensi Teknis</label>
                        <br><input type="radio" name="no_13" value="Komunikasi Intepersonal" ><label>Komunikasi Intepersonal</label>
                        <br><input type="radio" name="no_13" value="Kemampuan Presentasi" ><label>Kemampuan Presentasi</label>
                        </td>
                      </tr>
                      <tr>
                        <td >14.</td>
                        <td><label>Apakah hambatan yang terutama Anda rasakan dalam pekerjaan tersebut?</label>
                        <br><input type="radio" name="no_14" value="Komunikasi Teknis">Kompetensi Teknis
                        <br><input type="radio" name="no_14" value="Komunikasi Intepersonal" >Komunikasi Intepersonal
                        <br><input type="radio" name="no_14" value="Kemampuan Presentasi" >Kemampuan Presentasi
                        </td>
                      </tr>
                      <tr>
                        <td >15.</td>
                        <td><label>Berapakah Rata-rata pendapatan anda</label>
                        <br><input type="radio" name="no_15" value="UMR">UMR
                        <br><input type="radio" name="no_15" value="UMR s.d 8jt" >UMR < 8jt
                        <br><input type="radio" name="no_15" value="8 jt s.d 15 jt" >8 jt s.d 15 jt
                        <br><input type="radio" name="no_15" value="Gaji > 15 jt" > > 15 jt
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <button type="submit" class="btn btn-md btn-info">Submit</button>
                        </td>
                      </tr>
                    </table>
                    </form>

                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }} ?>

</body>



<script>
    $(document).ready(function(){
        $("#myModal").modal('show');
        $("#oke").click(function(){
           $('#myModal').modal('toggle');
          $("#myModalku").modal('show');
        });
        $("#no1f").click(function(e){
          $(".bg1").attr('disabled',true);
        });
        $("#no1t").click(function(e){
          $(".bg1").removeAttr('disabled');
        });
    });
</script>