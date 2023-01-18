<?php
    include('controller/BerandaController.php');
    include('controller/PemesananPoliController.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelayanan KB | Puskesmas</title>

    <?php include('view/layout/head.php'); ?> 

    <link rel="stylesheet" href="<?= $main_url?>assets/style/styleIndex.css">

</head> 
<body style="background-image: url('../../assets/img/login/bg_pendaftaran.jpeg') !important;">
 
    <?php include('view/layout/navbar.php'); ?>
    
    <div id="container" class="container-fluid text-center">
        <div class="w-75 d-flex flex-row mx-auto card m-3 p-2 pb-5" style="background-color: #9DB69B !important;">
            <a href="<?= $main_url?>pendaftaran" class="fs-1 text-dark text-decoration">
                <i class="fa-solid fa-arrow-rotate-left" style=""></i>
            </a>
            <div class="mainContentPendf w-100 m-2 pe-3 pt-5" >
                <div class="card p-3 pt-5 w-50 mx-auto shadow" style="border-radius: 15px;">
                    <h4>Daftar Pelayanan KB</h4>
                    <form action="" method="post">
                    <div class="mb-3 pb-3">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Nama Lengkap Pasien" class="" name="namePasien">
                            <input type="hidden" name="typePoli" value="Pelayanan KB">
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" placeholder="Masukan NIK" id="floatingTextarea" name="nik"></input>
                            <label for="floatingTextarea">NIK</label>
                        </div>
                        <div class="mb-3">
                            <label for="tgllahir" class="">Tanggal Lahir</label>
                            <input type="date" class="form-control" class="" name="tglLahir">
                        </div>
                        <div class="mb-3 pt-3">
                            <button class="btn btn-success ps-5 pe-5" type="submit" name="submitPoli">Daftar</button>
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