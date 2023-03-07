<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id_user = $_GET['id_user'];
    $email = $_GET['email'];

    $select = $db -> query("SELECT * FROM user WHERE id_user = '".$id_user."' AND email = '".$email."'");
    $count = mysqli_num_rows($select);

    $newPass = 'qweqweqwe';

    if($count ==1) {
        $update = $db->query("UPDATE user SET password = '$newPass' WHERE id_user = '$id_user' AND email = '$email'");
        if ($update){
            echo json_encode($newPass);
        }
    }
    



?>