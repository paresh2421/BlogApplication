<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="./styles/style.css">

</head>

<body>
    
    <div class="container">
        <h1 class="text-center">Sign up to our Blog</h1>
        <form method="post" id="signup">
            <div class="">
                <label for="username" class="form-label">Username</label>
                <input type="text" maxlength="12" class="form-control" id="username" name="username" aria-describedby="emailHelp"> <br /> <br />
            </div>
            <div class="">
                <label for="useremail" class="form-label">User Email</label>
                <input type="email" maxlength="30" class="form-control" id="useremail" name="useremail" aria-describedby="emailHelp"><br /><br />
            </div>
            <div class="">
                <label for="password" class="form-label">Password</label>
                <input type="password" maxlength="20" class="form-control" id="password" name="password"><br /><br />
            </div>
            <div class="">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" maxlength="20" class="form-control" id="cnfpassword" name="cnfpassword"><br /><br />
                <div id="emailHelp" class="form-text">Make sure to type the same password.</div><br /><br />
            </div>
            <div id="errorMsg"></div>
            <button id="regButton" type="submit" class="btn btn-primary">Sign up</button>
        </form>
        <p>Click here to go to <a id="loginpage" href="signinPage.php">login</a>, if you're already registered<p><br />
        <a href="/BlogApplication">Home</a>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("form").submit(function(event) {
                event.preventDefault();
                var formData = {
                    uname: $("#username").val(),
                    umail: $("#useremail").val(),
                    upass: $("#password").val(),
                    ucnfpass: $("#cnfpassword").val()
                };

                if(formData.uname == "" || formData.umail== "" || formData.upass == "" || formData.ucnfpass ==""){
                    $("#errorMsg").html("All fields are required");
                    exit;
                }
                
                var mailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/i;
                if(!mailPattern.test(umail)){
                    $("#errorMsg").html("Please enter a proper email");
                }
                $.ajax({
                    type: "POST",
                    url: "_register.php",
                    data: formData,
                    success: function(response){
                        if(response == "Registration successful"){
                            window.location = "signinPage.php";
                        }
                        else{
                            $("#errorMsg").html(response);
                            exit;
                        }
                    }
                })

            });
            $("#loginpage").bind('click', function(){
                        $.ajax({
                            // type: "POST",
                            url: $(this).attr('href')
                        })
                    })
        });
    </script>
</body>

</html>