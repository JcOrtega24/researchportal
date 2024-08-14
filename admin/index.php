<?php
  // session_start();
  include "materials/inc/db.php";
  include "materials/functions/DB.func.php";
  include "materials/functions/functions.php";
  include "materials/functions/Message.func.php";

if (isset($_SESSION['id'])) {
  if ($_SESSION['role'] == "Administrator") { ?>
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <title>Arellano University | Dashboard</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicons -->
        <link href="resource/img/logo.png" rel="icon">
        <link href="resource/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

        <!-- Bootstrap CSS File -->
        <link rel="stylesheet" href="resource/css/bootstrap.min.css">
        <link rel="stylesheet" href="resource/css/mdb.min.css">

        <!-- Libraries CSS Files -->
        <link href="resource/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="resource/lib/animate/animate.min.css" rel="stylesheet">
        <link href="resource/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
        <link href="resource/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="resource/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

        <!-- Main Stylesheet File -->
        <link href="resource/css/style_management.css" rel="stylesheet">
        <link href="resource/css/addons.css" rel="stylesheet">

      </head>

      <body>
        <!--==========================
            Header
            ============================-->
        <header id="header" class="fixed-top">
          <div class="container">
            <div class="logo float-left">
              <a href="index.php" class="scrollto"><img src="resource/img/logo.png" alt="" class="img-fluid">&nbsp;<strong>ARELLANO UNIVERSITY RESEARCH PORTAL</strong></a>
            </div>

            <nav class="main-nav float-right d-none d-lg-block">
              <ul>
                <?php
                if (isset($_SESSION['id'])) {?>
                    </li>
                    <li><a><?php echo $_SESSION['name']; ?></a></li>
                    <li class="nav-item dropdown">
                      <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i>&nbsp;
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- <a class="dropdown-item" href="/admin/profile/profile.php">Profile</a>
                        <a class="dropdown-item" href="#aboutus">About Us</a> -->
                        <a class="dropdown-item" href="./signup/logout.php">Signout</a>
                      </div>
                    </li>
                  <?php
                } else {
                  header("Location: ../admin/login/login.php");
                } ?>
              </ul>
            </nav><!-- .main-nav -->
          </div>
        </header><!-- #header -->

        <!--==========================
              Intro Section
            ============================-->
        <section id="intro" class="clearfix">
          <div class="container">
            <div class="intro-info">
              <!-- <h2>Arellano Research <span> Portal <span></h2> -->
              <div class="card-group d-flex justify-content-center">

                <!--Account Button-->
                <!--div class="col-md-3 col-sm-5">
                  <a href="./account/account.php">
                    <div class="card">
                      <div class="card-body">
                        <i class="fa fa-book fa-2x " style="color:#007bff"></i>                  
                        <h5 class="card-title">Account</h5>
                      </div>
                    </div>
                  </a>
                </div-->

                <?php 
                    $query = "SELECT profession, count(*) as number FROM tblauthor GROUP BY profession";  
                    $result = mysqli_query($connect, $query);
                ?>  
                <!--Author Button-->
                <div class="col-md-5 col-sm-5" style="margin: 0px;">
                  <a href="./author/author.php">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Authors</h4>
                        <div>    
                          <script type="text/javascript" src="resource/js/charts.js"></script>  
                          <!--script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script-->
                          <script type="text/javascript">  
                            google.charts.load('current', {'packages':['corechart']});  
                            google.charts.setOnLoadCallback(drawChart);  
                            function drawChart(){  
                              var data = google.visualization.arrayToDataTable([  
                                ['profession', 'Number'],  
                                <?php  
                                  while($row = mysqli_fetch_array($result))  
                                  {  
                                    if($row['profession'] == "Student"){
                                      $rows = "Student";
                                      echo "['".$rows."', ".$row["number"]."],";  
                                    }
                                    if($row['profession'] == "Professor"){
                                      $rows = "Professor";
                                      echo "['".$rows."', ".$row["number"]."],";  
                                    }
                                    if($row['profession'] == "Staff"){
                                      $rows = "Staff";
                                      echo "['".$rows."', ".$row["number"]."],";  
                                    }
                                  }  
                                ?>  
                              ]);  
                              var options = {  
                                title: 'Percentage of Profession of Authors',  
                                //is3D:true,  
                                pieHole: 0  
                              };  
                              var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                              chart.draw(data, options);  
                            }  
                          </script>
                          <div style="width:500px;">   
                            <div id="piechart" style="width: 400px; height: 200px;"></div>  
                          </div>  
                        </div>
                      </div>
                    </div>
                  </a>
                </div>

                <?php 
                    $query1 = "SELECT resource_type, count(*) as number FROM tblresource GROUP BY resource_type"; 
                    $result1 = mysqli_query($connect, $query1);
                ?> 
                <!--Research Button-->
                <div class="col-md-5 col-sm-5" style="margin: 0px;">
                  <a href="./materials/materials.php">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Resource Materials</h4>
                        <script>
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                        const data = google.visualization.arrayToDataTable([
                          ['Resource Type', ''],
                          <?php  
                            while($row = mysqli_fetch_array($result1))  
                            {  
                              if($row['resource_type'] == "Research"){
                                $rows = "Research";
                                echo "['".$rows."', ".$row["number"]."],";  
                              }
                              if($row['resource_type'] == "Article"){
                                $rows = "Article";
                                echo "['".$rows."', ".$row["number"]."],";  
                              }
                              if($row['resource_type'] == "Journal"){
                                $rows = "Journal";
                                echo "['".$rows."', ".$row["number"]."],";  
                              }
                            }  
                          ?>
                        ]);

                        const options = {
                          title:'Total Number of Resource Materials'
                        };

                        const chart = new google.visualization.PieChart(document.getElementById('piechart2'));
                          chart.draw(data, options);
                        }
                        </script>
                        <div style="width:500px;">   
                          <div id="piechart2" style="width: 400px; height: 200px;"></div>  
                        </div>  
                      </div>
                    </div>
                  </a>
                </div>            

                <?php 
                    $query2 = "SELECT type, count(*) as number FROM tblnewsevents GROUP BY type";  
                    $result2 = mysqli_query($connect, $query2);
                ?> 
                <!--News Button-->
                <div class="col-md-5 col-sm-5" style="margin: 0px; margin-top: 30px;">
                  <a href="./news/index.php">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">News & Events</h4>
                        <div>    
                          <script type="text/javascript">  
                            google.charts.load('current', {'packages':['corechart']});  
                            google.charts.setOnLoadCallback(drawChart);  
                            function drawChart(){  
                              var data = google.visualization.arrayToDataTable([  
                                ['type', 'Number'],  
                                <?php  
                                  while($row = mysqli_fetch_array($result2))  
                                  {  
                                    if($row['type'] == "News"){
                                      $rows = "News";
                                      echo "['".$rows."', ".$row["number"]."],";  
                                    }
                                    if($row['type'] == "Events"){
                                      $rows = "Events";
                                      echo "['".$rows."', ".$row["number"]."],";  
                                    }
                                  }  
                                ?>  
                              ]);  
                              var options = {  
                                title: 'Percentage of News and Events',  
                                //is3D:true,  
                                pieHole: 0  
                              };  
                              var chart = new google.visualization.PieChart(document.getElementById('piechart3'));  
                              chart.draw(data, options);  
                            }  
                          </script>
                          <div style="width:500px;">   
                            <div id="piechart3" style="width: 400px; height: 200px;"></div>  
                          </div>  
                        </div>
                      </div>
                    </div>
                  </a>
                </div>

              </div>
            </div>
          </div>
        </section>

        <!-- #intro -->
        <main id="main">
          <?php
          if (isset($_SESSION['id'])) {
            if ($_SESSION['role'] == "Administrator") {
            } else {
          ?>
              <br><br><br>
              <img src="resource/img/userquickguide.png" alt="Paris" class="center">
              <br><br><br>
          <?php
            }
          }
          ?>
        </main>

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        <!-- Uncomment below i you want to use a preloader -->
        <!-- <div id="preloader"></div> -->
        <!-- Tables CDN -->
        <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

        <!-- JavaScript Libraries -->
        <script src="resource/lib/jquery/jquery.min.js"></script>
        <script src="resource/lib/jquery/jquery-migrate.min.js"></script>
        <script src="resource/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="resource/lib/easing/easing.min.js"></script>
        <script src="resource/lib/mobile-nav/mobile-nav.js"></script>
        <script src="resource/lib/wow/wow.min.js"></script>
        <script src="resource/lib/waypoints/waypoints.min.js"></script>
        <script src="resource/lib/counterup/counterup.min.js"></script>
        <script src="resource/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="resource/lib/isotope/isotope.pkgd.min.js"></script>
        <script src="resource/lib/lightbox/js/lightbox.min.js"></script>

        <!-- Contact Form JavaScript File -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <script src="../contactform/contactform.js"></script>

        <!-- Template Main Javascript File -->
        <script>
          $(document).ready(function() {
            $('#table_id').DataTable();
          });
        </script>
        <script src="resource/js/main.js"></script>

      </body>
    </html>
<?php
  } 
} else {
  header("Location: ../admin/login/login.php");
}
?>