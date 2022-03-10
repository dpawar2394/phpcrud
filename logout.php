<?php  
    require('db_connection.php');//include 
    if(!isset($_SESSION['loggedIn'])) {
       header("Location: /deepak/test2.php/login.php"); 
    } 

    session_destroy();
    header("Location: /deepak/test2.php/login.php");

     
?>