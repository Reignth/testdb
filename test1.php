<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "UPDATE testtable SET diff = TIMESTAMPDIFF(SECOND,nama, NOW())";
    mysqli_query($db, $sql);
    
?>