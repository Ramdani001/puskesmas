<?php
    include('controller/BerandaAdminController.php');
    include('controller/DataDokterController.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dokter | Admin</title>

   
    <?php include('view/layout/head.php'); ?>
    <link rel="stylesheet" href="<?= $main_url?>assets/style/styleIndex.css">


</head> 
<body>

    <?php include('view/layout/navbarAdmin.php'); ?>  

    <div class="pb-2" style="">
        <div class="p-5">
        <div class="card m-5 h-100">
            <div>
                <a href="<?= $main_url?>admin/dashboard" class="fs-1 ps-2 text-dark text-decoration">
                    <i class="fa-solid fa-arrow-rotate-left" style=""></i>
                </a>
                <h1 class="text-center">Data Dokter</h1>
            </div>
            <div class="p-5 ">
                <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahObat">Tambah</button>
                <table class="table table-striped table-hover text-center w-100">
                <tr>
                    <th>No</th>
                    <th>Nama Poli</th>
                    <th>Nama Dokter</th>
                    <th>Spesialis</th>
                    <th>Tanggal Masuk</th>
                    <th>Aksi</th>
                </tr>
                <?php $i = $awalData + 1 ?>
                <?php foreach($tbl_dokter as $dokter): ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $dokter["namaPoli"]; ?></td>
                        <td><?= $dokter["namaDokter"]; ?></td>
                        <td><?= $dokter["spesialis"]; ?></td>
                        <td><?= $dokter["tglMasuk"]; ?></td>
                        <td class="">
                            <form action="#" method="post">
                                <input type="hidden" name="id_dokter" id="id_dokter" value='<?= $dokter["id_dokter"]; ?>'>
                                <input type="hidden" id="<?= $dokter["id_dokter"]; ?>_namaPoli" value='<?= $dokter["namaPoli"]; ?>'>
                                <input type="hidden" id="<?= $dokter["id_dokter"]; ?>_namaDokter" value='<?= $dokter["namaDokter"]; ?>'>
                                <input type="hidden" id="<?= $dokter["id_dokter"]; ?>_spesialis" value='<?= $dokter["spesialis"]; ?>'>
                                <input type="hidden" id="<?= $dokter["id_dokter"]; ?>_tglMasuk" value='<?= $dokter["tglMasuk"]; ?>'>
                                <button type="button" onClick="setDetailDokter('<?php echo $dokter["id_dokter"]; ?>');" class="border-0" style="font-size: 18px !important; padding-right: 10px; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#editObat" name="">
                                    <i class="fa-solid fa-pen" style="color: green;"></i>
                                </button>
                                <button type="submit" class="border-0 " style="background-color: transparent; font-size: 18px !important;" name="hapusDataDokter">
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
            <h1 class="modal-title fs-5" id="tambahObatLabel">Tambah Dokter</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="formTambahObat" action="" method="post">
            <div class="mb-3">
                <select name="namaPoli" id="namaPoli" class="form-select" aria-label="Default select example">
                    <option selected>-- Pilih Poli --</option>
                    <option value="Poli Gigi">Poli Gigi</option>
                    <option value="BP Umum">BP Umum</option>
                    <option value="BP Usia Lanjut">BP Usia Lanjut</option>
                    <option value="Poli KIA & KB">Poli KIA & KB</option>
                    <option value="MTBS">MTBS</option>
                    <option value="IGD">IGD</option>
                </select>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="namaDokter" placeholder="Nama Dokter" name="namaDokter">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="Spesialis" placeholder="Spesialis" name="spesialis">
            </div>
            <div class="mb-3">
                <label for="" >Tanggal Masuk</label>
                <input type="date" class="form-control" id="tglMasuk" name="tglMasuk">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="tambahDataDokter" class="btn btn-primary">Simpan</button>
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
            <h1 class="modal-title fs-5" id="editObatLabel">Edit Dokter</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
            <div class="mb-3">
                <input type="hidden" name="id_dokter" id="id_dokter_edit">
                <input type="text" class="form-control" id="nama_poli" placeholder="Nama Poli" name="namaPoli">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="nama_dokter" placeholder="Nama Dokter" name="namaDokter">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="spesialis" placeholder="spesialis" name="spesialis">
            </div>
            <div class="mb-3">
                <input type="date" class="form-control" id="tglMasukX" placeholder="tglMasuk" name="tglMasuk">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="editDataDokter" class="btn btn-primary">Update</button>
        </div>
    </form>
        </div>
    </div>
    </div>
    

    <!-- Script -->
    <?php include('view/layout/footer.php'); ?>
    
    <script>
        function setDetailDokter(data) {
            document.getElementById("id_dokter_edit").value = document.getElementById("id_dokter").value;
            document.getElementById("nama_dokter").value = document.getElementById(data + "_namaDokter").value;
            document.getElementById("spesialis").value = document.getElementById(data + "_spesialis").value;
            document.getElementById("tglMasukX").value = document.getElementById(data + "_tglMasuk").value;
            document.getElementById("nama_poli").value = document.getElementById(data + "_namaPoli").value;
        }
    </script>
</body>
</html>
