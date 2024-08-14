<?php
// ACCOUNT SECTION FUNCTION
//Insert data into any table
function add_data($query,$connect,$message){
	$result = $connect->query($query);
	if ($result === true) {
		$messagetype = "1";
	} else {
		$messagetype = "0";
	}
	$message1 = $connect->error;
	message($message,$messagetype);
}

//Check if data and return result
function select_data($query, $connect){
	$result = $connect->query($query);
	return $result;
}

//Update data into a table
function update_data($query,$connect,$message){
	$result = $connect->query($query);
	if ($result->num_rows > 0) {
		return $result;
	}
	if ($result === true) {
		$messagetype = "1";
	} else {
		$messagetype = "0";
	}
	$message1 = $connect->error;
	message($message,$message1,$messagetype);
}

//Delete data and return message
function delete_data($query,$connect,$message){
	$result = $connect->query($query);
	if ($result->num_rows > 0) {
		return $result;
	}
	if ($result === true) {
		$messagetype = "1";
	} else {
		$messagetype = "0";
	}
	$message1 = $connect->error;
	message($message,$message1,$messagetype);
}

function get_users($connect){
	$sql = "SELECT * FROM tblaccount ORDER BY id ASC";
	$result = $connect->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	}
}

function get_user_data($connect,$id){
	$sql = "SELECT * FROM tblaccount WHERE id=$id";
	$result = $connect->query($sql);
	if ($result->num_rows > 0) {
		return $result->fetch_assoc();
	}
}


// getting roles of user
function get_roles($connect){
	$sql = "SELECT * FROM roles";
	$result = $connect->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	}
}

function get_role_name($connect,$id){
	$sql = "SELECT * FROM roles WHERE id=$id";
	$rslt = $connect->query($sql);
	$result = $rslt->fetch_assoc();
	if ($rslt->num_rows > 0) {
		return $result['name'];
	} else {
		return "No role found";
	}
}

// JOURNAL SECTION FUNCTION
function get_journal($connect){
	//ORDER BY deadline ASC
	$sql = "SELECT * FROM projects WHERE status='' OR status=0 OR status=1";
	$result = $connect->query($sql);
		return $result;
}

function get_journalaction($connect,$id){
	$sql = "SELECT * FROM projects WHERE id='$id'";
	$result = $connect->query($sql);
	if ($result->num_rows > 0) {
		return $result->fetch_assoc();
	} else {
		return "0";
	}
}

function create_journalaction($connect,$author,$title,$description,$datepub,$creator,$created){
	$sql = "INSERT INTO projects VALUES ('','$author','$title','$description','$datepub','$creator','$created',0)";
	$result = $connect->query($sql);
	if ($result === true) {
		return 1;
	} else {
		return 0;
	}
}

function update_journalaction($connect,$author,$title,$description,$datepub,$id){
	$sql = "UPDATE projects SET author='$author',title='$title',description='$description',datepub='$datepub' WHERE id=$id";
	$result = $connect->query($sql);
	if ($result === true) {
		return 1;
	} else {
		return 0;
	}
}

function delete_journalaction($connect,$id){
	$sql = "DELETE FROM projects WHERE id=$id";
	$result = $connect->query($sql);
	if ($result === true) {
		return "1";
	} else {
		return "0";
	}
}

function get_project_by_id($connect,$id){
	$sql = "SELECT * FROM projects WHERE id=$id";
	$result = $connect->query($sql);
	if ($result->num_rows > 0) {
		return $result->fetch_assoc();
	} else {
		return "0";
	}
}

// ARTICLE SECTION FUNCTION
function get_articles($connect){
	//ORDER BY deadline ASC
	$sql = "SELECT * FROM article WHERE status='' OR status=0 OR status=1";
	$result = $connect->query($sql);
		return $result;
}

function get_article($connect,$id){
	$sql = "SELECT * FROM article WHERE id='$id'";
	$result = $connect->query($sql);
	if ($result->num_rows > 0) {
		return $result->fetch_assoc();
	} else {
		return "0";
	}
}

function create_article($connect,$aauthor,$atitle,$adescription,$adatepub,$creator,$atags){
	$sql = "INSERT INTO article VALUES ('','$aauthor','$atitle','$adescription','$adatepub','$creator','$atags',0)";
	$result = $connect->query($sql);
	if ($result === true) {
		return 1;
	} else {
		return 0;
	}
}

function update_article($connect,$aauthor,$atitle,$adescription,$adatepub,$id){
	$sql = "UPDATE article SET aauthor='$aauthor',atitle='$atitle',adescription='$adescription',adatepub='$adatepub' WHERE id=$id";
	$result = $connect->query($sql);
	if ($result === true) {
		return 1;
	} else {
		return 0;
	}
}

function delete_article($connect,$id){
	$sql = "DELETE FROM article WHERE id=$id";
	$result = $connect->query($sql);
	if ($result === true) {
		return "1";
	} else {
		return "0";
	}
}

function get_article_by_id($connect,$id){
	$sql = "SELECT * FROM projects WHERE id=$id";
	$result = $connect->query($sql);
	if ($result->num_rows > 0) {
		return $result->fetch_assoc();
	} else {
		return "0";
	}
}

// RESEARCH SECTION FUNCTION
// AUTHOR SECTION FUNCTION
// NEWS SECTION FUNCTION
// PROGRAM SECTION FUNCTION


