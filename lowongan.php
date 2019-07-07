<?php
global $array;
	include 'header.php';
	if($array['status']==1){
		echo "<script>alert('Maaf Transaksi Anda Belum Di Approve, Mohon Tunggu Paling lama 1x24jam ')<script>";
		echo '<script>document.location.href=index.php</script>';
	}
?>
		<br>
		<div class="container">

			<table width="100%" >
				<tr>
					<td colspan="6">
					<font  style="color: #e77817;" size="5"><strong><i class="fa fa-envelope"></i>LOWONGAN KERJA</strong></font></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr width=10%>
				<form action="" method="POST">
					<td>
					<input placeholder="Nama Perusahaan / Nama Pekerjaan"   type="text" name="cari" class="form-control"  <?php if(isset($_POST['cari'])){echo "value='$_POST[cari]'";}?>>
					</td>
				</tr>
				<tr>
					<td colspan="3" align="center"><button style="margin-top: 20px;" class="btn btn-info btn-md">Cari</button></td>
				</tr>
				</form>
			<tr>
				<td colspan="3"></td>
			</tr>
			<?php
			if(isset($_POST['cari'])){
				$bagi_kata=explode(" ",$_POST['cari']);
				$hitung_kata=count($bagi_kata);
				if($hitung_kata==1){
					$cari="WHERE judul like lower('%$_POST[cari]%') OR nama like lower('%$_POST[cari]%')";
				}else{
					$i=0;
					$cari="WHERE ";
					for($z=$hitung_kata;$i<$hitung_kata;$i++){
						if($i==$hitung_kata-1){
							$or="";
						}else{
							$or="OR ";	
						}
						$cari.="(judul like lower('%$bagi_kata[$i]%') OR nama like lower('%$bagi_kata[$i]%')) $or";
					}
				}
			}else{
				$cari="";
			}
			$sql="SELECT * FROM lowongan a inner join user b on a.id_comp=b.id_user $cari";
			// echo $sql;
			$res=mysql_query($sql);
			while($arr=mysql_fetch_array($res)){
			?>
			<tr>
				<td colspan="7">
				<div style="background-color: #ffedce;border-color: black;width: 100%;height: 100%;margin-top: 7px;">
				<table  width="95%" align="center" class="table table-responsive table-hover">
					<tr>
					<table width="100%"  >
					<tr>
						<td colspan="10" style="padding-left: 10px;">
						<font  style="color: #e77817;" size="3"><strong><?=strtoupper($arr['nama'])?></strong></font><br>
						<font size="2"><?=strtoupper($arr['judul'])?></font></td>
					</tr>
					<tr>
						<td width="20%" align="center" ><img class="img img-circle" src="admin/user/<?=$arr['foto']?>" style="width:120px;height: 120px"></td>
						<td style="padding-left: 1%;"><font  style="color: #011982;" size="5"><strong><a  data-toggle="modal" data-target="#myModal1<?=$arr['id_lowongan']?>" href='#'><?=strtoupper($arr['judul'])?></a></strong></font><br>
						<br>
						<?php
					    $sbtr=substr("$arr[deskripsi]",0,200);
					    echo $sbtr."......";
						?>
						</td>

					</tr>
					</table>
					</div>
					<br>
	<!--MODAL-->				
	<div class="modal fade" id="myModal1<?=$arr['id_lowongan']?>" role="dialog">
    <div class="modal-dialog " style="width: 90%">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?=strtoupper($arr['judul'])?></h4>
        </div>
        <div class="modal-body" style="background-color:#fcdca9;">
        <table  width="100%">
        <tr>
						<td width="20%" align="center"><img class="img img-circle" src="admin/user/<?=$arr['foto']?>" style="width:120px;height: 120px"></td>
						<td style="padding-left: 1%;"><font  style="color: #011982;" size="5"><strong><?=strtoupper($arr['nama'])?></strong></font><br><?="Post Time :".$arr['tanggal']."||".$arr['jam']?><br>
						<a href="http://<?=$arr['website']?>" target="blank"><?=$arr['website']?></a>
		  				
						<br>
						<?=$arr['deskripsi']?>
						</td>
					</tr>
					<tr>
						<td colspan="2">
						<br>
								<div class="container">
		<!-- 	<ul class="nav nav-tabs" >
  					<li style="width:50%;" class="active"><a href="#home" data-toggle="tab">Full Time</a></li> 
  					<li style="width:45%;"><a href="#profile" data-toggle="tab">Partime</a></li>
			</ul> -->
<!-- Tab panes, ini content dari tab di atas -->
			<div class="tab-content">
		  		<div style="background-color: white;width: 100%;border-color: black;padding-left: 2%;padding-right: 2%;padding-top: 1%;padding-bottom: 1%;">
		  				<?=$arr['isi']?>
		  			<?php
		  				if(isset($_SESSION['id'])){
		  				$sql3="SELECT * FROM tbl_lamar where id_user='$_SESSION[id]' AND id_lowongan='$arr[id_lowongan]'";
		  				$res3=mysql_query($sql3);
		  				if(mysql_num_rows($res3)>0){
		  					$disable="class='btn btn-md btn-disable' disabled";
		  				}else{
		  					$disable="class='btn btn-md btn-info'";
		  				}	
		  			?>

		  			

		  			<form action="modul/simpan.php?mode=simpan_lowongan" method="POST">
		  			<input type="hidden" name="id_lowongan" value="<?=$arr['id_lowongan']?>">
		  			<!-- <a href="modul/simpan.php?mode=simpan_lowongan&id=<?=$arr['id_lowongan']?>"> -->
		  			<button type="submit"   <?=$disable?>>Apply</button>	
		  			<!-- </a> -->
		  			</form>

		  			<?php }else{?>

		  			<a onclick="alert('Login Dulu Jika Ingin Apply')"  href="login.php?mode=regist"><button class="btn btn-md btn-info">Apply</button></a>
		  			<?php } ?>
		  		</div>
				</div>
			</div>

						</td>
					</tr>
        </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!--END MODAL-->
					<?php } ?>
					<br>
					</tr>
				</table>
				</td>
			</tr>

			</table>
		</div>
  
<?php
	include 'footer.php';
?>