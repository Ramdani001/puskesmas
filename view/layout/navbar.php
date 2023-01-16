<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand align-center">
            <img src="<?= $main_url?>assets/img/login/icon/profile.png" alt="" width="40"> Rizkan Ramdani
        </a>
        <div id="navMenu" class="d-flex ps-2 pe-2">
            <div class="itemMenu m-2 me-2 ps-3 pe-3">
                <a href="<?= $main_url?>index.php/">Home</a>
            </div>
            <div class="itemMenu m-2 me-2 ps-3 pe-3">
                <a href="<?= $main_url?>index.php/pendaftaran">Daftar</a>
            </div>
            <div class="itemMenu m-2 me-2 ps-3 pe-3">
                <a href="<?= $main_url?>index.php/obat">Pesan Obat</a>
            </div>
            <div class="itemMenu m-2 me-2 ps-3 pe-3">
                <a href="<?= $main_url?>index.php/history">History</a>
        </div>
    </div>
    <a href="<?php $main_url?>login_user" class="">
        <img src="<?= $main_url?>assets/img/login/icon/logout.png" width="40" alt="">
    </a>
  </div>
</nav>