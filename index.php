<?php
 session_start();
    if(isset($_SESSION['mailID'])){
        header("location: view/home.php");
    }
    else{
        header("location: view/login.php");
    }
?>