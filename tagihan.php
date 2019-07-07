<h3>Anak Yang Anda Daftarkan</h3>
<table border="1">
	<thead>
		<th>No</th>
		<th>Nama</th>
		<th>Nama Orang Tua</th>
		<th>Tagihan</th>
		<th>Nama Kelas</th>
	</thead>
	<tbody>
		<?php
			include 'koneksi.php';
			$sql="SELECT * FROM anggota a  where user=$_GET[id]";
			$res=mysqli_query($con,$sql);
			$no=1;
			while($arr=mysqli_fetch_array($res)){
			$bayar=1000000+$arr['id'];
		?>
			<tr>
				<td><?=$no?></td>
				<td><?=$arr['nama']?></td>
				<td><?=$arr['nama_orangtua']?></td>
				<td>Rp.<?=$bayar?></td>
				<td><?=$arr['id_kelas']?></td>
			</tr>
		<?php
		$no++;
			}
		?>
	</tbody>
</table>
<br>
<font color="black">
	<h2>PENDAFTARAN MURID BARU <br>TH,PAUD DTA/TPQ AL-HANIN
	</h2><br><h3>Tahun Ajaran 2017/2018</h3>
</font>
<table width="100%">
	<thead>
		<th></th>
	</thead>
	<tr>
		<td></td>
	</tr>
</table>

	<h4>Transfer ke:</h4>
	1.897986777 Atas Nama "Al-Hanin Playgroup" (BCA).<br>
	2.1261287129 Atas Nama "Al-Hanin Playgroup" (BNI).