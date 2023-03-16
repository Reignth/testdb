 <?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id_pet = $_POST['id_pet'];


    $del  = "DELETE a.*, b.* FROM pet a
    INNER JOIN vaccinecert b ON a.id_pet = b.id_pet
    WHERE a.id_pet='$id_pet'";
    
    $query = mysqli_query($db, $del);
    if ($query) {
        echo json_encode("Success");
    }
    else{
        echo json_encode("Error");
    }
?>