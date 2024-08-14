<!DOCTYPE html>
<html lang="en">
<?php
  include "function/header.php";
  
?>
<body>
  <!------ Intro Section ------>
  <section id="intro" class="clearfix" style="position: relative; flex-grow: 1; margin-bottom: 50px;">
    <div>
      <form action="result.php" method="GET" name="searchForm" onsubmit="return required()">
        <div class="form-group" style="text-align: center;">
          <input name="search" class="form-control form-control-lg d-inline" type="text" placeholder="Enter keyword" aria-label=".form-control-lg example" style="width: 70%; border-radius: 32px;  margin-top: 50px;" value="">
          <input name="filter" value="none" hidden>
          <button class="button" hidden>Search</button>
        </div>  
      </form>     
    </div>
  </section>

  <footer id="footer">
    <div class="footer-top">      
      <div class="footer-container">
        <div class="container-left">
          <div class="row">
            <div class="logo-footer">
              <img src="resource/img/logo.png" class="img-fluid" id="logo-img">
            </div>
            <div class="footer-content">
              <h1>ARELLANO UNIVERSITY</h1>
              <p>
                2600 Legarda St., Sampaloc, Manila <br>
                1008 Metro Manila, Philippines <br>
                8-734-7371 to 79
              </p>
              <p class="social-links">
                <a href="https://twitter.com/arellano_u?lang=en" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="https://www.facebook.com/ArellanoUniversityOfficial/" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="https://www.youtube.com/@ArellanoUniversityOfficial/featured" target="_blank"><i class="fa fa-youtube"></i></a>
              </p>
            </div>      
          </div>    
        </div>
        <div class="container-right">
          <p><a href="index.php">Home</a></p>
          <p><a href="https://arellano.edu.ph/research/about/">About us</a></p>
          <p><a href="">News and Events</a></p>
          <p><a href="https://arellano.edu.ph/arellano-university-website-privacy-notice/">Privacy policy</a></p>  
        </div>
      </div>
    </div>
  </footer> 
</body>

</html>