<?php 
    if( !isset($_SESSION["loginUser"]) ) {
        header("Location: login_user");
        exit;
    }

    if(isset($_SESSION["loginAdmin"]) && $_SESSION["email"] == "admin@gmail.com") {
        header("Location: admin/dashboard");
        exit;
    }
?>  
