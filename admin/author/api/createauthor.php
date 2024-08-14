<?php
include_once "../inc/header_1.php";
	
?>

<!--View Author-->
<?php 
	if ($_SERVER['REQUEST_METHOD'] =="POST") {
    if (isset($_POST['create'])) {
      $result = create_authoraction($connect,$_POST['name'],$_POST['prefix'],$_POST['email'],$_POST['profession'],$_POST['fstudy'],$_POST['created']);
      if ($result == 1) {
        echo '<script> location.replace("../author.php?add=1"); </script>';
      } else {
        message("Could not create Author!",0);
      }
    }
  }
?>
	
	<br><br><br><br>
	<div class="container">
		<div class="card">
			<div style="line-height: 20px;">
				<div class="card-body">
					<form method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
						<!-- change this form to what must be edited to your assign management -->
						<div class="form-group">
							<div class="form-group">
								<label for="name">Author <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="name" name="name" value="" required>
								<div class="invalid-feedback">
					                Please enter a author name.
					            </div>
							</div>
							<div class="form-group">
				              	<label class="label">Prefix (Optional)</label><br>
				              	<select class="custom-select" id="prefix" name="prefix" title="Choose...">
					                <option hidden selected></option>
					                <option>Dr.</option>
					                <option>Prof.</option>
					                <option>Mr.</option>
					                <option>Ms.</option>
				              	</select>
				            </div>						
							<div class="form-group">
				              <label for="email" class="control-label">Email (Optional)</label>
				              <input type="text" class="form-control" id="email" name="email" value="">
				              <div class="invalid-feedback">
				                	Please enter a email.
				              </div>
				            </div>

							<div class="form-group">
								<label class="label">Profession <span style="color:red;"> &#42;</span></label><br>
				              	<select class="custom-select" id="profession" name="profession" title="Choose..." required>
					                <option hidden selected></option>
					                <option>Admin</option>
					                <option>Professor</option>
					                <option>Staff</option>
					                <option>Student</option>
				              	</select>
				              	<div class="invalid-feedback">
				                	Please select a profession.
				              	</div>
							</div>

							<div class="form-group">
								<label class="label">Field of Study <span class="text-danger">*</span></label><br>
					            <select class="custom-select" id="ftudy" name="fstudy" title="Choose..." required>
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
				                	Please select fields of study.
				              	</div>
							</div>
						</div>
						<div class="ml-1">
			            	<p>All fields with <span class="text-danger">*</span> marked are mandatory</p>
			          	</div>

						<input type="hidden" name="created" value="<?php echo date("Y-m-d"); ?>"/>
          				<input type="hidden" name="create" value="create"/>

						<div class="form-group" align="right">
							<button class="btn btn-success">Save</button>
							<a class="btn btn-danger" href="../author.php">Cancel</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

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