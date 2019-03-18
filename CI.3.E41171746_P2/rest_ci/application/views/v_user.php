<!DOCTYPE html>
<html>
<head>
	<title>Menghubungkan codeigniter dengan database mysql</title>
</head>
<body>
	<h1>Mengenal Model Pada Codeigniter | MalasNgoding.com</h1>
	<table border="1">
		<tr>
			<th>Nama</th>
			<th>NIM</th>
			<th>Alamat</th>
		</tr>
		<?php foreach($user as $u){ ?>
		<tr>
			<td><?php echo $u->Nama_mahasiswa ?></td>
			<td><?php echo $u->NIM ?></td>
			<td><?php echo $u->Alamat ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>