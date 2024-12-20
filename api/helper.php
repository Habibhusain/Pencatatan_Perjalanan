<?php

/**
 * Kumpulan fungsi untuk API php native
 * 
 * @author Habib Husain Nurrohim
 * @since 2024-10-26
 */


/**
 * Fungsi untuk generate respon API
 * 
 * @param array $data
 * @param int $code
 * @return json
 */

function respon($data, $code){

    http_response_code($code);
    header('Content-Type: application/json');
    return json_encode($data);
}

