<div class="page-header">
	<h3>Data Asrama</h3>
</div>

<a href="<?php echo base_url().'admin/asrama_add'; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Asrama Baru</a>
<br/><br/>
<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover" id="table-datatable">
	<thead>
		<tr>
			<th>No</th>
			<th>ID Asrama</th>
			<th>Nama Asrama</th>
			<th>Gedung</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		foreach($asrama as $a){
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $a->id_asrama ?></td>
			<td><?php echo $a->nama_asrama ?></td>
			<td><?php echo $a->gedung ?></td>

			<td>
					<a class="btn btn-primary btn-sm" href="<?php echo base_url().'admin/asrama_detail/'.$a->id_asrama; ?>"><span class="glyphicon glyphicon-search"></span> Detail</a>
					<a class="btn btn-warning btn-sm" href="<?php echo base_url().'admin/asrama_edit/'.$a->id_asrama ?>"><span class="glyphicon glyphicon-plus"></span> Edit</a>
					<a class="btn btn-danger btn-sm" href="<?php echo base_url().'admin/asrama_hapus/'.$a->id_asrama; ?>"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
	</table>
</div>
