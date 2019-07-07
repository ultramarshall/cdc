<?php
                 if(isset($_POST['nama_bulan'])){
                    $bln=$_POST['nama_bulan'];
                    }else{
                        $bln=$bulan[$month];
                    }
                    $sql22="SELECT * FROM event where tanggal like '%-$bln%'";
                    $res22=mysql_query($sql22);
                    while($arr22=mysql_fetch_array($res22)){
                 
                 ?>   
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="admin/event/<?=$arr22['gambar']?>" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="#"><?=$arr22['judul']?></a></h3>
                                <p><?=$arr22['isi']?></p>
                                <a class="preview" href="admin/event/<?=$arr22['gambar']?>" rel="prettyPhoto">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>View</button></a>
                            </div> 
                        </div>
                    </div>
                </div>
                <?php
                    }
?>