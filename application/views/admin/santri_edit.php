<!DOCTYPE html>
<html>
<head>
    <title>Form Edit Data Santri</title>
</head>
<body>
    <center>
        <h1>Edit Data</h1>
    </center>
    <?php foreach($santri as $s){ ?>
    <form action="<?php echo base_url(). 'admin/santri_update'; ?>" method="post">

        <div class="form-group">
          <label>Nama Santri</label>
          <input type="hidden" name="nis" value="<?php echo $s->nis; ?>">
          <input class="form-control" type="text" name="nama_santri" value="<?php echo $s->nama_santri; ?>">
          <?php echo form_error('nama_santri'); ?>
        </div>

        <div class="form-group">
      		<label>Alamat</label>
      		<input class="form-control" type="text" name="alamat" value="<?php echo $s->alamat; ?>">
          <?php echo form_error('alamat'); ?>
      	</div>

        <div class="form-group">
      		<label>Asrama</label>
      		<input class="form-control" type="text" name="asrama" value="<?php echo $s->asrama; ?>">
          <?php echo form_error('asrama'); ?>
      	</div>

        <div class="form-group">
      		<input type="submit" value="Simpan" class="btn btn-primary">
      	</div>

    </form>
    <?php } ?>
</body>
</html>
