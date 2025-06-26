<?php
    error_reporting(0);
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "test";
    


    $conn = mysqli_connect($server, $user, $password, $db);

    if($conn -> connect_error){
        die("connection failed". $conn->connect_error);

    }
   // echo "connected";


?>