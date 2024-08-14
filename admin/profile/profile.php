<?php
include ("/xampp/htdocs/CustomLandingPage/admin/profile/inc/header.php");
if (empty($_SESSION['id'])) {
	// header("Location: login.php");
}
?>
<!--View Article-->
<?php 

if (isset($_POST['id'])) {
  $result = update_authoraction($connect,$_POST['name'],$_POST['email'],$_POST['profession'],$_POST['fstudy'],$_POST['id']);
 		if ($result == "1") {
			echo'<div style="position:relative;top: 100px;"';
 			message("Article updated successfully!",1);
 		}
 	}

	?>
	<br><br><br><br>
<?php 
   if (!empty($_GET['id'])) {
     $data = get_authors($connect,$_GET['id']);
    ?>
	<!--View Author-->
  <div class="container" style="background-color:#ffff;>
        <div class="card">
         <div class="card-body">
				<style>
body{
  background-color:#f4f4f4;
}
  h4,p{
    margin: 0;
    padding:0;
  }
  p{
    font-weight:600px;
    font-size:14px;
    
  }
</style>
					</style>
          <div class="container" ">
          <div class="text-left">
              <div class="row">
                <div class="col-2">
                  <img src="/CustomLandingPage/admin/profile/uploads/ayanokoji.jpg" class="rounded-circle w-cover" alt="..." width="100"   >
                  </div>
                  <div style="position:relative;right:40px;top:15px;font-weight:800px;">
                      <h4 style="margin-bottom:5px;font-size:30px;">
                          <?php // echo $data['name'];?>
                        </h4>
                      <p class="text-muted"><?php  // echo $data['fstudy'];?> &nbsp;&#x22C5;&nbsp;<?php   // echo  date("F Y",strtotime($data['created']));?></p>
                      <p class="text-muted"><?php  // echo $data['profession'];?></p>
                  </div>
                </div>
            </div>
         </div>
          <div class="card-body " >
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">About</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="research-tab" data-toggle="tab" href="#research" role="tab" aria-controls="research" aria-selected="false">Research</a>
                  </li>
              </ul>
            <div class="tab-content " id="myTabContent">
              <div class="tab-pane fade show active  " id="about" role="tabpanel" aria-labelledby="about-tab" >
                <div class="container">
                      <h3 class="text-muted">About</h3>
                      <div class="card">
                      <div class="card-body">
                      <div class="row">
                              <div class="col-sm-6">
                                <h5 class="card-title text-muted">Research</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                </div>
                                <div class="col-sm-6">
                                <h5 class="card-title text-muted">Views</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                              </div>   
                            </div>
                          </div>
                      </div>
                      <div class="card-body"></div>
                      <div class="row">
                          <div class="col-sm">
                            <div class="card">
                              <div class="card-body">
                              <h5 class="text-muted">Intro</h5>
                              <hr>
                                <p class="card-text"><?php  // echo $author['description'];?></p> 
                              </div>
                            </div>
                          </div>
                        </div>
                     </div>
                    </div>
             
              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
              <div class="tab-pane fade" id="research" role="tabpanel" aria-labelledby="research-tab">...</div>
            
            </div>
          </div>
    </div>
 </div>
	<br<br><br>

<?php } ?>
