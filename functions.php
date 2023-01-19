<?php
	function query($query) {
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while( $row = mysqli_fetch_assoc($result) ) {
			$rows[] = $row;
		}
		return $rows;
	}

	// Function register data user ke databse
	function register($data){
		global $conn;
		$namaLengkap = $data["nama"];
		$email = $data["email"];
		$noTelp = $data["telp"];
		$password = mysqli_real_escape_string($conn, $data["password"]);
		$password2 = mysqli_real_escape_string($conn, $data["passwordConf"]);

		$ekstensiTrue	= array('png','jpg', 'jpeg', 'gif');
		$namaGambar = $_FILES['gambar']['name'];
		$x = explode('.', $namaGambar);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['gambar']['size'];
		$file_tmp = $_FILES['gambar']['tmp_name'];

		if(in_array($ekstensi, $ekstensiTrue) === true){
			if($ukuran < 1044070){			
				move_uploaded_file($file_tmp, 'assets/img/upload_images/'.$namaGambar);
			}else{
				echo 'UKURAN FILE TERLALU BESAR';
			}
		}else{
			echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
		}
		
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
		
		
		mysqli_query ($conn, "INSERT INTO tbl_user VALUES ('', '$namaLengkap', '$email', '$password', '$noTelp', '$namaGambar')");
		return mysqli_affected_rows($conn);
	}

	// Function edit data user ke databse
	function edit($data){
		global $conn;
		$id_user = $data["id_user"];
		$namaLengkap = $data["namaLengkap"];
		// $email = $data["email"];
		$noTelp = $data["telp"];
		$password = $data["password"];

		$result = mysqli_query($conn, "SELECT password FROM tbl_user WHERE password='$password'");
		if (!mysqli_fetch_assoc($result)){
			$password = mysqli_real_escape_string($conn, $data["password"]);
			$password = password_hash($password, PASSWORD_DEFAULT);
		}

		if($_FILES["gambar"]["name"] != "") {
			$ekstensiTrue	= array('png','jpg', 'jpeg', 'gif');
			$namaGambar = $_FILES['gambar']['name'];
			$x = explode('.', $namaGambar);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['gambar']['size'];
			$file_tmp = $_FILES['gambar']['tmp_name'];

			if(in_array($ekstensi, $ekstensiTrue) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'assets/img/upload_images/'.$namaGambar);
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}

			mysqli_query ($conn, "UPDATE tbl_user SET nama_lengkap = '$namaLengkap', no_telepon ='$noTelp', password ='$password', src_gambar ='$namaGambar' WHERE id_user = '$id_user'");
		} else {
			mysqli_query ($conn, "UPDATE tbl_user SET nama_lengkap = '$namaLengkap', no_telepon ='$noTelp', password ='$password' WHERE id_user = '$id_user'");
		}

		
		
		
		return mysqli_affected_rows($conn);
	}
?>