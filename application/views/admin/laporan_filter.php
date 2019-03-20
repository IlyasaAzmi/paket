<div class="page-header">
	<h3>Laporan Data Paket</h3>
</div>

<form method="post" action="<?php echo base_url().'admin/laporan' ?>">
	<div class="form-group">
		<label>Dari Tanggal</label>
		<input type="date" name="dari" value="<?php echo set_value('dari'); ?>" class="form-control">
		<?php echo form_error('dari'); ?>
	</div>
	<div class="form-group">
		<label>Sampai Tanggal</label>
		<input type="date" name="sampai" value="<?php echo set_value('sampai'); ?>" class="form-control">
		<?php echo form_error('sampai'); ?>
	</div>
	<div class="form-group">
		<input type="submit" value="CARI" name="cari" class="btn btn-sm btn-primary">
	</div>
</form>

<div class="btn-group">
	<!-- <a class="btn btn-warning btn-sm" href="<?php echo base_url().'admin/laporan_pdf/?dari='.set_value('dari').'&sampai='.set_value('sampai') ?>"><span class="glyphicon glyphicon-print"></span> Cetak PDF</a> -->
	<a class="btn btn-default btn-sm" href="<?php echo base_url().'admin/laporan_print/?dari='.set_value('dari').'&sampai='.set_value('sampai') ?>"><span class="glyphicon glyphicon-print"></span> Print</a>
</div>
<br/>
<br/>
<div class="table-responsive">
<table border="1" class="table table-striped table-hover table-bordered" id="table-datatable">
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Penerima Paket</th>
			<th>Nama Paket</th>
			<th>Kategori Paket</th>
			<th>Pengirim</th>
			<th>Status Paket</th>
			<th>Isi Paket Disita</th>
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
				<td><?php echo $l->nama_paket; ?></td>
				<td><?php echo $l->nama_santri; ?></td>
				<td><?php echo $l->nama_kategori; ?></td>
				<td><?php echo $l->pengirim_paket; ?></td>
				<td><?php echo $l->status_paket; ?></td>
				<td><?php echo $l->isi_paket_disita; ?></td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
</div>
