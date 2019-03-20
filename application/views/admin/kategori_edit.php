<!DOCTYPE html>
<html>
<head>
    <title>Form Edit Data Kategori</title>
</head>
<body>
    <center>
        <h1>Edit Data</h1>
        <h3>Edit Data</h3>
    </center>
    <?php foreach($kategori as $k){ ?>
    <form action="<?php echo base_url(). 'index.php/admin/kategori_update'; ?>" method="post">
        <table style="margin:20px auto;">
          <tr>
            <td>Nama Kategori</td>
            <td>
              <input type="hidden" name="id_kategori" value="<?php echo $k->id_kategori ?>">
              <input type="text" name="nama_kategori" value="<?php echo $k->nama_kategori ?>">
            </td>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit" value="Simpan"></td>
          </tr>
        </table>
    </form>
    <?php } ?>
</body>
</html>
