<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id_user = $_POST['id_user'];
    
    $result = $db -> query("SELECT pet.* FROM pet WHERE pet.id_user = '$id_user'");

    $sql = "SELECT * FROM pet WHERE id_user = '$id_user'";
    $result = mysqli_query($db, $sql);

    $list = array();
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $list[] = $row;
        }
        echo json_encode($list);
    }
?>