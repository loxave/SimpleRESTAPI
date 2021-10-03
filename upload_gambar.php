<?php

require_once('helper.php');
if (function_exists($_GET['function'])) {
    $_GET['function']();
}

function upload_gambar(){
    $gambar = $_FILES['file']['tmp_name'];
    $imgTitle = $_FILES['file']['name'];

    // Path untuk menyimpan gambar
    // Gambar akan disimpan dalam folder user_img yang terdapat pada direktori root bukuRestApi
    $file_path = 'user_img';
    $response = array();
    if (!file_exists($file_path)) {
        mkdir($file_path, 0777, true);
    }
    if(!$gambar){
        $response = array(
            'status' => 0,
            'message' => "Gagal menemukan gambar!"
        );
    }
    else{
        if(move_uploaded_file($gambar, $file_path.'/'.$imgTitle)){
            $response = array(
                'status' => 1,
                'message' => "Sukses upload gambar!"
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => "Gagal upload gambar!"
            );
        }
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>