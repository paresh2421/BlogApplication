<?php
$loggedin = false;
$notloggedin = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include './externals/_dbconnect.php';

    $user = $_POST['username'];
    $pass = $_POST['password'];

    $query = "select * from bloggers where blogger_name = '$user'";
    $res = mysqli_query($conn, $query);

    $numrows = mysqli_num_rows($res);

    if ($numrows == 1) {
        while ($row = mysqli_fetch_assoc($res)) {
            if (password_verify($pass, $row['password'])) {
                $loggedin = true;
                session_start();
                $_SESSION['loginDone'] = true;
                $_SESSION['username'] = $user;
                header('location: homepage.php');
            } else {
                $notloggedin = "Invalid Credentials";
            }
        }
    } else {
        $notloggedin = "Invalid Credentials";
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php require './externals/navbar.php' ?>
    <?php
    if ($loggedin) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are now logged in.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if ($notloggedin) {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error</strong>' . $notloggedin .
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <div class="container">
        <h1 class="text-center">Login to the blog</h1>
        <form action="/signinPage.php" method="post">
            <div class="mb-3 col-md-6">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>