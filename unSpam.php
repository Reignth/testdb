<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    date_default_timezone_set('Asia/Jakarta');
    
    $hourSpam = '0';
    $id_user = $_POST['id_user'];
    $status = "safe";

    $updt  = "UPDATE user SET hourSpam = '$hourSpam', status = '$status' WHERE id_user = '$id_user'";
    $query = mysqli_query($db, $updt);

    if ($query) {
        echo json_encode("Success");
    }
    else{
        echo json_encode("Error");
    }
?>