<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = $_POST['email'];

    $select = $db -> query("SELECT * FROM user WHERE email = '".$email."'");
    $count = mysqli_num_rows($select);
    $data = mysqli_fetch_assoc($select);

    $idData = $data['id_user'];
    $userData = $data['email'];

    if ($count == 1){
        $url = 'http://'.$_SERVER['SERVER_NAME'].'/testdb/forgotPass.php?id_user='.$idData.'&email='.$userData;
        echo json_encode($url);
    }else{
        echo json_encode('INVALID USER');
    }

?>