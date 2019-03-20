<!DOCTYPE html>
<html>
<head>
    <title>Form Edit Data Role</title>
</head>
<body>
    <center>
        <h1>Edit Data</h1>
        <h3>Edit Data</h3>
    </center>
    <?php foreach($role as $r){ ?>
    <form action="<?php echo base_url(). 'index.php/admin/role_update'; ?>" method="post">
        <table style="margin:20px auto;">
          <tr>
            <td>Nama Role</td>
            <td>
              <input type="hidden" name="id_role" value="<?php echo $r->id_role ?>">
              <input type="text" name="nama_role" value="<?php echo $r->nama_role ?>">
            </td>
          </tr>
          <tr>
            <td>Menu</td>
            <td><input type="text" name="menu" value="<?php echo $r->menu ?>"></td>
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
