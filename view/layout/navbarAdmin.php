<?php
    include_once('functions.php');

    $email = $_SESSION["email"];
    $dataAkun = query("SELECT * FROM tbl_user WHERE email = '$email'")[0];
?>
 
<nav class="navbar bg-body-tertiary position-fixed w-100" style="top: 0 !important; z-index: 10 !important;">
    <div class="container-fluid me-5 text-center">
        <a class="navbar-brand align-center">
            <?php if($dataAkun["src_gambar"] && file_exists("assets/img/upload_images/".$dataAkun['src_gambar'])) { ?>
                <img src="<?= $main_url?>assets/img/upload_images/<?= $dataAkun["src_gambar"]?>" alt="" width="40"> <?= $dataAkun["nama_lengkap"]?>
            <?php } else { ?>
                <img src="<?= $main_url?>assets/img/login/icon/profile.png" alt="" width="40"> <?= $dataAkun["nama_lengkap"]?>
            <?php } ?> 
        </a>
        <div class=" border pe-5" style="width: 80% !important;">
            <div id="navMenu" class="d-flex justify-content-center border ps-2 w-75">
                <div class="itemMenu m-2 ps-1 pe-1">
                    <a href="<?= $main_url?>admin/dashboard">Home</a>
                </div>
                <div class="itemMenu m-2 ps-1 pe-1">
                    <a href="<?= $main_url?>admin/dataPasien">Data Pasien</a>
                </div>
                <div class="itemMenu m-2 ps-1 pe-1 ">
                    <a href="<?= $main_url?>admin/dataObat">Data Obat</a>
                </div>
                <div class="itemMenu m-2 ps-1 pe-1 ">
                    <a href="<?= $main_url?>admin/dataDokter">Data Dokter</a>
                </div>
                <div class="itemMenu m-2 ps-1 pe-1 ">
                    <a href="<?= $main_url?>admin/dataUser">Data User</a>
                </div>
                    <div class="itemMenu m-2 ps-1 pe-1 ">
                        <a href="<?= $main_url?>admin/dataPemesanan">Data Pemesanan</a>
                </div>
            </div>
        </div>
        <a href="<?php $main_url?>logout" class="">
            <img src="<?= $main_url?>assets/img/login/icon/logout.png" width="40" alt="">
        </a>
     </div>
</nav>