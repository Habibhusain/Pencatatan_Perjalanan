<?php
require "functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $update_perjalanan = update_perjalanan();
    
    if ($update_perjalanan) {
        echo "<script>
        alert('Data Berhasil di Edit');
        window.location = 'index.php';
        </script>";
        exit();
    } else {
        echo "<script>
        alert('Data Gagal di Edit');
        window.location = 'edit_perjalanan.php';
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
    <title>Edit Perjalanan</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="box-judul">
        <h1>Edit Perjalanan</h1>
    </div>
    <div class="box">
        <form action="edit_perjalanan.php?id=<?php echo ambil_data_perjalanan()['id']; ?>" method="POST" enctype="multipart/form-data">
            <label>Transportasi</label>
            <input type="text" name="transportasi" value="<?php echo ambil_data_perjalanan()['transportasi']; ?>" required>
            <label>Dari</label>
            <input type="text" name="dari_jalan" value="<?php echo ambil_data_perjalanan()['dari_jalan']; ?>" required>
            <label>Ke</label>
            <input type="text" name="ke_jalan" value="<?php echo ambil_data_perjalanan()['ke_jalan']; ?>" required>
            <label>pengeluaran</label>
            <input type="text" name="pengeluaran" value="<?php echo ambil_data_perjalanan()['pengeluaran']; ?>" required>
            <label>Foto</label>
            <img src="image/<?php echo ambil_data_perjalanan()['dok']; ?>" width="100px" alt="">
            <input type="file" name="dok" value="<?php echo ambil_data_perjalanan()['dok']; ?>" required>
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?php echo ambil_data_perjalanan()['tanggal']; ?>" required>
            <input type="submit" name="submit">
            <a href="index.php">Kembali</a>
        </form>
    </div>
</body>
</html>