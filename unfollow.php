<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $id_user = $_POST['id_user'];
    $id_follow = $_POST['id_follow'];

    $sql = "DELETE FROM follow WHERE id_user = '$id_user' AND id_follow = '$id_follow'";
    $result = mysqli_query($db, $sql);
    if ($result) {
        echo json_encode("Success");
    }
    else{
        echo json_encode("Error");
    }

?>