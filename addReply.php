<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    date_default_timezone_set('Asia/Jakarta');
    $n = 5;
    $id = 'comment-'.bin2hex(random_bytes($n));
    $id_user_commented = $_POST['id_user_commented'];
    $comment = $_POST['comment'];
    $id_post = $_POST['id_post'];
    $reply_of = $_POST['reply_of'];
    $img_user = $_POST['img_user'];
    $username = $_POST['username'];
    $created_at = date("Y-m-d H:i:s");

    $sql = "INSERT INTO comments (id, id_user_commented, comment, id_post, reply_of, created_at, username, img_user) VALUE ('$id', '$id_user_commented', '$comment', '$id_post', '$reply_of', '$created_at', , '$username', '$img_user')";
    $insert = mysqli_query($db, $sql);
    if ($insert) {
        echo json_encode("Success");
    }
    else{
        echo json_encode("Error");
    }

?>
