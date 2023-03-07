<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

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
    if($update){
        echo json_encode("success");
    }
    else{
        echo json_encode("failed");
    }

    
?>