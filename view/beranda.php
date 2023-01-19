<?php 
    include('controller/BerandaController.php'); 
?>

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

    <div id="mainContent" class="w-100 text-center mt-3">
        <img src="<?= $main_url?>assets/img/login/puskesmas.png" width="120" alt="">
        <div id="contentText" class="w-50 mx-auto p-3 mt-3">
            <h1>Selamat Datang di</h1>
            <h1>Puskesmas Sidamulya</h1>
        </div>
    </div>

    <div class="btnAction w-100 mt-3">
        <div id="box" class="w-50 text-center d-flex mx-auto">
            <a href="<?= $main_url?>pendaftaran" class="itemAction p-2 m-2 text-decoration-none">
                <h4>Pendaftaran Checkup</h4>
                <img src="<?= $main_url?>assets/img/login/icon/home-pendaftaran.png" alt="" width="150">
            </a>
            <a href="<?= $main_url?>obat" class="itemAction p-2 m-2 text-decoration-none">
                <h4>Pesan Obat-Obatan</h4>
                <img src="<?= $main_url?>assets/img/login/icon/obat.png" alt="" width="150">
            </a>
            <a href="<?= $main_url?>history" class="itemAction p-2 m-2 text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalHistory">
                <h4>History</h4>
                <img src="<?= $main_url?>assets/img/login/icon/history.png" alt="" width="150">
            </a>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="modalHistory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalHistoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalHistoryLabel">History Pasien</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body w-100">
            <h1>History Pendaftaran & Pemesanan</h1>
                <div class="d-flex w-100 mx-auto text-justify">
                    
                <?php foreach($dataPemesanan as $pesanan): ?>
                    <?php if ($pesanan["typePoli"]) { ?>
                        <div class="card me-3 w-75 mx-auto">
                            <div class="card-body m-3">
                                <table cellspacing="2">
                                    <tr class="mb-3">
                                        <td class="pe-5">Tanggal Pendaftaran</td>
                                        <td class="ps-5">: <?= $pesanan["tglPemesanan"]; ?></td>
                                    </tr>
                                    <tr class="pb-3">
                                        <td class="pe-5">Type Pendaftaran</td>
                                        <td class="ps-5">: <?= $pesanan["typePendaftaran"]; ?></td>
                                    </tr>
                                    <tr class="pb-3">
                                        <td class="pe-5">Nama Pasien</td>
                                        <td class="ps-5">: <?= $pesanan["namaPasien"]; ?></td>
                                    </tr>
                                    <tr class="pb-3">
                                        <td class="pe-5">Keluhan</td>
                                        <td class="ps-5">: <?= $pesanan["keluhan"]; ?></td>
                                    </tr>
                                    <tr class="pb-3">
                                        <td class="pe-5">Tanggal Checkup</td>
                                        <td class="ps-5">: <?= $pesanan["tglCheckUp"]; ?></td>
                                    </tr>
                                    <tr class="pb-3">
                                        <td class="pe-5">Status Pendaftaran</td>
                                        <td class="ps-5">: 
                                            <button class="btn btn-danger"><?= $pesanan["status"]; ?></button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="card me-3 w-75 mx-auto">
                        <div class="card-body m-3">
                            <table cellspacing="2">
                                <tr class="mb-3">
                                    <td class="pe-5">Tanggal Pemesanan</td>
                                    <td class="ps-5">: <?= $pesanan["tglPemesanan"]; ?></td>
                                </tr>
                                <tr class="pb-3">
                                    <td class="pe-5">Type Obat</td>
                                    <td class="ps-5">: <?= $pesanan["typeObat"]; ?></td>
                                </tr>
                                <tr class="pb-3">
                                    <td class="pe-5">Nama Pasien</td>
                                    <td class="ps-5">: <?= $pesanan["namaPasien"]; ?></td>
                                </tr>
                                <tr class="pb-3">
                                    <td class="pe-5">Nama Obat</td>
                                    <td class="ps-5">: <?= $pesanan["namaObat"]; ?></td>
                                </tr>
                                <tr class="pb-3">
                                    <td class="pe-5">Harga Obat</td>
                                    <td class="ps-5">: <?= $pesanan["hargaObat"]; ?></td>
                                </tr>
                                <tr class="pb-3">
                                    <td class="pe-5">Keluhan</td>
                                    <td class="ps-5">: <?= $pesanan["keluhan"]; ?></td>
                                </tr>
                                <tr class="pb-3">
                                    <td class="pe-5">Status Pendaftaran</td>
                                    <td class="ps-5">: 
                                        <button class="btn btn-warning"><?= $pesanan["status"]; ?></button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
            <div class="w-75 text-center mx-auto mt-3">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Kembali Ke Menu</button>
            </div>
        </div>
    </div>
    </div>

    <!-- Script -->
    <?php include('view/layout/footer.php'); ?>

</body>
</html>