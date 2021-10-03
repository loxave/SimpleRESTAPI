<?php


    require_once('help_me.php');

    parse_str(file_get_contents('php://input'),$value); 

    $id = $value ['id'];
    $username = $value ['username'];
    $password= $value ['password'];
    $email= $value ['email'];
    $nama = $value ['nama'];

    $query = "UPDATE user SET username = '$username', password = '$password', email = '$email', nama = '$nama' WHERE id = '$id'";

    $sql = mysqli_query($db_connect, $query);


    if($sql) {
  
        echo json_encode(array('Message' => 'Updated'));

    } else {
        echo json_encode(array('Message' => 'Update fail'));

        
    }


?>