<?php
    header("Access-Control-Allow-Origin: *");
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    date_default_timezone_set('Asia/Jakarta');

    $select = "SELECT * FROM article";
    $result = mysqli_query($db, $select);
    $list = array();
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $list[] = $row;
        }
        echo json_encode($list);
    }
?>