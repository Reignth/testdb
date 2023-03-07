<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id = $_POST ['id'];
    
    $sql = "DELETE FROM article WHERE id = '$id'";


    $delete = mysqli_query($db, $sql);
    if($delete){
        echo json_encode("success");
    }
    else{
        echo json_encode("failed");
    }
?>