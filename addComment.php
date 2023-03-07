<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $db->set_charset('utf8mb4');
    date_default_timezone_set('Asia/Jakarta');
    $n = 5;
    $id = 'comment-'.bin2hex(random_bytes($n));
    $id_user_commented = $_POST['id_user_commented'];
    $comment = $_POST['comment'];
    $id_post = $_POST['id_post'];
    $img_user = $_POST['img_user'];
    $username = $_POST['username'];
    $reply_of = 0;
    $created_at = date("Y-m-d H:i:s");


    $sql = "INSERT INTO comments (id, id_user_commented, comment, id_post, reply_of, created_at, username, img_user) VALUE ('$id', '$id_user_commented', '$comment', '$id_post', '$reply_of', '$created_at', '$username', '$img_user')";
    $insert = mysqli_query($db, $sql);

    $n = 5;
    $notif_id = 'comment-'.bin2hex(random_bytes($n));

    $sql_notif = "INSERT INTO notif (id_user, id_post, notif_msg, notif_type, notif_id, id_target, notif_date, nama_target) SELECT id_user, '$id_post', 'commented on your post', 'comment', '$notif_id', '$id_user_commented', '$created_at', '$username' FROM story WHERE id_post = '$id_post' AND story.id_user != '$id_user_commented'";
    $insert_notif = mysqli_query($db, $sql_notif);
    if ($insert) {
        echo json_encode("Success");
    }
    else{
        echo json_encode("Error");
    }
?>