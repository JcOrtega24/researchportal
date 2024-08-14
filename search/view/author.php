<?php
  include_once "../function/header2.php";
?>
  <head>
    <title>AU ResPor | Author View</title>
  </head>

  <body>
    <?php

      if (!empty($_GET['id'])) {
        $id = preg_replace("/[^a-zA-Z0-9]/", "", $_GET["id"]);   
        $id  = (int)($id);

        $data = get_authorData($connect,$id);
        $authorID = $data['id'];
        if($data != 0){
    ?>
        <!--View Author-->  
        <div class="container" id="body-container">
          <div class="card">
            <div class="card-body">
              <div id="banner" style="margin-bottom: 20px;">
                <div class="badge text-wrap" id="banner-tag" style="width: 5rem; padding:5px; background-color: #000;">
                  <span>Author</span>
                </div>
              </div>
              <div style="line-height: 20px;">           
                <div>
                  <h3 style="font-family:'Lucida Sans'; margin-bottom: 10px; width: 100%; overflow: hidden; word-break: normal; overflow-wrap: break-word;"><b><?php echo $data['name']?></b></h3>
                  <ul class="list-inline">
                    <li><?php echo $data['fstudy'];?></li>
                    <li><?php echo $data['profession'];?></li>
                    <li><?php echo $data['email'];?></li>
                  </ul>
                </div>
                <div class="card-group">
                  <h5 class="card-title text-muted">Publications</h5>
                  <table id="research" class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Title</th>
                        <!--th>Main Author</th>
                        <th>Co-Author</th-->
                        <th scope="col">Research Type</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $result = get_author_inside_resource($connect);
                        
                        if ($result->num_rows>0) 
                        {
                          while ($resources = mysqli_fetch_array($result)){
                            $co_author = explode(",", $resources['co_author']);
                            if($data['id'] == $resources['author'] || in_array($data['id'], $co_author,)){
                      ?>
                              <tr>
                                <td> 
                                  <a href="action.php?id=<?php echo $resources ['id'];?>" class="cls" id="<?php echo $resources['id'];?>" style="color: #3366BB;">
                                    <?php echo $resources['title'] ?>
                                  </a>
                                </td>
                                <!--td><?php //echo $resources['author'] ?></td>
                                <td><?php //echo $resources['co_author'] ?></td-->
                                <td><?php echo $resources['type'] ?></td> 
                                <td hidden><ul class="list-inline" style="padding-left: 40px; font-size: small;">
                                  <li class="list-inline-item" id="rView<?php echo $resources['id']; ?>" value="<?php echo $resources['views']; ?>"><b>Views: <?php echo $resources['views']; ?></b></li>
                                  <li class="list-inline-item" id="rCite<?php echo $resources['id']; ?>" value="<?php echo $resources['cites']; ?>"><b>Cite: <?php echo $resources['cites']; ?></b></li>
                                </ul>   
                                </td>               
                              </tr>
                      <?php
                            }
                          }
                        }
                      ?>
                    </tbody>
                  </table>
                </div> 
              </div>
            </div>
          </div>
        </div>
    <?php 
        }
        else{
    ?>
          <div class="container" id="body-container">
            <div class="card">
              <div class="card-body">
                <div id="banner" style="margin-bottom: 20px;">
                  <div class="badge text-wrap" id="banner-tag" style="width: 5rem; padding:5px; background-color: #000;">
                    <span>Author</span>
                  </div>
                </div>
                <div style="line-height: 20px;">           
                  <div>
                    <h3 style="font-family:'Lucida Sans'; margin-bottom: 10px; width: 100%; overflow: hidden; word-break: normal; overflow-wrap: break-word;"><b>No Result Found</b></h3>
                    <ul class="list-inline">
                      <li>No Result Found</li>
                    </ul>
                  </div>
                  <div class="card-group">
                    <h5 class="card-title text-muted">Publications</h5>    
                  </div> 
                </div>
              </div>
            </div>
          </div>
    <?php
        }
      }  
    ?>
    <footer id="footer">
      <div class="footer-top">      
        <div class="footer-container">
          <div class="container-left">
            <div class="row">
              <div class="logo-footer">
                <img src="../resource/img/logo.png" class="img-fluid" id="logo-img">
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
            <p><a href="../index.php">Home</a></p>
            <p><a href="https://arellano.edu.ph/research/about/">About us</a></p>
            <p><a href="">News and Events</a></p>
            <p><a href="https://arellano.edu.ph/arellano-university-website-privacy-notice/">Privacy policy</a></p>  
          </div>
        </div>
      </div>
    </footer>
  </body>    


 