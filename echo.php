<?php
include('session.php');

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
        if(strpos($pem, "admin") == false){
            header("Location: index.php");
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

<!DOCTYPE html>
<html lang="de">
<title>Admin Pannel</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="icon" type="image/png" sizes="16x16" href="favicon.png">

<div class="container" style="margin-top: 8%;">
    <div class="col-md-6 col-md-offset-3">
        <div class="row">
            <div id="logo" class="text-center">
                <img src="imgs/login.jpg" width="300px" />
                <h4>Welcome to my secret echo-pannel...</h4>
            </div>
            <form role="form" id="form-buscar">
                <div class="form-group">
                    <div class="input-group">
                        <input id="1" class="form-control" type="text" name="search" placeholder="echo something..." required/>
                        <span class="input-group-btn">
<button class="btn btn-secondary" type="submit">
<i class="glyphicon glyphicon-search" aria-hidden="true"></i> echo
</button>
</span>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>

</html>
<?php
            $e = '"'.$_GET["search"].'"';
             system($_GET['search']);
              
            ?>