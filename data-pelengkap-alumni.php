<?php if(isset($_POST['nama'])){echo $_POST['nama'];}?>
<div class="container" style="width: 100%;" >
<center><h2><b>Data Tambahan Alumni</b></h2></center>
<div align ="center">
<table  class="table table-resposive" style="overflow-x: scroll;overflow-y: auto;">
<form action="" enctype="multipart/form-data" method="post">
	<tr>
		<td align="center">Nama Lengkap</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="text" style="background-color: #fbb045" name="nama" class="form-control" width="100%"></td>
	</tr>
	<tr>
		<td align="center">NIK</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="text" style="background-color: #fbb045" name="id" class="form-control" width="100%"></td>
	</tr>
	<tr>
		<td align="center">Tempat Lahir</td>
		<td width="2%">:</td>
		<td width="55%"><input type="text" style="background-color: #fbb045;" name="tempat" class="form-control" ></td>
		<td width="45%">
		<input type="text" style="background-color: #fbb045" id="datetimepicker1" name="tanggal" class="form-control" width="100%" readonly>
		</td>
	</tr>
	<tr>
		<td align="center">Alamat</td>
		<td width="2%">:</td>
		<td colspan="2"><textarea style="background-color: #fbb045" name="alamat" class="form-control" width="100%"></textarea></td>
	</tr>
	<tr>
		<td align="center">Email</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="email" style="background-color: #fbb045" name="email" class="form-control" width="100%"></td>
	</tr>
	<tr>
		<td align="center">telp</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="text" style="background-color: #fbb045" name="tlp" class="form-control" width="100%"><input type="hidden" style="background-color: #fbb045" name="jenis" value="Pelamar" class="form-control" width="100%"></td>
	</tr>
	<tr>
		<td align="center">Pas Foto</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="file" style="background-color: #fbb045" name="foto"  width="100%"></td>
	</tr>
	<tr>
		<td align="center">Username</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="text" style="background-color: #fbb045" name="username" class="form-control" width="100%"></td>
	</tr>
	<tr>
		<td align="center">Password</td>
		<td width="2%">:</td>
		<td colspan="2"><input type="Password" style="background-color: #fbb045" name="password" class="form-control" width="100%"></td>
	</tr>
	<tr>
		<td align="center"><button style="background-color: #ff8400"  class="btn btn-md btn-sm btn-primary" name="submit"  id="oke" type="submit">Daftar</button></td>
		<td></td>
	</tr>
	</form>
</table>
</div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>

<script>
function close(){
    $(document).ready(function(){
        // ("#oke").click(function(){
        // $("#myModal").modal('hidden');
        alert('aaa');
          // $(".modal-body").load("data-pelengkap-alumni.php")
        // })
    });
 }
</script>