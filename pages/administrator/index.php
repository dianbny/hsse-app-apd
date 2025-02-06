<?php
    error_reporting(0);
    session_start();
    require_once "../../config/const.php";

    if(!isset($_SESSION['status-login']) || $_SESSION['level'] != "administrator"){ 
        header('location:'.BASEURL.'/logout');
    }

    //Require
    require_once "../../config/cekData.php";
    require_once "../../config/getData.php";

    //Inisialisasi
    $cekData = new cekData;
    $getData = new getData;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/style_page.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/assets/vendors/font-awesome/css/font-awesome.css" />
    <title>HSSE Bunyu Field</title>
</head>
<body>

    <!-- Header -->
    <header>
        <span style="font-size:26px;cursor:pointer;color:black;" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>&nbsp;&nbsp;
        <img src="<?= BASEURL; ?>/assets/img/pertamina.png">
        <span class="title-logo">PERTAMINA <span style="color:red;">EP</span></span>
        <div class="right">
            <span><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;<?= $_SESSION['username']; ?></span>
            <a href="<?= BASEURL; ?>/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Logout</a>
        </div>
    </header>

    <div id="mySidenav" class="sidenav">
        <button class="closebtn" onclick="closeNav()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>

        <a href="<?= BASEURL; ?>/dashboard-administrator"><i class="fa fa-desktop" aria-hidden="true"></i>&nbsp; Dashboard</a>
        <a href="javascript:void(0)" id="first"><i class="fa fa-list" aria-hidden="true"></i>&nbsp; List APD</a>
            <div class="menu-first">
                <?php
                    if($cekData->cekDataAll('_tb_category_apd') > 0){
                        foreach ($getData->getDataAll('_tb_category_apd','_id') as $row){ ?>
                            <a href="<?= BASEURL.'/list-'.str_replace(' ', '-', strtolower($row['_category'])); ?>"><i class="fa fa-list" aria-hidden="true"></i>&nbsp; <?= $row['_category']; ?></a>
                 <?php  }
                    }
                ?>
            </div>
        <a href="<?= BASEURL; ?>/dashboard-administrator"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Request</a>
    </div>

    <div class="jumbotron"></div>
    
    <div class="container">

    <?php

        $page = addslashes($_GET['page']);

        switch($page){
            case "list-coveralls":

                include "list_apd_coveralls.php";

                break;

            case "list-safety-shoes":

                include "list_apd_safety_shoes.php";
    
                break;

            case "add-coveralls":

                include "add_apd_coveralls.php";
    
                break;

            case "detail-coveralls":

                include "detail_apd_coveralls.php";
        
                break;

            case "dashboard-administrator" : ?>
                <div class="title-page">
                    <img src="<?= BASEURL; ?>/assets/img/dashboard.png" alt="">Dashboard
                </div>
                <div class="category">
                    
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
                                        <?php
                                            $totalCoveralls = $getData->getSumData('_tb_coveralls');
                                            if($totalCoveralls['stok'] == ""){
                                                echo "0";
                                            }
                                            else {
                                                echo $totalCoveralls['stok'];
                                            }
                                        ?>
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

        <?php
            break; 

            }
    ?>
        
   </div>

    <!-- Javascript JQuery -->
    <script>
        function openNav() {
        document.getElementById("mySidenav").style.width = "210px";
        }

        function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="<?= BASEURL; ?>/assets/js/script.js"></script>

   
</body>
</html>