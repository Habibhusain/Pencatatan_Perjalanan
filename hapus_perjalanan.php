<?php

require "functions.php";

$hapus= delete_perjalanan();

if($hapus){
    echo "<script>
    alert('Data Berhasil di Hapus');
    window.location='index.php';
    </script>";
}else{
    echo "<script>
    alert('Data Gagal di Hapus');
    window.location='index.php';
    </script>";
}   