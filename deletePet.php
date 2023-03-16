 <?php
    header("Access-Control-Allow-Origin: *");
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id_pet = $_POST['id_pet'];

    $delpet = "DELETE FROM pet WHERE id_pet = '$id_pet'";
    $query1 = mysqli_query($db, $delpet);

    $delcert = "DELETE FROM vaccinecert WHERE id_pet = '$id_pet'";
    $query2 = mysqli_query($db, $delcert);

    if ($query1 && $query2) {
        echo json_encode("Success");
    }
    else{
        echo json_encode("Error");
    }
?>
