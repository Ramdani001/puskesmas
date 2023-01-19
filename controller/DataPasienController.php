<?php
    $idUser = $_SESSION["idUser"];
    $dataPemesanan = query("SELECT * FROM tbl_checkup_pasien");

    // Simpan pemesanan poli ke database
    if( isset($_POST["checkupPasien"]) ) {
        $tglPemesanan = date("Y-m-d");
        $typePoli = $_POST["typePoli"];
        $namaPasien = $_POST["namePasien"];
        $status = "Diajukan";

        $query = "INSERT INTO tbl_checkup_pasien VALUES ('', '$tglPemesanan', '$typePoli', '$namaPasien', '$status', '$idUser')";
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

    // Proses paginate table
    $checkUp = query("SELECT * FROM tbl_checkup_pasien");

    $jumlahDataPerHalaman = 5;
    $jumlahData = count(query("SELECT * FROM tbl_checkup_pasien"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
    $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

    $dataPasien = query("SELECT * FROM tbl_checkup_pasien LIMIT $awalData, $jumlahDataPerHalaman");

    if (isset($_POST["halaman"])) {
        $jumlahDataPerHalaman = 5;
        $jumlahData = count(query("SELECT * FROM tbl_checkup_pasien"));
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
        $x = 1;

        if (isset($_POST["next"])) {
            $x = $_POST["next"];
        }else if (isset($_POST["prev"])) {
            $x = $_POST["prev"];
        }

        $halamanAktif = ( isset($x) ) ? $x : 1;
        $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

        $dataPasien = query("SELECT * FROM tbl_checkup_pasien LIMIT $awalData, $jumlahDataPerHalaman");
    }

    // Proses hapus data checkup pasien
    if( isset($_POST["hapusPemesananCheckup"]) ) {
        $id = $_POST["id_checkup"];
        mysqli_query($conn, "DELETE FROM tbl_checkup_pasien WHERE id_checkup = '$id'");

        if (mysqli_affected_rows($conn) > 0) {
            echo "
                <script>
                    alert('Data berhasil dihapus!');
                    window.location.href='dataPasien';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal dihapus!');
                    window.location.href='dataPasien';
                </script>
            ";
        }
    }

    // Proses edit status checkup pasien
    if( isset($_POST["editStatusPemesanan"]) ) {
        $idCheckup = $_POST["id_checkup"];
        $typePoli = $_POST["typePoli"];
        $namaPasien = $_POST["namaPasien"];

        if(isset($_POST["status_pasienEX"]) && $_POST["status_pasienEX"] != "") {
            $statusPasien = $_POST["status_pasienEX"];
        } else {
            $statusPasien = $_POST["statusPasien"];
        }

        mysqli_query($conn, "UPDATE tbl_checkup_pasien SET namaPasien = '$namaPasien', typePoli = '$typePoli', status = '$statusPasien' WHERE id_checkup = '$idCheckup'");

        if (mysqli_affected_rows($conn) > 0) {
            echo "
                <script>
                    alert('Data berhasil diedit!');
                    window.location.href='dataPasien';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal diedit!');
                    window.location.href='dataPasien';
                </script>
            ";
        }
    }
?>