<?php
    include('functions.php');

    // Validasi register untuk user
    if( isset($_POST["tambahUser"]) ) {
        if(register($_POST) > 0) {
            echo "
            <script>
                alert('Registrasi Sukses!');
                window.location.href='dataUser';
            </script>"
            ;
            exit();
        }
    }

    // Proses hapus obat di database
    if( isset($_POST["hapusDataUser"]) ) {
        $id = $_POST["id_user"];
        $namaGambar = $_POST["namaGambar"];
        mysqli_query($conn, "DELETE FROM tbl_user WHERE id_user = '$id'");

        if (mysqli_affected_rows($conn) > 0) {
            echo "
                <script>
                    alert('Data berhasil dihapus!');
                    // window.location.href='dataUser';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal dihapus!');
                    window.location.href='dataUser';
                </script>
            ";
        }
    }

    // Validasi edit data untuk user
    if( isset($_POST["editDataUser"]) ) {
        if(edit($_POST) > 0) {
            echo "
            <script>
                alert('Edit data Sukses!');
                window.location.href='dataUser';
            </script>"
            ;
            exit();
        } else {
            echo "
            <script>
                alert('Gagal!');
                window.location.href='dataUser';
            </script>"
            ;
            exit();
        }
    }
?>