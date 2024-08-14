<?php
  include_once "function/header1.php";

  if (isset($_GET["search"])) { 
    $search = $_GET['search'];
    $search = htmlspecialchars($search, ENT_QUOTES, 'UTF-8');
  }    
  else {    
    $search = "";    
  }   
  
  if (isset($_GET["filter"])) { 
    $filter = $_GET['filter'];
    $filter = htmlspecialchars($filter, ENT_QUOTES, 'UTF-8');
  }    
  else {    
    $filter = "none";    
  }  

  // variable to store number of rows per page
  $limit = 7;    

  if (isset($_GET["page"])) { 
    $page_number = preg_replace("/[^a-zA-Z0-9]/", "", $_GET["page"]);   
    $page_number  = (int)($page_number);  
  }    
  else {    
    $page_number=1;    
  }       

  $initial_page = ($page_number-1) * $limit;   
?>

<head>
  <title>AU ResPor | Search Result</title>
</head>

<body>
  <!-- #intro -->
  <main id="main">
    <!------ Result Section ------>
    <section id="services" class="section-bg"  style="flex-grow: 1;">
      <div class="container">
        <div class="container" id="result-container" >
          <header class="section-header">
            <div id="header-one">
              <form method="GET" name="searchForm" onsubmit="return required()">
                <div class="form-group">
                  <div class="wrap">
                    <div class="row">
                      <div class="col-40">
                        <input name="search" class="form-control form-control-md d-inline" type="text" aria-label=".form-control-lg example" value="<?php echo $search;?>" id="txtsearch" style="border-radius: 32px;">
                      </div>
                      <div class="col-40" style="display: flex; flex-direction: row; justify-content: center;">
                        <select class="custom-select d-inline" id="search_type" name="filter" title="Filter" style="width: 100%; border: 1px solid #ccc; border-radius: 4px; resize: vertical; border-radius: 32px;">
                          <option hidden value="none" <?php if($filter == "none"){echo "selected";}?>>Filter</option>
                          <option value="Research" <?php if($filter == "Research"){echo "selected";}?>>Researches</option>
                          <option value="Journal" <?php if($filter == "Journal"){echo "selected";}?>>Journals</option>
                          <option value="Article" <?php if($filter == "Article"){echo "selected";}?>>Articles</option>
                          <option value="cites" <?php if($filter == "cites"){echo "selected";}?>>Cites</option>
                          <option value="none">None</option>
                        </select>
                      </div>
                      <div class="col-20">
                        <button class="btn btn-primary btn-sm" style="padding: 9px 18px; margin-top: 4px;">Search</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </header><br>
        </div>
      </div>
      <div class="col">
        <div class="row">
          <div class="container">
            <div class="row" id="result-tbl">
            <!------ Search Result Section ------>
            <table id="table_id" class="display">
              <tbody id="tblresult">  
                
                <?php
                  $res = 0;

                    if($filter == "none"){
                      $author = get_authorsID($connect, $search);
                      if($author != 0){
                        $authorID = implode(" ", $author);
                      }
                      else{
                        $authorID = "";
                      }
                      
                      $result = get_resource_by_title($connect, $search, $authorID, $initial_page, $limit);
                      if ($result->num_rows>0) {
                        while ($researchdata = mysqli_fetch_array($result)) {
                          $citing = $researchdata['cites'];
                          $viewing = $researchdata['views'];
                ?>
                          <tr>
                            <div class="col-md-6 col-lg-10 offset-lg-1 wow" data-wow-duration="0.3s">  
                              <div class="box">
                                <div class="badge text-wrap" style="width: 5rem; padding:5px; position: absolute; background-color: #000;">
                                  <span>
                                    <?php
                                      if($researchdata['resource_type'] == "Research"){
                                        echo "Research";
                                      }
                                      elseif($researchdata['resource_type'] == "Journal"){
                                        echo "Journal";
                                      }
                                      else{
                                        echo "Article";
                                      }
                                    ?>
                                  </span>                                 
                                </div>
                                <div style="margin-top: 40px;">
                                  <h4 class="title"><a a href="./view/action.php?id=<?php echo $researchdata['id'];?>" class="cls" id="<?php echo $researchdata['id']; ?>"><span><?php echo $researchdata['title']; ?></span></a></h4>
                                  <ul class="list-inline" style="font-size: small;">
                                    <li class="list-inline-item" id="rView<?php echo $researchdata['id']; ?>" value="<?php echo $researchdata['views']; ?>"><b>Views: <?php echo $researchdata['views']; ?></b></li>
                                    <li class="list-inline-item" id="rCite<?php echo $researchdata['id']; ?>" value="<?php echo $researchdata['cites']; ?>"><b>Cite: <?php echo $researchdata['cites']; ?></b></li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </tr> 
                <?php
                        }
                        $res = 1;
                      }                               
                    }
                    elseif($filter == "Research" || $filter == "Journal" || $filter == "Article"){     
                      $author = get_authorsID($connect, $search);
                      if($author != 0){
                        $authorID = implode(" ", $author);
                      }
                      else{
                        $authorID = "";
                      }

                      $result = get_resource_by_title_filtered($connect, $search, $authorID, $filter, $initial_page, $limit);
                      if ($result->num_rows > 0) {
                        while ($researchdata = mysqli_fetch_array($result)) {
                          $citing = $researchdata['cites'];
                          $viewing = $researchdata['views'];
                ?>
                            <tr>
                              <div class="col-md-6 col-lg-10 offset-lg-1 wow" data-wow-duration="0.3s">  
                                <div class="box">
                                  <div class="badge text-wrap" style="width: 5rem; padding:5px; position: absolute; background-color: #000;">
                                    <span>
                                      <?php
                                        if($researchdata['resource_type'] == "Research"){
                                          echo "Research";
                                        }
                                        elseif($researchdata['resource_type'] == "Journal"){
                                          echo "Journal";
                                        }
                                        else{
                                          echo "Article";
                                        }
                                      ?>
                                    </span>                                   
                                  </div>
                                  <div style="margin-top: 40px;">
                                    <h4 class="title"><a a href="./view/action.php?id=<?php echo $researchdata['id']; ?>" class="cls" id="<?php echo $researchdata['id']; ?>"><span><?php echo $researchdata['title']; ?></span></a></h4>
                                    <ul class="list-inline" style="font-size: small;">
                                      <li class="list-inline-item" id="rView<?php echo $researchdata['id']; ?>" value="<?php echo $researchdata['views']; ?>"><b>Views: <?php echo $researchdata['views']; ?></b></li>
                                      <li class="list-inline-item" id="rCite<?php echo $researchdata['id']; ?>" value="<?php echo $researchdata['cites']; ?>"><b>Cite: <?php echo $researchdata['cites']; ?></b></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </tr>
                <?php
                        }
                        $res = 1;
                      } 
                    }
                    elseif($filter == "cites"){
                      //View by cite descending order
                      $author = get_authorsID($connect, $search);
                      if($author != 0){
                        $authorID = implode(" ", $author);
                      }
                      else{
                        $authorID = "";
                      }

                      $result = get_resource_by_title_filtered_cites($connect, $search, $authorID, $initial_page, $limit);
                      if ($result->num_rows > 0) {
                        while ($researchdata = mysqli_fetch_array($result)) {
                          $citing = $researchdata['cites'];
                          $viewing = $researchdata['views'];
                ?>
                          <tr>
                            <div class="col-md-6 col-lg-10 offset-lg-1 wow" data-wow-duration="0.3s">  
                              <div class="box">
                                <div class="badge text-wrap" style="width: 5rem; padding:5px; position: absolute; background-color: #000;">
                                  <span>
                                    <?php
                                      if($researchdata['resource_type'] == "Research"){
                                        echo "Research";
                                      }
                                      elseif($researchdata['resource_type'] == "Journal"){
                                        echo "Journal";
                                      }
                                      else{
                                        echo "Article";
                                      }
                                    ?>
                                  </span>                                 
                                </div>
                                <div style="margin-top: 40px;">
                                  <h4 class="title"><a a href="./view/action.php?id=<?php echo $researchdata['id'];?>" class="cls" id="<?php echo $researchdata['id']; ?>"><span><?php echo $researchdata['title']; ?></span></a></h4>
                                  <ul class="list-inline" style="font-size: small;">
                                    <li class="list-inline-item" id="rView<?php echo $researchdata['id']; ?>" value="<?php echo $researchdata['views']; ?>"><b>Views: <?php echo $researchdata['views']; ?></b></li>
                                    <li class="list-inline-item" id="rCite<?php echo $researchdata['id']; ?>" value="<?php echo $researchdata['cites']; ?>"><b>Cite: <?php echo $researchdata['cites']; ?></b></li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </tr>

                <?php
                        }
                        $res = 1;
                      } 
                    }
                ?>
              </tbody>
              <?php
                if($res == 1){
              ?>
                  <div class="form-group" style="text-align: center; width: 100%;">
                    <div class="pagination">
                      <?php  
                        $bool_result = 0;

                        $author = get_authorsID($connect, $search);
                        if($author != 0){
                          $authorID = implode(" ", $author);
                        }
                        else{
                          $authorID = "";
                        }

                        if($filter == "none"){
                          $result = get_count_resource_by_title($connect, $search, $authorID); 
                        }

                        elseif($filter == "Research" || $filter == "Journal" || $filter == "Article"){ 
                          $result = get_count_resource_by_title_filtered($connect, $search, $authorID, $filter);
                        }

                        else{
                          $result = get_count_resource_by_title_filtered_cites($connect, $search, $authorID);
                        }
                        
                        $row = mysqli_fetch_row($result);   
                        
                        if($row[0] > 0) {  
                          $total_rows = $row[0];            
                          // get the required number of pages
                          $total_pages = ceil($total_rows / $limit);     
                          $pageURL = "";   

                           
                          if($page_number == 1){
                            echo "<a>&laquo;</a>"; 
                          }
                          else{
                            echo "<a href='result.php?search=". $search ."&filter=". $filter. "&page=".($page_number-1)."'>&laquo;</a>";  
                          }  
                          
                          if($total_pages >= 5){
                            if($page_number > 2 && $page_number < $total_pages - 1){
                              $min = $page_number-2;
                              $max = $page_number+2;
                            }
                            else if($page_number == 1){
                              $min = $page_number;
                              $max = $page_number+4;
                            }
                            else if($page_number == 2){
                              $min = $page_number-1;
                              $max = $page_number+3;
                            }
                            elseif($page_number == $total_pages){
                              $min = $page_number-4;
                              $max = $page_number;
                            }
                            elseif($page_number == $total_pages-1){
                              $min = $page_number-3;
                              $max = $page_number+1;
                            }
                            else{

                            }

                            for ($i=$min; $i<=$max; $i++) {   
                              if ($i == $page_number) {   
                                $pageURL .= "<a class = 'active' href='result.php?search=". $search ."&filter=". $filter. "&page=".$i."'>".$i." </a>";   
                              }               
                              else {   
                                $pageURL .= "<a href='result.php?search=". $search ."&filter=". $filter. "&page="  .$i."'>".$i." </a>";     
                              }   
                            };
                          }
                          else{
                            for ($i=1; $i<=$total_pages; $i++) {   
                              if ($i == $page_number) {   
                                $pageURL .= "<a class = 'active' href='result.php?search=". $search ."&filter=". $filter. "&page=".$i."'>".$i." </a>";   
                              }               
                              else  {   
                                $pageURL .= "<a href='result.php?search=". $search ."&filter=". $filter. "&page="  .$i."'>".$i." </a>";     
                              }   
                            }; 
                          }

                          echo $pageURL;    
                          
                          if($page_number == $total_pages){
                            echo "<a>&raquo;</a>"; 
                          }
                          else{
                            echo "<a href='result.php?search=". $search ."&filter=". $filter. "&page=".($page_number+1)."'>&raquo;</a>";  
                          }                 
                        }               
                      ?> 
                    </div>    
                  </div>
              <?php
                }
                else{
              ?>
                  <div style="padding-left: 12px;">
                    <h3>No Result Found</h3>
                  </div>
              <?php
                }
              ?>
            </table>
          </div>
        </div>
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
  </main>
</body>
