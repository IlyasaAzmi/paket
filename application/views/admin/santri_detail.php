<!DOCTYPE html>
<html>
<head>
    <title>Detail Data Santri</title>
</head>
<body>
    <center>
        <h1>Detail Data Santri</h1>
    </center>
    <?php foreach($santri as $s){ ?>
      <table id="santri_detail" class="table table-striped table-bordered table-hover">
        <tbody>
        <tr>
          <td>NIS</td>
          <td><?php echo $s->nis?></td>
        </tr>
        <tr>
          <td>Nama Santri</td>
          <td><?php echo $s->nama_santri?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><?php echo $s->alamat?></td>
        </tr>
        <tr>
          <td>Asrama</td>
          <td><?php echo $s->asrama?></td>
        </tr>
        <tr>
          <td>Total Paket Diterima</td>
          <td><?php echo $s->total_paket_diterima?></td>
        </tr>
        <tr>
          <td>Opsi</td>
          <td>
              <a href="<?=base_url()?>admin/santri_edit/<?php echo $s->nis?>">
              <button type="button" class="btn-success btn"><span class="glyphicon glyphicon-pencil"></span></button>
              </a>
              <a href="<?=base_url()?>admin/santri_hapus/<?php echo $s->nis?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">
              <button type="button" class="btn-inverse btn"><span class="glyphicon glyphicon-trash"></span></button>
              </a>
              <a href="<?=base_url()?>admin/santri_detail/<?php echo $s->nis?>">
              <button type="button" class="btn-warning btn"><span class="glyphicon glyphicon-search"></span></button>
              </a>
          </td>
        </tr>


        <!-- </tr> -->
        </tbody>
    <?php } ?>
</body>
</html>
