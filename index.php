<?php error_reporting(1);
    
    include "config/database.php";
    include "config/session.php";
    
    // BASE URL SESUAIKAN DENGAN LINK / HOST MASING - MASING, TERMASUK PROJECT LOCATION NYA JUGA
    $base_url = "http://localhost"; // Sesuaikan dengan Host Masing - Masing
    $project_location = "/puskesmas"; // Sesuaikan dengan nama project yg digunakan

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
            case $me.'/logout' : require "controller/LogoutController.php"; break;

            // Rizkan
            case $me.'/pendaftaran' : require "view/pendaftaran.php"; break;
            case $me.'/obat' : require "view/obat.php"; break;
            case $me.'/history' : require "view/history.php"; break;
            case $me.'/poli/poli-gigi' : require "view/viewsUsers/poli/poliGigi.php"; break;
            case $me.'/poli/BPUmum' : require "view/viewsUsers/poli/BPUmum.php"; break;
            case $me.'/poli/BPUsialanjut' : require "view/viewsUsers/poli/BPUsialanjut.php"; break;
            case $me.'/poli/pelayananKB' : require "view/viewsUsers/poli/pelayananKB.php"; break;
            case $me.'/poli/mtbs' : require "view/viewsUsers/poli/mtbs.php"; break;
            case $me.'/poli/igd' : require "view/viewsUsers/poli/igd.php"; break;
            
            // Admin
            case $me.'/admin/dashboard' : require "view/viewAdmin/dashboard.php"; break;
            case $me.'/admin/dataPasien' : require "view/viewAdmin/dataPasien.php"; break;
            case $me.'/admin/dataDokter' : require "view/viewAdmin/dataDokter.php"; break;
            case $me.'/admin/dataObat' : require "view/viewAdmin/dataObat.php"; break; 
            case $me.'/admin/dataPemesanan' : require "view/viewAdmin/dataPemesanan.php"; break;
            case $me.'/admin/dataUser' : require "view/viewAdmin/dataUser.php"; break;
            case $me.'/admin/logout' : require "controller/LogoutController.php"; break;
            case $me.'/admin/login_user' : header("Location: ".$base_url.$project_location."/login_user"); break;
            
            default: http_response_code(404); require "view/404.php" ; break;
        }
    }catch(Exception $e){
        http_response_code(419);
    }
   