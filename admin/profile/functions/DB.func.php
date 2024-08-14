<?php

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
function select_data($query,$connect){
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
	$sql = "SELECT * FROM roles  WHERE id=$id";
	$rslt = $connect->query($sql);
	$result = $rslt->fetch_assoc();
	if ($rslt->num_rows > 0) {
		return $result['name'];
	} else {
		return "No role found";
	}
}


// get author new update 27/03/2022 - 19:56
function get_authors($connect){
	$sql = "SELECT * FROM tblauthor ORDER BY id ASC";
	$result = $connect->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	}
}

// profile

function update_author_data($connect,$name,$email,$picture,$id){
	$sql = "UPDATE users SET name='$name',email='$email',phone='$phone',address='$address',fb_url='$fb_url',twitter_url='$twitter_url',instagram_url='$instagram_url',picture='$picture' WHERE id=$id";
	$result = $connect->query($sql);
	if ($result === true) {
		return 1;
	} else {
		return 0;
	}
}


function get_author_data($connect,$id){
	$sql = "SELECT * FROM tblauthor WHERE id=$id";
	$result = $connect->query($sql);
	if ($result->num_rows > 0) {
		return $result->fetch_assoc();
	}
}

function update_author_password($connect,$new,$id){
	$sql = "UPDATE tblauthor SET password = '$new' WHERE id = '$id'";
	$result = $connect->query($sql);
	if ($result === true) {
		return 1;
	} else {
		return 0;
	}
}

function update_author($connect,$role,$id){
	$sql = "UPDATE tblauthor SET role='$role' WHERE id = '$id'";
	$result = $connect->query($sql);
	if ($result === true) {
		return 1;
	} else {
		return 0;
	}
}
function delete_author($connect,$id){
	$sql = "DELETE FROM tblauthor WHERE id='$id'";
	$result = $connect->query($sql);
	if ($result === true) {
		return 1;
	} else {
		return 0;
	}
}