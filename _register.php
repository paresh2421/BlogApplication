<?php
// $success = false;
// $failed = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include './externals/_dbconnect.php';
    
    //getting the values from ajax
    $uname = $_POST['uname'];
    $umail = $_POST['umail'];
    $upass = $_POST['upass'];
    $ucnfpass = $_POST['ucnfpass'];

    // checking if the fields are empty
    // if(empty($uname) || empty($umail) || empty($upass) || empty($ucnfpass)){
    //     echo "Please fill the form";
    //     exit;
    // }

    //verifying whether the use already exists or not
    $userThereOrNo = "Select * from users where user_email = '$umail'";

    $res = mysqli_query($conn, $userThereOrNo);

    $rowsWithSameMail = mysqli_num_rows($res);

    if ($rowsWithSameMail > 0) {
        echo "This email is already in use. Please use another email or login.";
    } else {
        //checks if the password is same or not. if its not same, it'll be stored in the database
        if ($upass == $ucnfpass) {
            $pwHash = password_hash($upass, PASSWORD_DEFAULT);
            $query = "insert into users (user_name, user_email, user_password) values ('$uname', '$umail', '$pwHash')";
            
            $insQry = mysqli_query($conn, $query);
            if ($insQry) {
                echo "Registration successful";
            }else{
                echo "Failed to register, please try again later";
            }
        }else {
            echo "Passwords do not match";
            // exit;
        }
    }
}

?>