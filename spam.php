<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    date_default_timezone_set('Asia/Jakarta');
    
    $spamDate = date('Y-m-d H:i:s');
    $hourSpam = $_POST['hourSpam'];
    $id_user = $_POST['id_user'];
    $status = "blocked";

    $updt  = "UPDATE user SET spamDate = '$spamDate', hourSpam = '$hourSpam', status = '$status' WHERE id_user = '$id_user'";
    $query = mysqli_query($db, $updt);


    $newDate = date('Y-m-d H:i:s', strtotime($spamDate. ' + 30 seconds'));

    $unblock = "CREATE EVENT myevent ON SCHEDULE AT '2022-12-19 15:02:00' DO UPDATE user SET status = 'safe', hourSpam = '0' WHERE id_user = $id_user";

    $query = mysqli_query($db, $unblock);

    if ($query) {
        echo json_encode("Success");
    }
    else{
        echo json_encode("Error");
    }
?>