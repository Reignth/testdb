<?php
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
    $id = addslashes($_POST['id']);
    
    $updt  = "UPDATE article SET title = '$title', content = '$content', image = '$image', uploader = '$uploader', date = '$date' WHERE id = '$id'";
    $query = mysqli_query($db, $updt);
    if ($query) {
        echo json_encode("Success");
    }
    else{
        echo json_encode("Error");
    }
?>