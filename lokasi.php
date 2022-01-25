<?php

require_once 'koneksi.php';
$aktif = 'lokasi';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lokasi - SMP Riyadhul Jannah</title>
    <link rel="stylesheet" href="resources/fonts/stylesheet.css">
    <link rel="stylesheet" href="resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/css/style.css">
</head>

<body>
    <div class="container bg-light">
        <!-- top bar -->
        <div class="logo clearfix">
            <div class="float-left mt-3 mb-3">
                <img src="resources/images/rj.png" alt="Logo Sekolah" width="70px" class="float-left mr-3">
                <div class="text float-right">
                    <span class="smk">SMP Riyadhul Jannah</span><br>
                    <span class="visi">Mewujudkan SMP Berkarakter, Berkompeten dan Unggul.</span>
                </div>
            </div>
        </div>

        <!-- nav bar -->
        <?php require_once 'navbar.php'; ?>

        <!-- content -->
        <div class="row p-3">
            <div class="col-md-8">
                <div class="title mb-3">
                    Lokasi SMP Riyadhul Jannah
                </div>
                <div class="artikel">
                    <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1xwuf2gBANVfJgBYgosmR3CU5lIiDS9L4&ehbc=2E312F" width="640" height="480"></iframe>
                </div>
            </div>
            <?php require_once 'sidebar.php'; ?>
        </div>
        <div class="text-white footer">
            <?php include "cp.php"  ?>
        </div>
    </div>

    <script src="resources/js/jquery.js"></script>
    <script src="resources/js/bootstrap.min.js"></script>
</body>

</html>