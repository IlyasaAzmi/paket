<div class="page-header">
	<h3>Paket Diambil</h3>
</div>

<?php foreach($paket as $p){ ?>
<form action="<?php echo base_url().'admin/paket_diambil_act' ?>" method="post">
	<input type="hidden" name="id_paket" value="<?php echo $p->id_paket ?>">
	<input type="hidden" name="tanggal_diterima" value="<?php echo $p->tanggal_diterima ?>">
	<input type="hidden" name="nama_paket" value="<?php echo $p->nama_paket ?>">
	<input type="hidden" name="kategori_paket" value="<?php echo $p->kategori_paket ?>">
	<input type="hidden" name="penerima_paket" value="<?php echo $p->penerima_paket ?>">
	<input type="hidden" name="pengirim_paket" value="<?php echo $p->pengirim_paket ?>">
	<input type="hidden" name="isi_paket_disita" value="<?php echo $p->isi_paket_disita ?>">

  <div class="form-group">
		<label>ID Paket</label>
		<input class="form-control" type="text" name="id_paket" value="<?php echo $p->id_paket ?>" disabled>
	</div>

  <div class="form-group">
		<label>Tanggal Diterima</label>
		<input class="form-control" type="date" name="tanggal_diterima" value="<?php echo $p->tanggal_diterima ?>" disabled>
	</div>

  <div class="form-group">
		<label>Nama Paket</label>
		<input class="form-control" type="text" name="nama_paket" value="<?php echo $p->nama_paket ?>" disabled>
	</div>

	<div class="form-group">
		<label>Penerima Paket</label>
		<select class="form-control" name="kostumer" disabled>
			<option value="">-Pilih Santri-</option>
			<?php foreach($santri as $s){ ?>
			<option <?php if($p->penerima_paket == $s->nis){echo "selected='selected'";} ?> value="<?php echo $s->nis; ?>"><?php echo $s->nama_santri; ?></option>
			<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<label>Kategori</label>
		<select class="form-control" name="mobil" disabled>
			<option value="">-Pilih Kategori-</option>
			<?php foreach($kategori as $k){ ?>
			<option <?php if($p->kategori_paket == $k->id_kategori){echo "selected='selected'";} ?> value="<?php echo $k->id_kategori; ?>"><?php echo $k->nama_kategori; ?></option>
			<?php } ?>
		</select>
	</div>

  <div class="form-group">
		<label>Pengirim Paket</label>
		<input class="form-control" type="text" name="pengirim_paket" value="<?php echo $p->pengirim_paket ?>" disabled>
	</div>

  <div class="form-group">
		<label>Isi Paket Disita</label>
		<input class="form-control" type="text" name="isi_paket_disita" value="<?php echo $p->isi_paket_disita ?>" disabled>
	</div>

	<div class="form-group">
		<input type="submit" value="Konfirmasi Pengambilan" class="btn btn-primary btn-sm">
	</div>
</form>
<?php } ?>
