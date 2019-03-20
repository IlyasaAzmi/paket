<!DOCTYPE html>
<html>
<head>
    <title>Form Edit Data User</title>
</head>
<body>
    <center>
        <h1>Edit Data</h1>
        <h3>Edit Data</h3>
    </center>
    <?php foreach($user as $u){ ?>
    <form action="<?php echo base_url(). 'index.php/admin/user_update'; ?>" method="post">
        <table style="margin:20px auto;">
          <tr>
            <td>Nama User</td>
            <td>
              <input type="hidden" name="id_user" value="<?php echo $u->id_user ?>">
              <input type="text" name="nama_user" value="<?php echo $u->nama_user ?>">
            </td>
          </tr>
          <tr>
            <td>Username</td>
            <td><input type="text" name="username" value="<?php echo $u->username ?>"></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input type="text" name="password" value="<?php echo $u->password ?>"></td>
          </tr>
          <tr>
            <td>Role</td>
            <td><input type="text" name="role" value="<?php echo $u->role ?>"></td>
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
