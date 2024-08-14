<?php
	// AUTHOR SECTION FUNCTION

	// Get all authors data to display in table
	function get_author($connect){
		$sql = "SELECT * FROM tblauthor ORDER BY id DESC";
		$result = $connect->query($sql);
			return $result;
	}

	// viewing author's profile
	function get_authorData($connect,$id){
		$sql = "SELECT * FROM tblauthor WHERE id=?";
			
		if($stmt = $connect->prepare($sql)){	
			$stmt->bind_param("s", $id);
			$stmt->execute();
			$result = $stmt->get_result();

			return $result->fetch_assoc();
		}
		else {
			return "0";
		}
	}

	function create_authoraction($connect,$name, $prefix,$email, $profession,$fstudy,$created){
		$sql = "INSERT INTO tblauthor VALUES (?,?,?,?,?,?,?)";
			
		if($stmt = $connect->prepare($sql)){	
			$stmt->bind_param("sssssss", $id, $name, $prefix, $email, $profession, $fstudy, $created);
			$id = "";

			$result = $stmt->execute();

			return $result;
		}
		else {
			return 0;
		}
	}

	function update_authoraction($connect,$name,$prefix,$email,$profession,$fstudy,$id){
		$sql = "UPDATE tblauthor SET name=?, prefix=?, email=?, profession=?, fstudy=? WHERE id=?";
			
		if($stmt = $connect->prepare($sql)){	
			$stmt->bind_param("ssssss", $name, $prefix, $email, $profession, $fstudy, $id);

			$result = $stmt->execute();

			return $result;
		}
		else {
			return 0;
		}
	}

	function delete_authoraction($connect,$id){
		$sql = "DELETE FROM tblauthor WHERE id=?";
			
		if($stmt = $connect->prepare($sql)){	
			$stmt->bind_param("s", $id);

			$result = $stmt->execute();

			return $result;
		}
		else {
			return 0;
		}
	}
?>