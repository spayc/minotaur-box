<?php
// required headers
header("Access-Control-Allow-Origin: root");
header("Content-Type: application/json; charset=UTF-8");
require '../../dbConnect.php';
include('../../session2.php');

// GET
if (isset($_GET)) {
  $select = "SELECT creatures.idCreature, creatures.nameCreature, passwordCreature FROM creatures";

  $result = $conn->query($select);
  
  $all_rows = [];
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $all_rows[] = $row;
  }
  echo json_encode($all_rows);
  //http_response_code(200);
} 

$conn = null;
?>