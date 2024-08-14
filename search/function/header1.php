<?php
// session_start();
  include "db.php";
  include "DB.func.php";
  include "functions.php";
  include "Message.func.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="resource/img/logo.png" rel="icon">
  <link href="resource/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <!link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link href="https://fonts.cdnfonts.com/css/trajan-pro" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" href="./resource/css/bootstrap.min.css">
  <link rel="stylesheet" href="./resource/css/mdb.min.css">


  <!-- Datatables -->
  <link href="resource/assets/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!---->

  <!-- Libraries CSS Files -->
  <link href="resource/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="resource/lib/animate/animate.min.css" rel="stylesheet">
  <link href="resource/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="resource/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="resource/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="resource/css/style.css" rel="stylesheet">
  <link href="resource/css/addons.css" rel="stylesheet">
  <link href="resource/css/style_header-footer.css" rel="stylesheet">

</head>

<body>

  <!-- Header -->
  <header id="header" class="fixed-top">
    <div class="button-container">
      <a href="https://arellano.edu.ph/"><p class="return-button">Go Back to Main Page</p></a>
    </div>
    <a href="result.php"><img src="resource/img/logo.png" class="img-fluid" id="logo-img"></a>
    <div class="logo float-left">
      <h1>ARELLANO UNIVERSITY<h1>
    </div>
  </header>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <div id="preloader"></div>
  <!-- Tables CDN -->

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
  <!-- <script src="contactform/contactform.js"></script> -->

  <!-- Template Main Javascript File -->
  <script src="resource/js/main.js"></script>
  <script src="view/main.js"></script>

  <!---Validate Search--->
  <script src="function/validate_search.js"></script>

  <style>
    .pagination {
      display: inline-block;
    }

    .pagination a {
      color: black;
      float: left;
      padding: 8px 16px;
      text-decoration: none;
      transition: background-color .3s;
      border-radius: 5px;
    }

    .pagination a.active {
      background-color: #007bff;
      color: white;
      border-radius: 5px;
    }

    li {
      display: inline-block;
    }

    .pagination a:hover:not(.active) {background-color: #ddd;}

    #main{
      background-color: #eff4fa;
      display: flex; 
      flex-direction: column; 
      min-height: 100vh;
    }

    #header-one {
      padding-top: 160px;
      width: 100%;
      position: relative;
    }

    .wrap {
      padding-left: 10%;
      padding-right: 10%;
    }

    #search_type {
      margin-left: 4px;
    }

    input[type=text]{
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
      margin-top: 2px;
    }

    select{
      width: 70%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
      margin-top: 2px;
    }

    label.filter {
      display: inline-block;
    }

    .col-20 {
      float: right;
      width: 10%;
      text-align: center;
    }

    .col-40 {
      float: left;
      width: 45%;
    }

    input, select{
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
    }

    .title, .list-inline {
        margin-left: 40px;
    }

    @media screen and (max-width: 600px) {
      .col-20, .col-40, input[type=submit], select {
        width: 100%;
        margin-top: 0;
        margin-bottom: 2;
      }

      .col-20 {
        text-align: left;
      }

      #header-one {
        padding-left: 0;
        padding-top: 80px;
      }

      #txtsearch {
        margin-bottom: 5px;
      }

      #search_type {
        margin-left: 0px;
      }

      .title, .list-inline {
        margin-left: 0px;
      }

      .wrap {
        padding-left: 0%;
        padding-right: 0%;
      }
      .pagination a {
        font-size: 12px;
      }
    }
  </style>
</body>

</html>