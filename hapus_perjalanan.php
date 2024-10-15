<?php

require "db.php";
$get_id = $_GET['id'];

$hapus_perjalanan = "DELETE FROM perjalanan WHERE id='$get_id'";
$hapus= $db->query($hapus_perjalanan);

if($hapus){
    echo "<script>
    alert('Data Berhasil di Hapus');
    window.location='perjalanan.php';
    </script>";
}else{
    echo "<script>
    alert('Data Gagal di Hapus');
    window.location='perjalanan.php';
    </script>";
}   