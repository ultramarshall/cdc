<?php
	include 'header.php';
?>
		<br>
		<div class="container">

			<table width="100%" >
				<tr>
					<td colspan="6"><font  style="color: #e77817;" size="5"><strong><i class="fa fa-phone"></i>PANGGILAN TEST</strong></font></td>
				</tr>
				<tr>
				<form action="" method="POST">
					<td style="width:20px;">Search</td>
					<td><input type="text" class="form-control" name="kata" style="border-color: orange" placeholder="Masukan Nama Perusahaan / Jenis Pekerjaan" ></td>
				</tr>
				<tr>
					<td colspan="3" align="center"><button type="submit" style="margin-top: 20px;" class="btn btn-info btn-md" name="submit">Cari</button></td>
				</form>
				</tr>
			<tr>
				<td colspan="3"></td>
			</tr>
			<tr>
				<td colspan="7">
			<?php
			if(isset($_POST['kata'])){
				$kata=$_POST['kata'];
				$sql_tambahan="AND (a.judul like lower('%$kata%') or deskripsi like ('%$kata%'))";
			}else{
				$sql_tambahan="";
			}
			$no=1;
			 $query="Select c.id_lowongan,judul,isi,a.tanggal,a.jam,deskripsi,provinsi,a.jenis,b.nama,foto,b.website from lowongan a inner join user b on a.id_comp=b.id_user inner join tbl_lamar c on a.id_lowongan=c.id_lowongan where c.id_user='$id' AND c.panggilan = 1  $sql_tambahan";
			 // echo $query;
			 $res=mysql_query($query);
			 while($row=mysql_fetch_array($res)){			
			 	
			 $mod=$no%2;
			 if($mod==0){
			 	$bgColor="#ffedce";
			 }else{
			 	$bgColor="#f7c079";
			 }
			?>	
				<div style="background-color: <?=$bgColor?>;border-color: black;width: 100%;height: 100%;margin-top: 7px;">
				<table  width="95%" align="center" class="table table-responsive table-hover">
					<tr>
					<table width="100%"  >
					<tr>
						<td colspan="10" style="padding-left: 10px;">
						
						<font  style="color: #a35c00;" size="3"><strong><?=strtoupper($row['nama'])?></strong></font><br>
						<font size="2"><?=strtoupper($row['provinsi'])?></font></td>
					</tr>
					<tr>
						<td width="20%" align="center" ><img class="img img-circle" src="admin/user/<?=$row['foto']?>" style="width:120px;height: 120px"></td>
						<td style="padding-left: 1%;"><font  style="color: #011982;" size="5"><strong><a  data-toggle="modal" data-target="#myModal1<?=$row['id_lowongan']?>" href='#'><?=strtoupper($row['judul'])?></a></strong></font><br>
						<br>
						<?php
					    $sbtr=substr($row['deskripsi'],0,200);
					    echo $sbtr."......";
						?>
						</td>

					</tr>
					</table>
					</br>
					</div>


<div class="modal fade" id="myModal1<?=$row['id_lowongan']?>" role="dialog">
    <div class="modal-dialog " style="width: 90%">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?=strtoupper($row['judul'])?></h4>
        </div>
        <div class="modal-body" style="background-color:#fcdca9;">
        <table  width="100%">
        <tr>
						<td width="20%" align="center"><img class="img img-circle" src="admin/user/<?=$row['foto']?>" style="width:120px;height: 120px"></td>
						<td style="padding-left: 1%;"><font  style="color: #011982;" size="5"><strong><?=strtoupper($row['nama'])?></strong></font><br><?="Post Time :".$row['tanggal']."||".$row['jam']?><br>
						<a href="http://<?=$row['website']?>" target="blank"><?=$row['website']?></a>
		  				
						<br>
						<?=$row['deskripsi']?>
						<br>
						<p style="margin: 0">asd</p>
						<style>
							.table-border {
								border-color: red;
							}
						</style>
						</td>
					</tr>
					<tr>
						<td colspan="2">
						<br>
								<div class="container">

			<div class="tab-content">
		  		<div style="background-color: white;width: 100%;border-color: black;padding-left: 2%;padding-right: 2%;padding-top: 1%;padding-bottom: 1%;">
		  				<?=$row['isi']?>
		  			<?php
		  				if(isset($_SESSION['id'])){
		  				$sql3="SELECT * FROM tbl_lamar  where id_lowongan='$row[id_lowongan]' AND panggilan<>'0'";
		  				// echo $sql3;
		  				$res3=mysql_query($sql3);
		  				$arr1=mysql_fetch_array($res3);
		  				if(mysql_num_rows($res3)>0){
		  					$disable="class='btn btn-md btn-success' ";
		  					$kata="Daftar Peserta";
		  					// $target="data/".$row['file'];
		  				}else{
		  					$disable="class='btn btn-md btn-disable' disabled";
		  					$kata="Pengumuman Belum Dimasukan Oleh Perusahaan";
		  					// $target="";
		  				}	
		  			?>

		  			<!-- <form action="modul/simpan.php?mode=simpan_lowongan" method="POST"> -->
		  			<input type="hidden" name="id_lowongan" value="<?=$arr['id_lowongan']?>">
		  			
		  			<a <?php if(mysql_num_rows($res3)>0){ ?> href="panggilan_detail.php?id=<?=$row['id_lowongan']?>&judul=<?=$row['judul']?>"  target="_blank" <?php } ?>>
		  				<button  style="width: 100%"<?=$disable?>><?=$kata?></button>
		  				
		  			</a>	
		  			<!-- </form> -->
		  			<?php }else{?>

		  			<a onclick="alert('Login Dulu Jika Ingin Apply')" href="login.php"><button class="btn btn-md btn-info">Apply</button></a>
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



				<?php 
				$no++;
				}
				?>

					<!--GAMBAR 2-->
					</br>		

					<!--END-->
					</tr>
				</table>
				</td>
			</tr>

			</table>
		</div>
  
<?php
	include 'footer.php';
?>