<?php
    error_reporting(0);

    session_start(); 

    require_once "../config/const.php";

    if(!isset($_SESSION['status-login']) || $_SESSION['level'] != "administrator"){ 
        header('location:'.BASEURL.'/logout');
    }

    //Require
    require_once "../config/cekData.php";
    require_once "../config/saveData.php";
    
    //Inisialisasi
    $cekData = new cekData;
    $saveData = new saveData;
    
    //Waktu 
    date_default_timezone_set("Asia/Kuala_Lumpur");
    setlocale(LC_ALL, 'id-ID', 'id_ID');

    //Filter Data
    function filterInput($data){
        $data = trim($data);
        $data = strip_tags($data);
        $data = addslashes($data);
        return $data;
    }

    //Datetime
    $createdAt = filterInput(date('Y-m-d H:i:s'));
    $updatedAt = filterInput(date('Y-m-d H:i:s'));

    //Save APD New
    if($_GET['action'] == 'save-data-new-apd'){

        //Jika Submit
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $code = filterInput($_POST['code']);
            $name = filterInput($_POST['name']);
            $category = filterInput($_POST['category']);
            $location = filterInput($_POST['location']);
            $rackCode = filterInput($_POST['rack-code']);
            $rackNum = filterInput($_POST['rack-num']);
            $stock = filterInput($_POST['stock']);
            $expired = filterInput($_POST['expired']);

            //Get File Upload
            $f1 = $_FILES['f1']['tmp_name'];
            $f1_name = $_FILES['f1']['name'];
            $f1_type = $_FILES['f1']['type'];
            $f1_size = $_FILES['f1']['size'];
            $format = pathinfo($f1_name, PATHINFO_EXTENSION);

            //Cek Required Form
            if(empty($code) || empty($name) || empty($category) || empty($expired) || empty($location) || empty($rackCode) || empty($rackNum) || empty($stock)){
                $_SESSION['status'] = "error";
                $_SESSION['msg'] = "Form is required !";

                header('location:'.BASEURL.'/add-apd');
            }
            else {
                if($cekData->cekDataFr('_tb_item_apd','_kode_apd', $code) < 1){

                    $fileName = ($f1 != null) ? $code.'.'.$format : "-";

                    if($fileName != "-"){
                        move_uploaded_file($f1,'../uploads/foto/'.$fileName);
                    }

                    $saveData->saveDataAPD($code, $name, $category, $location, $rackCode, $rackNum, $stock, $expired, $fileName, $createdAt, $updatedAt);

                    $_SESSION['status'] = "success";
                    $_SESSION['msg'] = "Data has been saved";

                    header('location:'.BASEURL.'/add-apd');
                }
                else { 
                    $_SESSION['status'] = "error";
                    $_SESSION['msg'] = "Duplicat code APD !";
    
                    header('location:'.BASEURL.'/add-apd');
                }
            }

        }
        else {
            header('location:'.BASEURL.'/list-apd');
        }
    }

    //Update Data APD