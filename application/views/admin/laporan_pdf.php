<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<style type="text/css">
		.table-data{
			width: 100%;
			border-collapse: collapse;
		}

		.table-data tr th,
		.table-data tr td{
			border:1px solid black;
			font-size: 10pt;
		}
	</style>

	<h3>Laporan Paket</h3>


	<table>
		<tr>
			<td>Dari Tgl</td>
			<td>:</td>
			<td><?php echo date('d/m/Y',strtotime($_GET['dari'])); ?></td>
		</tr>
		<tr>
			<td>Sampai Tgl</td>
			<td>:</td>
			<td><?php echo date('d/m/Y',strtotime($_GET['sampai'])); ?></td>
		</tr>
	</table>

	<br/>
	<table class="table-data">
		<thead>
			<tr>
				<th>No</th>
				<th>Tanggal</th>
				<th>Penerima Paket</th>
				<th>Nama Paket</th>
				<th>Kategori Paket</th>
				<th>Pengirim Paket</th>
				<th>Isi Paket Disita</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach($laporan as $l){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo date('d/m/Y',strtotime($l->tanggal_diterima)); ?></td>
				<td><?php echo $l->nama_santri; ?></td>
				<td><?php echo $l->nama_kategori; ?></td>
				<td><?php echo $l->pengirim_paket; ?></td>
				<td><?php echo $l->isi_paket_disita; ?></td>
				<td>
					<?php
					if($l->status_paket == "1"){
						echo "Selesai";
					}else{
						echo "-";
					}
					?>
				</td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>


</body>
</html>
