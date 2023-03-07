<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    date_default_timezone_set('Asia/Jakarta');
    
    $id = $_POST ['id'];
    $status = $_POST ['status'];
    $dat = date("Y-m-d H:i:s");
    
    $updt  = "UPDATE transaksi SET status = '$status', tanggalSelesai = '$date' WHERE id = '$id'";
    $query = mysqli_query($db, $insert);
    if ($query) {
        echo json_encode("Success");
    }
    else{
        echo json_encode("Error");
    }
?>