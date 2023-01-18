<?php
    include('functions.php');

    $dataObat = query("SELECT * FROM tbl_obat");
    $namaLengkap = $_SESSION["namaLengkap"];
    $dataPemesanan = query("SELECT * FROM tbl_pemesanan_obat WHERE namaPasien ='$namaLengkap'");

    // Simpan pemesanan obat ke database
    if( isset($_POST["btnPesanObat"]) ) {
        
        $tglPemesanan = date("Y-m-d");
        $typeObat = json_decode($_POST["obat"],true)["typeObat"];
        $namaPasien = $_SESSION["namaLengkap"];
        $namaObat = $php_array=  json_decode($_POST["obat"],true)["nama"];
        $hargaObat = $php_array=  json_decode($_POST["obat"],true)["harga"];
        $keluhan = $_POST["keluhan"];
        $status = "Diajukan";
        $idUser = $_SESSION["idUser"];

        $query = "INSERT INTO tbl_pemesanan_obat VALUES ('', '$tglPemesanan', '$typeObat', '$namaPasien', '$namaObat', '$hargaObat', '$keluhan', '$status', '$idUser')";
        mysqli_query($conn, $query);

        if (mysqli_affected_rows($conn) > 0) {
            echo "
            <script>
                alert('Pemesanan berhasil!');
                window.location.href='obat';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Pemesanan gagal!');
                window.location.href='obat';
            </script>
            ";
        }
    }

    
?>