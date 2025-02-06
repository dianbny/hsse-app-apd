<?php
    require_once "dataBase.php";
    
    class getData extends dataBase {

		//Get Data 1 Clause
		function getDataFr($tabel, $colfr, $datafr){
			$data = mysqli_query($this->koneksi,"SELECT * FROM $tabel WHERE $colfr = '$datafr' AND _deleted_at IS NULL");
			$getData = mysqli_fetch_assoc($data);
			
			return $getData;
		}

        //Get Data All 0 Clause
        function getDataAll($table, $col){
			$dataAll = mysqli_query($this->koneksi,"SELECT * FROM $table WHERE _deleted_at IS NULL ORDER BY $col ASC");
			while($listDataAll = mysqli_fetch_assoc($dataAll)){
				$result[] = $listDataAll;
			}

			return $result;
		}

		//Get Sum Table
		function getSumData($table){
			$sumData = mysqli_query($this->koneksi,"SELECT SUM(_stok) AS stok FROM $table WHERE _deleted_at IS NULL");
			$getData = mysqli_fetch_assoc($sumData);
			
			return $getData;
		}


    }