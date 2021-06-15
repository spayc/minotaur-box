<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require '../../dbConnect.php';
<<<<<<< Updated upstream
include('../../session2.php');

=======
include('../../session.php')
>>>>>>> Stashed changes
// GET
if (isset($_GET)) {
  $select = "SELECT people.idPeople, people.namePeople, passwordPeople FROM people";

  $result = $conn->query($select);
  
  $all_rows = [];
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $all_rows[] = $row;
  }
  echo json_encode($all_rows);
  //http_response_code(200);
} 

$conn = null;