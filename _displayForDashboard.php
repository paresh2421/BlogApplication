<?php 

include './externals/_dbconnect.php';
session_start();

$userid = $_SESSION['userID'];

$sql = "select * from blogs where user_id = '$userid'";

$res = mysqli_query($conn, $sql) or die("SQL query failed");
$output ="";
if(mysqli_num_rows($res)>0){
    $output = '<table id="userBlogsTab" width="100%">
                <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Blog</th>
                <th>Delete</th>
                <th>Edit</th>
                </tr>';

                while($row = mysqli_fetch_assoc($res)){
                    $output .= "<tr>
                    <td>{$row["blog_id"]}</td> 
                    <td>{$row["blog_title"]}</td>
                    <td>{$row["blog_content"]}</td>
                    <td><button class='delete-btn' data-id='{$row["blog_id"]}'>Delete</button></td>
                    <td><button class='edit-btn' data-eid='{$row["blog_id"]}'>Edit</button></td>
                               </tr>";
                }
    $output .= "</table>"; 
    
    mysqli_close($conn);

    echo $output;
}
else{
    echo "<h2> no record found </h2>";
}
?>