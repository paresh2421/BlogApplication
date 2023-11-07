<?php
$success = false;
$failed = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include './externals/_dbconnect.php';

    $umail = $_POST['useremail'];
    $uname = $_POST['username'];
    $upass = $_POST['passoword'];
    $cnfupass = $_POST['cnfpassword'];

    $userThereOrNo = "Select * from bloggers where blogger_email = '$umail'";

    $res = mysqli_query($conn, $userThereOrNo);

    $rowsWithSameMail = mysqli_num_rows($res);

    if ($rowsWithSameMail > 0) {
        $failed = "This email is already in use. Please use another email or login.";
    } else {
        if ($upass == $cnfupass) {
            $pwHash = password_hash($pass, PASSWORD_DEFAULT);
            $query = "insert into 'bloggers' ('blogger_email', 'blogger_name', 'blogger_pass') values ('$umail', '$uname', '$pwHash')";

            $insQry = mysqli_query($conn, $query);
            if ($insQry) {
                $success = true;
            } else {
                $failed = "Passwords do not match";
            }
        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php require './externals/navbar.php'; ?>
    <?php
    if ($success) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! </strong> Your account is now created and you can go back to login page.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if ($failed) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error </strong>' . $failed .
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>

    <div class="container">
        <h1 class="text-center">Sign up to our Blog</h1>
        <form action="/registerPage.php" method="post" id="signup">
            <div class="mb-3 col-md-6">
                <label for="username" class="form-label">User Email</label>
                <input type="email" maxlength="30" class="form-control" id="useremail" name="useremail" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 col-md-6">
                <label for="username" class="form-label">Username</label>
                <input type="text" maxlength="12" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" maxlength="20" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3 col-md-6   ">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" maxlength="20" class="form-control" id="cnfpassword" name="cnfpassword">
                <div id="emailHelp" class="form-text">Make sure to type the same password.</div>
            </div>
            <button type="submit" class="btn btn-primary">Sign up</button>
        </form>
    </div>
</body>

</html>