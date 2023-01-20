<?php
    include('controller/BerandaController.php');
    include('controller/DataPasienController.php');
?>

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
<body >
 
    <?php include('view/layout/navbar.php'); ?>
    
    <div id="container" class="container-fluid text-center">
        <div class="w-75 d-flex flex-row mx-auto card m-3 p-2 pb-5" style="background-color: #9DB69B !important;">
            <a href="<?= $main_url?>pendaftaran" class="fs-1 text-dark text-decoration">
                <i class="fa-solid fa-arrow-rotate-left" style=""></i>
            </a>
            <div class="mainContentPendf w-50 mx-auto m-2 pe-3 pt-5" >
                <div class="card p-3 pt-5 shadow" style="border-radius: 15px;">
                    <h4>Daftar Poli Gigi</h4>
                    <form action="" method="post">
                    <div class="mb-3 pb-3">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Nama Lengkap Pasien" class="" name="namePasien">
                            <input type="hidden" name="typePoli" value="Poli Gigi">
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
                            <button class="btn btn-success ps-5 pe-5" type="submit" name="checkupPasien">Daftar</button>
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