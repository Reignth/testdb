<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $myVideo = $_FILES['my_video']['name'];
    $myVideoTmpName = $_FILES['my_video']['tmp_name'];
    $id_user = $_POST['id_user'];
    $postMsg = $_POST['postMsg'];
    $username = $_POST['username'];
    $userImg = $_POST['userImg'];
    $postTime = date("Y-m-d H:i:s");
    $postLike = 0;

    $n = 5;
    $id_post = 'post-'.bin2hex(random_bytes($n));

    $extention = pathinfo($myVideo, PATHINFO_EXTENSION);
    $mid = rand(0,100000);
    $rename = 'VID'.date('Ymd').$mid;
    $newname = $rename.'.'.$extention;
    $uploadFolder = "video/".$newname;

    move_uploaded_file($myVideoTmpName, $uploadFolder);

    $upload = $db->query("INSERT INTO story (id_user, id_post, postMsg, postTime, postLike, video_url, username, userImg) VALUE ('$id_user', '$id_post', '$postMsg', '$postTime', '$postLike', '$newname', '$username', '$userImg')");

    $n = 5;
    $notif_id = 'comment-'.bin2hex(random_bytes($n));

    $sql_notif = "INSERT INTO notif (id_user, id_post, notif_msg, notif_type, notif_id, notif_date) VALUE ('$id_user', '$id_post', 'Post added to your story', 'story', '$notif_id', '$postTime')";
    $insert_notif = mysqli_query($db, $sql_notif);

    if ($upload){
        echo json_encode("success");
    }else{
        echo json_encode("failed".mysqli_error($db));
    }
?>