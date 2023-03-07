<?php
    header("Access-Control-Allow-Origin: *");
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    date_default_timezone_set('Asia/Jakarta');

    $title = addslashes($_POST['title']);
    $content = addslashes($_POST['content']);
    $image = addslashes($_POST['image']);
    $uploader = addslashes($_POST['uploader']);
    $date = date('Y-m-d H:i:s');
    $id = 'article-'.bin2hex(random_bytes(5));

    $insert  = "INSERT INTO article (id, title, content, uploader, date, image) VALUES ('$id', '$title', '$content', '$uploader', '$date', '$image')";
    $query = mysqli_query($db, $insert);

    if ($query) {
        echo json_encode("Success");
    }
    else{
        echo json_encode("Error");
    }

?>