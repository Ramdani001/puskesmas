<?php

// Login untuk User
if( isset($_POST["loginUser"]) ) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE email = '$email'");

    if( mysqli_num_rows($result) === 1 ) {
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ) {
            $_SESSION["loginUser"] = true;

            if ( $_POST["email"] == "admin@gmail.com") {
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

// Validasi Register untuk User
if( isset($_POST["registerUser"]) ) {
	if(register($_POST) > 0) {
		echo "
		<script>
			alert('Registrasi Sukses!');
		</script>"
		;
        header( 'Location: login_user');
        exit();
	}
}

// // Function register data ke databse
function register($data){
	global $conn;
	$namaLengkap = $data["nama"];
    $email = $data["email"];
    $noTelp = $data["telp"];
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["passwordConf"]);
	
	$result = mysqli_query($conn, "SELECT email FROM tbl_user WHERE email='$email'");
	if (mysqli_fetch_assoc($result)){
		echo "
            <script>
                alert ('Email telah dipakai!');
		   </script>";
		return false;
	}

    $result = mysqli_query($conn, "SELECT no_telepon FROM tbl_user WHERE no_telepon='$noTelp'");
	if (mysqli_fetch_assoc($result)){
		echo "
            <script> 
                alert ('No Telepon telah dipakai!');
		   </script>";
		return false;
	}
	
	if ($password !== $password2){
	  echo "<script>
			  alert ('Password tidak sesuai');
		   </script>";
	  return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);
	
	mysqli_query ($conn, "INSERT INTO tbl_user VALUES ('', '$namaLengkap', '$email', '$password', '$noTelp')");
	return mysqli_affected_rows($conn);
}

?>