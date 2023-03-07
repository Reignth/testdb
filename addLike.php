<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $db->set_charset('utf8mb4');
    date_default_timezone_set('Asia/Jakarta');

    $id_user_liked = $_POST ['id_user_liked'];
    $id_post =$_POST ['id_post'];

    $sqlplus = "UPDATE story SET postLike = postLike + 1 WHERE id_post = '$id_post'";
    mysqli_query($db, $sqlplus);

    $sql = "SELECT id_user_liked FROM story WHERE id_post = '$id_post'";
    $res = mysqli_query($db, $sql);
    $row = $res->fetch_assoc();
    $pieces = explode(",", $row["id_user_liked"]);
    $list = array($id_user_liked);
    $ans_tmp = array_merge($pieces,$list);
    $ans= implode(",",$ans_tmp);

    $sql_update = "UPDATE story SET id_user_liked = '$ans' WHERE id_post = '$id_post'";
    $update = mysqli_query($db, $sql_update);

    $n = 5;
    $notif_id = 'comment-'.bin2hex(random_bytes($n));

    $sql_notif = "INSERT INTO notif (id_user, id_post, notif_msg, notif_type, notif_id, id_target, notif_date) SELECT id_user, id_post, 'liked your post', 'like', '$notif_id', '$id_user_liked', now() FROM story WHERE id_post = '$id_post' AND story.id_user != '$id_user_liked'";
    $insert = mysqli_query($db, $sql_notif);

    if($insert){
        $sql_notif_username = "UPDATE notif SET nama_target = (SELECT username FROM user WHERE id_user = '$id_user_liked') WHERE id_post = '$id_post' AND notif_id = '$notif_id' ";
        $insert_notif_username = mysqli_query($db, $sql_notif_username);
    }
    


    if($update){
        echo json_encode("success");
    }
    else{
        echo json_encode("failed");
    }

    
?>