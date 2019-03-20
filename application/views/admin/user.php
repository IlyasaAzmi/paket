<!DOCTYPE html>
<html>
<head>
	<title>Data User</title>
</head>
<body>
	<center><h1>Data User</h1></center>
	<center><?php echo anchor('admin/user_add','Tambah Data User'); ?></center>
	<table style="margin:20px auto;" border="1">
		<tr>
			<th>No</th>
			<th>ID User</th>
			<th>Nama User</th>
			<th>Username</th>
			<th>Role</th>
			<th>Action</th>
		</tr>
		<?php
		$no = 1;
		foreach($user as $u){
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $u->id_user ?></td>
			<td><?php echo $u->nama_user ?></td>
			<td><?php echo $u->username ?></td>
			<td><?php echo $u->role ?></td>
			<td>
			      <?php echo anchor('admin/user_edit/'.$u->id_user,'Edit'); ?>
          	<?php echo anchor('admin/user_hapus/'.$u->id_user,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>
