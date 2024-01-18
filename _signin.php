<?php
// $loggedin = false;
// $notloggedin = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include './externals/_dbconnect.php';

    $user = $_POST['uname'];
    $upass = $_POST['upass'];

    // if(empty($uname) || empty($upass)){
    //     echo "Both fields are required";
    //     exit;
    // }

    $query = "select * from users where user_name = '$user'";
    $res = mysqli_query($conn, $query);

    $numrows = mysqli_num_rows($res);

    if ($numrows == 1) {
        while ($row = mysqli_fetch_assoc($res)) {
            if (password_verify($upass, $row['user_password'])) {
                // $loggedin = true;
                echo "loggedin";
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $user;
                $_SESSION['userID'] = $row['user_id'];
            } else {
                echo "Invalid Credentials";
            }
        }
    } else {
        echo "Invalid Credentials or user not registered";
    }
}
// password_verify($pass, $row['user_password'])

?>