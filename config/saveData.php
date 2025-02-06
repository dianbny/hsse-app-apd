<?php
    require_once "dataBase.php";
    
    class saveData extends dataBase {
        
        //Save Data New User
        public function saveDataUser($email, $username, $password, $level, $createdAt, $updatedAt){
            mysqli_query($this->koneksi,"INSERT INTO _tb_user_login (_email, _username, _password, _level, _created_at, _updated_at) VALUES ('$email','$username','$password','$level','$createdAt', '$updatedAt')");
        }

        //Save Data New APD
        public function saveDataCoveralls($name, $merk, $type, $size, $stock, $location, $rack, $rackNum, $photo, $createdAt, $updatedAt){
            mysqli_query($this->koneksi,"INSERT INTO _tb_coveralls (_nama, _merk, _jenis, _ukuran, _stok, _lokasi_apd, _rack, _detail_rack_num, _foto, _created_at, _updated_at) VALUES ('$name','$merk','$type','$size','$stock','$location','$rack','$rackNum','$photo','$createdAt', '$updatedAt')");
        }


    }