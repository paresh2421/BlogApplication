<?php

if (isset($_SESSION['loginDone']) && $_SESSION['loginDone'] == true) {
  $loginDone = true;
} else {
  $loginDone = false;
}

echo '<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/BlogApplication">Sample Blog app</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/BlogApplication">Home</a>
        </li>';

if (!$loginDone) {
  echo '<li class="nav-item">
          <a class="nav-link" href="signinPage.php">Sign in</a>
          </li>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="registerPage.php">Register</a>
          </li>';
}

if ($loginDone) {

  echo '
          <li class="nav-item">
          <a class="nav-link" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
          </li>';
}
