<?php
    include('controller/dataUserController.php');


    $jumlahDataPerHalaman = 5;
    $jumlahData = count(query("SELECT * FROM tbl_user"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
    $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

    $tbl_user = query("SELECT * FROM tbl_user LIMIT $awalData, $jumlahDataPerHalaman");

    if (isset($_POST["halaman"])) {
        $jumlahDataPerHalaman = 5;
        $jumlahData = count(query("SELECT * FROM tbl_user"));
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
        $x = 1;

        if (isset($_POST["next"])) {
            $x = $_POST["next"];
        }else if (isset($_POST["prev"])) {
            $x = $_POST["prev"];
        }

        $halamanAktif = ( isset($x) ) ? $x : 1;
        $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

        $tbl_user = query("SELECT * FROM tbl_user LIMIT $awalData, $jumlahDataPerHalaman");
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User | Admin</title>

   
    <?php include('view/layout/head.php'); ?>
    <link rel="stylesheet" href="<?= $main_url?>assets/style/styleIndex.css">


</head> 
<body>

    <?php include('view/layout/navbarAdmin.php'); ?>  

    <div class="pb-2" style="background-color: #788F76; height: 100%; width: 100%;">
        <div class="p-2 m-3 mt-4">
            <div class="card m-5 h-100">
                <div>
                    <a href="<?= $main_url?>admin/dashboard" class="fs-1 ps-2 text-dark text-decoration">
                        <i class="fa-solid fa-arrow-rotate-left" style=""></i>
                    </a>
                    <h1 class="text-center">Data User</h1>
                </div>
                <div class="p-5 ">
                    <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahUser">Tambah</button>
                    <table class="table table-striped table-hover text-center w-100">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>No Telepon</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $i = 1 ?>
                    <?php foreach($tbl_user as $user): ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $user["nama_lengkap"]; ?></td>
                            <td><?= $user["email"]; ?></td>
                            <td>-</td>
                            <td><?= $user["no_telepon"]; ?></td>
                            <td>
                                <img src="<?=$main_url?>assets/img/upload_images/<?=  $user["src_gambar"];?>" alt="fotoProfile" width="80">
                            </td>
                            <td class="">
                                <form action="#" method="post">
                                    <button type="submit" class="border-0" style="font-size: 18px !important; padding-right: 10px; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#editUser" name="">
                                        <i class="fa-solid fa-pen" style="color: green;"></i>
                                    </button>
                                    <button type="submit" class="border-0 " style="background-color: transparent; font-size: 18px !important;" name="">
                                        <i class="fa-solid fa-trash" style="color: red;"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                    </table>


                        <!-- navigasi -->
                        <div style=" display: flex; justify-content: center; width: 25%; float: right; background-color: white; text-align: center;">
                                <div style=" padding: 4px; margin-right: 8px;" id="prevBtn">
                                    <?php if( $halamanAktif > 1 ) : ?>
                                        <div>
                                            <form action="" method="post">
                                                <input type="hidden" name="prev" value="<?= $halamanAktif - 1; ?>" >
                                                <button name="halaman" class="btn btn-primary">Prev</button>
                                            </form>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="">
                                    <?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
                                        <?php if( $i == $halamanAktif ) : ?>
                                                <a class="text-decoration-none text-dark bg-white shadow border p-2" style=" border-radius: 10px !important;font-size: 30px !important;" style=""><?= $i; ?></a>
                                            
                                                <?php else : ?>
                                                    <a class="text-decoration-none p-2 text-dark" id="itemNone"><?= $i; ?></a>
                                                <?php endif; ?>
                                    <?php endfor; ?>
                                </div>
                                
                                <div style=" padding: 4px; margin-left: 8px;" id="nextBtn">
                                    <?php if( $halamanAktif < $jumlahHalaman ) : ?> 
                                        <form action="" method="post">
                                            <input type="hidden" name="next" value="<?= $halamanAktif + 1; ?>">
                                            <button name="halaman" class="btn btn-primary">Next</button>
                                        </form>
                                    </a>
                                    <?php endif; ?>
                                </div>

                            </div>
                            <!-- End Navigasi -->

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahUserLabel">Tambah User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <form id="formtambahUser" action="" method="post">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="namaLengkap" placeholder="Nama Lengkap" name="namaLengkap">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="email" placeholder="Alamat Email" name="email">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="password" placeholder="password" name="password">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="telp" placeholder="No Telepon" name="telp">
                            </div>
                            <div class="mb-3">
                                <label for="gambar">Foto Profile</label>
                                <input type="file" class="form-control" id="gambar" name="gambar">
                            </div>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="tambahUser" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
         </div>
    </div>

    <!-- Edit Tambah -->
    <div class="modal fade" id="editUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editUserLabel">Edit User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <form id="formeditUser" action="" method="post">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="namaLengkap" placeholder="Nama Lengkap" name="namaLengkap">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="email" placeholder="Alamat Email" name="email">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="password" placeholder="password" name="password">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="telp" placeholder="No Telepon" name="telp">
                            </div>
                            <div class="mb-3">
                                <label for="gambar">Foto Profile</label>
                                <input type="file" class="form-control" id="gambar" name="gambar">
                            </div>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="tambahUser" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
         </div>
    </div>
    

    <!-- Script -->
    <?php include('view/layout/footer.php'); ?>

</body>
</html>
