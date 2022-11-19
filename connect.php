<?php
	$where_to = $_POST['where_to'];
	$how_many = $_POST['how_many'];
	$arriving = $_POST['arriving'];
	$leaving = $_POST['leaving'];

	// Database connection
	$conn = new mysqli("localhost","root","","book_form");
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into book(where_to,how_many,arriving,leaving) values(?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $where_to, $how_many, $arriving,  $leaving);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
