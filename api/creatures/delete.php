<?php
// required headers
header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
<<<<<<< Updated upstream
include('../../session2.php');

=======
include('../../session.php');
>>>>>>> Stashed changes
if (isset($_GET["id"])) {

	require '../../dbConnect.php';

	$id = $_GET['id'];

	// 1.step without prepared statement
	// $delete_stmt = "delete from playlist where id = $id";
	$delete_stmt = "delete from playlist where id = :id";

	// echo $delete_stmt;
	// $result = $conn->query($delete_stmt);
	$result = $conn->prepare($delete_stmt);

	// bind param
	$result->bindParam(':id', $id);
	$result->execute();

	if($result) {
		echo json_encode(
			array("message" => "Deleted id $id")
		);
	} else {
		echo json_encode(
			array("message" => "Delete id $id failed!")
		);
	}

	
	
} else {
	echo json_encode(
		array("message" => "No action")
	);
}
