<?php
    // Proses paginate table
    $jumlahDataPerHalaman = 5;
    $jumlahData = count(query("SELECT * FROM tbl_dokter"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
    $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

    $tbl_dokter = query("SELECT * FROM tbl_dokter LIMIT $awalData, $jumlahDataPerHalaman");

    if (isset($_POST["halaman"])) {
        $jumlahDataPerHalaman = 5;
        $jumlahData = count(query("SELECT * FROM tbl_dokter"));
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
        $x = 1;

        if (isset($_POST["next"])) {
            $x = $_POST["next"];
        }else if (isset($_POST["prev"])) {
            $x = $_POST["prev"];
        }

        $halamanAktif = ( isset($x) ) ? $x : 1;
        $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

        $tbl_dokter = query("SELECT * FROM tbl_dokter LIMIT $awalData, $jumlahDataPerHalaman");
    }

    // Proses tambah data dokter ke database
    if( isset($_POST["tambahDataDokter"]) ) {
        $namaPoli = $_POST["namaPoli"];
        $namaDokter = $_POST["namaDokter"];
        $spesialis = $_POST["spesialis"];
        $tglMasuk = $_POST["tglMasuk"];
        // $gambar =$_POST["gambar"];

        $query = "INSERT INTO tbl_dokter VALUES ('', '$namaPoli', '$namaDokter', '$spesialis', '$tglMasuk', 'null')";
        mysqli_query($conn, $query);

        if (mysqli_affected_rows($conn) > 0) {
            echo "
            <script>
                alert('Berhasil ditambahkan!');
                window.location.href='dataDokter';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Gagal ditambahkan!');
                window.location.href='dataDokter';
            </script>
            ";
        }
    }

    // Proses hapus data dokter di database
    if( isset($_POST["hapusDataDokter"]) ) {
        $id = $_POST["id_dokter"];
        mysqli_query($conn, "DELETE FROM tbl_dokter WHERE id_dokter = '$id'");

        if (mysqli_affected_rows($conn) > 0) {
            echo "
                <script>
                    alert('Data berhasil dihapus!');
                    window.location.href='dataDokter';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal dihapus!');
                    window.location.href='dataDokter';
                </script>
            ";
        }
    }

    // Proses edit data obat
    if( isset($_POST["editDataDokter"]) ) {
        $id_dokter = $_POST["id_dokter"];
        $namaDokter = $_POST["namaDokter"];
        $spesialis = $_POST["spesialis"];
        $tglMasuk = $_POST["tglMasuk"];
        $namaPoli = $_POST["namaPoli"];

        mysqli_query($conn, "UPDATE tbl_dokter SET namaPoli = '$namaPoli', namaDokter = '$namaDokter', spesialis ='$spesialis', tglMasuk ='$tglMasuk' WHERE id_dokter = '$id_dokter'");

        if (mysqli_affected_rows($conn) > 0) {
            echo "
                <script>
                    alert('Data berhasil diedit!');
                    window.location.href='dataDokter';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal diedit!');
                    window.location.href='dataDokter';
                </script>
            ";
        }
    }

?>