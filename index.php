<?php
   include('session.php');
   //trying permission checks 
   require("dbConnect.php");


?>
<!DOCTYPE html>
<html lang="de">

<head>
    <title>User Pannel</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/userlvl.js"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="favicon.png">
</head>

<body>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="index.php"><i class="fas fa-cog"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li>
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">About</a>
                </li>
                </li>
                <?php
                if(isset($_SESSION['user'])){
$user = $_SESSION['user'];
$select = "SELECT permissionPeople FROM people WHERE namePeople=:namePeople";

	try {
		$result = $conn->prepare($select);


		$result->bindParam(':namePeople', $user);

		
		$result->execute();

        $all_rows = [];
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $all_rows[] = $row;
        $pem =  json_encode($all_rows[0]); 
        if(strpos($pem, "admin") !== false){
            echo "<li class='nav-item'>
            <a class='nav-link' href='echo.php'>Secret Admin Stuff</a>
        </li>";
        }
        }
 
}
catch (PDOException $e) {
    //http_response_code(500);
    echo json_encode(
        array("message" => "Something went wrong:" . $e->getMessage())
    );
}
}
?>
<li>
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="jumbotron text-center text-white bg-secondary rounded-0">
        <img src="imgs\minotaur.png" alt="" class="rounded w-25" />
        <p>Welcome to the begin of my Labyrinth</p>
        <p>-- Minotaur</p>
    </div>



    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group" id="select fields">
                    <label>Choose table:</label>
                    <select name="theComboBox" id="theComboBox">
                        <option>People</option>
                        <option>Creatures</option>
                    </select>
                    <br>
                    <label for="selectlist">namePeople/nameCreature:</label>
                    <!-- Minotaur!!! Told you not to keep permissions in the same shelf as all the others  -->
                    <input type="" name="" id="name-input-field" class="form-control">
                </div>
                <button class="btn btn-secondary" id="btn-choose-name">
                    Search  
                </button>
            </div>
        </div>
    </div>

    <br/>

    <div class="container" id="container-details">
        <div class="row">
            <div class="col">
                <table class="center table" id="table-search">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Password</th>
                    </tr> 
                    <tbody id="data"></tbody>
                </table>
            </div>
        </div>
    </div>


    <br>
    <br>
    <br>

    <footer class="sticky-footer p-4 bg-secondary text-white text-center mt-5">

        <div class="row">
            <div class="col-md-12">
                <p>&copy; 2EHIF, TINF</p>
            </div>
        </div>
    </footer>
</body>

</html>