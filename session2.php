<?php
//header("Access-Control-Allow-Origin: *");
require("../../dbConnect.php");
   session_start();
if(isset($_SESSION['user'])){
if((time() - $_SESSION['time_start_login']) > 3600){
    header("Location: ../../login.html");
} else {
    $_SESSION['time_start_login'] = time();
}
} else {
header("Location: ../../login.html");
}
?>