<?php
// required headers
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, DELETE');

require __DIR__ . '/../vendor/autoload.php'
require 'dbConnect.php';

$app = new Slim\App;

$app->get('/api/creatures/read/', function ($request, $response) {
    $db = new DbConnection();
    $conn = $db->getDb();

    // if ($conn == null) {
    //     return $response->withJson(
    //         array("message" => "error: Problem Open Database")
    //     );
    // }

//     $query = "SELECT creatures.idCreature, creatures.nameCreature, passwordCreature FROM creatures";
//     $stmt = $conn->prepare($query);
    
//     try {
//       $stmt->execute();
//       $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
//       // if ($rows) {
//       return $response->withJson($rows, 200);
//       // }
//   } catch (PDOException $e) {
//       return $response->withJson(
//           array("message" => $e->getMessage())
//       );
//   } 

    $select = "SELECT creatures.idCreature, creatures.nameCreature, passwordCreature FROM creatures";
  
    $result = $conn->query($select);
    
    $all_rows = [];
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $all_rows[] = $row;
    }
    echo json_encode($all_rows);
    http_response_code(200);

    $conn->dbClose();
});



$app->post('/api/creatures/add', function ($request, $response) {
    $db = new DbConnection();
    $conn = $db->getDb();

    if ($conn == null) {
        return $response->withJson(array("message" => "error: Problem Open Database"));
    }

    $name = $request->getParam('nameCreature');
    $password = $request->getParam('passwordCreature');

    // TODO - Prepared Statement
    $insert = "INSERT INTO creatures VALUES($name . "', '" . $password)";
    // $insert = "INSERT INTO creatures (nameCreature, passwordCreature)
	// 						VALUES (:nameCreature, MD5(:passwordCreature))";

    try {
        $result = $conn->query($insert);

        if ($result) {
            $result->closeCursor();
            return $response->withJson(array("message" => "Created"), 201);
        }
    } catch (PDOException $e) {
        return json_encode(array("message" => $e->getMessage()));
    }
});


// $app->get('/api/playlist/search/{s}', function ($request, $response, array $args) {
//     $db = new DbConnection();
//     $conn = $db->getDb();

//     if ($conn == null) {
//         return $response->withJson(
//             array("message" => "error: Problem Open Database")
//         );
//     }

//     $s = $args['s'];

//     $query = "SELECT p.id AS p_id, p.interpret, p.title, COALESCE(g.name, '-') AS genre FROM playlist p LEFT JOIN genre g ON p.genre=g.id WHERE interpret LIKE '%$s%' OR title LIKE '%$s%'";
//     $result = $conn->query($query);

//     if ($result->rowCount() > 0) {
//         $rows = $result->fetchAll(PDO::FETCH_CLASS);
//         return $response->withJson($rows, 200);
//     } else {
//         return $response->withJson(
//             array("message" => "no entries")
//         );
//     }

//     $conn->dbClose();
// });

// // Test Route (Formular):
// // Method: POST
// // http://localhost/2021/mip/jukebox-backend-slim/rest-api.php/api/playlist/
// // http://localhost/2021/mip/jukebox-backend-slim/api/playlist/
// $app->post('/api/playlist', function ($request, $response) {

//     $db = new DbConnection();
//     $conn = $db->getDb();

//     if ($conn == null) {
//         return $response->withJson(
//             array("message" => "error: Problem Open Database")
//         );
//     }

//     // get formData (from the body)
//     $data = $request->getParsedBody();

//     $interpret = $data['interpret'];
//     $title = $data['title'];

//     // TODO - Prepared Statement
//     $insert = "INSERT INTO playlist (interpret, title) VALUES ('$interpret', '$title')";

//     try {
//         $result = $conn->query($insert);

//         if ($result) {
//             $result->closeCursor();
//             return $response->withJson(array("message" => "Created", "interpret" => $interpret), 201);
//             // echo json_encode(array("message" => "Created", "interpret" => $interpret));
//         }
//     } catch (PDOException $e) {
//         return $response->withJson(
//             array("message" => $e->getMessage())
//         );
//     }

//     $conn->dbClose();
// });

// // Test Route (JSON):
// // Method: POST
// // http://localhost/2021/mip/jukebox-backend-slim/rest-api.php/api/playlist/add
// // http://localhost/2021/mip/jukebox-backend-slim/api/playlist/add
// // Body: {"interpret":"mip", "title":"test"}
// $app->post('/api/playlist/add', function ($request, $response) {
//     $db = new DbConnection();
//     $conn = $db->getDb();

//     if ($conn == null) {
//         return $response->withJson(array("message" => "error: Problem Open Database"));
//     }

//     $interpret = $request->getParam('interpret');
//     $title = $request->getParam('title');

//     // TODO - Prepared Statement
//     $insert = "INSERT INTO Playlist VALUES(null, '" . $interpret . "', '" . $title . "')";

//     try {
//         $result = $conn->query($insert);

//         if ($result) {
//             $result->closeCursor();
//             return $response->withJson(array("message" => "Created"), 201);
//         }
//     } catch (PDOException $e) {
//         return json_encode(array("message" => $e->getMessage()));
//     }
// });

// // Test Route:
// // Method: DELETE
// // http://localhost/2021/mip/jukebox-backend-slim/api/playlist/delete/53
// $app->delete('/api/playlist/delete/{id}', function ($request, $response, array $args) {
//     $db = new DbConnection();
//     $conn = $db->getDb();

//     if ($conn == null) {
//         return $response->withJson(array("message" => "error: Problem Open Database"));
//     }

//     $id = $args['id'];

//     // TODO - Prepared Statement
//     $delete = "DELETE FROM Playlist WHERE id = $id";

//     try {
//         $result = $conn->query($delete);

//         if ($result) {
//             $result->closeCursor();
//             return $response->withJson(array("message" => "Deleted {$id}"));
//         }
//     } catch (PDOException $e) {
//         return $response->withJson(array("message" => $e->getMessage()));
//     }
// });
// $app->run();
?>