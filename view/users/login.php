<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Users</title>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo $main_url?>assets/style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $main_url?>assets/style/bootstrap/css/bootstrap.css">
    
    <!-- MyStyle -->
    <link rel="stylesheet" href="<?php echo $main_url?>assets/style/style.css">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="<?php echo $main_url?>assets/style/fontawesome.css">
    <link rel="stylesheet" href="<?php echo $main_url?>assets/style/fontawesome.min.css">

</head>
<body style="">

    <header>
        
    </header>

    <div id="content" class="container-fluid">
        <div id="mainContent" class="d-flex" style="background: transparent;">
            <div class="leftContent w-100">
                <img src="<?= $main_url?>assets/img/login/login_puskesmas.jpg" class="shadow" width="300" style="margin-top: 70px !important; border-radius: 30px !important;" alt="" class=" m-2">
            </div>
            <div id="ContainerLogin" class="m-3 w-100 text-center ps-5">
               <div id="boxLogin" class="formLogin w-75 mx-auto">
                <div class="login-header mb-3">
                        <img src="<?= $main_url?>assets/img/logoKel.png" width="120" alt="">
                    </div>
                    <div class="login-body">
                        <div class="card" style="border-radius: 30px !important;">
                            <div class="card-header">
                                <img src="<?= $main_url?>assets/img/login/Logo-Puskesmas.png" width="70" alt="">
                            </div> 
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="email" placeholder="name@example.com" name="email">
                                        <label for="email">Email address</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="password" placeholder="Masukan Kata Sandi" name="password">
                                        <label for="password">Masukan Kata Sandi</label>
                                    </div>
                                        <button type="submit" name="btnLogin" class="mb-2 btn text-white ps-5 pe-5" style="background-color: #658C64 !important; border-radius: 20px !important; font-weight: bold; font-size: 20px;">
                                            <a href="<?= $main_url?>index.php/beranda" class="text-decoration-none text-light">Login</a>
                                        </button>
                                        <br>
                                        <span>Tidak Memiliki Akun?
                                            <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Register
                                            </a>
                                        </span>
                                </form>
                            </div>
                        </div>
                    </div>
               </div>

            </div>

        </div>
    </div>

    <!-- Modal Register -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h1 class="text-start" id="exampleModalLabel">
                        <img src="<?= $main_url?>assets/img/login/Logo-Puskesmas.png" width="50" class="" alt="">
                    </h1>    
                    <div class="w-100 pt-5 pe-5 me-5 text-center">
                        <form action="" method="post" enctype="multipart/form-data">
                            <img src="<?= $main_url?>assets/img/login/icon/profile.png" width="70" alt="" class="relative">
                            <span class=" position-absolute ps-3 pt-3 text-white fw-semibold rounded mt-4" style="width: 30% !important;">
                                <input type="file" name="gambar">
                            </span>
                    </div>
                    <button type="button" class="btn-close" style="font-size: 25px !important;" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input class="form-control form-control-sm mb-2" type="text" placeholder="Nama Lengkap" aria-label=".form-control-sm example" name="nama">
                    
                    <input class="form-control form-control-sm mb-2" type="text" placeholder="Email" aria-label=".form-control-sm example" name="email">
                    
                    <input class="form-control form-control-sm mb-2" type="password" placeholder="Password" aria-label=".form-control-sm example" name="password">
                    
                    <input class="form-control form-control-sm mb-2" type="password" placeholder="Konfirmasi Password" aria-label=".form-control-sm example" name="passwordConf">
                    
                    <input class="form-control form-control-sm mb-4" type="text" placeholder="No Telepon" aria-label=".form-control-sm example" name="telp">

                    <div class="text-center mt-2">
                        <button type="submit" name="btnRegister" class="btn text-white fw-semibold ps-5 pe-5" style="border-radius: 20px !important; background-color: #658C64 !important;">REGISTER</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    </div>

    <footer>
        
    </footer>


    <!-- Bootstrap -->
    <script src="<?php echo $main_url?>assets/style/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo $main_url?>assets/style/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo $main_url?>assets/style/bootstrap/js/bootstrap.bundle.js"></script>

    <!-- Fontawesome -->
    <script src="<?php echo $main_url?>assets/style/js/fontawesome.all.min.js"></script>
    <script src="<?php echo $main_url?>assets/style/js/jquery-3.3.1.min.js"></script>

</body>
</html>