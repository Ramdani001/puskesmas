
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien | Admin</title>

   
    <?php include('view/layout/head.php'); ?>
    <link rel="stylesheet" href="<?= $main_url?>assets/style/styleIndex.css">


</head> 
<body>

    <?php include('view/layout/navbar.php'); ?> 

    <div style="background-color: #788F76; height: 100%; position: fixed !important; width: 100%;">
        <div class=" card m-5">
            <div>
                <a href="<?= $main_url?>admin/dashboard" class="fs-1 ps-2 text-dark text-decoration">
                    <i class="fa-solid fa-arrow-rotate-left" style=""></i>
                </a>
                <h1 class="text-center">Data Pasien</h1>
            </div>
            <div class="p-5 ">
                <table class="table table-dark table-striped text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Telpon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Rizkan Ramdani</td>
                    <td>081223781292</td>
                    <td>ramdani@gmail.com</td>
                    <td class="">
                        <a href="#" clas="pe-3" style="font-size: 18px !important; padding-right: 10px;">
                            <i class="fa-solid fa-pen" style="color: green;"></i>
                        </a>
                        <a href="#" class="ps-2" style="font-size: 18px !important;">
                            <i class="fa-solid fa-trash" style="color: red;"></i>
                        </a>
                    </td>
                </tr>
                </table>
            </div>
        </div>
    </div>

    

    <!-- Script -->
    <?php include('view/layout/footer.php'); ?>

</body>
</html>
