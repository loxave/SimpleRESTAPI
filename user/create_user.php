<?php


    require_once('help_me.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $gambar = $_POST['gambar'];

    $query = "INSERT INTO user(username, password, email, nama) VALUES ('$username','$password','$email','$nama')";

    $sql = mysqli_query($db_connect, $query);


    if($sql) {
  
        echo json_encode(array('Message' => 'Created'));

    } else {
        echo json_encode(array('Message' => 'Created Failed'));

        
    }


?>