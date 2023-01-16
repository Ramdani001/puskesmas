<?php include('controller/BerandaController.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poli Mata | Puskesmas</title>

    <?php include('view/layout/head.php'); ?>

    <link rel="stylesheet" href="<?= $main_url?>assets/style/styleIndex.css">

</head> 
<body style="background-image: url('../../assets/img/login/bg_pendaftaran.jpeg') !important;">
 
    <?php include('view/layout/navbar.php'); ?>
    
    <div id="container" class="container-fluid text-center">
        <div class="w-75 d-flex flex-row mx-auto card m-3 p-2 pb-5" style="background-color: #9DB69B !important;">
            <a href="<?= $main_url?>index.php/pendaftaran" class="fs-1 text-dark text-decoration">
                <i class="fa-solid fa-arrow-rotate-left" style=""></i>
            </a>
            <div class="row mt-2 pt-5">
                <img class="col-8 w-50 mx-auto m-2 shadow" src="<?= $main_url?>assets/img/login/dr3.jpeg" width="150" alt="" style="border-radius: 10px !important;">
                <h1 class="col-12 w-100 mx-auto pt-2 pb-1">
                    dr. Sien Yoon, Sp.M
                </h1>
                <span class="col-12">
                    <i>(Poli Mata)</i>
                </span>
            </div>
            <div class="mainContentPendf w-100 m-2 pe-3 pt-5" >
                <div class="card p-3 pt-5 shadow" style="border-radius: 15px;">
                    <h4>Daftar Poli Mata</h4>
                    <form action="">
                    <div class="mb-3 pb-3">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Nama Lengkap Pasien" class="" name="namePasien">
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="keluhan"></textarea>
                            <label for="floatingTextarea">Keluhan</label>
                        </div>
                        <div class="mb-3">
                            <input type="date" class="form-control" placeholder="Nama Lengkap Pasien" class="" name="tglCheck">
                        </div>
                        <div class="mb-3 pt-3">
                            <button class="btn btn-success ps-5 pe-5">Daftar</button>
                        </div>
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