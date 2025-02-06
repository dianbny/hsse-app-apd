<?php
    error_reporting(0);

    //Require
    require_once "../config/const.php";
    require_once "../config/cekData.php";
    require_once "../config/getData.php";

    //Inisialisasi
    $cekData = new cekData;
    $getData = new getData;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/style.css">
    <title>HSSE Bunyu Field</title>
</head>
<body>

<header>
    <div>
        <div class="link">
            <a href="">Contact Us</a>
        </div>
        <div class="link">
            <a href="<?= BASEURL; ?>/login" class="btnLg">Login</a>
        </div>
    </div>
</header>
<div class="jumbotron">
    <div>
        <h1>
            Welcome to <br>
            Management APD HSSE Bunyu
        </h1>
        <span>Aplikasi untuk Memanajemen Perlengkapan APD (Alat Pelindung Diri) di Pertamina Bunyu</span> 

        <a href="" class="btnLm">Learn More</a>
    </div>
    
    <img src="<?= BASEURL; ?>/assets/img/hsee_ptm.png" alt="pertamina">
</div>
<div class="container">
    <div class="category">
        <div class="top">
            <h3>Browse by Category</h3>
        </div>
        <div class="bottom">
            <div>
                <div class="image">
                    <img src="<?= BASEURL; ?>/assets/img/coveralls.png" alt="">
                </div>
                <div class="info">
                    <h5>Coveralls</h5>
                    <div>
                        Stok
                        <div class="total">
                            <?= $cekData->cekDataFr('_tb_item_apd','_category','1'); ?>
                        </div>
                    </div>
                    <div>
                        Terpakai
                        <div class="total">
                            0
                        </div>
                    </div>

                    <a href="" class="btnLd">Detail</a>
                </div>
            </div>

            <div>
                <div class="image">
                    <img src="<?= BASEURL; ?>/assets/img/shoes.png" alt="">
                </div>
                <div class="info">
                    <h5>Safety Shoes</h5>
                    <div>
                        Stok
                        <div class="total">
                            <?= $cekData->cekDataFr('_tb_item_apd','_category','2'); ?>
                        </div>
                    </div>
                    <div>
                        Terpakai
                        <div class="total">
                            0
                        </div>
                    </div>

                    <a href="" class="btnLd">Detail</a>
                </div>
            </div>

            <div>
                <div class="image">
                    <img src="<?= BASEURL; ?>/assets/img/safety-helmet.png" alt="">
                </div>
                <div class="info">
                    <h5>Safety Helmet</h5>
                    <div>
                        Stok
                        <div class="total">
                            <?= $cekData->cekDataFr('_tb_item_apd','_category','3'); ?>
                        </div>
                    </div>
                    <div>
                        Terpakai
                        <div class="total">
                            0
                        </div>
                    </div>

                    <a href="" class="btnLd">Detail</a>
                </div>
            </div>

            <div>
                <div class="image">
                    <img src="<?= BASEURL; ?>/assets/img/safety-goggles.png" alt="">
                </div>
                <div class="info">
                    <h5>Safety Goggles</h5>
                    <div>
                        Stok
                        <div class="total">
                            <?= $cekData->cekDataFr('_tb_item_apd','_category','4'); ?>
                        </div>
                    </div>
                    <div>
                        Terpakai
                        <div class="total">
                            0
                        </div>
                    </div>

                    <a href="" class="btnLd">Detail</a>
                </div>
            </div>

            <div>
                <div class="image">
                    <img src="<?= BASEURL; ?>/assets/img/gloves.png" alt="">
                </div>
                <div class="info">
                    <h5>Safety Gloves</h5>
                    <div>
                        Stok
                        <div class="total">
                            <?= $cekData->cekDataFr('_tb_item_apd','_category','5'); ?>
                        </div>
                    </div>
                    <div>
                        Terpakai
                        <div class="total">
                            0
                        </div>
                    </div>

                    <a href="" class="btnLd">Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
