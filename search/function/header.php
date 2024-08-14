<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>AU ResPor | Search Page</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="resource/img/logo.png" rel="icon">
  <link href="resource/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link href="https://fonts.cdnfonts.com/css/trajan-pro" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" href="resource/css/bootstrap.min.css">
  <link rel="stylesheet" href="resource/css/mdb.min.css">

  <!-- Libraries CSS Files -->
  <link href="resource/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="resource/lib/animate/animate.min.css" rel="stylesheet">
  <link href="resource/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="resource/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="resource/css/style_mainpage.css" rel="stylesheet">
  <link href="resource/css/style_header-footer.css" rel="stylesheet">
  <link href="resource/css/addons.css" rel="stylesheet">

</head>

<body>

  <?php
  // session_start();
  include "function/db.php";
  include "function/DB.func.php";
  include "function/functions.php";
  include "function/Message.func.php";
  ?>

  <!-- Header -->
  <header id="header" class="fixed-top">
    <div class="button-container">
      <a href="https://arellano.edu.ph/"><p class="return-button">Go Back to Main Page</p></a>
    </div>
    <img src="resource/img/logo.png" class="img-fluid" id="logo-img">
    <div class="logo float-left">
      <h1>ARELLANO UNIVERSITY<h1>
    </div>
  </header>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="resource/lib/jquery/jquery.min.js"></script>
  <script src="resource/lib/jquery/jquery-migrate.min.js"></script>
  <script src="resource/lib/easing/easing.min.js"></script>
  <script src="resource/lib/mobile-nav/mobile-nav.js"></script>
  <script src="resource/lib/wow/wow.min.js"></script>
  <script src="resource/lib/waypoints/waypoints.min.js"></script>
  <script src="resource/lib/counterup/counterup.min.js"></script>
  <script src="resource/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="resource/lib/isotope/isotope.pkgd.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

  <!-- Template Main Javascript File -->
  <script src="resource/js/main.js"></script>

  <!-- Validate Search -->
  <script src="function/validate_search.js"></script>
  
</body>

</html>