<?php
require "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perjalanan</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-judul">
        <h1>Pencatatan Perjalanan</h1>
        <a href="tambah_perjalanan.php">Tambah Perjalanan</a>
        <?php foreach (tampil_hitung_perjalanan() as $hitung):?>
        <h4>Total pengeluaran Anda : Rp<?php echo number_format($hitung[0],0,",",".");?></h4>
     <?php endforeach;?>
    </div>
    <div class="container">
            <table border=1>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Transportasi</th>
                        <th>Dari</th>
                        <th>Ke</th>
                        <th>pengeluaran</th>
                        <th>Foto</th>
                        <th>tanggal</th>
                        <th colspan=2>Aksi</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php
                    // menampilkan data perjalanan berdasarkan data yang baru di tambahkan
                    $no=1;
                    foreach (tampil_data_perjalanan() as $row):
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $row['transportasi'];?></td>
                        <td><?php echo $row['dari_jalan'];?></td>
                        <td><?php echo $row['ke_jalan'];?></td>
                        <td>Rp<?php echo number_format($row['pengeluaran'],0,",",".");?></td>
                        <td><img src="image/<?php echo $row['dok'];?>" alt="foto Perjalanan"></td>
                        <td><?php echo date('d-m-Y', strtotime($row['tanggal']));?></td>
                        <td><a href="edit_perjalanan.php?id=<?php echo $row['id'];?>">edit</a></td>
                        <td><a href="hapus_perjalanan.php?id=<?php echo $row['id'];?>" onclick="return confirm('Yakin Mau Menghapus Perjalanan Anda???')">hapus</a></td>
                    </tr>
                    <?php
                    $no++;
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
        <footer>
        <p>&copy; 2024 by Habib Husain Nurrohim. All rights reserved.</p>
    </footer>
</body>
</html>