<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $seriVac = $_POST['seriVac'];

    $sql = "SELECT * FROM vaccinecert WHERE seriVac = '$seriVac'";
    $result = mysqli_query($db, $sql);

    $list = array();
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $list[] = $row;
        }
        echo json_encode($list);
    }
?>