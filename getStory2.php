<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    date_default_timezone_set('Asia/Jakarta');

    $sql2 = "UPDATE story SET timeDiff = TIMESTAMPDIFF(SECOND, postTime, NOW())";
    mysqli_query($db, $sql2);

    $sql = "SELECT * FROM `story` ORDER BY timeDiff ASC";
    $result = mysqli_query($db, $sql);
    $list = array();
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $list[] = $row;
        }
        echo json_encode($list);
    }
?>