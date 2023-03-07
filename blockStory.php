<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    date_default_timezone_set('Asia/Jakarta');
    
    $blockDate = date('Y-m-d H:i:s');
    $id_post = $_POST['id_post'];
    $status = "blocked";

    $updt  = "UPDATE story SET blockDate = '$blockDate', status = '$status' WHERE id_post = '$id_post'";
    $query = mysqli_query($db, $updt);

    if ($query) {
        echo json_encode("Success");
    }
    else{
        echo json_encode("Error");
    }
?>