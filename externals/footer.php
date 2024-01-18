<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="./styles/style.css">
</head>
<body>

    <?php
    if (isset($_SESSION['loginDone']) && $_SESSION['loginDone'] == true) {

        echo '<footer>
        © 2024 All rights reserved.
    <a href="logout.php">Logout </a>
    <a href="dashboard.php">Dashboard </a>
    </footer>';
    } else {
        echo ' <footer>
        © 2024 All rights reserved
    <button><a href="signinPage.php">Sign </a></button>
    <button><a href="registerPage.php">Register </a></button>
<footer>';
    }
    ?>
    <!-- <h1 class="logo">Sample Blog application</h1> -->
</body>

</html>



