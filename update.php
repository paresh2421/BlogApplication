<?php

include './externals/_dbconnect.php';

$blogID = $_POST["blogID"];
$blogTitle = $_POST["blogTitle"];
$blogContent = $_POST["blogContent"];


$sql = "UPDATE blogs SET blog_title = '$blogTitle',blog_content = '$blogContent' WHERE blog_id = '$blogID'";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}

?>