<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $seriVac= $_POST['seriVac'];


    $del  = "DELETE FROM vaccinecert WHERE seriVac = '$seriVac'";
    $query = mysqli_query($db, $del);
    if ($query) {
        echo json_encode("Success");
    }
    else{
        echo json_encode("Error");
    }
?>