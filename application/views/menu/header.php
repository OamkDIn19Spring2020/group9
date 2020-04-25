<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CampIn</title>
    <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

      <!-- jQuery ui css library -->
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

      <!-- Popper JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo site_url('camp') ?>">CampIn</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('camp/show_campgrounds') ?>">Campgrounds <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <ul class="navbar-nav ml-auto">
      <?php
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
        echo '<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  '.$_SESSION['username'].'
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="'.site_url('mycampgrounds').'">My Campsites</a>
                  <a class="dropdown-item" href="'.site_url('myreservations').'">My Reservations</a>
                  <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="'.site_url('myaccount').'">Account Settings</a>
                  </div>
              </li>';
      }
      ?>
      <li class="nav-item">
        <?php
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
          echo '<a class="nav-link" href="'.site_url('login/logout').'">Logout</a>';
        }
        else{
          echo '<a class="nav-link" href="'.site_url('login').'">Login</a>';
          echo '<li class="nav-item">
          <a class="nav-link" href="'.site_url('signup').'">Sign Up</a>
                </li>';
        }
        ?>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
