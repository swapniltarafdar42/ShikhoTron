<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" type="text/css" href="css/all.min.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

  <!-- Student Testimonial Owl Slider CSS -->
  <link rel="stylesheet" type="text/css" href="css/owl.min.css">
  <link rel="stylesheet" type="text/css" href="css/owl.theme.min.css">
  <link rel="stylesheet" type="text/css" href="css/testyslider.css">

  <!-- Custom Style CSS -->
  <link rel="stylesheet" type="text/css" href="./css/style.css" />
  <title>ShikhoTron</title>
</head>
<body>
  <!-- Start Navigation -->
  <nav class="navbar navbar-expand-sm navbar-dark pl-5 fixed-top">
    <a href="index.php" class="navbar-brand">ShikhoTron</a>
    <span class="navbar-text">Knowledge into Action</span>
   
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="myMenu">
      <ul class="navbar-nav pl-5 custom-nav">
        <!-- Existing menu items -->
        <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item custom-nav-item"><a href="courses.php" class="nav-link">Courses</a></li>

        <?php 
        session_start();   
        if (isset($_SESSION['is_login'])){
          echo '<li class="nav-item custom-nav-item"><a href="student/studentProfile.php" class="nav-link">My Profile</a></li> <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
        } else {
          echo '<li class="nav-item custom-nav-item"><a href="#login" class="nav-link" data-toggle="modal" data-target="#stuLoginModalCenter">Login</a></li> <li class="nav-item custom-nav-item"><a href="#signup" class="nav-link" data-toggle="modal" data-target="#stuRegModalCenter">Signup</a></li>';
        }
        ?> 

        <!-- Additional menu items -->
        <li class="nav-item custom-nav-item"><a href="#Feedback" class="nav-link">Feedback</a></li>
        <li class="nav-item custom-nav-item"><a href="#Contact" class="nav-link">Contact</a></li>

        <!-- New menu item -->
        <li class="nav-item custom-nav-item"><a href="jobs.php" class="nav-link">Jobs</a></li>

        <!-- New menu item -->
        <li class="nav-item custom-nav-item"><a href="http://localhost/moodle1" class="nav-link" target="_blank">Join us on Moodle</a></li>
      </ul>
    </div>
  </nav> <!-- End Navigation -->
</body>
</html>
