<?php
    include('controller/DataObatController.php');

    $jumlahDataPerHalaman = 5;
    $jumlahData = count(query("SELECT * FROM tbl_obat"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
    $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

    $tbl_obat = query("SELECT * FROM tbl_obat LIMIT $awalData, $jumlahDataPerHalaman");

    if (isset($_POST["halaman"])) {
        $jumlahDataPerHalaman = 5;
        $jumlahData = count(query("SELECT * FROM tbl_obat"));
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
        $x = 1;

        if (isset($_POST["next"])) {
            $x = $_POST["next"];
        }else if (isset($_POST["prev"])) {
            $x = $_POST["prev"];
        }

        $halamanAktif = ( isset($x) ) ? $x : 1;
        $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

        $tbl_obat = query("SELECT * FROM tbl_obat LIMIT $awalData, $jumlahDataPerHalaman");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Obat | Admin</title>

   
    <?php include('view/layout/head.php'); ?>
    <link rel="stylesheet" href="<?= $main_url?>assets/style/styleIndex.css">


</head>  
<body style=""> 

    <?php include('view/layout/navbarAdmin.php'); ?> 

    <div class="pb-2" style="background-color: #788F76; height: 100%;  width: 100%; position: fixed !important;">
        <div class="p-2">
            <div class="card">
                <div class=" ">
                    <a href="<?= $main_url?>admin/dashboard" class="fs-1 ps-2 text-dark text-decoration ">
                        <i class="fa-solid fa-arrow-rotate-left" style=""></i>
                    </a>
                    <h1 class="text-center">Data Obat</h1>
                </div>
                <div class="p-3">
                    <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahObat">Tambah</button>
                    <table class="table table-striped table-hover text-center w-100" style="height: 100% !important;">
                    <tr>
                        <th>No</th>
                        <th>Type Obat</th>
                        <th>Nama Obat</th>
                        <th>Harga Obat</th>
                        <th>Expire</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $i = $awalData + 1 ?>
                    <?php foreach($tbl_obat as $obat): ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $obat["typeObat"]; ?></td>
                            <td><?= $obat["namaObat"]; ?></td>
                            <td><?= $obat["hargaObat"]; ?></td>
                            <td><?= $obat["expire"]; ?></td>
                            <td class="">
                                <form action="" method="post">
                                    <button type="submit" class="border-0" style="font-size: 18px !important; padding-right: 10px; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#editObat" name="">
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
    <div class="modal fade" id="tambahObat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahObatLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="tambahObatLabel">Tambah Obat</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="formTambahObat" action="" method="post">
            <div class="mb-3">
                <!-- <input type="text" class="form-control" id="typeObat" placeholder="Type Obat" name="typeObat"> -->
                <select name="typeObat" id="typeObat" class="form-select" aria-label="Default select example">
                    <option selected>-- Pilih Type Obat --</option>
                    <option value="Sakit Kepala">Sakit Kepala</option>
                    <option value="Batuk & Flu">Batuk & Flu</option>
                    <option value="Vitamin">Vitamin</option>
                    <option value="Pencernaan">Pencernaan</option>
                    <option value="Anti Nyeri">Anti Nyeri</option>
                    <option value="Anti Covid">Anti Covid</option>
                </select>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="namaObat" placeholder="Nama Obat" name="namaObat">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="Harga Obat" placeholder="Harga Obat" name="hargaObat">
            </div>
            <div class="mb-3">
                <input type="date" class="form-control" id="expire" placeholder="Kadaluarsa" name="expire">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="tambahObat" class="btn btn-primary">Simpan</button>
        </div>
    </div>
    </form>
    </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editObat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editObatLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="editObatLabel">Edit Obat</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" id="typeObat" placeholder="Type Obat" name="typeObat">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="namaObat" placeholder="Nama Obat" name="namaObat">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="Harga Obat" placeholder="Harga Obat" name="Harga Obat">
            </div>
            <div class="mb-3">
                <input type="date" class="form-control" id="expire" placeholder="Harga Obat" name="Harga Obat">
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </div>
    </div>
    </div>
    

    <!-- Script -->
    <?php include('view/layout/footer.php'); ?>

</body>
</html>
