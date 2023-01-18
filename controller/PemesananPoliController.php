<?php
    include('functions.php');

    $idUser = $_SESSION["idUser"];
    $dataPemesanan = query("SELECT * FROM tbl_pemesanan_poli WHERE id_user ='$idUser'");

    // Simpan pemesanan poli ke database
    if( isset($_POST["submitPoli"]) ) {
        $tglPemesanan = date("Y-m-d");
        $typePoli = $_POST["typePoli"];
        $namaPasien = $_SESSION["namaLengkap"];
        $status = "Diajukan";

        $query = "INSERT INTO tbl_pemesanan_poli VALUES ('', '$tglPemesanan', '$typePoli', '$namaPasien', '$status', '$idUser')";
        mysqli_query($conn, $query);

        if (mysqli_affected_rows($conn) > 0) {
            echo "
            <script>
                alert('Pemesanan berhasil!');
                window.location.href='".$main_url."pendaftaran';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Pemesanan gagal!');
                window.location.href='".$main_url."pendaftaran';
            </script>
            ";
        }
    }

    
?>