<?php


require_once('helper.php');
parse_str(file_get_contents('php://input'), $value);

    $id = $value['id'];
    $judul = $value['judul'];
    $author = $value['author']; 
    $year = $value['year'];

    $query = "UPDATE notes SET judul='$judul', author='$author', year='$year' WHERE id='$id'";

    $sql = mysqli_query($db_connect, $query);


    if($sql) {

        echo json_encode(array('Message:' =>  'Updated!')); 

    } else {
        echo json_encode(array('Message:' =>  'failed update !')); 

    }

    

?>