<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    date_default_timezone_set('Asia/Jakarta');

    $n = 5;
    $id = 'fol-'.bin2hex(random_bytes($n));
    $id_user = $_POST['id_user'];
    $id_follow = $_POST['id_follow'];

    $insert  = "INSERT INTO follow (id, id_user, id_follow) VALUE ('$id', '$id_user', '$id_follow') ";
    $query = mysqli_query($db, $insert);

    $n = 5;
    $notif_id = 'comment-'.bin2hex(random_bytes($n));

    $sql_notif = "INSERT INTO notif (id_user, notif_msg, notif_type, notif_id, notif_date, id_target, nama_target) VALUE ('$id_follow', 'Started following you', 'follow', '$notif_id', now(), '$id_user', (SELECT username FROM user WHERE id_user = '$id_follow'))";
    $insert_notif = mysqli_query($db, $sql_notif);

    if ($query) {
        echo json_encode("Success");
    }
    else{
        echo json_encode("Error");
    }
?>