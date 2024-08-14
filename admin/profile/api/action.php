<?php
include_once "../inc/header_1.php";
// if (empty($_SESSION['id'])) {
// 	header("Location: ../../../login/login.php");
// }
?>

<!--View Journal-->
<?php 
//updating of journal
if (isset($_POST['id'])) {
 		$result = update_journalaction($connect,$_POST['author'],$_POST['title'],$_POST['description'],$_POST['datepub'],$_POST['id']);
 		if ($result == "1") {
			echo'<div style="position:relative;top: 100px;"';
 			message("Journal updated successfully!",1);
 		}
 	}
// deleting of journal
 if (isset($_GET['del'])) {
 	$result = delete_journalaction($connect,$_GET['del']);
 	if ($result =="1") {
 		header("Location: journal.php");
 		message("Journal deleted successfully!","1");
 	}
 }

// editing of journal
if (isset($_GET['edit'])) {
	$data = get_journalaction($connect,$_GET['edit']);
	?>
	<br><br><br><br>

	<div class="container">
		<table class="table table-bordered " >
			<thead class="thead-dark">
			
				<tr>
					<th scope="cols" colspan="3" class="p-0">
						
						<h5> <a href="action.php?id=<?php echo $data['id'];?>&ref=journal"><button class="btn btn-dark btn-sm">← Back to project</button></a> </h5>
					</th>
				</tr>
			</thead>
			<form method="post">
			<tbody>
				<tr>
					<td>
						<div class="form-group">
						<label for="author">Select Author</label>
								<select name="author" id="Select Author" class="form-control" required>
							<option  selected>Choose...</option>
							<?php $authors = get_authors($connect); while ($author = mysqli_fetch_array($authors)) { 
								if ($author['role'] !="Administrator") {
								?>
								<option value="<?php echo $author['fullname'];?>"><?php echo $author['fullname'];?></option>
								<?php }} ?>
							</select>
							<div class="form-group">
								<label for="title">Title</label>
								<input class="form-control" id="title" name="title" value="<?php echo $data['title'];?>">
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<textarea class="form-control" id="description" name="description" rows="10"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="datepub">Date Publish</label>
							<input type="date" class="form-control" id="datepub" name="datepub" value="<?php echo $data['datepub'];?>">
						</div>

						<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id'];?>">

						<div class="form-group" align="right">
							<button class="btn btn-primary btn-sm">Save Project</button> <a class="btn btn-dark btn-sm" href="/action.php?id=<?php echo $data['id'];?>&ref=journal">Cancel</a>
						</div>
					</td>

				</tr>
			</tbody>
		</form>
		</table>
		</div>
		</div>

<?php } ?>

<?php 

// Get journal id
if (!empty($_GET['id'])) {
	$data = get_journalaction($connect,$_GET['id']);
	?>
<br><br><br><br>
	<!--View Journal-->
	<div class="container">
	<div class="card">
		<div class="card-body">
		<div style="line-height: 20px;">
		<style>
			h2,p{
				padding:0;
				margin:0;
			}
			.card{

			}
		</style>
					<div class="badge badge-info text-wrap" style="width: 4rem;padding:5px;" >
					<span >Journal</span>
					</div>
					<h2 class="text-left" style="margin-top:10px;" ><?php echo $data['title']?></h2>
						<button class="btn btn-primary btn-sm float-right" style="position:relative;bottom:40px;" ><i class="fa fa-download"> Download fulltext PDF&nbsp;</i></button>
						<button class="btn btn-outline-primary btn-sm float-right" style="position:relative;bottom:40px;" ><i class="fa fa-file-text"> Download fulltext PDF&nbsp;</i></button>
					<p class="font-weight-normal text-left" style="width:50%;"><?php echo ($data['description']); ?></p>
					<p class="font-weight-sm-light text-left" style="font-size: 15px;margin-top:10px;" ><?php echo $data['datepub'];?></p>
					<p style="margin-top:10px;"><b>Authors:</b></p>
					<p style="margin-top:10px;"><a href=""><?php echo $data['author']?></a></p>
					</div>
					</div>
					</div>	
	<br<br><br>
	<div class="container">
		<div id="result"></div>
			<div class="modal-footer">
				<a href="../journal.php"><button class="btn btn-dark btn-sm">Back</button></a>
					<div class="dropdown">
						<button class="btn btn-light btn-sm" type="button" id="option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-ellipsis-h"></i>
						</button>
						
						<div class="dropdown-menu" aria-labelledby="option">
							<a class="dropdown-item" href="action.php?edit=<?php echo $data['id']?>">Edit</a>
							<a class="dropdown-item" href="#<?php echo $data['id'];?>" data-toggle="modal" data-target="#delete">Delete</a>
						</div>
					</div>		
			</div>	
		</div>
	
<?php } ?>

