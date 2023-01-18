<?php
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

    <div style="background-color: #788F76; height: 100%; position: fixed !important; width: 100%;">
        <div class=" card m-5">
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
                    <th>Nama Pasien</th>
                    <th>Telpon</th>
                    <th>Email</th> 
                    <th>Aksi</th>
                </tr>

                <?php $i = 1 ?>
                <?php foreach($dataPasien as $pasien): ?>
                    <tr>
                        <td><?= $i; ?></td> 
                        <td><?= $pasien["nama_lengkap"]; ?></td>
                        <td><?= $pasien["no_telepon"]; ?></td>
                        <td><?= $pasien["email"]; ?></td>
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
		</div>


            </div>
        </div>
    </div>

    

    <!-- Script -->
    <?php include('view/layout/footer.php'); ?>
</body>
</html>
