<?php
   require("dbConnect.php");
   session_start();
if(isset($_SESSION['user'])){
if((time() - $_SESSION['time_start_login']) > 3600){
    header("location: login.html");
} else {
    $_SESSION['time_start_login'] = time();
}
} else {
header("location: login.html");
}
   ?>