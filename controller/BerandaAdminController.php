<?php 
    if(!isset($_SESSION["loginAdmin"]) && $_SESSION["email"] != "admin@gmail.com") {
        header("Location: login_user");
        exit;
    }
?>  
