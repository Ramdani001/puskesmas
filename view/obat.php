<?php include('controller/BerandaController.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obat | Puskesmas</title>

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
                <h1 class="w-100 mx-auto pt-2 pb-1">Pilih Obat Yang dibutuhkan</h1>
            </div>
            <div class="mainContentPendf w-100">
                <div class="row justify-content-around w-75 mx-auto">
                    <a href="#" class="text-decoration-none text-dark card m-2 p-2 col-3 ps-4 pe-4 shadow"  data-bs-toggle="modal" data-bs-target="#modalSakitKepala">
                        <h5>Sakit kepala</h5>
                        <img src="<?= $main_url?>assets/img/login/icon/sakitKepata.png" width="130" alt="">
                    </a>
                    <a href="#" class="text-decoration-none text-dark card m-2 p-2 col-3 ps-4 pe-4 shadow" data-bs-toggle="modal" data-bs-target="#modalBatuk">
                        <h5>Batuk & Flu</h5>
                        <img src="<?= $main_url?>assets/img/login/icon/batuk.png" width="130" alt="kk">
                    </a>
                    <a href="#" class="text-decoration-none text-dark card m-2 p-2 col-3 ps-4 pe-4 shadow" data-bs-toggle="modal" data-bs-target="#modalVitamin">
                        <h5>Vitamin</h5>
                        <img src="<?= $main_url?>assets/img/login/icon/vitamin.png" width="130" alt="">
                    </a>
                    <a href="#" class="text-decoration-none text-dark card m-2 p-2 col-3 ps-4 pe-4 shadow" data-bs-toggle="modal" data-bs-target="#modalPencernaan">
                        <h5>Pencernaan</h5>
                        <img src="<?= $main_url?>assets/img/login/icon/pencernaan.png" width="130" alt="">
                    </a>
                    <a href="#" class="text-decoration-none text-dark card m-2 p-2 col-3 ps-4 pe-4 shadow" data-bs-toggle="modal" data-bs-target="#modalAntiNyeri">
                        <h5>Anti Nyeri</h5>
                        <img src="<?= $main_url?>assets/img/login/icon/antiNyeri.png" width="130" alt="">
                    </a>
                    <a href="#" class="text-decoration-none text-dark card m-2 p-2 col-3 ps-4 pe-4 shadow" data-bs-toggle="modal" data-bs-target="#modalCovid">
                        <h5>Anti Covid</h5>
                        <img src="<?= $main_url?>assets/img/login/icon/covid-19.png" width="130" alt="">
                    </a>
                    
                </div>
            </div>
        </div>
    </div>



    <!-- Modal Sakit Kepala -->
    <div class="modal fade" id="modalSakitKepala" tabindex="-1" aria-labelledby="modalSakitKepalaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalSakitKepalaLabel">Pesan Obat Sakit Kepala</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="obat">
                            <option selected>-- Silahkan Pilih Obat --</option>
                            <option value="1">Paracitamol</option>
                            <option value="2">Sanmol</option>
                            <option value="3">Obat Sakit Kepala</option>
                        </select>
                        <label for="floatingSelect">Obat</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Harga" name="harga">
                        <label for="floatingInput">Harga</label>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="keluhan"></textarea>
                        <label for="floatingTextarea">Keluhan</label>
                    </div>
                    <div class="w-50 mx-auto">
                        <button type="submit" class="btn btn-success w-100" name="btnSakitKepala" style="border-radius: 40px !important;">Pesan</button>
                    </div>
                </form>

            </div>
            
        </div>
    </div>
    </div>


    <!-- Modal Batuk -->
    <div class="modal fade" id="modalBatuk" tabindex="-1" aria-labelledby="modalBatuk" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalBatuk">Pesan Obat Batuk & Flu</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post">

                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="obat">
                        <option selected>-- Silahkan Pilih Obat --</option>
                        <option value="1">Paracitamol</option>
                        <option value="2">Sanmol</option>
                        <option value="3">Obat Sakit Kepala</option>
                    </select>
                    <label for="floatingSelect">Obat</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Harga" name="harga">
                    <label for="floatingInput">Harga</label>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="keluhan"></textarea>
                    <label for="floatingTextarea">Keluhan</label>
                </div>
                <div class="w-50 mx-auto">
                    <button type="submit" class="btn btn-success w-100" name="btnBatuk" style="border-radius: 40px !important;">Pesan</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>

    <!-- Modal Vitamin -->
    <div class="modal fade" id="modalVitamin" tabindex="-1" aria-labelledby="modalVitamin" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalVitamin">Pesan Vitamin</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                    
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="obat">
                        <option selected>-- Silahkan Pilih Obat --</option>
                        <option value="1">Paracitamol</option>
                        <option value="2">Sanmol</option>
                        <option value="3">Obat Sakit Kepala</option>
                    </select>
                    <label for="floatingSelect">Obat</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Harga" name="harga">
                    <label for="floatingInput">Harga</label>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="keluhan"></textarea>
                    <label for="floatingTextarea">Keluhan</label>
                </div>
                <div class="w-50 mx-auto">
                    <button type="submit" class="btn btn-success w-100" name="btnVitamin" style="border-radius: 40px !important;">Pesan</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>

    <!-- Modal Pencernaan -->
    <div class="modal fade" id="modalPencernaan" tabindex="-1" aria-labelledby="modalPencernaan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalPencernaan">Pesan Obat Pencernaan</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="" method="post">
                    
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="obat">
                            <option selected>-- Silahkan Pilih Obat --</option>
                            <option value="1">Paracitamol</option>
                            <option value="2">Sanmol</option>
                            <option value="3">Obat Sakit Kepala</option>
                        </select>
                        <label for="floatingSelect">Obat</label>
                    </div>
    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Harga" name="harga">
                        <label for="floatingInput">Harga</label>
                    </div>
    
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="keluhan"></textarea>
                        <label for="floatingTextarea">Keluhan</label>
                    </div>
                    <div class="w-50 mx-auto">
                        <button type="submit" class="btn btn-success w-100" name="btnPencernaan" style="border-radius: 40px !important;">Pesan</button>
                    </div>
                </form>
        </div>
        </div>
    </div>
    </div>

    <!-- Modal Anti Nyeri -->
    <div class="modal fade" id="modalAntiNyeri" tabindex="-1" aria-labelledby="modalAntiNyeri" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalAntiNyeri">Pesan Obat Anti Nyeri</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="" method="post">
                    
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="obat">
                            <option selected>-- Silahkan Pilih Obat --</option>
                            <option value="1">Paracitamol</option>
                            <option value="2">Sanmol</option>
                            <option value="3">Obat Sakit Kepala</option>
                        </select>
                        <label for="floatingSelect">Obat</label>
                    </div>
    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Harga" name="harga">
                        <label for="floatingInput">Harga</label>
                    </div>
    
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="keluhan"></textarea>
                        <label for="floatingTextarea">Keluhan</label>
                    </div>
                    <div class="w-50 mx-auto">
                        <button type="submit" class="btn btn-success w-100" name="btnAntiNyeri" style="border-radius: 40px !important;">Pesan</button>
                    </div>
                </form>
        </div>
        </div>
    </div>
    </div>

    <!-- Modal Anti Covid -->
    <div class="modal fade" id="modalCovid" tabindex="-1" aria-labelledby="modalCovid" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalCovid">Pesan Obat Anti Covid</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="" method="post">
                    
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="obat">
                            <option selected>-- Silahkan Pilih Obat --</option>
                            <option value="1">Paracitamol</option>
                            <option value="2">Sanmol</option>
                            <option value="3">Obat Sakit Kepala</option>
                        </select>
                        <label for="floatingSelect">Obat</label>
                    </div>
    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Harga" name="harga">
                        <label for="floatingInput">Harga</label>
                    </div>
    
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="keluhan"></textarea>
                        <label for="floatingTextarea">Keluhan</label>
                    </div>
                    <div class="w-50 mx-auto">
                        <button type="submit" class="btn btn-success w-100" name="btnCovid" style="border-radius: 40px !important;">Pesan</button>
                    </div>
                </form>
        </div>
        </div>
    </div>
    </div>

    <!-- Script -->
    <?php include('view/layout/footer.php'); ?>

</body>
</html>