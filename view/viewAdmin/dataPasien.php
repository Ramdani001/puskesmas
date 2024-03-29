<?php
    include('controller/BerandaAdminController.php');
    include('controller/DataPasienController.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien | Admin</title>

   
    <?php include('view/layout/head.php'); ?>
    <link rel="stylesheet" href="<?= $main_url?>assets/style/styleIndex.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

</head> 
<body>

    <?php include('view/layout/navbarAdmin.php'); ?> 



<!-- Modal Edit -->
<div class="modal fade" id="editData" tabindex="-1" aria-labelledby="editDataLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editDataLabel">Edit Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form id="formeditPasien" action="" method="post">
                <div class="mb-3">
                    <div class="mb-3">
                        <input type="date" class="form-control" id="tglPemesanan" placeholder="Tanggal Pemesanan" name="tglPemesanan" value="">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="typePoli" placeholder="Type Poli" name="typePoli" value="">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="namaPasien" placeholder="Nama Pasien" name="namaPasien" value="">
                    </div>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="tambahObat" class="btn btn-primary">Update</button>
                </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>

    <div style="background-color: #788F76; height: 100%; width: 100%;">
        <div class="m-5 p-5">
            <div class=" card ">
                <div>
                    <a href="<?= $main_url?>admin/dashboard" class="fs-1 ps-2 text-dark text-decoration">
                        <i class="fa-solid fa-arrow-rotate-left" style=""></i>
                    </a>
                    <h1 class="text-center">Data Pasien</h1>
                </div>
                <div class="p-5 ">
                    <table class="table table-striped table-hover text-center w-100">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Type Poli</th>
                        <th>Nama Pasien</th> 
                        <th>status</th> 
                        <th>Aksi</th>
                    </tr>

                <?php $i = $awalData + 1?>
                <?php foreach($dataPasien as $pasien): ?>
                    <tr>
                        <td><?= $i; ?></td> 
                        <td><?= $pasien["tglPendaftaran"]; ?></td>
                        <td><?= $pasien["typePoli"]; ?></td>
                        <td><?= $pasien["namaPasien"]; ?></td>
                        <td>
                            <?php if($pasien["status"] == "Diajukan") {?>
                                <button class="btn btn-secondary">
                                    <?= $pasien["status"]; ?>
                                </button>
                            <?php } else if ($pasien["status"] == "Diproses"){?>
                                <button class="btn btn-primary">
                                    <?= $pasien["status"]; ?>
                                </button>
                            <?php } else if ($pasien["status"] == "Disetujui"){?>
                                <button class="btn btn-success">
                                    <?= $pasien["status"]; ?>
                                </button>
                            <?php } else {?>
                                <button class="btn btn-danger">
                                    <?= $pasien["status"]; ?>
                                </button>
                            <?php }?>
                        </td>
                        <td class="">
                            <form action="#" method="post">
                                <input type="hidden" name="id_checkup" id="id_checkup" value='<?= $pasien["id_checkup"]; ?>'>
                                <input type="hidden" id="<?= $pasien["id_checkup"]; ?>_typePoli" value='<?= $pasien["typePoli"]; ?>'>
                                <input type="hidden" id="<?= $pasien["id_checkup"]; ?>_namaPasien" value='<?= $pasien["namaPasien"]; ?>'>
                                <input type="hidden" id="<?= $pasien["id_checkup"]; ?>_status" value='<?= $pasien["status"]; ?>'>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changeStatus" onclick='setDetailCheckupStatus(<?= $pasien["id_checkup"]; ?>)'>
                                    Status
                                </button>
                                <button type="button" onclick='setDetailCheckup(<?= $pasien["id_checkup"]; ?>)' class="border-0" style="font-size: 18px !important; padding-right: 10px; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#changeStatus" name="">
                                    <i class="fa-solid fa-pen" style="color: green;"></i>
                                </button>
                                <button type="submit" name="hapusPemesananCheckup" class="border-0 " style="background-color: transparent; font-size: 18px !important;">
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
                        <input type="text" class="form-control" id="type_poli" placeholder="Type Poli" name="typePoli" value="">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nama_pasien" placeholder="Nama Pasien" name="namaPasien" value="">
                    </div>    
                    <div class="mb-3">
                        <input type="hidden" id="id_checkup_edit" name="id_checkup">
                        <input type="hidden" id="status_pasienEX" name="status_pasienEX">
                        <select name="statusPasien" id="status_pasien" class="form-select" aria-label="Default select example">
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
                    <button type="submit" name="editStatusPemesanan" class="btn btn-primary">Simpan</button>
                </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Script -->
    <?php include('view/layout/footer.php'); ?>

    <script>
        function setDetailCheckup(data) {
            document.getElementById("id_checkup_edit").value = data;
            document.getElementById("nama_pasien").value = document.getElementById(data + "_namaPasien").value;
            document.getElementById("type_poli").value = document.getElementById(data + "_typePoli").value;
            document.getElementById("status_pasienEX").value = document.getElementById(data + "_status").value;

            document.getElementById("nama_pasien").readOnly = false;
            document.getElementById("type_poli").readOnly = false;
            document.getElementById("status_pasien").disabled = true;
        }

        function setDetailCheckupStatus(data) {
            document.getElementById("id_checkup_edit").value = data;
            document.getElementById("nama_pasien").value = document.getElementById(data + "_namaPasien").value;
            document.getElementById("type_poli").value = document.getElementById(data + "_typePoli").value;
            document.getElementById("status_pasien").value = document.getElementById(data + "_status").value;
            
            document.getElementById("nama_pasien").readOnly = true;
            document.getElementById("type_poli").readOnly = true;
            document.getElementById("status_pasien").disabled = false;
        }
    </script>
</body>
</html>
