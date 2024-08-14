 <?php
	// ========================================== RESOURCE MATERIAL SECTION FUNCTION ========================================== //

	function get_author($connect)
	{
		//ORDER BY deadline ASC
		$sql = "SELECT * FROM tblauthor";
		$result = $connect->query($sql);
		return $result;
	}

	function get_account($connect)
	{
		//ORDER BY deadline ASC
		$sql = "SELECT * FROM tblaccount";
		$result = $connect->query($sql);
		return $result;
	}

	function create_resource($connect, $title, $abstract, $author, $mtype, $c_author, $rtype, $rstatus, $fstudy, $dpub, $creator, $created, $publication, $pdf_file)
	{
		$sql = "INSERT INTO tblresource VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		
		if($stmt = $connect->prepare($sql)){	
			$stmt->bind_param("ssssssssssssssss", $id, $title, $abstract, $author, $mtype, $c_author, $rtype, $rstatus, $fstudy, $dpub, $creator, $created, $publication, $pdf_file, $view, $cite);
			$id = "";
			$view = 0;
			$cite = 0;

			$result = $stmt->execute();

			return $result;
		}
		else {
			return 0;
		}
	}

	function delete_resource($connect, $id)
	{
		$sql = "DELETE FROM tblresource WHERE id=?";
		
		if($stmt = $connect->prepare($sql)){	
			$stmt->bind_param("s", $id);

			$result = $stmt->execute();

			return $result;
		}
		else {
			return 0;
		}
	}

	function get_resource($connect)
	{
		//ORDER BY deadline ASC
		$sql = "SELECT * FROM tblresource ORDER BY id DESC";
		$result = $connect->query($sql);
		return $result;
	}

	function get_resourceaction($connect, $id)
	{
		$sql = "SELECT * FROM tblresource WHERE id = ?";
		
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

	function update_resourceaction($connect, $title, $abstract, $author, $c_author, $rtype, $rstatus, $fstudy, $dpub, $publication, $pdf_file, $id)
	{
		$sql = "UPDATE tblresource SET title = ?, author = ?, co_author = ?, type = ?, abstract = ?, fstudy = ?, date_publish = ?, status = ?, publication = ?, pdf_file = ? WHERE id = ?";
		
		if($stmt = $connect->prepare($sql)){	
			$stmt->bind_param("sssssssssss", $title, $author, $c_author, $rtype, $abstract, $fstudy, $dpub, $rstatus, $publication, $pdf_file, $id);

			$result = $stmt->execute();

			return $result;
		}
		else {
			return 0;
		}
	}
?>
