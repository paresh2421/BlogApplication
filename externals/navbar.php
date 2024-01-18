<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .logo {
            position: relative;
            left: 100px;
        }

        .right {
            position: fixed;
            right: 10px;
        }
    </style>
</head>

<body>

    <?php
    // session_start();
    if (isset($_SESSION['loginDone']) && $_SESSION['loginDone'] == true) {

        echo '<div class="right">
        <div >' . $_SESSION['username'] . '</div>
    <a href="logout.php">Logout </a>
    <a href="dashboard.php">Dashboard </a>
    </div>';
    } else {
        echo ' <div class="right">
    <button><a href="signinPage.php">Sign </a></button>
    <button><a href="registerPage.php">Register </a></button>
</div>';
    }
    ?>
    <h1 class="logo">Blog application</h1>
</body>

</html>

<?php

// if (isset($_SESSION['loginDone']) && $_SESSION['loginDone'] == true) {
//   $loginDone = true;
// } else {
//   $loginDone = false;
// }

// echo '<nav class="navbar navbar-expand-lg bg-body-tertiary">
//   <div class="container-fluid">
//     <a class="navbar-brand" href="/BlogApplication">Sample Blog app</a>
//     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
//       <span class="navbar-toggler-icon"></span>
//     </button>
//     <div class="collapse navbar-collapse" id="navbarSupportedContent">
//       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
//         <li class="nav-item">
//           <a class="nav-link active" aria-current="page" href="/BlogApplication">Home</a>
//         </li>';

// if (!$loginDone) {
//   echo '<li class="nav-item">
//           <a class="nav-link" href="signinPage.php">Sign in</a>
//           </li>
//           </li>
//           <li class="nav-item">
//           <a class="nav-link" href="registerPage.php">Register</a>
//           </li>';
// }

// if ($loginDone) {

//   echo '
//           <li class="nav-item">
//           <a class="nav-link" href="dashboard.php">Dashboard</a>
//           </li>
//           <li class="nav-item">
//           <a class="nav-link" href="logout.php">Logout</a>
//           </li>';
// }
