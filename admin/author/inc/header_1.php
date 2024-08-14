<?php
  // session_start();
  include "../inc/db.php";
  include "../functions/DB.func.php";
  include "../functions/functions.php";
  include "../functions/Message.func.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Arellano University | Author</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  
  <!-- Favicons -->
  <link href="../../resource/img/logo.png" rel="icon">
  <link href="../../resource/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="../../resource/css/font.css" rel="stylesheet">
  <link rel="stylesheet" href="../../resource/css/fontawesome.css">

  <script src="../../resource/js/jquery.min.js"></script>

  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" href="../../resource/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../resource/css/mdb.min.css">

  <!-- Datatables -->
  <link href="../../../resource/ts/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../../resource/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../resource/lib/animate/animate.min.css" rel="stylesheet">
  <link href="../../resource/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../../resource/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../../resource/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!--  -->
  <link rel="stylesheet" href="../../resource/css/bootstrap-select.css">
  <script src="../../resource/js/bootstrap.bundle.min.js"></script>
  <script src="../../resource/js/bootstrap-select.min.js"></script>

  <!-- Main Stylesheet File -->
  <link href="../../resource/css/style.css" rel="stylesheet">
  <link href="../../resource/css/addons.css" rel="stylesheet">

  <style type="text/css">
    .modal-dialog {
      max-width: 75% !important;
    }
  </style>
</head>

<body>
  <!--==========================
  Header
  ============================-->

  <header id="header" class="fixed-top">
    <div class="container">
      <div class="logo float-left">
        <a href="../../index.php" class="scrollto"><img src="../../resource/img/logo.png" alt="" class="img-fluid">&nbsp;<strong>ARELLANO UNIVERSITY RESEARCH PORTAL</strong></a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <?php if (isset($_SESSION['id'])) {
            if ($_SESSION['role'] == "Administrator") { ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Management
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                    <a class="dropdown-item" href="../../account/account.php">Account</a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                    <a class="dropdown-item" href="../../author/author.php">Author</a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                    <a class="dropdown-item" href="../../materials/materials.php">Resource Materials</a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                    <a class="dropdown-item" href="../../news/index.php">News and Events</a>
                  <?php } ?>
              </div>
              </li>          
            <?php } ?>
            <?php if ($_SESSION['role'] == "Administrator" || $_SESSION['role'] == "Visitor") { ?>
              <li><a><?php echo $_SESSION['name']; ?></a></li>
              <li class="nav-item dropdown">
                <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user"></i>&nbsp;</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <!-- <a class="dropdown-item" href="../profile/profile.php">Profile</a>
                      <a class="dropdown-item" href="#aboutus">About Us</a> -->
                  <a class="dropdown-item" href="../../signup/logout.php">Signout</a>
                </div>
              </li>
            <?php } ?>
          <?php } else { 
            header("Location: ../../login/login.php");
          } ?>
        </ul>
      </nav><!-- .main-nav -->
    </div>
  </header><!-- #header -->

  <!-- #footer -->
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->
  <!-- Tables CDN -->

  <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <!-- JavaScript Libraries -->
  <script src="../../resource/lib/jquery/jquery.min.js"></script>
  <script src="../../resource/lib/jquery/jquery-migrat.min.js"></script>
  <script src="../../resource/lib/bootstrap/js/bootstrap.bunle.min.js"></script>
  <script src="../../resource/lib/easing/easing.min.js"></script> 
  <script src="../../resource/lib/mobile-nav/mobile-nav.js">
  </script>
  <script src="../../resource/lib/wow/wow.min.js"></script>
  <script src="./../resource/lib/waypoints/waypoints.minjs"></script>
  <script src="../../resource/lib/counterup/counterup.minjs"></script>
  <script src="../../resource/lib/owlcarousel/owl.carousel.min.s"></script>
  <script src="../../resource/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="../../resource/lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script>
    $(document).ready(function() {
      $('#table_id').DataTable();
    });
  </script>
  <script src="../../../resource/js/main.js"></script>
  <script src="../script/main.js"></script>

  <!-- Template Main Javascript File -->
  <script>
    $(document).ready(function() {});
  </script>
  <script language="javascript" type="text/javascript">
    //window.history.forward();
  </script>
  <script src="../../resource/js/main.js"></script>
</body>

</html>