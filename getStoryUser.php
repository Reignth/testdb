<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    date_default_timezone_set('Asia/Jakarta');

    $sql2 = "UPDATE story SET timeDiff = TIMESTAMPDIFF(SECOND, postTime, NOW())";
    mysqli_query($db, $sql2);

    $id_user = $_GET['id_user'];

    $limit = 2;  
    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
    $start_from = ($page-1) * $limit;
    $sql = "SELECT * FROM `story` WHERE id_user = '$id_user' ORDER BY timeDiff ASC LIMIT $start_from, $limit";
    $result = mysqli_query($db, $sql);
    $list = array();
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $list[] = $row;
        }
        echo json_encode($list);
    }
?>