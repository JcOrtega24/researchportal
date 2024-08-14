<?php
// NEWS SECTION FUNCTION
function get_news_events($connect){
		//ORDER BY deadline ASC
		$sql = "SELECT * FROM tblnewsevents ORDER BY id DESC";
		$result = $connect->query($sql);
			return $result;
	}

	function get_newseventsaction($connect,$id){
		$sql = "SELECT * FROM tblnewsevents WHERE id=?";
		
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

	function create_newseventaction($connect, $title, $description, $date_publish, $author, $date, $time, $type){
		$sql = "INSERT INTO tblnewsevents VALUES(?,?,?,?,?,?,?,?)";
		
		if($stmt = $connect->prepare($sql)){	
			$stmt->bind_param("ssssssss", $id, $title, $description, $date_publish, $author, $date, $time, $type);
			$id = "";

			$result = $stmt->execute();
			
			return $result;
		}
		else {
			return "0";
		}
	}

	function update_newseventaction($connect, $title, $description, $date_event, $time_event, $type, $id){
		$sql = "UPDATE tblnewsevents SET title=?, description=?, date_event=?, time_event=?, type=? WHERE id=?";
		
		if($stmt = $connect->prepare($sql)){	
			$stmt->bind_param("ssssss", $title, $description, $date_event, $time_event, $type, $id);

			$result = $stmt->execute();

			return $result;
		}
		else {
			return "0";
		}
	}

	function delete_newseventaction($connect,$id){
		$sql = "DELETE FROM tblnewsevents WHERE id=?";
		
		if($stmt = $connect->prepare($sql)){	
			$stmt->bind_param("s", $id);

			$result = $stmt->execute();

			return $result;
		}
		else {
			return 0;
		}
	}

	function get_account($connect)
	{
		//ORDER BY deadline ASC
		$sql = "SELECT * FROM tblaccount";
		$result = $connect->query($sql);
		return $result;
	}

?>