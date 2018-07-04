<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
<script
    src="https://code.jquery.com/jquery-2.2.4.js">
</script>	
<script>
function add(){
	var a = $("#nama").val();
	var b = $("#alamat").val();
	var c = $("#telp").val();
	var x = $("#nik").val();

	$.ajax({
		type: 'post',
		url: '<?php echo base_url('home/insert'); ?>',
		data : $('#crud').serialize(),
		dataType : 'application/json',
		success : function(data) {
			//$("#notif").html(data);
			alert('Data berhasil disimpan');
			window.location.reload();
		},
		error : function(err) {
			
			alert('Ada yang salah');
		}
	});
	
}
</script>
</head>
<body>
<a href="<?php echo base_url('home'); ?>">Master Karyawan</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url('login/logout'); ?>">Logout</a>
<div id="container">
	<h1>Master Data Karyawan</h1>

	<div id="body">
	<p>
	<form method="post" id="crud" action="<?php echo base_url(); ?>home/insert">
		<table border='0'>
			<tr>
				<td>NIK</td>
				<td><input type="text" name="nik" id="nik"></td>
			</tr>
			<tr>
				<td>Nama Karyawan</td>
				<td><input type="text" name="nama" id="nama"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><textarea name="alamat" rows="5" cols="30"></textarea></td>
			</tr>
			<tr>
				<td>No. Telepon</td>
				<td><input type="text" name="telp"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<p id="notif"></p>
			<tr>
				<td><input type="submit" name="simpan" value="Simpan"></td>
			</tr>
		</table>
		</form>
		</br></br></br>
		<?php
		$x = 0;
		//$y = 100;
		for($x=1; $x >= 100; $x++):
			echo 'lampu';
		endfor
		?>
		<table border="1" width="100%">
			<tr>
				<td align="center"><b>No.</b></td>
				<td align="center"><b>NIK</b></td>
				<td align="center"><b>Nama Karyawan</b></td>
				<td align="center"><b>Alamat</b></td>
				<td align="center"><b>No. Telepon</b></td>
				<td align="center" colspan="2"><b>Aksi</b></td>
			</tr>
		
		<?php	
		$i = 1;
		foreach($query->result() as $row) {
		?>	
			<tr>
			<td align="center"><?php echo $i++; ?></td>
			<td><?php echo $row->nik; ?></td>
			<td><?php echo $row->nama_karyawan; ?></td>
			<td><?php echo $row->alamat; ?></td>
			<td><?php echo $row->telepon; ?></td>
			<td align="center"><a href="<?php echo base_url(); ?>home/edit/<?php echo $row->id; ?>">Edit</a>
			| <a href="<?php echo base_url(); ?>home/remove/<?php echo $row->id; ?>">Hapus</a></td>
			</tr>
		<?php } ?>
		</table>
	</p>
	</div>
	<p>
	
	</p>
	<p class="footer"></p>
</div>

</body>
</html>