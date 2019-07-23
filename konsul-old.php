<?php
    include 'header.php';
?>

    <section id="blog" class="container">
        <div class="center">
            <h2>Konsultasi</h2>
            <p class="lead"></p>
        </div>

        <div class="blog">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-item">
                        <img class="img-responsive img-blog" src="images/blog/blog1.jpg" width="100%" alt="" />
                            <div class="row">  
                            <?php
                                $sql="Select * from konsul  where tanggal>=current_date";
                                $res=mysql_query($sql);
                                while($arr=mysql_fetch_array($res)){
                                $bulan=array("01"=>"Januari","02"=>"Febuari","03"=>"Maret","04"=>"April","05"=>"Mei","06"=>"Juni","07"=>"Juli","08"=>"Agustus","09"=>"September","10"=>"Oktober","11"=>"November","12"=>"Desember");
                                $pecah=explode("-",$arr['tanggal']);
                                $tahun=$pecah[0];
                                $bln=$pecah[1];
                                $tanggal=$pecah[2];
                                $sql1="Select * from tbl_ruangan  where id_ruangan='$arr[ruangan]'";
                                $res1=mysql_query($sql1);
                                $arr1=mysql_fetch_array($res1);
                                $sql2="Select * from detail_konsul  where id_konsul='$arr[id_konsul]'";
                                $res2=mysql_query($sql2);
                                $arr2=mysql_fetch_array($res2);
                                
                            ?>
                                <div class="col-xs-12 col-sm-2 text-center">
                                    <div class="entry-meta">
                                        <span id="publish_date">  <?=$tanggal." / ".$bulan["$bln"]." / ".$tahun?></span>
                                        <span><font color="red">Pukul : <?=$arr['jam']." WIB"?></font></span>
                                        <span><font color="red">Ruangan : <?=$arr1['nama_ruangan']." WIB"?></font></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-10 blog-content">
                                    <h2><?=$arr['judul']?></h2>
                                    <p><?=$arr['keterangan']?></p>

                                    <div class="post-tags">
                                        <strong>Tag:</strong>  <a href="#">Konsul</a><br>
                                    <?php
                                    if(mysql_num_rows($res2) >= $arr['kapasitas']){
                                    ?>
                                     <button class="btn btn-md btn-danger" onclick="booking_konsul(this.id)" id="<?=$arr['id_konsul']?>" disabled>&nbsp;Penuh</button>
                                    <?php
                                    }else{
                                    ?>
                                        <button class="btn btn-md btn-danger" onclick="booking_konsul(this.id)" id="<?=$arr['id_konsul']?>">&nbsp;Booking</button>
                                        <div class="row">
                                            <div class="col-12" id="booking_time" style="display: none">
                                                <table class="table table-success" style="background: #eee; width: 80%; margin-top: 10px">
                                                    <tbody>
                                                        <tr>
                                                            <td width="20%">pilih jam konsul</td>
                                                            <td>
                                                                <select class="form-control">
                                                                    <option>10.00 - 12-00</option>
                                                                    <option>13.00 - 15-00</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <button class="btn btn-success col-12 pull-right">BOOKING</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    </div>

                                </div>
                            <?php } ?>
                            </div>
                        </div><!--/.blog-item-->
                        
                <!--/.col-md-3-->
            </div>
        </div>
    </section><!--/#bottom-->
<?php
    include 'footer.php';
?>