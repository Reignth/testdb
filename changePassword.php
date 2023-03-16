<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $password = $_POST['password'];
    $nohp = $_POST['nohp'];

    $sql = "UPDATE user SET password = '$password' WHERE nohp = '$nohp'";
    $result = mysqli_query($db, $sql);

    if($result){
            echo json_encode("Success");
    }
    else{
        echo json_encode("Failed");
    }
?>