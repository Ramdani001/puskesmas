<?php
    
    // Validasi login
    if( isset($_POST["loginUser"]) ) {

        $email = $_POST["email"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE email = '$email'");

        if( mysqli_num_rows($result) === 1 ) {
            $row = mysqli_fetch_assoc($result);
            if( password_verify($password, $row["password"]) ) {
                $_SESSION["loginUser"] = true;
                $_SESSION["namaLengkap"] = $row["nama_lengkap"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["idUser"] = $row["id_user"];

                if ( $_POST["email"] == "admin@gmail.com") {
                    $_SESSION["loginAdmin"] = true;
                    header("Location: admin/dashboard"); 
                    exit;
                } else {
                    header("Location: beranda"); 
                    exit;
                }
            } else {
                echo "
                <script>
                    alert('Password salah!');
                </script>"
                ;
            }
        } else {
            echo "
            <script>
                alert('Email tidak terdaftar!');
            </script>"
            ;
        }

        $error = true;
    }

    // Validasi register untuk user
    if( isset($_POST["registerUser"]) ) {
        if(register($_POST) > 0) {
            echo "
            <script>
                alert('Registrasi Sukses!');
                window.location.href='login_user';
            </script>"
            ;
            exit();
        }
    }
?>