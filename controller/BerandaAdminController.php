<?php 
    include("functions.php");

    // Cek agar hanya admin yg dapat masuk
    if(!isset($_SESSION["loginAdmin"]) && $_SESSION["email"] != "admin@gmail.com") {
        header("Location: login_user");
        exit;
    }
?>  
