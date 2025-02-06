<?php
    error_reporting(0);
    
    //Require
    require_once "../config/const.php";
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

    //Save Process
    if($_GET['action'] == 'save-new-user'){

        //Jika Submit
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            session_start();

            $email = filterInput($_POST['email']);
            $username = filterInput($_POST['username']);
            $password = md5($_POST['password']);
            $createdAt = filterInput(date('Y-m-d H:i:s'));
            $updatedAt = filterInput(date('Y-m-d H:i:s'));

            //Cek Required Form
            if(empty($email) || empty($username || empty($password))){
                
                $_SESSION['status'] = "error";
                $_SESSION['msg'] = "Form is required !";

                header('location:'.BASEURL.'/registrasi');
            }
            else {

                //Cek Akun User Terdaftar
                if($cekData->cekDataSc('_tb_user_login', '_email', '_username', filterInput($_POST['email']), filterInput($_POST['username'])) < 1){

                    //Cek Format Email
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        
                        $saveData->saveDataUser($email, $username, $password, 'user', $createdAt, $updatedAt);
                        
                        $_SESSION['status'] = "success";
                        $_SESSION['msg'] = "Registration successful";

                        header('location:'.BASEURL.'/registrasi');
                    }
                    else {

                        $_SESSION['status'] = "error";
                        $_SESSION['msg'] = "Invalid email !";

                        header('location:'.BASEURL.'/registrasi');
                    }
                }
                else {

                    $_SESSION['status'] = "error";
                    $_SESSION['msg'] = "Email or username has been used !";

                    header('location:'.BASEURL.'/registrasi');
                }
            }

        }
        else {
            header('location:'.BASEURL.'/landing-page');
        }

    }

