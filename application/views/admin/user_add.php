<!DOCTYPE html>
<html>
<head>
    <title>Form Data User</title>
</head>
<body>
    <center>
        <h1>Form Data User</h1>
        <h3>Tambah data baru</h3>
    </center>
    <form action="<?php echo base_url().'index.php/admin/user_add_act' ?>" method="post">
        <table style="margin:20px auto;">
            <tr>
                <td>ID User</td>
                <td><input type="text" name="id_user"></td>
            </tr>
            <tr>
                <td>Nama User</td>
                <td><input type="text" name="nama_user"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password"></td>
            </tr>
            <tr>
                <td>Role</td>
                <td><input type="text" name="role"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
</body>
</html>
