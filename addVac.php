<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id_pet = $_POST['id_pet'];
    $seriVac= $_POST['seriVac'];
    $tglVac = $_POST['tglVac'];
    $expVac = $_POST['expVac'];
    $jenisVac = $_POST['jenisVac'];
    $tempatVac = $_POST['tempatVac'];
    $imgVac = $_POST['imgVac'];
   

    $insert  = "INSERT INTO vaccinecert (id_pet, seriVac, tglVac, expVac, jenisVac, tempatVac, imgVac) VALUES ('$id_pet', '$seriVac', '$tglVac', '$expVac', '$jenisVac', '$tempatVac','$imgVac')";
    $query = mysqli_query($db, $insert);

    $n = 5;
    $notif_id = 'comment-'.bin2hex(random_bytes($n));

    $sql_notif = "INSERT INTO notif (id_user, id_pet, notif_msg, notif_type, notif_id, notif_date, nama_pet) VALUES ('$id_user', '$id_pet', 'Vaccine Added for', 'addvac', '$notif_id', NOW(), (SELECT nama_pet FROM pet WHERE id_pet = '$id_pet'))";
    $insert_notif = mysqli_query($db, $sql_notif);

    if ($query) {
        echo json_encode("Success");
    }
    else{
        echo json_encode("Error");
    }
?>