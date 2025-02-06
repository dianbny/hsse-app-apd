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

    //Save Coveralls
    if($_GET['action'] == 'save-data-new-coveralls'){

        //Jika Submit
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $name = filterInput($_POST['name']);
            $merk = filterInput($_POST['merk']);
            $type = filterInput($_POST['type']);
            $size = filterInput($_POST['size']);
            $stock = filterInput($_POST['stock']);
            $location = filterInput($_POST['location']);
            $rackCode = filterInput($_POST['rack-code']);
            $rackNum = filterInput($_POST['rack-num']);
           
            //Get File Upload
            $f1 = $_FILES['f1']['tmp_name'];
            $f1_name = $_FILES['f1']['name'];
            $f1_type = $_FILES['f1']['type'];
            $f1_size = $_FILES['f1']['size'];
            $format = pathinfo($f1_name, PATHINFO_EXTENSION);

            //Cek Required Form
            if(empty($name) || empty($merk) || empty($type) || empty($size) || empty($location) || empty($rackCode) || empty($rackNum) || empty($stock)){
                $_SESSION['status'] = "error";
                $_SESSION['msg'] = "Form is required !";

                header('location:'.BASEURL.'/add-apd');
            }
            else {
                $fileName = ($f1 != null) ? date('YmdHis').'.'.$format : "-";

                if($fileName != "-"){
                    move_uploaded_file($f1,'../uploads/coveralls/'.$fileName);
                }

                $saveData->saveDataCoveralls($name, strtoupper($merk), $type, $size, $stock, $location, $rackCode, $rackNum, $fileName, $createdAt, $updatedAt);

                $_SESSION['status'] = "success";
                $_SESSION['msg'] = "Data has been saved";

                header('location:'.BASEURL.'/add-coveralls');
            }

        }
        else {
            header('location:'.BASEURL.'/list-coveralls');
        }
    }

    //Update Data APD