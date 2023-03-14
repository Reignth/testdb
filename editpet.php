<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id_pet= $_POST['id_pet'];
    $nama_pet = $_POST['nama_pet'];
    $jenis = $_POST['jenis'];
    $breed = $_POST['breed'];
    $gender = $_POST['gender'];
    $berat = $_POST['berat'];
    $petDoB = $_POST['petDoB'];
    $petImage = $_POST['petImage'];

    $currentDate = new DateTime();
    $input_date = new DateTime($petDoB);
    $interval = $currentDate->diff($input_date);
    $agefix = $interval->m + ($interval->y * 12);


    $update  = "UPDATE pet SET nama_pet ='$nama_pet', jenis = '$jenis', breed = '$breed', gender = '$gender', berat = '$berat', petDoB = '$petDoB', petImage = '$petImage', umur = '$agefix' WHERE id_pet = '$id_pet'";
    $query = mysqli_query($db, $update);
    if ($query) {
        echo json_encode("Success");
    }
    else{
        echo json_encode("Error");
    }
?>
