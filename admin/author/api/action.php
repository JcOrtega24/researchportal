<?php
include_once "../inc/header_1.php";
	
?>

<!--View Author-->
<?php 
	//updating of author
	if (isset($_POST['id'])) {	
	 	$result = update_authoraction($connect,$_POST['name'],$_POST['prefix'],$_POST['email'],$_POST['profession'],$_POST['fstudy'],$_POST['id']);
	 	if ($result == "1") {
			echo '<script> location.replace("../author.php?edit=1"); </script>';
	 	}
	}

	if (!empty($_SESSION['id'])) {	
	// editing of author
	if (isset($_GET['edit'])) {
		$edit = preg_replace("/[^a-zA-Z0-9]/", "", $_GET["edit"]);  
		$edit  = (int)($edit); 

		$data = get_authorData($connect, $edit);
		if($data != 0){
?>
	
	<br><br><br><br>
	<div class="container">
		<div class="card">
			<div style="line-height: 20px;">
				<div class="card-body">
					<form method="post" class="needs-validation" novalidate>
						<!-- change this form to what must be edited to your assign management -->
						<div class="form-group">
							<div class="form-group">
								<label for="name">Author <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="name" name="name" value="<?php echo $data['name'];?>" required>
								<div class="invalid-feedback">
					                Please enter a author name.
					            </div>
							</div>
							<div class="form-group">
				              	<label class="label">Prefix (Optional)</label><br>
				              	<select class="custom-select" id="prefix" name="prefix" title="Choose...">
					                <option selected hidden></option>
					                <option <?php if($data['prefix'] == "Dr."){ echo "selected";}?>>Dr.</option>
					                <option <?php if($data['prefix'] == "Prof."){ echo "selected";}?>>Prof.</option>
					                <option <?php if($data['prefix'] == "Mr."){ echo "selected";}?>>Mr.</option>
					                <option <?php if($data['prefix'] == "Ms."){ echo "selected";}?>>Ms.</option>
					                <option value="">None</option>
				              	</select>
				            </div>						
							<div class="form-group">
				              <label for="email" class="control-label">Email (Optional)</label>
				              <input type="text" class="form-control" id="email" name="email" value="<?php echo $data['email'];?>">
				              <div class="invalid-feedback">
				                	Please enter a email.
				              </div>
				            </div>

							<div class="form-group">
								<label class="label">Profession <span style="color:red;"> &#42;</span></label><br>
				              	<select class="custom-select" id="profession" name="profession" title="Choose..." required>
					                <option hidden selected></option>
					                <option <?php if($data['profession'] == "Admin"){ echo "selected";}?>>Admin</option>
					                <option <?php if($data['profession'] == "Professor"){ echo "selected";}?>>Professor</option>
					                <option <?php if($data['profession'] == "Staff"){ echo "selected";}?>>Staff</option>
					                <option <?php if($data['profession'] == "Student"){ echo "selected";}?>>Student</option>
				              	</select>
				              	<div class="invalid-feedback">
				                	Please select a profession.
				              	</div>
							</div>

							<div class="form-group">
								<label class="label">Field of Study <span class="text-danger">*</span></label><br>
					            <select class="custom-select" id="ftudy" name="fstudy" title="Choose..." required>
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
				                	Please select fields of study.
				              	</div>
							</div>
						</div>
						<div class="ml-1">
			            	<p>All fields with <span class="text-danger">*</span> marked are mandatory</p>
			          	</div>
						<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id'];?>">
						<div class="form-group" align="right">
							<button class="btn btn-success">Save</button>
							<a class="btn btn-danger" href="../author.php">Cancel</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php 	}
	}
	} 
?>

<script src="../../resource/assets/datatables.min.js"></script>
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