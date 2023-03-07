<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    date_default_timezone_set('Asia/Jakarta');
    
    $id_user = $_POST ['id_user'];
    $postMsg = $_POST ['postMsg'];
    $postImg = $_POST ['postImg'];
    $username = $_POST['username'];
    $userImg = $_POST['userImg'];
    $postTime = date("Y-m-d H:i:s");
    $postLike = 0;

    $n = 5;
    $id_post = 'post-'.bin2hex(random_bytes($n));

    $insert  = "INSERT INTO story (id_user, id_post, postMsg, postImg, postTime, postLike, username, userImg) VALUE ('$id_user', '$id_post', '$postMsg', '$postImg', '$postTime', '$postLike', '$username', '$userImg')";
    $query = mysqli_query($db, $insert);

    $n = 5;
    $notif_id = 'comment-'.bin2hex(random_bytes($n));

    $sql_notif = "INSERT INTO notif (id_user, id_post, notif_msg, notif_type, notif_id, notif_date) VALUE ('$id_user', '$id_post', 'Post added to your story', 'story', '$notif_id', '$postTime')";
    $insert_notif = mysqli_query($db, $sql_notif);
    if ($query) {
        echo json_encode("Success");
    }
    else{
        echo json_encode("Error");
    }

?>