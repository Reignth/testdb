<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $id_user = $_GET['id_user'];

    $sql = "SELECT * FROM notif WHERE id_user = '$id_user' ORDER BY notif.notif_date DESC";

    $result = mysqli_query($db, $sql);
    $list = array();

    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $list[] = $row;
        }
        echo json_encode($list);
    }
?>