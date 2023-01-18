<?php
    include('functions.php');

    $dataObat = query("SELECT * FROM tbl_dokter");

    // Validasi Register untuk User
    if( isset($_POST["tambahDokter"]) ) {
        
        $namaPoli = $_POST["namaPl$namaPoli"];
        $namaDokter = $_POST["namaDokter"];
        $spesialis = $_POST["spesialis"];
        // $gambar =$_POST["gambar"];

        $query = "INSERT INTO tbl_dokter VALUES ('', '$namaPoli', '$namaDokter', '$spesialis', '$gambar')";
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