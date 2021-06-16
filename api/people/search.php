<?php
header("Access-Control-Allow-Origin: root");
// header("Content-Type: application/json; charset=UTF-8");
require '../../dbConnect.php';
include('../../session2.php');


if (isset($_POST['namePeople'])) {
	require '../../dbConnect.php';

	$name = $_POST["namePeople"];

  	$select = "SELECT idPeople, namePeople, passwordPeople FROM people WHERE namePeople='{$name}'";

  	$result = $conn->query($select);
  
  	$all_rows = [];
  	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    	$all_rows[] = $row;
  	}


  	if($result){
		echo json_encode(array($all_rows));
	}
  	
} 

$conn = null;
?>