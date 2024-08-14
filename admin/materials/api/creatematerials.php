<?php
	include_once "../inc/header1.php";
	if (empty($_SESSION['id'])) {
		// include""
		header("Location: ../../../../login/login.php");
	}
?>

<?php
	//Create new resource material
	if ($_SERVER['REQUEST_METHOD'] =="POST") {
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

      	// Get Create Research Result
      	if (isset($_POST['create'])) {
      		$c_author = "";

	        if(isset($_POST['co-author'])){
	        	if (!empty($_POST["co-author"])) {
		           foreach($_POST['co-author'] as $c_author) {
		         		$c_author = implode(',',$_POST['co-author']);
		         	}
		      	}   
	        } 

	        $result = create_resource($connect,$_POST['title'],$_POST['abstract'],$_POST['m_author'],$_POST['mtype'],$c_author,$_POST['rtype'],$_POST['rstatus'],$_POST['fstudy'],$_POST['dpub'], $_SESSION['id'], $_POST['created'], $_POST['publication'], $Pdf_file);
	        if ($result == 1) {
	          echo '<script> location.replace("../materials.php?add=1"); </script>';
	        } 
	        else {
	          message("Could not create Research!",0);
	        }
      	}
  	}
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
							<textarea rows="2" cols="60" type="text " name="title" id="title" class="form-control" value='' required></textarea>
							<div class="invalid-feedback">
			                  	Please enter a title.
			                </div>
						</div>

						<div class="row">
							<!-- Resource Type -->
			                <div class="col">
			                  	<div class="form-group">
				                    <label class="label">Resource Type <span class="text-danger">*</span></label><br>
				                    <select class="selectpicker form-control"  data-style="btn-new" data-mdb-filter="true"  id="mtype" name="mtype" required="required" title="Choose...">
				                      	<option>Research</option>
				                      	<option>Journal</option>
				                      	<option>Article</option>
				                    </select>
				                    <div class="invalid-feedback">
				                      	Please select a resource type.
				                    </div>
			                  	</div>
			                </div>

							<!-- MAIN AUTHOR -->
							<div class="col">
								<div class="form-group">
									<label class="label">Main Author <span class="text-danger">*</span></label><br>
									<select class="selectpicker form-control"  data-style="btn-new" data-live-search="true" data-mdb-filter="true" id="m_author" name="m_author" required="required" title="Choose...">
										<?php
					                        $result = get_author($connect);
					                        if ($result->num_rows>0) {
					                          	while ($data = mysqli_fetch_array($result)) {
					                              echo  "<option value=".$data['id'].">".$data['name']."</option>";
					                            }
					                        }
					                    ?>
									</select>	
									<div class="invalid-feedback">
		                      			Please select a main author.
		                    		</div>
								</div>
							</div>

							<!-- CO AUTHOR -->
							<div class="col" id="co-author-list">
								<label class="label">Co-Author(s)</label><br>
					            <select class="selectpicker form-control" multiple data-style="btn-new" data-live-search="true" id="co-author" name="co-author[]" value="" title="Choose...">
						            <?php
			                        $result = get_author($connect);
			                        if ($result->num_rows>0) {
			                          	while ($data = mysqli_fetch_array($result)) {
			                              	echo  "<option value=".$data['id'].">".$data['name']."</option>";
			                            }
			                        }
			                      	?>			            	
					            </select>
							</div>
						</div>
						<br>

						<!-- ABSTRACT -->
						<div class="form-group">
							<label class="label">Abstract <span class="text-danger">*</span></label>
							<textarea rows="5" cols="60" type="text " name="abstract" id="title" class="form-control" required></textarea>
							<div class="invalid-feedback">
                  				Please enter a abstract.
                			</div>
						</div>

						<div class="row">
							<div class="col">
								<div class="form-group">
		                    		<label class="label">Research Status</label><br>
		                   	 		<select class="custom-select" id="rstatus" name="rstatus">
		                    			<option hidden selected></option>
				                        <option>Published</option>
				                        <option>Unpublished</option>           			
		                    		</select>
		                  		</div>
	                  		</div>
	                  		<div class="col">
	                  			<div class="form-group">
	                    		<label class="label">Research Type</label><br>
	                   	 		<select class="custom-select" id="rtype" name="rtype">
	                    			<option hidden selected></option>
				                    <option>Institutional</option>
				                    <option>Graduate</option>
				                    <option>Undergrad</option>
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
										<option hidden selected></option>
					                    <option>English</option>
					                    <option>Political Science</option>
					                    <option>Psychology</option>
					                    <option>History</option>
					                    <option>Performing Arts</option>
					                    <option>Criminology</option>
					                    <option>Computer Science</option>
					                    <option>Business Administration</option>
					                    <option>Education</option>
					                    <option>Nursing</option>
					                    <option>Physical Theraphy</option>
					                    <option>Radiologic Technology</option>
					                    <option>Medical Technology</option>
					                    <option>Pharmacy</option>
					                    <option>Midwifery</option>
					                    <option>Hospitality Management</option>
					                    <option>Tourism Management</option>
									</select>
									<div class="invalid-feedback">
                      					Please select a fields of study.
                    				</div>
								</div>
							</div>
						</div>

						<div class="row">
							<!-- Publication -->
							<div class="col">
								<div class="form-group">
									<label class="label">Publications <span class="text-danger">*</span></label><br>
									<select class="custom-select" id="publication" name="publication" required>
										<option hidden selected></option>
					                    <option>The Chiefs Executives</option>
					                    <option>The Chiefs Innovator</option>
					                    <option>The Chiefs Lamp</option>
					                    <option>The Chiefs Magus</option>
					                    <option>The Chiefs Pantas</option>
					                    <option>The Chiefs Philippine Eduation Quarterly</option>
					                    <option>The Chiefs Sage</option>
									</select>
									<div class="invalid-feedback">
                      					Please select a publication.
                    				</div>
								</div>
							</div>
						</div>
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

						<input type="hidden" name="created" value="<?php echo date("M-d-y"); ?>" />
              			<input type="hidden" name="create" value="create"/>

						<div class="form-group" align="right">
							<button class="btn btn-success" name="save-edit">Save</button>
							<a class="btn btn-danger" href="../materials.php">Cancel</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<script src="../../../resource/assets/datatables.min.js"></script>
<script src="../../resource/assets/datatables.min.js"></script>
<script src="../../research/script/main.js"></script>


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
