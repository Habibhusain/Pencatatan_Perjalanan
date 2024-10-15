<?php

require "db.php";

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
        <?php
        $hitung_data_murojaah="SELECT SUM(pengeluaran) FROM perjalanan";
        $hitung_murojaah = $db->query($hitung_data_murojaah);
        while($hitung =$hitung_murojaah->fetchArray()):
    ?>
        <h4>Total pengeluaran Anda : <?php echo $hitung[0];?></h4>
     <?php 
         endwhile; 
     ?>
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
                    $tampil_data_rangkuman = "SELECT * FROM perjalanan ORDER BY tanggal DESC";
                    $tampil_rangkuman = $db->query($tampil_data_rangkuman);
                    $no=1;
                    while ($row = $tampil_rangkuman->fetchArray()):
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $row['transportasi'];?></td>
                        <td><?php echo $row['dari_jalan'];?></td>
                        <td><?php echo $row['ke_jalan'];?></td>
                        <td><?php echo $row['pengeluaran'];?></td>
                        <td><img src="css/image/<?php echo $row['dok'];?>" alt="foto Perjalanan"></td>
                        <td><?php echo date('d-m-Y', strtotime($row['tanggal']));?></td>
                        <td><a href="edit_perjalanan.php?id=<?php echo $row['id'];?>">edit</a></td>
                        <td><a href="hapus_perjalanan.php?id=<?php echo $row['id'];?>" onclick="return confirm('Yakin Mau Menghapus Perjalanan Anda???')">hapus</a></td>
                    </tr>
                    <?php
                    $no++;
                    endwhile;
                    ?>
                </tbody>
            </table>
        </div>
</body>
</html>