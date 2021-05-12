<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// puts in the code from dbConnect
// include  -> is not so strict -> if file does not exist rest of the code will go on
// require  -> if file does not exist then the code stops here!!!!
require '../../dbConnect.php';

// GET
if (isset($_GET)) {

  // Read data from the database
  // Tutorial: https://www.w3schools.com/php/php_mysql_select.asp

  // have to build the select string
  $select = "SELECT p.id, p.interpret, p.title, COALESCE(g.name, '-') AS genre
              FROM playlist p LEFT JOIN genre g ON p.genre = g.id";

  // send the query to the database
  $result = $conn->query($select);

  // echo $result->rowCount(); // we will receive 3 entries

  // receive the response from the database
  // $row = $result->fetch(PDO::FETCH_ASSOC);  // 1st song
  // $row = $result->fetch(PDO::FETCH_ASSOC);  // 2nd song
  // echo var_dump($row);
  // echo $row["id"] . " : " . $row["title"] . " : " . $row["interpret"];
  $all_rows = [];   // declare an array
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $all_rows[] = $row;
  }
  // echo var_dump($all_rows);

  // transform array to json, send back the data (response from API) with echo
  echo json_encode($all_rows);

  // set the http status code to 200 OK
  http_response_code(200);
} 

// close the db connection
$conn = null;