<?php
    include('functions.php');

    $dataObat = query("SELECT * FROM tbl_obat");

    // Validasi Register untuk User
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

    
?>