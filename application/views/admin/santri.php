	<div class="page-header">
		<h3>Data Santri</h3>
	</div>

	<a href="<?php echo base_url().'admin/santri_add'; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Santri Baru</a>
	<br/><br/>
	<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover" id="table-datatable">
		<thead>
			<tr>
				<th>No</th>
				<th>NIS</th>
				<th>Nama Santri</th>
				<th>Alamat</th>
				<th>Asrama</th>
				<th>Total Paket</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach($santri as $s){
			?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $s->nis ?></td>
				<td><?php echo $s->nama_santri ?></td>
				<td><?php echo $s->alamat ?></td>
				<td><?php echo $s->nama_asrama ?></td>
				<td><?php echo $s->total_paket_diterima ?></td>
				<td>
						<a class="btn btn-primary btn-sm" href="<?php echo base_url().'admin/santri_detail/'.$s->nis; ?>"><span class="glyphicon glyphicon-search"></span> Detail</a>
						<a class="btn btn-warning btn-sm" href="<?php echo base_url().'admin/santri_edit/'.$s->nis; ?>"><span class="glyphicon glyphicon-plus"></span> Edit</a>
						<a class="btn btn-danger btn-sm" href="<?php echo base_url().'admin/santri_hapus/'.$s->nis; ?>"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
		</table>
	</div>
