<?php
	include "../inc/header1.php";
?>

<?php
	// Update News
	if (isset($_POST['id'])) {	
 		$result = update_newseventaction($connect,$_POST['title'],$_POST['description'],$_POST['date'],$_POST['time'],$_POST['type'],$_POST['id']);
 		if ($result == "1") {
			echo '<script> location.replace("../index.php?edit=1"); </script>';
 		}
 	}

 	if (isset($_GET['edit'])) {
 		$edit = preg_replace("/[^a-zA-Z0-9]/", "", $_GET["edit"]);  
    $edit = (int)($edit);

		$data = get_newseventsaction($connect, $edit);

		if($data != 0){
			$a_author = $data['author'];
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
										<label for="headlines">Titles <span class="text-danger">*</span></label>
										<input type="text" class="form-control" id="title" name="title" value="<?php echo $data['title']; ?>" required>
										<div class="invalid-feedback">
		                  Please enter a title.
		                </div>
									</div>						
									<div class="form-group">
										<label class="label">Description <span class="text-danger">*</span></label>
										<textarea rows="5" cols="60" type="text " name="description" id="description" class="form-control" required><?php echo $data['description'];?></textarea>
										<div class="invalid-feedback">
		                  Please enter a description.
		                </div>
									</div>

									<div class="row">
						       <div class="col">  
						          <div class="form-group">
						            <label>Type <span class="text-danger">*</span></label>
						            <select class="custom-select" id="type" name="type" title="Choose...">
						              <option hidden selected></option>
						              <option <?php if($data['type'] == "News"){ echo "selected";}?>>News</option>
						              <option <?php if($data['type'] == "Events"){ echo "selected";}?>>Events</option>
						            </select>
						            <div class="invalid-feedback">
		                      Please select post type.
		                   	</div>
						          </div>
						        </div>
										<div class="col">
						          <div class="form-group">
												<label for="datepub">Date (Required if events)</label>
												<input type="date" class="form-control" id="date" name="date" value="<?php echo $data['date_event']; ?>">
											</div>
						        </div>
										<div class="col">  
						          <div class="form-group">
												<label for="datepub">Time (Required if events)</label>
												<input type="time" class="form-control" id="time" name="time" value="<?php echo $data['time_event']; ?>">
											</div>
						        </div>
						      </div>
								</div>

								<div class="ml-2">
		            	<p>All fields with <span class="text-danger">*</span> marked are mandatory</p>
		          	</div>

								<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id']; ?>">

								<div class="form-group" align="right">
									<button class="btn btn-success" type="submit">Save</button> 
									<a class="btn btn-danger" href="../index.php">Cancel</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
<?php }
		}
		else{
?>
		<br><br><br><br>
			<div class="container">
				<div class="card">
					<div style="line-height: 20px;">
						<div class="card-body">
							<h1 style="align: center; margin-top: 120px;">Data not Found</h1>
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