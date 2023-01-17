<?php 
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();

    header("Location: ".$base_url.$project_location."/login_user");
    exit;
?>