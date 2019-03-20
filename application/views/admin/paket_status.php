<div class="page-header">
	<h3>Data Paket</h3>
</div>

<a href="<?php echo base_url().'admin/paket_add'; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Paket Baru</a>
<br/><br/>
<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover" id="table-datatable">
	<thead>
		<tr>
  			<th>No</th>
  			<th>ID Paket</th>
  			<th>Nama Paket</th>
  			<th>Tanggal Diterima</th>
  			<th>Kategori Paket</th>
  			<th>Penerima Paket</th>
  			<th>Asrama</th>
  			<th>Pengirim Paket</th>
  			<th>Isi Paket Disita</th>
  			<th>Status Paket</th>
			  <th></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		foreach($paket as $p){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
        <td><?php echo $p->id_paket; ?></td>
        <td><?php echo $p->nama_paket; ?></td>
				<td><?php echo date('d/m/Y',strtotime($p->tanggal_diterima)); ?></td>
        <td><?php echo $p->kategori_paket; ?></td>
        <td><?php echo $p->nama_santri; ?></td>
        <td><?php echo $p->asrama; ?></td>
        <td><?php echo $p->pengirim_paket; ?></td>
        <td><?php echo $p->isi_paket_disita; ?></td>
        <td>
					<?php
					if($p->status_paket == "1"){
						echo "Diambil";
					}else{
						echo "Belum";
					}
					?>
				</td>
        <td>
					<?php
					if($p->status_paket == "1"){
						echo "-";
					}else{
						?>
						<a class="btn btn-sm btn-success" href="<?php echo base_url().'admin/paket_diambil/'.$p->id_paket; ?>"><span class="glyphicon glyphicon-ok"></span> Ambil</a>
						<br/>
						<a class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/paket_hapus/'.$p->id_paket; ?>"><span class="glyphicon glyphicon-remove"></span> Hapus</a>
						<?php
					}
					?>
				</td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
</div>
