<?php 
    
    include './externals/_dbconnect.php';

    $blogID = $_POST["bgID"];

    $sql = "DELETE FROM blogs WHERE blog_id = '$blogID'";
    
    if(mysqli_query($conn, $sql)){
        echo 1;
    }else{
        echo 0;
    }

?>