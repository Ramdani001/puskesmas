<?php include('controller/BerandaController.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda | Kelurahan</title>

    <?php include('view/layout/head.php'); ?>

    <link rel="stylesheet" href="<?= $main_url?>assets/style/styleIndex.css">

</head>
<body>

    <?php include('view/layout/navbar.php'); ?>

    <div id="mainContent" class="w-100 text-center mt-3">
        <img src="<?= $main_url?>assets/img/login/puskesmas.png" width="120" alt="">
        <div id="contentText" class="w-50 mx-auto p-3 mt-3">
            <h1>Selamat Datang di</h1>
            <h1>Puskesmas Sidamulya</h1>
        </div>
    </div>

    <div class="btnAction w-100 mt-3">
        <div id="box" class="w-50 text-center d-flex mx-auto">
            <a href="#" class="itemAction p-2 m-2 text-decoration-none">
                <h4>Pendaftaran Checkup</h4>
                <img src="<?= $main_url?>assets/img/login/icon/home-pendaftaran.png" alt="" width="150">
            </a>
            <a href="#" class="itemAction p-2 m-2 text-decoration-none">
                <h4>Pendaftaran Checkup</h4>
                <img src="<?= $main_url?>assets/img/login/icon/obat.png" alt="" width="150">
            </a>
            <a href="#" class="itemAction p-2 m-2 text-decoration-none">
                <h4>Pendaftaran Checkup</h4>
                <img src="<?= $main_url?>assets/img/login/icon/history.png" alt="" width="150">
            </a>
        </div>
    </div>
    
    <!-- Script -->
    <?php include('view/layout/footer.php'); ?>

</body>
</html>