<?php
	include 'header.php';
	
?>
<div id="badan">
	
</div>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Konseling</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Konseling</h1>
			</div>
		</div><!--/.row-->

		<div class="row" >
			<div class="col-lg-12">
				<div class="panel panel-default articles">
					<div class="panel-heading">
					<?php
						switch (isset($_GET['a'])) {
							case 'form':
								 	echo form();
								break;
							default:
									echo lihat();
								break;
						}
					?>
						</div><!--End .article-->
					</div>
				</div>
			</div>



<?php
	function lihat(){
?>
						<a href="?a=form">
							<button class="btn btn-md btn-primary" id="tambah">
								New Schedule
							</button>
						</a>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
						</div>
					<div class="panel-body articles-container">
					<?php
					$sql="select id_konsul,tanggal,judul,keterangan,nama_ruangan,detail,kapasitas from  konsul a inner join tbl_ruangan b on a.ruangan=b.id_ruangan";
					$res=mysql_query($sql);
					while($row=mysql_fetch_array($res)){
					$tgl=explode('-',$row['tanggal']);
					$bulan=array('01'=>'Jan','02'=>'Feb','03'=>'Mar','04'=>'Apr','05'=>'Mei','06'=>'Jun','07'=>'Jul','08'=>'Agust','09'=>'Sept','10'=>'Okt','11'=>'Nov','12'=>'Des');
					?>
						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-2 date">
										<div class="large"><?=$tgl[2]?></div>
										<div class="text-muted"><?=$bulan[$tgl[1]]?></div>
									</div>
									<div class="col-xs-10 col-md-10">
										<h4><a href="#"><?=$row['judul']?></a></h4>
										<p>
											<?=$row['keterangan']?>
										</p>
										<strong>Alamat : </strong><?=$row['nama_ruangan']."(".$row['detail'].")"?>
										</br>
										<strong>Kapasitas : </strong><?=$row['kapasitas']." dari ".$row['kapasitas'];?>
										<br>
										<a href="modul/hapus.php?mode=hapus_konsul&id=<?=$row['id_konsul']?>">
											<button class="btn btn-xs btn-danger">Hapus</button>
										</a>
										<a href="?a=kmzway87aa&id=<?=$row['id_konsul']?>&kode=wkwkw?>">
											<button class="btn btn-xs btn-success">Edit</button>
										</a>
										<a onclick="window.open('booking.php?id=<?=$row['id_konsul']?>','aa','width=800,height=500')">
											<button class="btn btn-xs btn-info">Lihat Booking</button>
										</a>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div>


						<!--End .article-->

							<!--Disini-->
<?php 
		}
		echo "</div>";
	} 
	function form(){

?>			
						Form Jadwal Konsul
						<span class="pull-right ">
							
						</span>
						</div>
						<?php
						if (isset($_GET['kode'])) {
						$sql="select id_konsul,tanggal,jam,judul,keterangan,nama_ruangan,detail,a.kapasitas,a.ruangan from  konsul a inner join tbl_ruangan b on a.ruangan=b.id_ruangan where id_konsul='$_GET[id]'";
						$res=mysql_query($sql);
						$row=mysql_fetch_array($res);
						$tanggal=explode('-',$row['tanggal']);
						$tgl=$tanggal[2]."-".$tanggal[1]."-".$tanggal[0];
						$keterangan=trim($row['keterangan']);
							echo "<form method=\"POST\" action=\"modul/update.php?mode=update_konsul&id=$_GET[id]\">";	
						}else{
							echo "<form method=\"POST\" action=\"modul/simpan.php?mode=simpan_konsul\">";
						}
						?>
						<div class="panel-body articles-container">
						<div class="article border-bottom">
							<table width=100%>
								<tr>
									<td width=10%>Judul</td>
									<td>:</td>
									<td><input type="text" style="background-color: #d6e5ff" name="judul" class="form-control" value="<?php if(isset($_GET['kode'])){ echo "$row[judul]"; } ?>">&nbsp;</td>
								</tr>
								<tr>
									<td>Keterangan</td>
									<td>:</td>
									<td><textarea name="keterangan" style="background-color: #d6e5ff" class="form-control" required><?php if(isset($_GET['kode'])){ echo "$row[keterangan]"; } ?></textarea>
									&nbsp;
									</td>
								</tr>
								<tr>
									<td>Tanggal</td>
									<td>:</td>
									<td><div class="form-inline"><input type="text" id="datetimepicker1" name="tanggal" value="<?php if(isset($_GET['kode'])){ echo $tgl; }else{echo date('d-m-Y'); } ?>"
									 style="background-color: #d6e5ff;width:200px" class="form-control" readonly>&nbsp;&nbsp;
									<input <?php if(isset($_GET['kode'])){ echo "value='$row[jam]'"; } ?> type='time' id="datetimepicker1" name="jam" style="background-color: #d6e5ff;width:200px"  class="form-control">;</div>&nbsp;</td>
								</tr>
								<tr>
									<td>Ruangan</td>
									<td>:</td>
									<td>
										<Select style="background-color: #d6e5ff;width:200px" class="form-control" name="ruangan" required>
											<?php
											 
												$query="Select * from tbl_ruangan where nama_ruangan<>''";
												$res=mysql_query($query);
												while($arr = mysql_fetch_array($res)){
											?>
													<option value="<?=$arr['id_ruangan']?>" <?php if(isset($_GET['kode'])){if($arr['id_ruangan']==$row['ruangan']){echo "selected";} }?>><?=$arr['nama_ruangan']?></option>
													
											<?php
												}

											?>
										</select>&nbsp;
									</td>
								</tr>
								<tr>
									<td width=10%>Kapasitas</td>
									<td>:</td>
									<td><input type="number" style="background-color: #d6e5ff" name="kapasitas" class="form-control" value="<?php if(isset($_GET['kode'])){ echo "$row[kapasitas]"; } ?>">&nbsp;</td>
								</tr>
							</table>
						</div>
						<button class="btn btn-md btn-success" type="submit"><?php if(isset($_GET['kode'])){ echo "Update Jadwal"; }else{ echo "Simpan Jadwal";} ?></button>
						</form>		
					</div>
<script>
  $( function() {
    $( "#datetimepicker1" ).datepicker({
        format: "dd-mm-yyyy",
        autoclose:true
    });

  } );
  </script>
<?php
}
?>

</body>
</html>