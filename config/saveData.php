<?php
    require_once "dataBase.php";
    
    class saveData extends dataBase {
        
        //Save Data New User
        public function saveDataUser($email, $username, $password, $level, $createdAt, $updatedAt){
            mysqli_query($this->koneksi,"INSERT INTO _tb_user_login (_email, _username, _password, _level, _created_at, _updated_at) VALUES ('$email','$username','$password','$level','$createdAt', '$updatedAt')");
        }

        //Save Data New APD
        public function saveDataAPD($code, $name, $category, $location, $rack, $rackNum, $stock, $expired, $photo, $createdAt, $updatedAt){
            mysqli_query($this->koneksi,"INSERT INTO _tb_item_apd (_kode_apd, _nama_apd, _category, _lokasi_apd, _rack, _detail_rack_num, _stok_apd, _tgl_expired, _foto_apd, _created_at, _updated_at) VALUES ('$code','$name','$category','$location','$rack','$rackNum','$stock','$expired','$photo','$createdAt', '$updatedAt')");
        }


    }