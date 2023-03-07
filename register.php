<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = $_POST['email'];
    $username = $_POST['Username'];
    $password = $_POST['password'];
    $nohp = $_POST['NoHp'];
    $image = $_POST['userImage'];
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = false;
      }
    else{
        $emailErr = true;
    }

    $sql = "SELECT * FROM user WHERE email = '$email' OR NoHp = '$nohp'";
    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);

    $n = 5;
    $mid = 'miarao-'.bin2hex(random_bytes($n));

    if($emailErr = true){
        if ($count >= 1) {
            echo json_encode("data already exist");
        }else{
            $insert  = "INSERT INTO user (email, password, id_user, Username, NoHp, status, spamHour, petCount, image) VALUES ('$email', '$password', '$mid', '$username', '$nohp', 'safe', '0', '0', '$image')";
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