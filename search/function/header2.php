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
  <link href="../resource/img/logo.png" rel="icon">
  <link href="../resource/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <!link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link href="https://fonts.cdnfonts.com/css/trajan-pro" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" href="../resource/css/bootstrap.min.css">
  <link rel="stylesheet" href="../resource/css/mdb.min.css">

  <!--  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

  <!-- Libraries CSS Files -->
  <link href="../resource/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../resource/lib/animate/animate.min.css" rel="stylesheet">
  <link href="../resource/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../resource/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../resource/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../resource/css/style_mainpage.css" rel="stylesheet">
  <link href="../resource/css/addons.css" rel="stylesheet">
  <link href="../resource/css/style_header-footer.css" rel="stylesheet">
</head>

<body>
  <!-- Header -->
  <header id="header" class="fixed-top">
    <div class="button-container">
      <a href="https://arellano.edu.ph/"><p class="return-button">Go Back to Main Page</p></a>
    </div>
    <a href="../result.php"><img src="../resource/img/logo.png" class="img-fluid" id="logo-img"></a>
    <div class="logo float-left">
      <h1>ARELLANO UNIVERSITY<h1>
    </div>
  </header>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <script src="../resource/lib/easing/easing.min.js"></script>
  <script src="../resource/lib/mobile-nav/mobile-nav.js"></script>
  <script src="../resource/lib/wow/wow.min.js"></script>
  <script src="../resource/lib/waypoints/waypoints.min.js"></script>
  <script src="../resource/lib/counterup/counterup.min.js"></script>
  <script src="../resource/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../resource/lib/isotope/isotope.pkgd.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <script src="../resource/js/main.js"></script>
  <script src="../resource/assets/datatables.min.js"></script>  
  <script src="main.js"></script>

  <style>
    h2, p {
      padding: 0;
      margin: 0;
    }

    p {
      text-overflow: ellipsis;
      overflow: hidden;
      white-space: nowrap;
    }

    #body-container{
      position: relative; margin-top: 155px; 
      flex-grow: 1; 
      padding-bottom: 20px;
    }

    #banner {
      width: 100%;
      position: relative;
    }

    #class-banner{
      style="width: 5rem; 
      padding:5px; 
      background-color: #000;"
    }

    #btn-fullview {
      position:relative; 
      bottom:40px;
    }

    @media screen and (max-width: 600px) {
      #banner-button {
        top: 30px;
        float: left;
      }

      #body-container{
        position: relative; margin-top: 80px; 
        flex-grow: 1; 
        padding-bottom: 30px;
      }
    }
  </style>
</body>

</html>