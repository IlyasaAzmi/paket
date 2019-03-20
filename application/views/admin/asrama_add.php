<!DOCTYPE html>
<html>
<head>
    <title>Form Data Asrama</title>
</head>
<body>
  <div class="page-header">
    <h3>Asrama Baru</h3>
  </div>
    <form action="<?php echo base_url().'index.php/admin/asrama_add_act' ?>" method="post">
        <div class="form-group">
      		<label>Nama Asrama</label>
      		<input type="text" name="nama_asrama" class="form-control">
          <?php echo form_error('nama_asrama'); ?>
      	</div>

        <div class="form-group">
      		<label>Gedung</label>
      		<input type="text" name="gedung" class="form-control">
          <?php echo form_error('gedung'); ?>
      	</div>

        <div class="form-group">
      		<input type="submit" value="Tambah" class="btn btn-primary">
      	</div>
    </form>
</body>
</html>
