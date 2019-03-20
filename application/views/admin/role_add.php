<!DOCTYPE html>
<html>
<head>
    <title>Form Data Role</title>
</head>
<body>
    <center>
        <h1>Form Data Role</h1>
        <h3>Tambah data baru</h3>
    </center>
    <form action="<?php echo base_url().'index.php/admin/role_add_act' ?>" method="post">
        <table style="margin:20px auto;">
            <tr>
                <td>ID Role</td>
                <td><input type="text" name="id_role"></td>
            </tr>
            <tr>
                <td>Nama Role</td>
                <td><input type="text" name="nama_role"></td>
            </tr>
            <tr>
                <td>Menu</td>
                <td><input type="text" name="menu"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
</body>
</html>
