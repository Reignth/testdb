<?php
    header("Access-Control-Allow-Origin: *");
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


    $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($db, $sql);


    $list = array();
    if($emailErr = true){
        while ($row = mysqli_fetch_assoc($result)){
            $list[] = $row;
        }
        echo json_encode($list);
    }
    else{
        echo json_encode("Invalid email");
    }

?>
