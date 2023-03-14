<?php
    header("Access-Control-Allow-Origin: *");
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    date_default_timezone_set('Asia/Jakarta');
    
    $idVendor = addslashes($_POST['idVendor']);
    $date = date('Y-m-d H:i:s');
    $idAdmin = addslashes($_POST['idAdmin']);
    
    $updt  = "UPDATE vendor SET verifiedAt = '$date', verifiedBy = '$idAdmin', status = 'verified' WHERE id = '$idVendor'";
    $query = mysqli_query($db, $updt);
    if ($query) {
        echo json_encode("Success");
    }
    else{
        echo json_encode("Error");
    }
?>
