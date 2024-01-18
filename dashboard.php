<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: signinPage.php");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./styles/style.css">
    <title>Welcome</title>
</head>

<body>
  <h1 id="dashboardH">Welcome to Your Blog Dashboard</h1>
    <div class="crudContainer">
        <div class="alert alert-success" role="alert">
   
        <h1>CRUD operations</h1>

        <form id="addForm">
          Blog title : <input type="text" name="blogTitle" id="blogTitle"><br />
          <!-- <div id="errorMsg"></div> -->
          Blog Content: <textarea id="blogContent" rows="4" cols="50"></textarea><br />
          <div id="errorMsg"></div>

          <!-- Blog Content: <input type="text" name="blogContent" id="blogContent" style="width: 50%; height:100px;" /><br /> -->
          <input type="submit" id="saveBtn" value="Save">
        </form>
        <table border="1" cellspacing="5" cellpadding="5">
          <tbody id="load-table"></tbody>
        </table>
  <div id="modal">
    <div id="modal-form">
      <h2>Edit Form</h2>
      <table cellpadding="10px" width="100%">
        
      </table>
      <div id="close-btn">X</div>
    </div>
  </div>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to logout <a href="logout.php"> using this link.</a></p>
        </div>
    </div>
  
    <script>
    $(document).ready(function(){
    //load table
      function loadTable(){
        $.ajax({
          url: "_displayForDashboard.php",
          type: "POST",
          success: function(data){
            $("#load-table").html(data);
          }
        })
      }
      loadTable();

      //inserting the blog
      $("#saveBtn").on("click", function(e){
        e.preventDefault();
        var blogTitle= $("#blogTitle").val();
        var blogContent= $("#blogContent").val();

        if(blogTitle=="" || blogContent==""){
          $("#errorMsg").html("Both fields are required").slideDown();
          exit;
        }

        var urlPattern = /^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/i;
        
        if(urlPattern.test(blogTitle) || urlPattern.test(blogContent)){
          $("#errorMsg").html("URLs are not allowed in this field");
          exit;
        }

        // alert(blogContent + blogTitle);
        $.ajax({
          url: "_insert.php",
          type: "POST",
          data: {bgT: blogTitle, bgC: blogContent},
          success: function(data){
            if(data == 1){
              console.log(data);
              loadTable();
            }
            else{
              alert("Couldn't save the blogs");
            }
          }
        })
      })

      //deletion of blogs
      $(document).on("click", ".delete-btn", function(){
        if(confirm("Do you really want to  delete this blog?")){

        var blogID = $(this).data("id");
        // alert(blogID);
              var element = this;

              $.ajax({
                url: "_delete.php",
                type: "POST",
                data: {bgID: blogID},
                success: function(data){
                  if(data == 1){
                    $(element).closest("tr").fadeOut();
                  }
                  else{
                    alert("Couldn't delete blogs");
                  }
                }
              })
        }

      });
      
      //updating the details
       //show the edit popup
      $(document).on("click", ".edit-btn", function(){
        $("#modal").show();
        var blogID = $(this).data("eid");
        // console.log(blogID);

        //displaying data in the popup
        $.ajax({
          url:'_updatePopup.php',
          type: "POST",
          data: {bgID: blogID},
          success: function(data){
            $("#modal-form table").html(data);
          }
        })
      })

      //hide the edit popup
      $("#close-btn").on("click", function(){
        $("#modal").hide();
      })

      //update the data
      $(document).on("click", "#edit-submit", function(){
        var bgID = $("#edit-id").val();
        var bgT = $("#edit-bgT").val();
        var bgC = $("#edit-bgC").val();

        $.ajax({
          url: 'update.php',
          type: "POST",
          data: {blogID: bgID, blogTitle: bgT, blogContent: bgC},
          success: function(data){
            if(data==1){
              $("#modal").hide();
              loadTable();
            }
          }
        })
      })
    });
    </script>


</body>

</html>