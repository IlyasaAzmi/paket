<!DOCTYPE html>
<html>
<head>
	<title>Data Kategori Paket</title>
</head>
<body>
	<center><h1>Data Kategori Paket</h1></center>
	<center><?php echo anchor('admin/kategori_add','Tambah Data Kategori'); ?></center>
	<table style="margin:20px auto;" border="1">
		<tr>
			<th>No</th>
			<th>ID Kategori</th>
			<th>Nama Kategori</th>
			<th>Action</th>
		</tr>
		<?php
		$no = 1;
		foreach($kategori as $k){
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $k->id_kategori ?></td>
			<td><?php echo $k->nama_kategori ?></td>
			<td>
			      <?php echo anchor('admin/kategori_edit/'.$k->id_kategori,'Edit'); ?>
            <?php echo anchor('admin/kategori_hapus/'.$k->id_kategori,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>
