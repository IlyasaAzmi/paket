<!DOCTYPE html>
<html>
<head>
	<title>Data Role</title>
</head>
<body>
	<center><h1>Data Role</h1></center>
	<center><?php echo anchor('admin/role_add','Tambah Data Role'); ?></center>
	<table style="margin:20px auto;" border="1">
		<tr>
			<th>No</th>
			<th>ID Role</th>
			<th>Nama Role</th>
			<th>Menu</th>
			<th>Action</th>
		</tr>
		<?php
		$no = 1;
		foreach($role as $r){
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $r->id_role ?></td>
			<td><?php echo $r->nama_role ?></td>
			<td><?php echo $r->menu ?></td>
			<td>
			      <?php echo anchor('admin/role_edit/'.$r->id_role,'Edit'); ?>
            <?php echo anchor('admin/role_hapus/'.$r->id_role,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>
