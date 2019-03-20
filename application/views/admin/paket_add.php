<div class="page-header">
	<h3>Paket Baru</h3>
</div>

<form action="<?php echo base_url().'admin/paket_add_act' ?>" method="post">
  <div class="form-group">
		<label>Nama Paket</label>
		<input type="text" name="nama_paket" class="form-control">
		<?php echo form_error('nama_paket'); ?>
	</div>

  <div class="form-group">
		<label>Kategori Paket</label>
		<select name="kategori_paket" class="form-control">
			<option value="">-Pilih Kategori-</option>
			<?php foreach($kategori as $k){ ?>
			<option value="<?php echo $k->id_kategori; ?>"><?php echo $k->nama_kategori; ?></option>
			<?php } ?>
		</select>
		<?php echo form_error('kategori_paket'); ?>
	</div>

	<div class="form-group">
		<label>Penerima Paket</label>
		<select name="penerima_paket" class="form-control">
			<option value="">-Pilih Santri-</option>
			<?php foreach($santri as $s){ ?>
			<option value="<?php echo $s->nis; ?>"><?php echo $s->nama_santri; ?></option>
			<?php } ?>
		</select>
		<?php echo form_error('penerima_paket'); ?>
	</div>

  <div class="form-group">
		<label>Pengirim Paket</label>
		<input type="text" name="pengirim_paket" class="form-control">
		<?php echo form_error('pengirim_paket'); ?>
	</div>

  <div class="form-group">
		<label>Isi Paket Disita</label>
		<input type="text" name="isi_paket_disita" class="form-control">
		<?php echo form_error('isi_paket_disita'); ?>
	</div>

	<div class="form-group">
		<input type="submit" value="Simpan" class="btn btn-primary btn-sm">
	</div>
</form>
