<?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = false;
      }
    else{
        $emailErr = true;
    }



    $sql = "SELECT * FROM vendor WHERE email = '$email' AND password = '$password' AND status == '1'";
    $result = mysqli_query($db, $sql);

    $sql2 = "SELECT * FROM vendor WHERE email = '$email' AND password = '$password' AND status == '0'";
    $result2 = mysqli_query($db, $sql2);

    $list = array();
    if($emailErr = true && $result){
        while ($row = mysqli_fetch_assoc($result)){
            $list[] = $row;
        }
        echo json_encode($list);
    }
    else if($emailErr = true && $result2){
        echo json_encode("your account has not been verified yet, please wait");
    }
    else{
        echo json_encode("Invalid Password or Email");
    }

?>
