<?php
    $email = $_SESSION["email"];
    $dataAkun = query("SELECT * FROM tbl_user WHERE email = '$email'")[0];
?>

<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand align-center">
            <?php if($dataAkun["src_gambar"] && file_exists("assets/img/upload_images/".$dataAkun['src_gambar'])) { ?>
                <img src="<?= $main_url?>assets/img/upload_images/<?= $dataAkun["src_gambar"]?>" alt="" width="40" style="border-radius: 15px!important;"> <span class="text-dark"><?= $dataAkun["nama_lengkap"]?></span>
            <?php } else { ?>
                <img src="<?= $main_url?>assets/img/login/icon/profile.png" alt="" width="40"> <span class="text-dark"><?= $dataAkun["nama_lengkap"]?></span>
            <?php } ?>
        </a>
        <div id="navMenu" class="d-flex ps-2 pe-2">
            <div class="itemMenu m-2 me-2 ps-3 pe-3">
                <a href="<?= $main_url?>">Home</a>
            </div>
            <div class="itemMenu m-2 me-2 ps-3 pe-3">
                <a href="<?= $main_url?>pendaftaran">Daftar</a>
            </div>
            <div class="itemMenu m-2 me-2 ps-3 pe-3">
                <a href="<?= $main_url?>obat">Pesan Obat</a>
            </div>
            <div class="itemMenu m-2 me-2 ps-3 pe-3">
                <a href="<?= $main_url?>history">History</a>
            </div>
        </div>
        <a href="<?php $main_url?>logout" class="">
            <img src="<?= $main_url?>assets/img/login/icon/logout.png" width="40" alt="">
        </a>
  </div>
</nav>