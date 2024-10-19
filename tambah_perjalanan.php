<?php

require "functions.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $tambah_perjalanan = tambah_perjalanan();
    if($tambah_perjalanan)
    {
        echo "<script>
        alert('Data Berhasil di Tambah');
        window.location='index.php';
        </script>";
        exit();
    }else{
        echo "<script>
        alert('Data Gagal di Tambah');
        window.location='tambah_perjalanan.php';
        </script>";
        exit();
    }

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Perjalanan</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="boxes-judul">
        <h1>Tambah Perjalanan</h1>
    </div>
    <div class="boxes">
        <form action="" method="POST" enctype="multipart/form-data">
            <label>Transportasi</label>
            <input type="text" name="transportasi" required autofocus>
            <label>Dari</label>
            <input type="text" name="dari_jalan" required>
            <label>Ke</label>
            <input type="text" name="ke_jalan" required>
            <label>pengeluaran</label>
            <input type="number" name="pengeluaran" required>
            <label>Foto</label>
            <input type="file" name="dok" required>
            <label>Tanggal</label>
            <input type="date" name="tanggal" required>
            <input type="submit" name="submit" value="submit">
            <a href="perjalanan.php">Kembali</a>
        </form>
    </div>
</body>
</html>