<?php
global $array,$id;
include 'modul/koneksi.php';
session_start();
if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    $nama=$_SESSION['nama'];
    $username=$_SESSION['username'];
    $query="SELECT * from user where id_user='$id'";
    $result=mysql_query($query);
    $array=mysql_fetch_array($result);
    // if(!isset($_GET['lamer'])){
    if($array['status']==0 || $array['status']==1 ){
      if($array['status']==0){
        echo "<script>alert('Anda Sudah Terdaftar, Tapi Anda Belum Transfer,agar memiliki akses')</script>";
        echo "<script>document.location.href='regist.php'</script>";
      }elseif($array['status']==1){
        echo "<script>alert('Anda Sudah Upload Resi, Tapi Belum di Acc, dan  untuk memiliki akses')</script>";
        echo "<script>document.location.href='regist.php'</script>";
      }else{
        echo "<script>alert('Selamat Datang Di Sistem CDC ITI.')</script>";
        echo "<script>document.location.href='index.php'</script>";
      }
      // exit();
    }
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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" >
    <title>Institut Teknologi Indonesia (ITI)</title>
	
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" integrity="sha256-MmuZTsWcczT1IhH71aqQmja5jRcXy3mL/NOvjUy9tso=" crossorigin="anonymous" />
    <link rel="shortcut icon" href="images/ico/logo-iti.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/logo-iti.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/logo-iti.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/logo-iti.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/logo-iti.png">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
</head><!--/head-->

<body class="homepage">

    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-sm-6 col-xs-4">
                    <?php
                    if($id==""){
                    ?>
                        <div class="top-number"><a ><button type="button"  data-toggle="modal" data-target="#myModal1" class="btn btn-regular btn-md" style="color: red"><i class="fa fa-user"></i>&nbsp;Login</button></a></div>
                    <?php }else{
                            echo "<font color=white>Hallo,&nbsp;$_SESSION[nama]</font>";
                        } ?>
                    
                    </div> -->
                    <div class="col-sm-12 col-xs-12">
                       <div class="social">
                            <ul class="social-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                            <div class="search">
                                <form role="form">
                                    <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                    <i class="fa fa-search" style=""></i>
                                </form>
                           </div>
                           <?php if($id==""): ?>
                               <a href="#" class="btn btn-danger round btn-sm btn-round ml-2" 
                                        data-toggle="modal" data-target="#myModal1"
                                        style="border-radius: 15px;
                                               margin-left:5px;">
                                    <i class="fa fa-user"></i>
                                    <span>LOGIN</span>
                               </a>
                               
                           <?php endif ?>
                           
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
                        <li ><a href="index.php">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Informasi Karir <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="lowongan.php">Lowongan</a></li>
                                <li><a href="panggilan-tes.php">Panggilan Tes</a></li>
                               <!-- <li><a href="event.php">Event</a></li>-->
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Proses Perekrutan<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="konsul.php">Konseling</a></li>
                                <!-- <li><a href="pricing.html">Pelatihan</a></li> -->
<!--                                 <li><a href="404.html">Artikel Lowongan</a></li>
                                <li><a href="shortcodes.html">Profil Perusahaan</a></li>
 -->                            </ul>
                        </li>
                       <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Layanan CDC <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#event">Event</a></li>
                                <li id="fitur"><a href="#kelebihan">Fitur dan Keuntungan</a></li>

                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Partner <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#partners">Partner kami</a></li>
                                <!-- <li><a href="pricing.html">Karywan</a></li> -->
                            </ul>
                        </li>
                        <?php
                            if($id!=""){
                        ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu Saya <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="profilku.php">Profil Saya</a></li>
                                <li><a href="history-lamaran.php">Lamaran Saya</a></li>
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
  
