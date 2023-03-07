<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $id_user = $_POST['id_user'];

    $sql = "SELECT follow.id_user, user.Username FROM follow INNER JOIN user on follow.id_follow = '$id_user' AND user.id_user = follow.id_user";
    $result = mysqli_query($db, $sql);
    $list = array();
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $list[] = $row;
        }
        echo json_encode($list);
    }
?>
