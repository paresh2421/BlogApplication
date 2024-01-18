<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Login to the blog</h1>
        <form method="post">
            <div class="">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp"><br/><br/>
                <!-- <div id="errorMsg"></div> -->
            </div>
            <div class="">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password"><br /><br />
                <div id="errorMsg"></div>
            </div>
            <button id="loginBtn" type="submit" class="btn btn-primary">Login</button>
        </form>
        <p>Not Registered? <a id="registerPage" href="registerPage.php">Click here to register</a></p><br />
        <a href="/BlogApplication">Home</a>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
    <script>
        $(document).ready(function() {
            $("form").submit(function(event) {
                event.preventDefault();
                var formData = {
                    uname: $("#username").val(),
                    upass: $("#password").val() 
                };
                
                if(formData.uname == "" || formData.upass == "")
                {
                    $("#errorMsg").html("Both fields are required");
                    exit;
                }

                $.ajax({
                    type: "POST",
                    url: "_signin.php",
                    data: formData,
                    success: function(response){
                        // alert(response);
                        if(response == "loggedin"){
                            window.location = "homepage.php";
                        }
                        else{
                            alert(response);
                        }
                    },
                    error: function(error){
                        alert("Error: " + error);
                    }
                })

            });
            $("#registerPage").bind('click', function(){
                    $.ajax({
                        // type: "POST",
                        url: $(this).attr('href')
                    })
                })
        });
    </script>
</body>

</html>