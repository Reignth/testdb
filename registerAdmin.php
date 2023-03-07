<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nohp = $_POST['nohp'];
    
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = false;
      }
    else{
        $emailErr = true;
    }

    $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password' AND nohp = '$nohp'";
    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);

    $n = 5;
    $mid = 'admin-'.bin2hex(random_bytes($n));

    if($emailErr = true){
        if ($count == 1) {
            echo json_encode("Error");
        }else{
            $insert  = "INSERT INTO admin (email, `password`, id, username, nohp, role) VALUES ('$email', '$password', '$mid', '$username', '$nohp', 'admin')";
            $query = mysqli_query($db, $insert);
            if ($query) {
                echo json_encode("Success");
            }
        }
    }
    else{
        echo json_encode("Invalid Email");
    }

?>