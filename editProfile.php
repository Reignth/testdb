<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $id_user = $_POST['id_user'];
    $image = $_POST['image'];
    $username = $_POST['Username'];
    $email = $_POST['email'];
    $alamat = $_POST['address'];
    $dob = $_POST['dob'];
    $nohp = $_POST['NoHp'];


    $update  = "UPDATE user SET image ='$image', Username = '$username', email = '$email', address = '$alamat', dob = '$dob', NoHp = '$nohp' WHERE id_user = '$id_user'";
    $query = mysqli_query($db, $update);

    $updateStory = "UPDATE story SET userImg ='$image' WHERE id_user = '$id_user'";
    $queryStory = mysqli_query($db, $updateStory);

    if ($query) {
        echo json_encode("Success");
    }
    else{
        echo json_encode("Error");
    }
?>