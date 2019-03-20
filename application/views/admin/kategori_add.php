<!DOCTYPE html>
<html>
<head>
    <title>Form Data Kategori</title>
</head>
<body>
    <center>
        <h1>Form Data Kategori</h1>
        <h3>Tambah data baru</h3>
    </center>
    <form action="<?php echo base_url().'index.php/admin/kategori_add_act' ?>" method="post">
        <table style="margin:20px auto;">
            <tr>
                <td>ID Kategori</td>
                <td><input type="text" name="id_kategori"></td>
            </tr>
            <tr>
                <td>Nama Kategori</td>
                <td><input type="text" name="nama_kategori"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
</body>
</html>
