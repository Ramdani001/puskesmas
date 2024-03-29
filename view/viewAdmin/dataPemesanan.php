<?php
    include('controller/BerandaAdminController.php');
    include('controller/PemesananObatController.php');
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
<body>

    <?php include('view/layout/navbarAdmin.php'); ?> 

    <div class="pb-2 mt-5" style="background-color: #788F76; height: 100%; width: 100%;">
        <div class="p-3 pt-5">
        <div class="card h-100">
            <div>
                <a href="<?= $main_url?>admin/dashboard" class="fs-1 ps-2 text-dark text-decoration">
                    <i class="fa-solid fa-arrow-rotate-left" style=""></i>
                </a>
                <h1 class="text-center">Data Pemesanan</h1>
            </div>
            <div class="p-5 ">
                <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahPemesanan">Tambah</button>
                <table class="table table-striped table-hover text-center w-100">
                <tr>
                    <th>No</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Type Obat</th>
                    <th>Nama Pasien</th>
                    <th>Nama Obat</th>
                    <th>Harga Obat</th>
                    <th>Keluhan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                <?php $i = $awalData + 1 ?>
                <?php foreach($tbl_pemesanan_obat as $pesan): ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $pesan["tglPemesanan"]; ?></td>
                        <td><?= $pesan["typeObat"]; ?></td>
                        <td><?= $pesan["namaPasien"]; ?></td>
                        <td><?= $pesan["namaObat"]; ?></td>
                        <td><?= $pesan["hargaObat"]; ?></td>
                        <td><?= $pesan["keluhan"]; ?></td>
                        <td>
                        <?php if($pesan["status"] == "Diajukan") {?>
                                <button class="btn btn-secondary">
                                    <?= $pesan["status"]; ?>
                                </button>
                            <?php } else if ($pesan["status"] == "Diproses"){?>
                                <button class="btn btn-primary">
                                    <?= $pesan["status"]; ?>
                                </button>
                            <?php } else if ($pesan["status"] == "Disetujui"){?>
                                <button class="btn btn-success">
                                    <?= $pesan["status"]; ?>
                                </button>
                            <?php } else {?>
                                <button class="btn btn-danger">
                                    <?= $pesan["status"]; ?>
                                </button>
                            <?php }?>
                        </td>
                        <td class="">
                            <form action="" method="post">
                                <input type="hidden" name="id_pemesanan" value="<?= $pesan["id_pemesanan"]; ?>">
                                <input type="hidden" id="<?= $pesan["id_pemesanan"]; ?>_tglPemesanan" value='<?= $pesan["tglPemesanan"]; ?>'>
                                <input type="hidden" id="<?= $pesan["id_pemesanan"]; ?>_typeObat" value='<?= $pesan["typeObat"]; ?>'>
                                <input type="hidden" id="<?= $pesan["id_pemesanan"]; ?>_namaPasien" value='<?= $pesan["namaPasien"]; ?>'>
                                <input type="hidden" id="<?= $pesan["id_pemesanan"]; ?>_hargaObat" value='<?= $pesan["hargaObat"]; ?>'>
                                <input type="hidden" id="<?= $pesan["id_pemesanan"]; ?>_keluhan" value='<?= $pesan["keluhan"]; ?>'>
                                <input type="hidden" id="<?= $pesan["id_pemesanan"]; ?>_namaObat" value='<?= $pesan["namaObat"]; ?>'>
                                <input type="hidden" id="<?= $pesan["id_pemesanan"]; ?>_status" value='<?= $pesan["status"]; ?>'>
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#changeStatus" onClick="setDetailPemesananStatus('<?php echo $pesan["id_pemesanan"]; ?>');">
                                    Status
                                </button>
                                <button type="button" onClick="setDetailPemesanan('<?php echo $pesan["id_pemesanan"]; ?>');" class="border-0" style="font-size: 18px !important; padding-right: 10px; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#editPemesanan" name="">
                                    <i class="fa-solid fa-pen" style="color: green;"></i>
                                </button>
                                <button type="submit" name="hapusDataPemesanan" class="border-0 " style="background-color: transparent; font-size: 18px !important;" name="">
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
<div class="modal fade" id="tambahPemesanan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahPemesananLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="tambahPemesananLabel">Tambah Pemesanan</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <form id="formTambahPemesanan" action="" method="post">
                <div class="mb-3">
                    <input type="date" class="form-control" id="tglPemesanan" placeholder="Tanggal Pemesanan" name="tglPemesanan">
                </div>
                <div class="mb-3">
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
                    <input type="text" class="form-control" id="namaPasien" placeholder="Nama Pasien" name="namaPasien">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="namaObat" placeholder="Nama Obat" name="namaObat">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="Harga Obat" placeholder="Harga Obat" name="hargaObat">
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Masukan Keluhan Anda" id="keluhan" name="keluhan"></textarea>
                    <label for="keluhan">Keluhan</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="tambahPesanObat" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</div>

 <!-- Edit Pemesanan -->
