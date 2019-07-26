<?php
    include 'header.php';

    date_default_timezone_set('Asia/Jakarta');

    $bulan = date("m");
    $tahun = date("Y");

    $sql = mysql_query("SELECT * FROM konsul_time as a WHERE month(a.from) = $bulan and year(a.from) = $tahun");

    $resultSQL = [];
    while ($row=mysql_fetch_object($sql)) {
        $r = [
            'id'=>$row->id, 
            'from'=>$row->from, 
            'to'=>$row->to
        ];
        array_push($resultSQL, $r);
    }
    echo "<pre>";
    var_dump($resultSQL);
    echo "</pre>";
    // die();
    // month
    $dateObj   = DateTime::createFromFormat('!m', date("m"));
    $monthName = $dateObj->format('F') . " " .  date("Y");
    
?>
    <style>
        .available {
            background: #7acc5a
        }
    </style>
    <section id="blog" class="container">
        <div class="center">
            <h2>Konsultasi</h2>
            <p class="lead"></p>
        </div>

        <div class="blog">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <h4><?=$monthName?></h4>
                        <ul class="nav nav-tabs" role="tablist">
                            <?php foreach ($resultSQL as $key => $row): ?>
                            <li role="presentation">
                                <a href="#home" id="data-tab" aria-controls="home" role="tab" data-toggle="tab" data-tab="<?=$row['id']?>">
                                    <?=date("d", strtotime($row['from']))?> - <?=date("d", strtotime($row['to']))?>
                                </a>
                            </li>    
                            <?php endforeach ?>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="tabpanel">
                                <div style="width: 100%; text-align: center">
                                    <img src="images/loading.svg" style="margin: auto; border: 1px">
                                </div>
                            </div>
                        </div>

                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/#bottom-->
    <script>

        $(document).ready(function(){
            var id = $("#data-tab").attr("data-tab");
            GETSCHEDULE(id);
        });

        $(document).on('click', '#data-tab', function(){
            var id = $(this).attr("data-tab");
            GETSCHEDULE(id);
        })

        function GETSCHEDULE(id) {
            $.ajax({
                type: 'POST',
                url: "pages/kalender.php",
                data: {
                    id : id
                },
                success: function(data) {
                    $('#tabpanel').html(data);
                }
            });
        }
    </script>
<?php
    include 'footer.php';
?>