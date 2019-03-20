<!DOCTYPE html>
<html>
<head>
    <title>Form Edit Data Asrama</title>
</head>
<body>
    <center>
        <h1>Edit Data</h1>
    </center>
    <?php foreach($asrama as $a){ ?>
    <form action="<?php echo base_url(). 'admin/asrama_update'; ?>" method="post">

        <div class="form-group">
          <label>Nama Asrama</label>
          <input type="hidden" name="id_asrama" value="<?php echo $a->id_asrama; ?>">
          <input class="form-control" type="text" name="nama_asrama" value="<?php echo $a->nama_asrama; ?>">
          <?php echo form_error('nama_asrama'); ?>
        </div>

        <div class="form-group">
      		<label>Gedung</label>
      		<input class="form-control" type="text" name="gedung" value="<?php echo $a->gedung; ?>">
          <?php echo form_error('gedung'); ?>
      	</div>

        <div class="form-group">
      		<input type="submit" value="Simpan" class="btn btn-primary">
      	</div>

    </form>
    <?php } ?>
</body>
</html>
