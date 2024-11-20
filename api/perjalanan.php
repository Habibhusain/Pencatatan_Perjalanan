<?php

require_once "functions_api.php";
require_once "helper.php";


$requset_method = $_SERVER['REQUEST_METHOD'];

switch ($requset_method) {
    case 'GET':
        if(isset($_GET[id]) && !empety($_GET['id']))
        {
            $get_ambil_perjalanan = ambil_data_perjalanan();
            
            if($get_ambil_perjalanan == NULL)
            {
                $respon = array(
                    'status' = false,
                    'message' = "Data Tidak ditemukan",
                    'data' = array()
                );
                echo respon($respon, 500);
            }
            else
            {
                $respon = array(
                    'status' = true,
                    'message' ="Sukses",
                    'data' = $get_ambil_perjalanan
                );
                echo respon($respon, 200);
            }
        }
        else
        {
            $respon = array(
                'status' = false,
                'message' = "Sukses",
                'data' = tampil_data_perjalanan()
            );
            echo respon($respon, 200);
        }

        break;

    case 'POST':
        
        if($_POST['transportasi'] == '' OR $_POST['dari_jalan'] == '' OR $_POST['ke_jalan'] == '' OR $_POST['pengeluaran'] == '' OR $_FILES['dok']['name'] == '' OR $_POST['tanggal'])
        {
            $respon array(
                'status' = false,
                'message' = "Transportasi,dari_jalan, ke_jalan, pengeluaran, dokumentasi, tanggal tidak boleh kosong",
                'data' = array()
            );
            echo respon($respon, 500);
        }
        else
        {
            $tambah_perjalanan = tambah_perjalanan();

            if($tambah_perjalanan)
            {
                $respon = array(
                    'status' = true,
                    'message' = "Perjalanan berhasil di tambah",
                    'data' = array()
                );
                echo respon($_respon, 200);
            }
            else
            {
                $respon = array(
                    'status' = false,
                    'message' = "Perjalanan gagal di tambah",
                    'data' = array()
                );
                echo respon($respon, 500);
            }
        }

        break;
        
    default:
        $respon = array(
            'status' = false,
            'message' = "Not Found",
            'data' = array()
        );
        echo respon($respon, 404);
        break;
}