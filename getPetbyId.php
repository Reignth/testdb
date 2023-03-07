<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id_pet = $_POST['id_pet'];
    
    $result = $db -> query("SELECT * FROM pet WHERE id_pet = '$id_pet'");

    $list = array();
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $list[] = $row;
        }
        echo json_encode($list);
    }
?>