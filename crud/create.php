<?php

//Create

    require_once('helper.php');

    $judul = $_POST['judul'];
    $author = $_POST['author'];
    $year = $_POST['year'];

    $query = "INSERT INTO notes(judul, author, year) VALUES ('$judul','$author','$year')";
    $sql = mysqli_query($db_connect, $query);

    if($sql) {

        echo json_encode(array('message' => 'created!'));
    } else {
        echo json_encode(array('message' => 'error!'));
    }


    

?>