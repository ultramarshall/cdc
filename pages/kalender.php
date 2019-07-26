<?php 
date_default_timezone_set('Asia/Jakarta');

$server = "localhost";
$username = "root";
$password = "12345678";
$database = "cdc-iti_terbaru";

$con=mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");

$sql = mysql_query("SELECT *, datediff(a.to, a.from) as jumlah_hari FROM konsul_time as a WHERE id = $_POST[id] ");
/*echo "<pre>";
var_dump(mysql_fetch_object($sql));
echo "</pre>";*/
$result = mysql_fetch_object($sql);


function hari($value)
{
    $hari = array ( 1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );

    return $hari[$value];
}
?>


<table class="table table-bordered" style="background: #fff">
   <tbody>
        <tr style="background: orange">
            <td class="text-center" style="text-align: center; font-weight: bold">
                <p>Jam</p>
                <p>(WIB)</p>
            </td>
            <?php for ($i=0;$i<(int)$result->jumlah_hari;$i++): ?>
                
            <td style="text-align: center; font-weight: bold">
                <p>
                    <?php 
                    $num = date('N', strtotime(date('d-m-Y',strtotime(str_replace('-', '/', $result->from) . "+$i days")))); 
                    echo hari($num);
                    ?>        
                </p>
                <p>(<?= date('d',strtotime(str_replace('-', '/', $result->from) . "+$i days")) ?>)</p>
            </td>
            <?php endfor ?>
        </tr>
        <tr>
            <td class="text-center">
                <p>09.00</p>
            </td>
            <!-- <td class="text-center available">
                <button class="btn btn-xs btn-default" style="margin-top: 15px">
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
            </td> -->

            <?php for ($i=0;$i<(int)$result->jumlah_hari;$i++): ?>
            <td class="text-center booked">
                <p><i class="icon-coffee icon-3x"></i></p>
            </td>
            <?php endfor ?>
        </tr>

   </tbody>
</table>