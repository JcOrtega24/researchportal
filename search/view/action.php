<?php
	include_once "../function/header2.php";
?>
	<head>
		<title>AU ResPor | Research View</title>
	</head>
	<body>
		
		<?php
			// Get Resource id
			if (!empty($_GET['id'])) {

				$id = preg_replace("/[^a-zA-Z0-9]/", "", $_GET["id"]);  
				$id  = (int)($id); 

				$data = get_resourceaction($connect, $id);

				if($data != 0){
					$pdf_file = $data['pdf_file'];
					$fstudy = $data['fstudy'];
		?>
				<!--View Resource-->			
				<div class="container" id="body-container">
					<div class="card">
						<div class="card-body">
							<div style="line-height: 20px;">
								<div id="banner">
									<div class="badge text-wrap" id="banner-tag" style="width: 5rem; padding:5px; background-color: #000;">
										<span>
											<?php
												if($data['resource_type'] == "Research"){
													echo "Research";
												}
												elseif($data['resource_type'] == "Journal"){
													echo "Journal";
												}
												else{
													echo "Article";
												}
											?>
										</span>
									</div>
										<a href="../<?php echo $data['pdf_file'] ?>" target="_blank"><button type="button" class="btn btn-outline-primary btn-sm float-right" style="position:relative;bottom:15px;" name="btn-fullview"><i class="fa fa-file-text"> View PDF</i></button></a>
								</div>
								<div>
									<h5 class="cls" id="<?php echo "$id"; ?>"></h5>
									<h5 id="cited_byR" value="<?php 
										if (!empty($_SESSION['id'])) {
											echo $_SESSION['id'];
										}
									?>"></h5>
									<h3 style="font-family:'Lucida Sans'; margin-bottom: 10px; width: 100%; overflow: hidden; word-break: normal; overflow-wrap: break-word;"><b><?php echo $data['title'] ?></b></h3>
									<ul class="list-inline" style="font-size: small;">
										<h5 style="margin-bottom: 0px;"><b>Authors</b></h5>
										<?php
											$authors= get_author($connect);
											while ($author = mysqli_fetch_array($authors)){
												if($data['author'] == $author['id']){
										?>
													<a href="author.php?id=<?php echo $author['id'];?>"><li><?php echo $author['name'];?></li></a>
										<?php
												}
											} 
										?>
										
										<?php
											$authors= get_author($connect);
											$co_author = explode(",", $data['co_author']);
											while ($author = mysqli_fetch_array($authors)){
												$temp = $author['id'];
												if(in_array($temp, $co_author, true)){
										?>
													<a href="author.php?id=<?php echo $author['id']?>">
														<li>
															<?php echo $author['name']; ?> 
														</li> 
													</a>
										<?php
												}											
											}
										?>
										<li id="r-date">Published <?php echo $data['date_publish'];?></li>
										<li><?php echo $data['fstudy']; ?></li>
									</ul>
								</div>
								<p class="font-weight-normal text-wrap" style="width:100%; display: block; "><?php print $data['abstract']; ?></p><br>
								<ul class="list-inline" style="font-size: small;">
									<li class="list-inline-item" id="View<?php echo $data['id']; ?>" value="<?php echo $data['views']; ?>"><b>Views: <?php echo $data['views']; ?></b></li>
									<li class="list-inline-item" id="Cite<?php echo $data['id']; ?>" value="<?php echo $data['cites']; ?>"><b>Cite: <?php echo $data['cites']; ?></b></li>
								</ul>
								<button type="button" class="btn btn-md badge badge-info text-wrap" style="width: 5rem; padding:6px; float:left" data-toggle="modal" data-target="#research-citing" id="r-citing"><span>Cite</span></button>
							</div>
						</div>
					</div>
					
					<!-- Modal for Citing -->
					<div class="modal fade" id="research-citing" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalCenterTitle">Cite Paper</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								
								<!-- Body research -->
								<div class="modal-body">
									MLA
									<div class="input-group" id="r-cite-area">
										<!-- Dont Alter -->
										<?php
											//Get the name of author using id
											$authors = get_author($connect);
											while ($author = mysqli_fetch_array($authors)){
												if($data['author'] == $author['id']){
													$resultauthor = explode(" ", $author['name']);
												}
											}
											
											$resultcoauthor = 0;

											//explode the co-author id 
											$co_author = explode(", ", $data['co_author']);

											//get the names of co-authors using the array contains the author id
											$coauthors = get_author($connect);
											while ($coAuthor = mysqli_fetch_array($coauthors)){
												$temp = $coAuthor['id'];
												if(in_array($temp, $co_author, true)){
													$resultcoauthor += 1;
													$coauthor = $coAuthor['name'];
												}											
											}

											//if author has 1 name and no co authors
											if(count($resultauthor) == 1 && $resultcoauthor == 0){
												$citeauthor = array($resultauthor[0]);
											}
											//if author has 1 name and 1 co authors
											elseif(count($resultauthor) == 1 && $resultcoauthor == 1){
												$citeauthor = array($resultauthor[0],", and ", $coauthor);
											}
											//if author has 1 name and more than 1 co authors
											elseif(count($resultauthor) == 1 && $resultcoauthor >= 2){
												$citeauthor = array($resultauthor[0], ", et al");
											}
											//if author has first and last name and no co authors
											else if(count($resultauthor) == 2 && $resultcoauthor == 0){
												$citeauthor = array($resultauthor[1], ", ", $resultauthor[0]);
											}
											//if author has first and last name and 1 co authors
											elseif(count($resultauthor) == 2 && $resultcoauthor == 1){
												$citeauthor = array($resultauthor[1], ", ",$resultauthor[0],", and ", $coauthor);
											}
											//if author has first and last name and more than 1 co authors
											elseif(count($resultauthor) == 2 && $resultcoauthor >= 2){
												$citeauthor = array($resultauthor[1], ", ",$resultauthor[0], ", et al");
											}
											//if author has first, middle and last name and no co authors
											else if(count($resultauthor) >= 3 && $resultcoauthor == 0){
												$citeauthor = array($resultauthor[count($resultauthor) - 1], ", ", $resultauthor[0]);
											}
											//if author has first, middle and last name and 1 co authors
											elseif(count($resultauthor) >= 3 && $resultcoauthor == 1){
												$citeauthor = array($resultauthor[count($resultauthor) - 1], ", ", $resultauthor[0],", and ", $coauthor);
											}
											//if author has first, middle and last name and more than 1 co authors
											elseif(count($resultauthor) >= 3 && $resultcoauthor >= 2){
												$citeauthor = array($resultauthor[count($resultauthor) - 1], ", ", $resultauthor[0], ", et al");
											}
										?>
										<textarea rows="6" cols="60" class="form-control" aria-label="With textarea" id="myInput" readonly><?php 
											echo implode("", $citeauthor); ?>. <?php echo $data['title']; ?>, <?php $date = $data['date_publish'];
											echo "" . date("Y", strtotime($date)); ?></textarea>
									</div>
									<button type="button" class="btn btn-md badge badge-info text-wrap cls" style="width: 7rem; padding:6px; float:left" id="id-copy-cite-r1"><span>Copy Citation</span></button>
									<br>
									<br>
									APA
									<div class="input-group" id="r-cite-area">
										<!-- Dont Alter -->
										<?php
											//Get the name of author using id
											$authors = get_author($connect);
											while ($author = mysqli_fetch_array($authors)){
												if($data['author'] == $author['id']){
													$resultauthor = explode(" ", $author['name']);
												}
											}
											
											$resultcoauthor = 0;

											//explode the co-author id 
											$co_author = explode(", ", $data['co_author']);

											//get the names of co-authors using the array contains the author id
											$coauthors = get_author($connect);
											while ($coAuthor = mysqli_fetch_array($coauthors)){
												$temp = $coAuthor['id'];
												if(in_array($temp, $co_author, true)){
													$resultcoauthor += 1;
													$coauthor = $coAuthor['name'];
												}											
											}

											if(count($resultauthor) == 1 && $resultcoauthor == 0){
												$citeauthor = array($resultauthor[0]);
											}
											elseif(count($resultauthor) == 1 && $resultcoauthor == 1){
												$citeauthor = array($resultauthor[0],", and", $coauthor);
											}
											elseif(count($resultauthor) == 1 && count($resultcoauthor) >= 2){
												$citeauthor = array($resultauthor[0], ", et al");
											}

											else if(count($resultauthor) == 2 && $resultcoauthor == 0){
												$citeauthor = array($resultauthor[1], ", ", $resultauthor[0][0]);
											}
											elseif(count($resultauthor) == 2 && $resultcoauthor == 1){
												$citeauthor = array($resultauthor[1], ", ",$resultauthor[0][0],"., and ", $coauthor);
											}
											elseif(count($resultauthor) == 2 && $resultcoauthor >= 2){
												$citeauthor = array($resultauthor[1], ", ",$resultauthor[0][0], "., et al");
											}

											else if(count($resultauthor) >= 3 && $resultcoauthor== 0){
												$citeauthor = array($resultauthor[count($resultauthor) - 1], ", ", $resultauthor[0][0]);
											}
											elseif(count($resultauthor) >= 3 && $resultcoauthor == 1){
												$citeauthor = array($resultauthor[count($resultauthor) - 1], ", ", $resultauthor[0][0],"., and ", $coauthor);
											}
											elseif(count($resultauthor) >= 3 && $resultcoauthor >= 2){
												$citeauthor = array($resultauthor[count($resultauthor) - 1], ", ", $resultauthor[0][0], "., et al");
											}
										?> 
										<textarea rows="6" cols="60" class="form-control" aria-label="With textarea" id="myInput1" readonly><?php echo implode("", $citeauthor); ?>. <?php $date = $data['date_publish'];
											echo "" . date("(Y)", strtotime($date)); ?>. <?php echo $data['title']; ?>.</textarea>
									</div>
									<button type="button" class="btn btn-md badge badge-info text-wrap cls" style="width: 7rem; padding:6px; float:left" id="id-copy-cite-r2"><span>Copy Citation</span></button>
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
								<div style="line-height: 20px;">
									<div id="banner">
										<div class="badge text-wrap" id="banner-tag" style="width: 5rem; padding:5px; background-color: #000;">
											<span>Resource</span>
										</div>
									</div>
									<div>
										<h5 class="cls" id="<?php echo "$id"; ?>"></h5>
										<h5 id="cited_byR" value="<?php 
											if (!empty($_SESSION['id'])) {
												echo $_SESSION['id'];
											}
										?>"></h5>
										<h3 style="font-family:'Lucida Sans'; margin-bottom: 10px; width: 100%; overflow: hidden; word-break: normal; overflow-wrap: break-word;"><b>No Result Found</b></h3>
										<ul class="list-inline" style="font-size: small;">
											<h5 style="margin-bottom: 0px;"><b>Authors</b></h5>
											<li>No Result Found</li> 
										</ul>
									</div>
									<p class="font-weight-normal text-wrap" style="width:100%; display: block; ">No Result Found</p><br>
								</div>
							</div>
						</div>		
					</div>	
		<?php
				}
			}
		?>
	</body>
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

	<script>
    const copyButton = document.getElementById('id-copy-cite-r1');
    const textArea = document.getElementById('myInput');

    copyButton.addEventListener('click', () => {
      textArea.select();
      textArea.setSelectionRange(0, 99999);
			document.execCommand('copy');
    });  
    const copyButton1 = document.getElementById('id-copy-cite-r2');
    const textArea1 = document.getElementById('myInput1');

    copyButton1.addEventListener('click', () => {
      textArea1.select();
      textArea1.setSelectionRange(0, 99999);
			document.execCommand('copy');
    });  
  </script>