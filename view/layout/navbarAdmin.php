<?php
    include_once('functions.php');

    $email = $_SESSION["email"];
    $dataAkun = query("SELECT * FROM tbl_user WHERE email = '$email'")[0];
?>

<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand align-center">
            <?php if($dataAkun["src_gambar"] && file_exists("assets/img/upload_images/".$dataAkun['src_gambar'])) { ?>
                <img src="<?= $main_url?>assets/img/upload_images/<?= $dataAkun["src_gambar"]?>" alt="" width="40"> <?= $dataAkun["nama_lengkap"]?>
            <?php } else { ?>
                <img src="<?= $main_url?>assets/img/login/icon/profile.png" alt="" width="40"> <?= $dataAkun["nama_lengkap"]?>
            <?php } ?>
        </a>
        <div class="w-75">
            <div id="navMenu" class="d-flex justify-content-center border ps-2 pe-2">
                <div class="itemMenu m-2 ps-1 pe-1">
                    <a href="<?= $main_url?>">Home</a>
                </div>
                <div class="itemMenu m-2 ps-1 pe-1">
                    <a href="<?= $main_url?>dataPasien">Data Pasien</a>
                </div>
                <div class="itemMenu m-2 ps-1 pe-1 ">
                    <a href="<?= $main_url?>dataObat">Data Obat</a>
                </div>
                <div class="itemMenu m-2 ps-1 pe-1 ">
                    <a href="<?= $main_url?>dataDokter">Data Dokter</a>
                </div>
                    <div class="itemMenu m-2 ps-1 pe-1 ">
                        <a href="<?= $main_url?>dataPemesanan">Data Pemesanan</a>
                </div>
            </div>
        </div>
        <a href="<?php $main_url?>logout" class="">
            <img src="<?= $main_url?>assets/img/login/icon/logout.png" width="40" alt="">
        </a>
  </div>
</nav>