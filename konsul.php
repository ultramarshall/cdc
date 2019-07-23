<?php
    include 'header.php';

    date_default_timezone_set('Asia/Jakarta');
    $sql = mysql_query("SELECT * FROM konsul_time");
    
    /*echo "<pre>";
    print_r($row);
    echo "</pre>";*/
    
?>

    <section id="blog" class="container">
        <div class="center">
            <h2>Konsultasi</h2>
            <p class="lead"></p>
        </div>

        <div class="blog">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        
                        <ul class="nav nav-tabs" role="tablist">
                            <?php while ($row=mysql_fetch_object($sql)): ?>
                            <li role="presentation">
                                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                                    <?=date("d", strtotime($row->from))?> - <?=date("d", strtotime($row->to))?>
                                </a>
                            </li>    
                            <?php endwhile ?>
                            <!-- <li role="presentation">
                                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a>
                            </li>
                            <li role="presentation" class="active">
                                <a href="#office" aria-controls="profile" role="tab" data-toggle="tab">Office</a>
                            </li> -->
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane" id="home">
                            </div>
                            <div role="tabpanel" class="tab-pane active" id="office">Office</div>
                        </div>

                    </div>
                    <table class="table table-bordered" style="background: #fff">
                       <tbody>
                            <tr style="background: orange">
                                <td class="text-center">
                                    <p>Jam</p>
                                    <p>(WIB)</p>
                                </td>
                                <td>
                                    <p>Senin</p>
                                </td>
                                <td>
                                    <p>Selasa</p>
                                </td>
                                <td>
                                    <p>Rabu</p>
                                </td>
                                <td>
                                    <p>Kamis</p>
                                </td>
                                <td>
                                    <p>Jumat</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <p>09.00</p>
                                </td>
                                <td class="text-center available">
                                    <button class="btn btn-xs btn-success" style="margin-top: 15px">
                                        <i class="icon-plus"></i>
                                        <span>AVAILABLE</span>
                                    </button>
                                </td>
                                <td class="text-center booked">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                                <td class="text-center booked">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                                <td class="text-center booked">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                                <td class="text-center booked">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <p>09.00</p>
                                </td>
                                <td class="text-center">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                                <td class="text-center">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                                <td class="text-center">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                                <td class="text-center">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                                <td class="text-center">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <p>09.00</p>
                                </td>
                                <td class="text-center">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                                <td class="text-center">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                                <td class="text-center">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                                <td class="text-center">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                                <td class="text-center">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <p>09.00</p>
                                </td>
                                <td class="text-center">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                                <td class="text-center">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                                <td class="text-center">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                                <td class="text-center">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                                <td class="text-center">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <p>09.00</p>
                                </td>
                                <td class="text-center">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                                <td class="text-center">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                                <td class="text-center">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                                <td class="text-center">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                                <td class="text-center">
                                    <p><i class="icon-coffee icon-3x"></i></p>
                                </td>
                            </tr>
                       </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section><!--/#bottom-->
<?php
    include 'footer.php';
?>