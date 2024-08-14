<?php
	include_once "../inc/header1.php";
	if (empty($_SESSION['id'])) {
		// include""
		header("Location: ../../../../login/login.php");
	}
?>
<!--View Research-->
<?php
	//updating of Research

	// UPLOAD FILE
   if(isset($_FILES['files'])){
      $errors= array();
      $file_name_array = explode('.',$_FILES['files']['name']);
      $file_size =$_FILES['files']['size'];
      $file_tmp =$_FILES['files']['tmp_name'];
      $file_type=$_FILES['files']['type'];
      $file_ext=strtolower(end($file_name_array));
        
      $extensions= array("pdf","txt","docx");
        
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a PDF or DOCX file.";
      }
        
      if($file_size > 9097152){
         $errors[]='File size must be less than 9 MB';
      }
        
      if(empty($errors)==true){
         // location
         move_uploaded_file($file_tmp,"../../../admin/uploads/".$_FILES['files']['name']);
         //  include ""
         $Pdf_file = "uploads/".$_FILES['files']['name']."";
      }else{
         print_r($errors);
      }
   }

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (isset($_POST['id'])) {
	      $coauthor = "";

	      if(isset($_POST['co-author'])){
	        	if (!empty($_POST["co-author"])) {
		         foreach($_POST['co-author'] as $coauthor) {
		         	$coauthor = implode(',',$_POST['co-author']);
		         }
		      }   
	       }   

			$result = update_resourceaction($connect, $_POST['title'], $_POST['abstract'], $_POST['m_author'], $coauthor, $_POST['rtype'],  $_POST['rstatus'], $_POST['fstudy'], $_POST['dpub'], $_POST['publication'], $Pdf_file, $_POST['id']);
			if ($result == "1") {
				echo '<script> location.replace("../materials.php?edit=1"); </script>';
			}
		}
	}

	// editing of Research
	if (isset($_GET['edit'])) {
		$edit = preg_replace("/[^a-zA-Z0-9]/", "", $_GET["edit"]);  
    	$edit  = (int)($edit);

		$data = get_resourceaction($connect, $edit);
		if($data != 0){
			$a_author = $data['author'];
			$co_author = explode(",", $data['co_author']);
?>
			<br><br><br><br>
			<div class="container">
				<div class="card">
					<div style="line-height: 20px;">
						<div class="card-body">
							<form method="POST" class="needs-validation" name="form" enctype="multipart/form-data" novalidate>
								<!-- change this form to what must be edited to your assign management -->
								<!-- TITLE -->
								<div class="form-group">
									<label class="label">Title <span class="text-danger">*</span></label>
									<textarea rows="2" cols="60" type="text " name="title" id="title" class="form-control" value='' required><?php echo $data['title']; ?></textarea>
									<div class="invalid-feedback">
					                  	Please enter a title.
					                </div>
								</div>

								<!-- MAIN AUTHOR -->
								<div class="form-group">
									<label class="label">Main Author <span class="text-danger">*</span></label><br>
									<select name="m_author" id="m_author" class="form-control" required>
										<option hidden disabled selected>
										</option>
										<?php $authors = get_author($connect); 
											while ($author = mysqli_fetch_array($authors)){
												if($data['author'] == $author['id']){
										?>
													<option value="<?php echo $author['id'];?>" selected>
														<?php echo $author['name'];?>
													</option>
										<?php 	}
												else{
										?>
													<option value="<?php echo $author['id'];?>">
														<?php echo $author['name'];?>
													</option>
										<?php 	}
											} 
										?>
									</select>	
									<div class="invalid-feedback">
		                      			Please select a main author.
		                    		</div>
								</div>

								<!-- CO AUTHOR -->
								<div class="row">
									<div class="col" id="co-author-list">
										<label class="label">Co-Author(s)</label><br>
							            <select class="selectpicker form-control" multiple data-style="btn-new" data-live-search="true" data-mdb-filter="true" id="co-author" name="co-author[]">
							            <?php $authors = get_author($connect); 
											while ($author = mysqli_fetch_array($authors)){
												$temp = $author['id'];
												
										?>
												<option <?php if(in_array($temp, $co_author)){ echo 'selected';}?> value="<?php echo $author['id'];?>"><?php echo $author['name'];?></option>
										<?php
											} 
										?>					            	
							            </select>
									</div>
								</div>
								<br><br>
								<!-- ABSTRACT -->
								<div class="form-group">
									<label class="label">Abstract <span class="text-danger">*</span></label>
									<textarea rows="5" cols="60" type="text " name="abstract" id="title" class="form-control" required><?php echo $data['abstract'];?></textarea>
									<div class="invalid-feedback">
		                  				Please enter a abstract.
		                			</div>
								</div>

								<div class="row">
									<div class="col">
										<div class="form-group">
				                    		<label class="label">Research Status</label><br>
				                   	 		<select class="custom-select" id="rstatus" name="rstatus">
				                    			<option hidden></option>
				                    			<?php
												if($data['status'] == "Published"){
												?>
													<option selected>Published</option>
				                      				<option> Unpublished</option>
												<?php
												} else{
												?>
													<option>Published</option>
				                      				<option selected> Unpublished</option>
												<?php 
												}
												?>               			
				                    		</select>
				                  		</div>
			                  		</div>
			                  		<div class="col">
			                  			<div class="form-group">
			                    		<label class="label">Research Type</label><br>
			                   	 		<select class="custom-select" id="rtype" name="rtype">
			                    			<option hidden></option>
											<option <?php if($data['type'] == "Institutional"){ echo "selected";}?>>Institutional</option>
		                      				<option <?php if($data['type'] == "Graduate"){ echo "selected";}?>>Graduate</option>
		                      				<option <?php if($data['type'] == "Undergrad"){ echo "selected";}?>>Undergrad</option>
			                    		</select>
			                  		</div>
			                  		</div>
		                  		</div>

								<div class="row">
									<!-- DATE PUBLISH -->
									<div class="col">
										<div class="form-group">
						                    <label>Date Publish <span class="text-danger">*</span></label>
						                    <input type="date" name="dpub" id="dpub" class="form-control" value="<?php echo $data['date_publish'];?>" required="required">
						                    <div class="invalid-feedback">
		                      					Please enter a date publish.
		                    				</div>
						                </div>
									</div>

									<!-- FIELD OF STUDY -->
									<div class="col">
										<div class="form-group">
											<label class="label">Field of Study <span class="text-danger">*</span></label><br>
											<select class="custom-select" id="fstudy" name="fstudy" required>
												<option <?php if($data['fstudy'] == "English"){ echo "selected";}?>>English</option>
								                <option <?php if($data['fstudy'] == "Political Science"){ echo "selected";}?>>Political Science</option>
								                <option <?php if($data['fstudy'] == "Psychology"){ echo "selected";}?>>Psychology</option>
								                <option <?php if($data['fstudy'] == "History"){ echo "selected";}?>>History</option>
								                <option <?php if($data['fstudy'] == "Performing Arts"){ echo "selected";}?>>Performing Arts</option>
								                <option <?php if($data['fstudy'] == "Criminology"){ echo "selected";}?>>Criminology</option>
								                <option <?php if($data['fstudy'] == "Computer Science"){ echo "selected";}?>>Computer Science</option>
								                <option <?php if($data['fstudy'] == "Business Administration"){ echo "selected";}?>>Business Administration</option>
								                <option <?php if($data['fstudy'] == "Education"){ echo "selected";}?>>Education</option>
								                <option <?php if($data['fstudy'] == "Nursing"){ echo "selected";}?>>Nursing</option>
								                <option <?php if($data['fstudy'] == "Physical Theraphy"){ echo "selected";}?>>Physical Theraphy</option>
								                <option <?php if($data['fstudy'] == "Radiologic Technology"){ echo "selected";}?>>Radiologic Technology</option>
								                <option <?php if($data['fstudy'] == "Medical Technology"){ echo "selected";}?>>Medical Technology</option>
								                <option <?php if($data['fstudy'] == "Pharmacy"){ echo "selected";}?>>Pharmacy</option>
								                <option <?php if($data['fstudy'] == "Midwifery"){ echo "selected";}?>>Midwifery</option>
								                <option <?php if($data['fstudy'] == "Hospitality Management"){ echo "selected";}?>>Hospitality Management</option>
								                <option <?php if($data['fstudy'] == "Tourism Management"){ echo "selected";}?>>Tourism Management</option>
											</select>
											<div class="invalid-feedback">
		                      					Please select a fields of study.
		                    				</div>
										</div>
									</div>
								</div>

								<div class="row">
									<!-- TAGS -->
									<div class="col">
										<div class="form-group">
											<label class="label">Publications <span class="text-danger">*</span></label><br>
											<select class="custom-select" id="publication" name="publication" required autocomplete="on">
												<option hidden selected></option>
							               <option <?php if($data['publication'] == "PThe Chiefs Executives"){ echo "selected";}?>>The Chiefs Executives</option>
							               <option <?php if($data['publication'] == "The Chiefs Innovator"){ echo "selected";}?>>The Chiefs Innovator</option>
							               <option <?php if($data['publication'] == "The Chiefs Lamp"){ echo "selected";}?>>The Chiefs Lamp</option>
							               <option <?php if($data['publication'] == "The Chiefs Magus"){ echo "selected";}?>>The Chiefs Magus</option>
							               <option <?php if($data['publication'] == "The Chiefs Pantas"){ echo "selected";}?>>The Chiefs Pantas</option>
							               <option <?php if($data['publication'] == "The Chiefs Philippine Eduation Quarterly"){ echo "selected";}?>>The Chiefs Philippine Eduation Quarterly</option>
							               <option <?php if($data['publication'] == "The Chiefs Sage"){ echo "selected";}?>>The Chiefs Sage</option>
											</select>
											<div class="invalid-feedback">
		                      			Please select a publication.
		                    			</div>
										</div>
									</div>
								</div><br>

								<!-- PDF Upload -->
					            <div class="form-group">
					                <label for="files">Add Abstract (pdf, txt or docs)</label>
					                <input type="file" accept='.pdf, .txt, .docx' class="form-control-file" id="files" name="files" required="required">
					                <div class="invalid-feedback">
					                  	Please upload a pdf file.
					                </div>
					            </div>

								<div class="ml-2">
		                			<p>All fields with <span class="text-danger">*</span> marked are mandatory</p>
		              			</div>

								<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id']; ?>">

								<div class="form-group" align="right">
									<button class="btn btn-success" name="save-edit">Save</button>
									<a class="btn btn-danger" href="../materials.php">Cancel</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

<?php }
	}
?>
<script src="../../../resource/assets/datatables.min.js"></script>
<script type="text/javascript">
	(function() {
	    'use strict';
	    window.addEventListener('load', function() {
	      	// Fetch all the forms we want to apply custom Bootstrap validation styles to
	      	var forms = document.getElementsByClassName('needs-validation');
	      	// Loop over them and prevent submission
	      	var validation = Array.prototype.filter.call(forms, function(form) {
		        form.addEventListener('submit', function(event) {
			        if (form.checkValidity() === false) {
			        	event.preventDefault();
			            event.stopPropagation();
			        }
			        form.classList.add('was-validated');
			    }, false);
	      	});
	    }, false);
  	})();
</script>
