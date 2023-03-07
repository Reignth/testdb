<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    date_default_timezone_set('Asia/Jakarta');
    
    $id_user = $_POST ['id_user'];
    $jenis = $_POST ['jenis'];
    $total = $_POST ['total'];
    $instance = $_POST['instance'];
    $status = "pending";
    $tanggal = date("Y-m-d H:i:s");
    $tanggalSelesai = '-';

    $n = 5;
    $id = 'book-'.bin2hex(random_bytes($n));
    
    $insert  = "INSERT INTO transaksi (id, id_user, jenis, total, instance, status, tanggal, tanggalSelesai) VALUE ('$id', '$id_user', '$jenis', '$total', '$instance', '$status', '$tanggal', '$tanggalSelesai') ";
    $query = mysqli_query($db, $insert);
    if ($query) {
        echo json_encode("Success");
    }
    else{
        echo json_encode("Error");
    }
?>