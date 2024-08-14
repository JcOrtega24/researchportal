<?php
	include_once "../inc/header1.php";
?>

<!--View Redearch-->
<?php
	//updating of Research
	if (isset($_POST['id'])) {
		$result = update_account($connect, $_POST['name'], $_POST['email'], $_POST['pass'], $_POST['ucategory'], $_POST['au_member'], $_POST['id']);
		if ($result == "1") {
			echo '<script> location.replace("../account.php?edit=1"); </script>';
		}
	}

	// editing of Research
	if (isset($_GET['edit'])) {
		// change function to the designated function of your assign management
		$data = get_accountaction($connect, $_GET['edit']);
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
								<label for="name">Name <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="name" name="name" value="<?php echo $data['name']; ?>">
								<div class="invalid-feedback">
					                Please enter a name.
					            </div>
							</div>
							<div class="form-group">
								<label for="email">Email <span class="text-danger">*</span></label>
								<input class="form-control" id="email" name="email" value="<?php echo $data['email']; ?>" required>
								<div class="invalid-feedback">
				                	Please enter an email.
				              	</div>
							</div>
							<div class="form-group">
								<label for="pass">Password <span class="text-danger">*</span></label>
								<input type="password" class="form-control" id="pass" name="pass" required>
								<div class="invalid-feedback">
					                Please enter a password.
					            </div>
							</div>
						</div>
						<div class="form-group">
							<label for="passowrd">Category <span class="text-danger">*</span></label>
							<select class="browser-default custom-select" id="ucategory" class="form-control" name="ucategory" value=" " required>
								<option hidden selected disabled value="">Category</option>
								<?php
								if($data['ucategory'] == "Administrator"){
								?>
									<option value="Student">Student</option>
									<option value="Administrator" selected>Administrator</option>
								<?php
								} else{
								?>
									<option value="Student" selected>Student</option>
									<option value="Administrator">Administrator</option>
								<?php 
								}
								?>
							</select>
							<div class="invalid-feedback">
					            Please select a category.
					        </div>
						</div>

						<div class="form-group">
							<label for="au_member">Subscription <span class="text-danger">*</span></label>
							<select class="browser-default custom-select" id="au_member" class="form-control" name="au_member" value=" " required>
								<option hidden selected disabled value="">Subscribe in research portal?</option>
								<?php
								if($data['subscribe'] == "Yes"){
								?>
									<option value="Yes" selected>Yes</option>
									<option value="No">No</option>
								<?php
								} else{
								?>
									<option value="Yes">Yes</option>
									<option value="No" selected>No</option>
								<?php 
								}
								?>
							</select>
							<div class="invalid-feedback">
					            Please select a subscription status.
					        </div>
						</div>
						<div class="ml-1">
			            	<p>All fields with <span class="text-danger">*</span> marked are mandatory</p>
			          	</div>
						<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id']; ?>">
						<div class="form-group" align="right">
							<button class="btn btn-success" type="submit" href="../account.php">Save</button> 
							<a class="btn btn-danger" href="../account.php">Cancel</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

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