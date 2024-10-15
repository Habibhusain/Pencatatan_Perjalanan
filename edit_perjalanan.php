<?php

require "db.php";
$get_id = $_GET['id'];

function upload_perjalanan()
{
    $ambil_ukuran_file = $_FILES['dok']['size'];
    $ukuran_diizinkan = 10000000;

    if($ambil_ukuran_file > $ukuran_diizinkan)
    {
        echo "<script>
        alert('Ukuran Maksimal 10 MB !!');
        window.location = 'edit_rangkuman.php';
        </script>";
    }
    $ambil_nama_file = $_FILES['dok']['name'];
    $ambil_extensi_file = pathinfo($ambil_nama_file, PATHINFO_EXTENSION);
    $extensi_diizinkan = array('JPG','jpg','png','jpeg');

    if(in_array($ambil_extensi_file, $extensi_diizinkan))
    {
        $ambil_tmp_file = $_FILES['dok']['tmp_name'];
        $tujuan_folder = "css/image";
        $target_file = $tujuan_folder . basename($ambil_nama_file);
        
        $file = move_uploaded_file($ambil_tmp_file, $target_file);

        if($file == TRUE)
        {
            return $ambil_nama_file;
        }else{
            return FALSE;
        }     
    }else{
        return FALSE;
    }
}

    function ambil_perjalanan()
    {
        global $db;
        global $get_id;

        $ambil_data_perjalanan = "SELECT * FROM perjalanan WHERE id='$get_id'";
        $ambil_perjalanan = $db->query($ambil_data_perjalanan);
        $ambil = $ambil_perjalanan -> fetchArray();

        return $ambil;
    }

    if(isset($_POST['transportasi']) && $_POST['transportasi'])
    {
        $dok = upload_perjalanan();
        $transportasi = $_POST['transportasi'];
        $dari_jalan = $_POST['dari_jalan'];
        $ke_jalan = $_POST ['ke_jalan'];
        $pengeluaran = $_POST ['pengeluaran'];
        $tanggal = $_POST['tanggal'];
    
        if($dok == FALSE)
        {
            echo "<script>
            alert('Gagal Mengupload');
            window.location='edit_rangkuman.php';
            </script>";
        }
        $update_data_perjalanan = "UPDATE perjalanan SET 
                                transportasi='$transportasi',dari_jalan='$dari_jalan', ke_jalan='$ke_jalan',pengeluaran='$pengeluaran', dok='$dok', tanggal='$tanggal' WHERE id = '$get_id'";
        $update_perjalanan = $db->query($update_data_perjalanan);

        if($update_perjalanan)
        {
            echo "<script>
            alert('Data Berhasil di Edit');
            window.location = 'perjalanan.php';
            </script>";
        }else{
            echo "<script>
            alert('Data Gagal di Edit');
            window.location = 'edit_perjalanan.php';
            </script>";
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
        <form action="edit_perjalanan.php?id=<?php echo ambil_perjalanan()['id']; ?>" method="POST" enctype="multipart/form-data">
            <label>Transportasi</label>
            <input type="text" name="transportasi" value="<?php echo ambil_perjalanan()['transportasi']; ?>">
            <label>Dari</label>
            <input type="text" name="dari_jalan" value="<?php echo ambil_perjalanan()['dari_jalan']; ?>">
            <label>Ke</label>
            <input type="text" name="ke_jalan" value="<?php echo ambil_perjalanan()['ke_jalan']; ?>">
            <label>pengeluaran</label>
            <input type="text" name="pengeluaran" value="<?php echo ambil_perjalanan()['pengeluaran']; ?>">
            <label>Foto</label>
            <input type="file" name="dok" value="<?php echo ambil_perjalanan()['dok']; ?>">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?php echo ambil_perjalanan()['tanggal']; ?>">
            <input type="submit" name="submit">
            <a href="perjalanan.php">Kembali</a>
        </form>
    </div>
</body>
</html>