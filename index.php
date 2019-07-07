<?php
include 'header.php';

function hitung_all()
{
    $sql=mysql_query("SELECT count(*) as semua from user where jenis <> 'Perusahaan'");
    $arr=mysql_fetch_array($sql);
    return $arr['semua'];    
}
function hitung_persen($param)
{
    $semua=hitung_all();
    $sql=mysql_query("SELECT count(*) as persen from user where level_pendidikan='$param' AND jenis <> 'Perusahaan'");
    $arr=mysql_fetch_array($sql);
    $hitung=($arr['persen']/$semua)*100;
    return number_format($hitung,2);
}

?>
<!--/header-->

    <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
            <?php
            $no=1;
            $sql_banner="SELECT * from banner order by tanggal ASC";
            $res_banner=mysql_query($sql_banner);
            while($row_b=mysql_fetch_array($res_banner)){
            ?>
                <div class="item <?php if($no==1){echo "active";}?> " style="background-image: url(admin/banner/<?=$row_b['gambar']?>)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <!-- <h1 class="animation animated-item-1"><?=$row_b['gambar']?></h1> -->
                                    <!-- <h2 class="animation animated-item-2">Accusantium doloremque laudantium totam rem aperiam, eaque ipsa...</h2> -->
                                    <!-- <a class="btn-slide animation animated-item-3" href="#">Edit</a> -->
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <!-- <img src="images/slider/img1.png" class="img-responsive"> -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->
            <?php
            $no++;
              }
            ?>
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->

    <section id="feature" >
        <div class="container">
           <div class="center wow fadeInDown">
               <!--  <h2>Fitur&nbsp;<button class="btn btn-md btn-primary">Edit</button></h2> -->
                <p class="lead">Jadilah Orang yang mendapatkan pekerjaanmu disini! <br> dan langsung buat akun membermu disini! Agar dapat menikmati full akses!</p>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-user"></i>
                            <h2>Jadilah Jobseeker</h2>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-comments"></i>
                            <h2>Retina ready</h2>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-cloud-download"></i>
                            <h2>Easy to customize</h2>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h3>
                        </div>
                    </div><!--/.col-md-4-->
                
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-leaf"></i>
                            <h2>Adipisicing elit</h2>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-cogs"></i>
                            <h2>Sed do eiusmod</h2>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-heart"></i>
                            <h2>Labore et dolore</h2>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h3>
                        </div>
                    </div><!--/.col-md-4-->
                </div><!--/.services-->
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#feature-->

    <section id="recent-works">
        <div class="container" id="event">
            <div class="center wow fadeInDown">
                <h2>Event Tahun <?= date('Y')?> &nbsp;<!-- <button class="btn btn-md btn-primary">Edit</button></h2> -->
                <p class="lead">Berikut Event Tahun ini <br>
                <div align="center">
                
                 </div>
                 </p>

            </div>

            <div class="row" id="idgbr">
                    <div class="row">
                <?php
                $tgl2=date('Y')."-12-31";
                $bulan=array("01"=>"Januari","02"=>"Febuari","03"=>"Maret","04"=>"April","05"=>"Mei","06"=>"Juni","07"=>"Juli","08"=>"Agustus","09"=>"September","10"=>"Oktober","11"=>"November","12"=>"Desember");
                $tgl1=date('Y-m-d');
                $sql="Select * from event where tanggal>='$tgl1' AND tanggal<='$tgl2'";
                // echo $sql;
                $res=mysql_query($sql);
                while($arr=mysql_fetch_array($res)){
                $pecah=explode("-",$arr['tanggal']);
                $bulan_part=$pecah[02]." ".$bulan[$pecah[01]]." ".$pecah[0];
                ?>
                <div class="col-xs-12 col-sm-4 col-md-3" style="margin-left: 5px;">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="admin/event/<?=$arr['gambar']?>" style="width: 500px;height: 250px;" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="#"><?=$arr['judul']?></a> </h3>
                                <h5><a href="#"><?=$bulan_part?></a> </h5>
                                <p><?=$arr['isi']?></p>
                                <a class="preview" href="admin/event/<?=$arr['gambar']?>" rel="prettyPhoto">
                                <!-- <button class="btn btn-info">View</button> -->
                                <i class="fa fa-eye"></i> View</a>
                            </div> 
                        </div>
                    </div>
                </div>
                <?php } ?>  
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#recent-works-->

    <section id="services" class="service-item">
	   <div class="container" id="kelebihan">
            <div class="center wow fadeInDown">
                <h2>Kelebihan Untuk Anda</h2>
                <p class="lead">Jadilah  Jobseeker di Karir Sistem Institut Teknologi Indonesia <br> Dan Nikmati Keuntungannya disini</p>
            </div>

            <div class="row">

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="images/services/services1.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Peluang</h3>
                            <p>Peluang anda diterima lebih besar disini.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="images/services/services2.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Lebih Hemat Waktu</h3>
                            <p>Cukup dari rumah,anda bisa melamar pekerjaan.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="images/services/services3.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Atur Strategimu</h3>
                            <p>Anda dapat membuat CV anda sendiri untuk melamar.</p>
                        </div>
                    </div>
                </div>  

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="images/services/services4.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Terpercaya</h3>
                            <p>Dapatkan pekerjaan yang 100% real.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="images/services/services5.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">User friendly</h3>
                            <p>Anda dapat mengakses melalui ponselmu</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="images/services/services6.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Keamanan</h3>
                            <p>Keamanan datamu akan terjamin</p>
                        </div>
                    </div>
                </div>                                                
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

    <section id="middle">
        <div class="container" id="partners">
            <div class="row">
                <div class="col-sm-12 wow fadeInDown">
                    <div class="skill">
                        <center>
                            <h2>YANG SUDAH BERGABUNG DENGAN KAMI</h2>
                        </center>
                        <h2>Yang telah bergabung dengan kami</h2>
                        <p>Banyak yang telah bergabung dengan kami dan telah mendapatkan hasilnya.</p>

                        <div class="progress-wrap">
                            <h3>Starata 2 (S2)</h3>
                            <div class="progress">
                              <div class="progress-bar  color1" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?=hitung_persen('S2')?>%">
                                <span class="bar-width"> <?=hitung_persen('S2')."%"?></span>
                              </div>

                            </div>
                        </div>

                        <div class="progress-wrap">
                            <h3>Starata 1 (S1)</h3>
                            <div class="progress">
                              <div class="progress-bar color2" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?=hitung_persen('S1')?>%">
                               <span class="bar-width"><?=hitung_persen('S1')."%"?></span>
                              </div>
                            </div>
                        </div>

                        <div class="progress-wrap">
                            <h3>Diploma 3 (D3)</h3>
                            <div class="progress">
                              <div class="progress-bar color3" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?=hitung_persen('D3')?>%">
                               <span class="bar-width"><?=hitung_persen('D3')."%"?></span>
                              </div>
                        </div>

                        <div class="progress-wrap">
                            <h3>SLTA</h3>
                            <div class="progress">
                              <div class="progress-bar color4" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: <?=hitung_persen('SLTA')?>%">
                               <span class="bar-width"><?=hitung_persen('SLTA')."%"?></span>
                              </div>
                        </div>
                    </div>

                </div><!--/.col-sm-6-->


            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#middle-->

    <section id="partner">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>Our Partners&nbsp;<!-- <button class="btn btn-xs btn-primary">Edit</button> --></h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>    

            <div class="partners">
                <ul>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="images/partners/partner1.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" src="images/partners/partner2.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" src="images/partners/partner3.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" src="images/partners/partner4.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1500ms" src="images/partners/partner5.png"></a></li>
                </ul>
            </div>        
        </div><!--/.container-->
    </section><!--/#partner-->

    <section id="conatcat-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="pull-left">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="media-body">
                            <h2>Ada Pertanyaan?</h2>
                            <p>Anda bisa menghubungi kami di telfon +0123 456 70 80, atau datang langsung ke bagian CDC <b>Institut Teknologi Indonesia</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.container-->    
    </section><!--/#conatcat-info-->

<?php
    include 'footer.php';
?>

<script type="text/javascript">
$(document).ready(function() {
    $('#fitur').click(function(){
        $.scrollto($('#kelebihan'),1000)
    })
  });
</script>