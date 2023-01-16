<?php error_reporting(1);
    
    include "config/database.php";
    include "config/config.php";
    include "config/session.php";
    
    // BASE URL SESUAIKAN DENGAN LINK / HOST MASING - MASING, TERMASUK PROJECT LOCATION NYA JUGA
    $base_url = "http://localhost"; // Sesuaikan dengan Host Masing - Masing
    $project_location = "/puskesmas/index.php"; // Sesuaikan dengan nama project yg digunakan

    // Global Variable
    $vars = explode("/",$_SERVER['REQUEST_URI']);
    $main_url = $base_url."/".$vars[1]."/";    
    // End Global Variable
    
    
    $request = $_SERVER['REQUEST_URI'];
    $me = $project_location;

    try{
        switch ($request) {
            case $me.'/' : require "view/beranda.php"; break;
            case $me.'/beranda' : require "view/beranda.php"; break;
            case $me.'/login_admin' : require "view/admin/login.php"; break;
            case $me.'/login_user' : require "view/users/login.php"; break;
            case $me.'/functionLogin' : require "controller/LoginController.php"; break;
            case $me.'/logout' : require "controller/LogoutController.php"; break;

            // Rizkan
            case $me.'/pendaftaran' : require "view/pendaftaran.php"; break;
            case $me.'/obat' : require "view/obat.php"; break;
            case $me.'/history' : require "view/history.php"; break;
            case $me.'/poli/poli-gigi' : require "view/viewsUsers/poli/poliGigi.php"; break;
            case $me.'/poli/poli-umum' : require "view/viewsUsers/poli/poliUmum.php"; break;
            case $me.'/poli/poli-paruparu' : require "view/viewsUsers/poli/poliParuParu.php"; break;
            case $me.'/poli/poli-kulit' : require "view/viewsUsers/poli/poliKulit.php"; break;
            case $me.'/poli/poli-tht' : require "view/viewsUsers/poli/poliTht.php"; break;
            case $me.'/poli/poli-mata' : require "view/viewsUsers/poli/poliMata.php"; break;
            
            default: http_response_code(404); require "view/404.php" ; break;
        }
    }catch(\err){
        http_response_code(419);
    }
   