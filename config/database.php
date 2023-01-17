<?php
    $host = "localhost:3307";
    $user = "root";
    $pass = "";
    $dbas = "db_puskesmas";
    $conn = mysqli_connect($host, $user, $pass, $dbas);

    if (!$conn) {
        die("<script>alert('Gagal tersambung dengan database.')</script>");
    }

?>