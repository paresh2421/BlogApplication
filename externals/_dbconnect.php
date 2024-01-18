<?php 
    $server = "localhost";
    $uname = "root";
    $pass = "";
    $dbname = "blogApp";

    $conn = mysqli_connect($server, $uname, $pass, $dbname);

    if(!$conn){
        die("Error" . mysqli_connect_error());
    }
