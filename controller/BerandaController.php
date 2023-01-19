<?php 
    include("functions.php");

    // Cek untuk Login user
    if( !isset($_SESSION["loginUser"]) ) {
        header("Location: login_user");
        exit;
    }

    // Cek apabila admin login, maka redirect ke dashboard
    if(isset($_SESSION["loginAdmin"]) && $_SESSION["email"] == "admin@gmail.com") {
        header("Location: admin/dashboard");
        exit;
    }

    // Untuk mengambil data riwayat    
    $idUser = $_SESSION["idUser"];
    global $conn;
    $dataPemesanan = [];
    $result = mysqli_query($conn, "SELECT * FROM tbl_pemesanan_obat WHERE tbl_pemesanan_obat.id_user = '$idUser'");
	while( $row = mysqli_fetch_assoc($result) ) {
		$dataPemesanan[] = $row;
	}
	$result = mysqli_query($conn, "SELECT * FROM tbl_checkup_pasien WHERE tbl_checkup_pasien.id_user = '$idUser'");
	while( $row = mysqli_fetch_assoc($result) ) {
		$dataPemesanan[] = $row;
	}
    uasort($dataPemesanan, function($a,$b){
        return strcmp(strtotime($a['tglPemesanan']), strtotime($b['tglPemesanan']));
    });
?>  
