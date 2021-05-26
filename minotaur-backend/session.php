<?php
   require("dbConnect.php");
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select usernameLogin from labyrinth.login where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("Location: login.html");
      die();
   }
   ?>