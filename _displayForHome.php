<?php 

include './externals/_dbconnect.php';

$sql = "select * from blogs";

$res = mysqli_query($conn, $sql) or die("SQL query failed");
$output ="";
if(mysqli_num_rows($res)>0){
    $output = '<table id="commonBlogs" width="100%">
                <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Blog Content</th>
                <th>Date</th>
                </tr>';

                while($row = mysqli_fetch_assoc($res)){
                    $output .= "<tr>
                    <td>{$row["blog_id"]}</td> 
                    <td>{$row["blog_title"]}</td>
                    <td>{$row["blog_content"]}</td>
                    <td>{$row["created_date"]}</td>
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