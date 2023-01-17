<?php 
    if(!isset($_SESSION["loginAdmin"]) && $_SESSION["email"] != "admin@gmail.com") {
        echo "
                <script>
                    // alert('Anda bukan Admin!');
                    document.location.href = 'login_user';
                </script>
            ";
    } else {
        $id = $_GET["id"];
        mysqli_query($conn, "DELETE FROM tbl_obat WHERE id = $id");
        
        if( mysqli_affected_rows($conn) > 0 ) {
            echo "
                <script>
                    // alert('Data berhasil dihapus!');
                    document.location.href = '/';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal dihapus!');
                    document.location.href = '/';
                </script>
            ";
        }
    }
?>