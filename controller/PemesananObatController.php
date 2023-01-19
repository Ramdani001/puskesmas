<?php
    $dataObat = query("SELECT * FROM tbl_obat");
    $tbl_pemesanan_obat = query("SELECT * FROM tbl_pemesanan_obat");

    // Proses simpan pemesanan obat ke database
    if( isset($_POST["pesanObat"]) ) {
        $tglPemesanan = date("Y-m-d");
        $typeObat = json_decode($_POST["obat"],true)["typeObat"];
        $idObat = json_decode($_POST["obat"],true)["id_obat"];
        $namaPasien = $_SESSION["namaLengkap"];
        $namaObat = $php_array = json_decode($_POST["obat"],true)["nama"];
        $hargaObat = $php_array = json_decode($_POST["obat"],true)["harga"];
        $keluhan = $_POST["keluhan"];
        $status = "Diajukan";
        $idUser = $_SESSION["idUser"];

        $query = "INSERT INTO tbl_pemesanan_obat VALUES ('', '$tglPemesanan', '$typeObat', '$namaPasien', '$namaObat', '$hargaObat', '$keluhan', '$status', '$idUser', '$idObat')";
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

    // Proses simpan pemesanan obat dari admin ke database
    if( isset($_POST["tambahPesanObat"]) ) {
        $tglPemesanan = $_POST["tglPemesanan"];
        $typeObat = $_POST["typeObat"];
        $idObat = "00";
        $namaPasien = $_POST["namaPasien"];
        $namaObat = $_POST["namaObat"];
        $hargaObat = $_POST["hargaObat"];
        $keluhan = $_POST["keluhan"];
        $status = "Diajukan";
        $idUser = $_SESSION["id_user"];

        $query = "INSERT INTO tbl_pemesanan_obat VALUES ('', '$tglPemesanan', '$typeObat', '$namaPasien', '$namaObat', '$hargaObat', '$keluhan', '$status', '$idUser', '$idObat')";
        mysqli_query($conn, $query);

        if (mysqli_affected_rows($conn) > 0) {
            echo "
            <script>
                alert('Pemesanan berhasil!');
                window.location.href='dataPemesanan';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Pemesanan gagal!');
                window.location.href='dataPemesanan';
            </script>
            ";
        }
    }

    // Proses edit data pemesanan
    if( isset($_POST["editPemesananObat"]) ) {
        $id_pemesanan = $_POST["id_pemesanan"];
        $tglPemesanan = $_POST["tglPemesanan"];
        $typeObat = $_POST["typeObat"];
        $namaPasien = $_POST["namaPasien"];
        $hargaObat = $_POST["hargaObat"];
        $keluhan = $_POST["keluhan"];

        mysqli_query($conn, "UPDATE tbl_pemesanan_obat SET tglPemesanan = '$tglPemesanan', typeObat = '$typeObat', namaPasien ='$namaPasien', hargaObat ='$hargaObat', keluhan ='$keluhan' WHERE id_pemesanan = '$id_pemesanan'");

        if (mysqli_affected_rows($conn) > 0) {
            echo "
                <script>
                    alert('Data berhasil diedit!');
                    window.location.href='dataPemesanan';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal diedit!');
                    window.location.href='dataPemesanan';
                </script>
            ";
        }
    }

    // Proses edit status data pemesanan
    if( isset($_POST["setStatusPemesanan"]) ) {
        $id_pemesanan = $_POST["id_pemesanan_status"];
        $namaObat = $_POST["namaObat"];
        $namaPasien = $_POST["namaPasien"];
        $status = $_POST["status"];

        mysqli_query($conn, "UPDATE tbl_pemesanan_obat SET namaObat = '$namaObat', namaPasien = '$namaPasien', status ='$status' WHERE id_pemesanan = '$id_pemesanan'");

        if (mysqli_affected_rows($conn) > 0) {
            echo "
                <script>
                    alert('Data berhasil diedit!');
                    window.location.href='dataPemesanan';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal diedit!');
                    window.location.href='dataPemesanan';
                </script>
            ";
        }
    }

    // Proses hapus data pemesanan obat di database
    if( isset($_POST["hapusDataPemesanan"]) ) {
        $id = $_POST["id_pemesanan"];
        mysqli_query($conn, "DELETE FROM tbl_pemesanan_obat WHERE id_pemesanan='$id'");

        if (mysqli_affected_rows($conn) > 0) {
            echo "
                <script>
                    alert('Pemesanan berhasil dihapus!');
                    window.location.href='dataPemesanan';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Pemesanan gagal dihapus!');
                    window.location.href='dataPemesanan';
                </script>
            ";
        }
    }

    // // Proses paginate table
    $jumlahDataPerHalaman = 5;
    $jumlahData = count(query("SELECT * FROM tbl_pemesanan_obat"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
    $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

    $tbl_pemesanan_obat = query("SELECT * FROM tbl_pemesanan_obat LIMIT $awalData, $jumlahDataPerHalaman");

    if (isset($_POST["halaman"])) {
        $jumlahDataPerHalaman = 5;
        $jumlahData = count(query("SELECT * FROM tbl_pemesanan_obat"));
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
        $x = 1;

        if (isset($_POST["next"])) {
            $x = $_POST["next"];
        }else if (isset($_POST["prev"])) {
            $x = $_POST["prev"];
        }

        $halamanAktif = ( isset($x) ) ? $x : 1;
        $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

        $tbl_pemesanan_obat = query("SELECT * FROM tbl_pemesanan_obat LIMIT $awalData, $jumlahDataPerHalaman");
    }
    
?>