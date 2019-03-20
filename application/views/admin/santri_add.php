<!DOCTYPE html>
<html>
<head>
    <title>Form Data Santri</title>
</head>
<body>
  <div class="page-header">
    <h3>Santri Baru</h3>
  </div>
    <form action="<?php echo base_url().'index.php/admin/santri_add_act' ?>" method="post">
        <div class="form-group">
          <label>NIS</label>
          <input type="text" name="nis" class="form-control">
          <?php echo form_error('nis'); ?>
        </div>
        <div class="form-group">
      		<label>Nama Santri</label>
      		<input type="text" name="nama_santri" class="form-control">
          <?php echo form_error('nama_santri'); ?>
      	</div>
        <div class="form-group">
      		<label>Alamat</label>
      		<input type="text" name="alamat" class="form-control">
          <?php echo form_error('alamat'); ?>
      	</div>
        <div class="form-group">
      		<label>Asrama</label>
      		<input type="text" name="asrama" class="form-control">
          <?php echo form_error('asrama'); ?>
      	</div>
        <div class="form-group">
      		<input type="submit" value="Tambah" class="btn btn-primary">
      	</div>
    </form>
</body>
</html>
