 <?php
	// =========================================== SEARCH MODULE SECTIONFUNCTION ============================== =================//


	function get_user_data($connect, $id)
	{
		$sql = "SELECT * FROM tblaccount WHERE id=$id";
		$result = $connect->query($sql);
		if ($result->num_rows > 0) {
			return $result->fetch_assoc();
		}
	}

	// =====================================================================
	function get_author($connect)
	{
		//ORDER BY deadline ASC
		$sql = "SELECT * FROM tblauthor";
		$result = $connect->query($sql);
		return $result;
	}

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

	function get_authorsID($connect,$name){
		$sql = "SELECT id FROM tblauthor WHERE name LIKE ?";
		
		$name = '%'.$name.'%';

		if($stmt = $connect->prepare($sql)){	
			$stmt->bind_param("s", $name);
			$stmt->execute();
			$result = $stmt->get_result();

			return $result->fetch_assoc();
		}
		else {
			return "0";
		}
	}

	// ================================================

	function get_resourceaction($connect, $id)
	{
		$sql = "SELECT * FROM tblresource WHERE id=?";
		
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

	function get_author_inside_resource($connect)
	{
		$sql = "SELECT * FROM tblresource";
		$result = $connect->query($sql);
		return $result;

		/*$sql = "SELECT * FROM tblresource WHERE author = ? OR co_author LIKE ?";

		$coauthor = '%'.$authorID.'%';

		if($stmt = $connect->prepare($sql)){	
			$stmt->bind_param("ss", $authorID, $coauthor);
			$stmt->execute();
			$result = $stmt->get_result();

			return $result;
		}
		else {
			return "0";
		}*/
	}

	////////////////////

	//function to count the rows of the search
	function get_count_resource_by_title($connect, $word, $authorID)
	{ 
		$sql = "SELECT COUNT(*) FROM tblresource WHERE title LIKE ? OR author = ? OR co_author LIKE ? OR fstudy LIKE ? ORDER BY views";
		
		$word = '%'.$word.'%';
		$coauthor = '%'.$authorID.'%';

		if($stmt = $connect->prepare($sql)){	
			$stmt->bind_param("ssss", $word, $authorID, $coauthor, $word);
			$stmt->execute();
			$result = $stmt->get_result();

			return $result;
		}
		else {
			return "0";
		}
	}

	// function to get the result of the search
	function get_resource_by_title($connect, $word, $authorID, $initial_page, $limit)
	{ 
		$sql = "SELECT * FROM tblresource WHERE title LIKE ? OR author = ? OR co_author LIKE ? OR fstudy LIKE ? ORDER BY views DESC LIMIT ?, ?";
		
		$word = '%'.$word.'%';
		$coauthor = '%'.$authorID.'%';

		if($stmt = $connect->prepare($sql)){	
			$stmt->bind_param("ssssss", $word, $authorID, $coauthor, $word, $initial_page, $limit);
			$stmt->execute();
			$result = $stmt->get_result();

			return $result;
		}
		else {
			return "0";
		}
	}

	////////////////////

	function get_count_resource_by_title_filtered($connect, $word, $authorID, $sort)
	{
		$sql = "SELECT COUNT(*) FROM tblresource WHERE (title LIKE ? OR author = ? OR co_author LIKE ? OR fstudy LIKE ?)  AND resource_type = ? ORDER BY views DESC";
		
		$word = '%'.$word.'%';
		$coauthor = '%'.$authorID.'%';

		if($stmt = $connect->prepare($sql)){	
			$stmt->bind_param("sssss", $word, $authorID, $coauthor, $word, $sort);
			$stmt->execute();
			$result = $stmt->get_result();

			return $result;
		}
		else {
			return "0";
		}
	}

	function get_resource_by_title_filtered($connect, $word, $authorID, $sort, $initial_page, $limit)
	{
		$sql = "SELECT * FROM tblresource WHERE (title LIKE ? OR author = ? OR co_author LIKE ? OR fstudy LIKE ?)  AND resource_type = ? ORDER BY views DESC LIMIT ?, ?";
		
		$word = '%'.$word.'%';
		$coauthor = '%'.$authorID.'%';

		if($stmt = $connect->prepare($sql)){	
			$stmt->bind_param("sssssss", $word, $authorID, $coauthor, $word, $sort, $initial_page, $limit);
			$stmt->execute();
			$result = $stmt->get_result();

			return $result;
		}
		else {
			return "0";
		}
	}

	////////////////////

	function get_count_resource_by_title_filtered_cites($connect, $word, $authorID)
	{
		$sql = "SELECT COUNT(*) FROM tblresource WHERE title LIKE ? OR author = ? OR co_author LIKE ? OR fstudy LIKE ? ORDER BY cites DESC";
		
		$word = '%'.$word.'%';
		$coauthor = '%'.$authorID.'%';

		if($stmt = $connect->prepare($sql)){	
			$stmt->bind_param("ssss", $word, $authorID, $coauthor, $word);
			$stmt->execute();
			$result = $stmt->get_result();

			return $result;
		}
		else {
			return "0";
		}
	}

	function get_resource_by_title_filtered_cites($connect, $word, $authorID, $initial_page, $limit)
	{
		$sql = "SELECT * FROM tblresource WHERE title LIKE ? OR author = ? OR co_author LIKE ? OR fstudy LIKE ? ORDER BY cites DESC LIMIT ?, ?";
		
		$word = '%'.$word.'%';
		$coauthor = '%'.$authorID.'%';

		if($stmt = $connect->prepare($sql)){	
			$stmt->bind_param("ssssss", $word, $authorID, $coauthor, $word, $initial_page, $limit);
			$stmt->execute();
			$result = $stmt->get_result();

			return $result;
		}
		else {
			return "0";
		}
	}
?>


