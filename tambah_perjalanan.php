<?php

require "db.php";

function upload_perjalanan()
{
    $ambil_ukuran_file = $_FILES['dok']['size'];
    $ukuran_diizinkan = 10000000;

    if($ambil_ukuran_file > $ukuran_diizinkan)
    {
        echo "<script>
            alert('Ukuran Maksimal 10 MB');
            window.location='tambah_rangkuman.php';
            </script>";
        exit();
    }
    $ambil_nama_file = $_FILES['dok']['name'];
    $ambil_extensi_file = pathinfo($ambil_nama_file, PATHINFO_EXTENSION);
    $extensi_diizinkan = array('png','jpg','JPG','jpeg');

    if(in_array($ambil_extensi_file, $extensi_diizinkan))
    {
        $ambil_tmp_file = $_FILES['dok']['tmp_name'];
        $tujuan_folder = "css/image/";
        $target_file = $tujuan_folder . basename($ambil_nama_file);

        $gambar_file = move_uploaded_file($ambil_tmp_file, $target_file);

        if($gambar_file == TRUE)    
        {
            return $ambil_nama_file;
        }else{
            return FALSE;
        }
    }else{
        return FALSE;
    }
}

    if(isset($_POST['transportasi']) && $_POST['transportasi'] !='')
    {
    
    $dok = upload_perjalanan();
    $transportasi = $_POST['transportasi'];
    $dari_jalan = $_POST['dari_jalan'];
    $ke_jalan = $_POST ['ke_jalan'];
    $pengeluaran = $_POST ['pengeluaran'];
    $tanggal = $_POST['tanggal'];

    // pengecekan jika foto/file melebihi yang sudah ditentukan
    if($dok == FALSE){
        echo "<script>
        alert('Gagal mengupload');
        window.location='tambah_perjalanan.php';
        </script>";
        exit();
    }

    $tambah_data_perjalanan = "INSERT INTO perjalanan (transportasi,dari_jalan,ke_jalan, pengeluaran,dok,tanggal) VALUES ('$transportasi','$dari_jalan','$ke_jalan', '$pengeluaran','$dok','$tanggal')";
    $tambah_perjalanan = $db->query($tambah_data_perjalanan);

    if($tambah_perjalanan)
    {
        echo "<script>
        alert('Data Berhasil di Tambah');
        window.location='perjalanan.php';
        </script>";
    }else{
        echo "<script>
        alert('Data Gagal di Tambah');
        window.location='tambah_perjalanan.php';
        </script>";
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
            <input type="text" name="transportasi">
            <label>Dari</label>
            <input type="text" name="dari_jalan">
            <label>Ke</label>
            <input type="text" name="ke_jalan">
            <label>pengeluaran</label>
            <input type="number" name="pengeluaran">
            <label>Foto</label>
            <input type="file" name="dok">
            <label>Tanggal</label>
            <input type="date" name="tanggal">
            <input type="submit" name="submit" value="submit">
            <a href="perjalanan.php">Kembali</a>
        </form>
    </div>
</body>
</html>