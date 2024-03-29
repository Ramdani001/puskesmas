<?php
    $dataObat = query("SELECT * FROM tbl_obat");

    // Proses paginate table
    $jumlahDataPerHalaman = 5;
    $jumlahData = count(query("SELECT * FROM tbl_obat"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
    $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

    $tbl_obat = query("SELECT * FROM tbl_obat LIMIT $awalData, $jumlahDataPerHalaman");

    if (isset($_POST["halaman"])) {
        $jumlahDataPerHalaman = 5;
        $jumlahData = count(query("SELECT * FROM tbl_obat"));
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
        $x = 1;

        if (isset($_POST["next"])) {
            $x = $_POST["next"];
        }else if (isset($_POST["prev"])) {
            $x = $_POST["prev"];
        }

        $halamanAktif = ( isset($x) ) ? $x : 1;
        $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

        $tbl_obat = query("SELECT * FROM tbl_obat LIMIT $awalData, $jumlahDataPerHalaman");
    }

    // Proses tambah obat ke database
    if( isset($_POST["tambahObat"]) ) {
        
        $typeObat = $_POST["typeObat"];
        $namaObat = $_POST["namaObat"];
        $hargaObat = $_POST["hargaObat"];
        $expire =$_POST["expire"];

        $query = "INSERT INTO tbl_obat VALUES ('', '$namaObat', '$hargaObat', '$expire', '$typeObat')";
        mysqli_query($conn, $query);

        if (mysqli_affected_rows($conn) > 0) {
            echo "
            <script>
                alert('Berhasil ditambahkan!');
                window.location.href='dataObat';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Gagal ditambahkan!');
                window.location.href='dataObat';
            </script>
            ";
        }
    }

    // Proses hapus obat di database
    if( isset($_POST["hapusObat"]) ) {
        $id = $_POST["id_obat"];
        mysqli_query($conn, "DELETE FROM tbl_obat WHERE id_obat = '$id'");

        if (mysqli_affected_rows($conn) > 0) {
            echo "
                <script>
                    alert('Data berhasil dihapus!');
                    window.location.href='dataObat';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal dihapus!');
                    window.location.href='dataObat';
                </script>
            ";
        }
    }

    // Proses edit data obat
    if( isset($_POST["editDataObat"]) ) {
        $id_obat = $_POST["id_obat"];
        $namaObat = $_POST["namaObat"];
        $hargaObat = $_POST["hargaObat"];
        $expire = $_POST["expire"];

        mysqli_query($conn, "UPDATE tbl_obat SET namaObat = '$namaObat', hargaObat = '$hargaObat', expire ='$expire' WHERE id_obat = '$id_obat'");

        if (mysqli_affected_rows($conn) > 0) {
            echo "
                <script>
                    alert('Data berhasil diedit!');
                    window.location.href='dataObat';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal diedit!');
                    window.location.href='dataObat';
                </script>
            ";
        }
    }
?>