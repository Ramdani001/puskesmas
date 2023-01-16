<?php include('controller/BerandaController.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda | Puskesmas</title>

    <?php include('view/layout/head.php'); ?>

    <link rel="stylesheet" href="<?= $main_url?>assets/style/styleIndex.css">

</head> 
<body>

    <?php include('view/layout/navbar.php'); ?>

    <div class="btnAction w-100" style="margin-top: 10%;">
        <div id="box" class="w-100 text-center d-flex justify-content-center">
            <a href="<?= $main_url?>index.php/admin/dataPasien" class="itemAction p-3 mx-5 m-2 text-decoration-none">
                <h4>Kelola Data Pasien</h4>
                <img src="<?= $main_url?>assets/img/admin/icon/dataPasien.png" alt="" width="150">
            </a>
            <a href="<?= $main_url?>index.php/admin/dataObat" class="itemAction p-3 mx-5 m-2 text-decoration-none">
                <h4>Kelola Data Obat</h4>
                <img src="<?= $main_url?>assets/img/admin/icon/dataObat.png" alt="" width="150">
            </a>
            <a href="<?= $main_url?>index.php/admin/dataDokter" class="itemAction p-3 mx-5 m-2 text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalHistory">
                <h4>Kelola Data Poli & Dokter</h4>
                <img src="<?= $main_url?>assets/img/admin/icon/dataDoktor.png" alt="" width="150">
            </a>
            <a href="<?= $main_url?>index.php/admin/dataPemesanan" class="itemAction p-3 mx-5 m-2 text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalHistory">
                <h4>Kelola Data Pemesanan</h4>
                <img src="<?= $main_url?>assets/img/admin/icon/dataPemesanan.png" alt="" width="150">
            </a>
        </div>
    </div>

    <!-- Script -->
    <?php include('view/layout/footer.php'); ?>

</body>
</html>