<?php
    require_once "dataBase.php";
    
    class cekData extends dataBase {

        //Cek Data
        public function cekLogin($username, $password, $level){
            $cekUser = mysqli_query($this->koneksi, "SELECT * FROM _tb_user_login WHERE _username = '$username' AND _password = '$password' AND _level = '$level'");
			$cek = mysqli_num_rows($cekUser);
			if($cek > 0){
				return true;
			}

			return false;
        }

        //Cek Data 0 Clause
        public function cekDataAll($tabel){
            $cekData = mysqli_query($this->koneksi,"SELECT * FROM $tabel");
			$cekJumlah = mysqli_num_rows($cekData);
			
			return $cekJumlah;
        }

        //Cek Data 1 Clause
        public function cekDataFr($tabel, $colfr, $datafr){
            $cekData = mysqli_query($this->koneksi,"SELECT * FROM $tabel WHERE $colfr = '$datafr'");
			$cekJumlah = mysqli_num_rows($cekData);
			
			return $cekJumlah;
        }

        //Cek Data 2 Clause
        public function cekDataSc($tabel, $colfr, $colsc, $datafr, $datasc){
            $cekData = mysqli_query($this->koneksi,"SELECT * FROM $tabel WHERE $colfr = '$datafr' AND $colsc = '$datasc'");
			$cekJumlah = mysqli_num_rows($cekData);
			
			return $cekJumlah;
        }



    }