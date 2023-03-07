<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $db->set_charset('utf8mb4');
    date_default_timezone_set('Asia/Jakarta');

    $id_user = $_POST['id_user'];
    $nama_pet = $_POST['nama_pet'];
    $jenis = $_POST['jenis'];
    $breed = $_POST['breed'];
    $gender = $_POST['gender'];
    $berat = $_POST['berat'];
    $umur = $_POST['umur'];

    $sql = "SELECT * FROM pet";
    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);

    $n = 5;
    $mid = 'pet-'.bin2hex(random_bytes($n));

    $insert  = "INSERT INTO pet (id_pet, id_user, nama_pet, jenis, breed, gender, berat, umur) VALUES ('$mid', '$id_user', '$nama_pet', '$jenis', '$breed', '$gender', '$berat', '$umur')";
    $query = mysqli_query($db, $insert);
    
    $n = 5;
    $notif_id = 'comment-'.bin2hex(random_bytes($n));

    $sql_notif = "INSERT INTO notif (id_user, id_pet, notif_msg, notif_type, notif_id, notif_date, nama_pet) VALUES ('$id_user', '$mid', 'Added to your list', 'addpet', '$notif_id', NOW(), '$nama_pet')";
    $insert_notif = mysqli_query($db, $sql_notif);

    if ($query) {
        echo json_encode("Success");
}

?>