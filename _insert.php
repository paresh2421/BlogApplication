<?php 
    
    include './externals/_dbconnect.php';
    session_start();
    $userid = $_SESSION['userID'];
    $blogTitle = $_POST["bgT"];
    $blogContent = $_POST["bgC"];
    
    // echo $blogTitle;
    // echo $blogContent;

    $sql = "insert into blogs(blog_title, blog_content, user_id) values('$blogTitle', '$blogContent', '$userid')";
    $res = mysqli_query($conn, $sql);
    if($res){
        echo 1;
    }
    else{
        echo 0;
    }
?>
