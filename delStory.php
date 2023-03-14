<?php
    header("Access-Control-Allow-Origin: *");
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id_post = $_POST ['id_post'];
    
    $sql = "DELETE FROM story WHERE id_post = '$id_post'";
    
    $query = mysqli_query($db, $sql);
    
    if($query){
        echo json_encode("success");
    }
    else{
        echo json_encode("failed");
    }
?>
