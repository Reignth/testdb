<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id_user = $_POST['id_user'];
    $image = $_POST['image'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $dob = $_POST['dob'];
    $nohp = $_POST['nohp'];

    $currentDate = date("d-m-Y");
    $age = date_diff(date_create($dob), date_create($currentDate));
    $agefix = $age->format("%y") * 12;
    

   

    $update  = "UPDATE user SET image ='$image', username, = '$username', email = '$email', alamat = '$alamat', dob = '$dob', nohp = '$nohp', umur = '$agefix' WHERE id_user = '$id_user'";
    $query = mysqli_query($db, $update);
    if ($query) {
        echo json_encode("Success");
    }
    else{
        echo json_encode("Error");
    }
?>