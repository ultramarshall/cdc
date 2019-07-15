<?php 
include 'header.php';
?>
	<div class="container">
		<table width="100%" >
			<tr>
				<td ><h2><font color="orange">Profil Anda</font></h2></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td>
				<table  width="70%"  class="table table-resposive tabel-hover">
					<?php
					$sql="Select * from user where id_user='$id'";
					$res=mysql_query($sql);
					$arr=mysql_fetch_array($res);
					?>
					<tr>
						<td colspan="3">
							<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZ6hz-n7NfgHufUzvz9-lGcRUxuZoi1jmXPmUx89DuTRwPHaC8" alt="">
						</td>
					</tr>
					<tr>
							<td width="120px">Nama Lengkap</td>
							<td width="1px">:</td>
							<td><?=$arr['nama']?></td>
					</tr>
					<tr>
							<td width="120px">NIK</td>
							<td width="1px">:</td>
							<td><?=$arr['nik']?></td>	
					</tr>
					<tr>
							<td width="120px">Email</td>
							<td width="1px">:</td>
							<td><?=$arr['email']?></td>	
					</tr>
					<tr>
							<td width="120px">Telepon</td>
							<td width="1px">:</td>
							<td><?=$arr['telepon']?></td>	
					</tr>
					<tr>
							<td width="120px">TTL</td>
							<td width="1px">:</td>
							<td><?=$arr['tempat_lahir'].",".$arr['tgl_lahir']?></td>	
					</tr>
					<tr>
							<td width="120px">Alamat</td>
							<td width="1px">:</td>
							<td><?=$arr['alamat']?></td>	
					</tr>
					<tr>
							<td width="120px">History Apply</td>
							<td width="1px">:</td>
							<td><?php
							$sql1="SELECT count(*) as banyak from tbl_lamar where id_user='$_SESSION[id]'";
							$res1=mysql_query($sql1);
							$arr1=mysql_fetch_array($res1);
							echo $arr1['banyak'];
							?></td>	
					</tr>
					<tr>
							<td width="120px">Upload Cv</td>
							<td width="1px">:</td>
					<form method="post" enctype="multipart/form-data" action="modul/simpan.php?mode=simpan_cv">		
					<?php
							$sql2="SELECT *  from tbl_cv where id_user='$_SESSION[id]'";
							$res2=mysql_query($sql2);
							$arr2=mysql_fetch_array($res2);
							$link=fopen("tes.txt","r");
							
					?>
							<td><?php if(mysql_num_rows($res2)>0){echo "<a href='data/$arr2[file]'>$arr2[file]</a>"."<br>";} ?><input type="file" class="form-control" value="AAA" name="file"></td>	
					</tr>
					<tr>
					<td colspan="4"><input class="btn btn-primary btn-sm" type="submit" name="save" value="Simpan Cv"></td>
					</tr>
					</form>
				</table>
			</tr>
			
		</table>
	</div>
<?php 
include 'footer.php';
?>