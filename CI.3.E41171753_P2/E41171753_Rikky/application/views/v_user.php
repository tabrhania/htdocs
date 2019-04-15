<!DOCTYPE html>
<html>
<head>
	<title>Menghubungkan codeigniter dengan database mysql</title>
</head>
<body>
	<h1>Mengenal Model Pada Codeigniter | MalasNgoding.com</h1>
	<table border="1">
		<tr>
			<th>Username</th>
			<th>Password</th>
		</tr>
		<?php foreach($tb_users as $u){ ?>
		<tr>
			<td><?php echo $u->username ?></td>
			<td><?php echo $u->user_password ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>