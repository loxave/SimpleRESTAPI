<?php

    define('HOST','Localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DB','db_notes');

    $db_connect = mysqli_connect(HOST, USER, PASSWORD, DB) or die ('Unable connect');
    
    
    header('Content-Type: application/json');

?>