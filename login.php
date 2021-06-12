<?php
    require("dbConnect.php");
    session_start();
    $error = false;
    $user = $_POST['email'];
    // $pass = $_POST['password'];
    $pass = md5($_POST['password']);
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      if(empty($user) || empty($pass)) {
         $messeg = "Username/Password con't be empty";
     } else {
         $sql = "SELECT namePeople, passwordPeople, permissionPeople VARCHAR(255) NOT NULL,
         FROM labyrinth.people WHERE namePeople=? AND 
       passwordPeople=? ";
         $query = $conn->prepare($sql);
         $query->execute(array($user,$pass));
     
         if($query->rowCount() >= 1) {
             $_SESSION['user'] = $user;
             $_SESSION['time_start_login'] = time();
             header("location: index.php");
         } else {
             $messeg = "Username/Password is wrong";
         }
     }
     }
     
    

?>