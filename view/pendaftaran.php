<?php include('controller/BerandaController.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran | Puskesmas</title>

    <?php include('view/layout/head.php'); ?>

    <link rel="stylesheet" href="<?= $main_url?>assets/style/styleIndex.css">

</head> 
<body style="background-image: url('../assets/img/login/bg_pendaftaran.jpeg') !important;">
 
    <?php include('view/layout/navbar.php'); ?>
    
    <div id="container" class="container-fluid text-center">
        <div class="w-75 mx-auto card m-3 pb-2">
            <div class="d-flex flex-row">
                <div class="fs-2 ms-3">
                    <i class="fa-solid fa-arrow-rotate-left" style=""></i>
                </div>
                <h1 class="w-100 mx-auto pt-2 pb-1">Pilih Poli Yang Tersedia</h1>
            </div>
            <div class="mainContentPendf w-100">
                <div class="row justify-content-around w-75 mx-auto">
                    <a href="<?= $main_url?>poli/poli-gigi" class="text-decoration-none text-dark card m-2 p-2 col-3 ps-4 pe-4 shadow">
                        <h5>Poli Gigi</h5>
                        <img src="<?= $main_url?>assets/img/login/icon/tooth.png" width="130" alt="">
                    </a> 
                    <a href="<?= $main_url?>poli/poli-umum" class="text-decoration-none text-dark card m-2 p-2 col-3 ps-4 pe-4 shadow">
                        <h5>Poli Umum</h5>
                        <img src="<?= $main_url?>assets/img/login/icon/poli_umum.png" width="130" alt="">
                    </a>
                    <a href="<?= $main_url?>poli/poli-paruparu" class="text-decoration-none text-dark card m-2 p-2 col-3 ps-4 pe-4 shadow">
                        <h5>Poli Paru-Paru</h5>
                        <img src="<?= $main_url?>assets/img/login/icon/poli_paruparu.png" width="130" alt="">
                    </a>
                    <a href="<?= $main_url?>poli/pelayananKB" class="text-decoration-none text-dark card m-2 p-2 col-3 ps-4 pe-4 shadow">
                        <h5>Pelayanan KB</h5>
                        <img src="<?= $main_url?>assets/img/login/icon/kb.png" width="130" alt="">
                    </a>
                    <a href="<?= $main_url?>poli/imunisasi" class="text-decoration-none text-dark card m-2 p-2 col-3 ps-4 pe-4 shadow">
                        <h5>Imunisasi</h5>
                        <img src="<?= $main_url?>assets/img/login/icon/imunisasi.png" width="130" alt="">
                    </a>
                    <a href="<?= $main_url?>poli/laboratorium" class="text-decoration-none text-dark card m-2 p-2 col-3 ps-4 pe-4 shadow">
                        <h5>Laboratorium</h5>
                        <img src="<?= $main_url?>assets/img/login/icon/lab.png" width="130" alt="">
                    </a>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <?php include('view/layout/footer.php'); ?>

</body>
</html>