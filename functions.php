<?php

    require "db.php";


    // untuk menjumlahkan total pengeluaran
    function tampil_hitung_perjalanan()
    {
        $tampil_hitung_perjalanan = "SELECT SUM(pengeluaran) FROM perjalanan";
        $hitung_perjalanan = database()->query($tampil_hitung_perjalanan);

        $hitung_data=[];
        while ($hitung = $hitung_perjalanan->fetchArray()){
            $hitung_data[] = $hitung;
        }

        return $hitung_data;
    }


    // untuk meanmpilkan semua data di index.php
    function tampil_data_perjalanan()
    {
        $tampil_data_perjalanan = "SELECT * FROM perjalanan";
        $tampil_perjalanan = database()->query($tampil_data_perjalanan);

        $tampil_data=[];
        while ($row = $tampil_perjalanan->fetchArray()){
            $tampil_data[] = $row;
        }

        return $tampil_data;
    }


    // fungsi untuk mengupload gambar
    function upload_perjalanan()
    {
        $ambil_ukuran_file = $_FILES['dok']['size'];
        $ukuran_diizinkan = 10000000;

        if($ambil_ukuran_file > $ukuran_diizinkan)
        {
            echo 'ukurannya Maksimal 10 MB !!';
            exit();
        }
        $ambil_nama_file = $_FILES['dok']['name'];
        $ambil_extensi_file = pathinfo($ambil_nama_file, PATHINFO_EXTENSION);
        $extensi_diizinkan = array('jpg','jpeg','png', 'avif', 'JPG','svg');

        if(in_array($ambil_extensi_file, $extensi_diizinkan))
        {
            $ambil_tmp_file = $_FILES['dok']['tmp_name'];
            $tujuan_folder ="image/";
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


    //fungsi untuk menambah perjalanan
    function tambah_perjalanan()
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
        window.location='index.php';
        </script>";
        exit();
    }
        $tambah_data_perjalanan = "INSERT INTO perjalanan(transportasi, dari_jalan, ke_jalan, pengeluaran, dok, tanggal)
                                    VALUES ('$transportasi', '$dari_jalan', '$ke_jalan', '$pengeluaran','$dok', '$tanggal' )";
        $tambah_perjalanan = database()->query($tambah_data_perjalanan);

        return $tambah_perjalanan;
    }   


    // fungsi untuk mengupdate perjalanan
    function update_perjalanan()
    {
        $get_id = $_GET['id'];
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
            window.location='index.php';
            </script>";
        }

        $update_data_perjalanan = "UPDATE perjalanan SET transportasi='$transportasi', dari_jalan='$dari_jalan', ke_jalan='$ke_jalan', 
                                    pengeluaran='$pengeluaran', dok='$dok',tanggal='$tanggal' WHERE id ='$get_id'";
        $update_perjalanan = database()->query($update_data_perjalanan);

        return $update_perjalanan;
    }


    // fungsi untuk mengambil data perjalanan berdasarkan id yang diinputkan
    function ambil_data_perjalanan()
    {
        $get_id = $_GET['id'];

        $ambil_data_perjalanan = "SELECT * FROM perjalanan WHERE id ='$get_id' ";
        $ambil_perjalanan = database()-> query($ambil_data_perjalanan);
        $ambil = $ambil_perjalanan -> fetchArray();

        return $ambil;

    }

    // fungsi untuk menghapus perjalanan
    function delete_perjalanan()
    {
        $get_id = $_GET['id'];

        $delete_data_perjalanan = "DELETE FROM perjalanan WHERE id = '$get_id'";
        $delete_perjananan = database() -> query($delete_data_perjalanan);

        return $delete_perjananan;
    }