<div class="modal fade" id="editPemesanan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editPemesananLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="editPemesananLabel">Edit Pemesanan</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <form id="formeditPemesanan" action="" method="post">
                <div class="mb-3">
                    <input type="hidden" name="id_pemesanan" id="id_pemesanan_edit">
                    <input type="date" class="form-control" id="tglPemesananX" placeholder="Tanggal Pemesanan" name="tglPemesanan">
                </div>
                <div class="mb-3">
                <select name="typeObat" id="typeObatX" class="form-select" aria-label="Default select example">
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
                    <input type="text" class="form-control" id="namaPasienX" placeholder="Nama Pasien" name="namaPasien">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="hargaObat" placeholder="Harga Obat" name="hargaObat">
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Masukan Keluhan Anda" id="keluhanX" name="keluhan"></textarea>
                    <label for="keluhan">Keluhan</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="editPemesananObat" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</div>
    

<!-- Modal Change Status -->
<div class="modal fade" id="changeStatus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="changeStatusLabel" aria-hidden="true">
         <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="changeStatusLabel">Edit Status</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="formchangeStatus" action="" method="post">
                <div class="mb-3">
                    <div class="mb-3">
                        <input type="hidden" name="id_pemesanan_status" id="id_pemesanan_status">
                        <input type="text" class="form-control" id="namaPasienStatus" placeholder="Nama Pasien" name="namaPasien" value="" >
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="namaObatStatus" placeholder="Nama Obat" name="namaObat" value="" readonly>
                    </div>  
                    <div class="mb-3">
                        <select name="status" id="status" class="form-select" aria-label="Default select example">
                            <option selected>-- Status --</option>
                            <option value="Diajukan">Diajukan</option>
                            <option value="Diproses">Diproses</option>
                            <option value="Disetujui">Disetujui</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>
                    </div>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="setStatusPemesanan" class="btn btn-primary">Simpan</button>
                </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Script -->
    <?php include('view/layout/footer.php'); ?>

    <script>
        function setDetailPemesanan(data){
            document.getElementById("id_pemesanan_edit").value = data;
            document.getElementById("tglPemesananX").value = document.getElementById(data + "_tglPemesanan").value;
            document.getElementById("typeObatX").value = document.getElementById(data + "_typeObat").value;
            document.getElementById("namaPasienX").value = document.getElementById(data + "_namaPasien").value;
            document.getElementById("hargaObat").value = document.getElementById(data + "_hargaObat").value;
            document.getElementById("keluhanX").value = document.getElementById(data + "_keluhan").value;
        }

        function setDetailPemesananStatus(data){
            document.getElementById("id_pemesanan_status").value = data;
            document.getElementById("namaObatStatus").value = document.getElementById(data + "_namaObat").value;
            document.getElementById("namaPasienStatus").value = document.getElementById(data + "_namaPasien").value;
            document.getElementById("status").value = document.getElementById(data + "_status").value;
        }
    </script>

</body>
</html>
