<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: signinPage.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Blog App</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
    <?php require './externals/navbar.php'; ?>
    <div id="homeDiv">
      
      <!-- <a href="/BlogApplication">Home</a> -->
      <h1 align="center">Blogs</h1>
      <table id="main" border="1" cellspacing="5" cellpadding="5">
            <tbody id="load-table"></tbody>
          </table>
  </div>
<hr>
    <!-- <footer>
      <h3>© 2023 All rights reserved.</h3>
    </footer> -->
  <?php require './externals/footer.php';?>
  <div id="error-message" class="messages"></div>
  <div id="success-message" class="messages"></div>
   
  <script type="text/javascript">
    $(document).ready(function(){
      function loadTable(){
        $.ajax({
          url: "_displayForHome.php",
          type: "POST",
          success: function(data){
            $("#load-table").html(data);
          }
        })
      }
      loadTable();
    });
  </script>
</body>
</html> 