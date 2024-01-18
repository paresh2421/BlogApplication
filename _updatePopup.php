<?php 

 include './externals/_dbconnect.php';

 $blogID = $_POST["bgID"];

 $sql = "SELECT * FROM blogs WHERE blog_id = {$blogID}";
 
 $res = mysqli_query($conn, $sql) or die("SQL Query Failed.");
 $output = "";
 if(mysqli_num_rows($res) > 0 ){
 
   while($row = mysqli_fetch_assoc($res)){
     $output .= "<tr>
       <td width='90px'>Blog Title</td>
       <td><input type='text' id='edit-bgT' value='{$row["blog_title"]}'>
           <input type='text' id='edit-id' hidden value='{$row["blog_id"]}'>
       </td>
     </tr>
     <tr>
       <td>Blog Content</td>
       <td><input type='text' id='edit-bgC' value='{$row["blog_content"]}'></td>
     </tr>
     <tr>
       <td></td>
       <td><input type='submit' id='edit-submit' value='Update'></td>
     </tr>";
 
   }
 
     mysqli_close($conn);
 
     echo $output;
 }else{
     echo "<h2>No Record Found.</h2>";
 }
 

?>