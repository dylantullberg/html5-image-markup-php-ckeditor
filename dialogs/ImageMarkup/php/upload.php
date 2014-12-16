<?php

require_once './config.php';

error_reporting(0);

$result = array();

if (!empty($_POST)) {
    $img_base64 = $_POST['img_base64'];    
}

if (!empty($img_base64)) {
    if (!empty($config)) {
        $upload_dir = $config['base_dir'];
        $upload_url = $config['base_url'];
    } else {
        $upload_dir = "upload/";
        $upload_url = preg_replace('/(upload\.php.*)/', 'upload/', $_SERVER['PHP_SELF']);
    }

    $name = date("YmdHis");

    $img = str_replace('data:image/png;base64,', '', $img_base64);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $filename = $name . ".png";

    $file = $upload_dir . $filename;
    $success = file_put_contents($file, $data);

    if ($success) {
        $result['success'] = 'File uploaded successfully' . ' -> ' . $filename;
        $result['new_img_url'] = $upload_url . $filename;
    } else {
        $result['error'] = "Unable to upload the image to the server!";
    }
}


echo json_encode($result);