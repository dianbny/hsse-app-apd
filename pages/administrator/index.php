<?php
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
    <title>Dashboard</title>
</head>
<body>
   <header>
        
        <div class="right">
            <span><?= $_SESSION['username']; ?></span>
            <a href="<?= BASEURL; ?>/logout">Log out</a>
        </div>
   </header>
   <div class="jumbotron">
        
   </div>
   <div class="container">

    <?php

        $page = addslashes($_GET['page']);

        switch($page){
            case "list-apd":

                include "list_apd.php";

                break;

            case "add-apd":

                include "add_apd.php";
    
                break;

            case "detail-apd":

                include "detail_apd.php";
        
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

        <?php
            break; 

            }
    ?>
        
   </div>

    <!-- Javascript JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    
    <script type='text/javascript'>
        $(document).ready(function(){
            $(".tab div a").click(function(){
                const id = $(this).data('id');
                if(!$(this).hasClass('active')){
                    $(".tab div a").removeClass('active');
                    $(this).addClass('active');
                    
                    $('.tab-content').hide();
                    $(`[data-content=${id}]`).show();
                }
            });
        });
    </script>

   
</body>
</html>