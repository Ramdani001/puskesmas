<?php 
    if( !isset($_SESSION["loginUser"]) ) {
        header("Location: login_user"); 
        exit;
    }
?>  
