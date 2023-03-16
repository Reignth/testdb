<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $nohp = $_POST['nohp'];

    $sql = "SELECT * FROM user WHERE nohp = '$nohp'";
    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);

    if($result){
        if ($count == 1) {
            echo json_encode("Success");
        }else{
            echo json_encode("Data didn't exist");
        }
    }
    else{
        echo json_encode("failed to load ");
    }
?>