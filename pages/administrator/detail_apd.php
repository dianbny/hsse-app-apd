<?php
    if(!isset($_SESSION['status-login']) || $_SESSION['level'] != "administrator"){ 
        header('location:'.BASEURL.'/logout');
    }

    $id = addslashes($_GET['id']);

    $detailAPD = $getData->getDataFr('_tb_item_apd', '_id', $id);
?>
<div class="container-detail">
    <a href="<?= BASEURL; ?>/list-apd" class="btn-close">X</a>

    <div>
        <div class="image">
            <img src="<?= BASEURL; ?>/uploads/foto/<?= $detailAPD['_foto_apd']; ?>" alt="">
            <a href="" class="link-edit-delete" style="background-color:#FF4500;"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp; Update</a>
            <a href="" class="link-edit-delete" style="background-color:#800000;"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
        </div>
        <div class="detail">
            <span>Detail APD </span><br>
            <table class="table-detail">
                <tr>
                    <td>Code APD</td>
                    <td>:</td>
                    <td><b><?= $detailAPD['_kode_apd']; ?></b></td>
                </tr>
                <tr>
                    <td>Name APD</td>
                    <td>:</td>
                    <td><b><?= $detailAPD['_nama_apd']; ?></b></td>
                </tr>
                <tr>
                    <td>Category APD</td>
                    <td>:</td>
                    <td>
                        <b>
                            <?php
                                $kategori = $getData->getDataFr('_tb_category_apd', '_id', $detailAPD['_category']);
                                echo $kategori['_category'];
                            ?>
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>Location APD</td>
                    <td>:</td>
                    <td><b><?= $detailAPD['_lokasi_apd']; ?></b></td>
                </tr>
                <tr>
                    <td>Detail Rack</td>
                    <td>:</td>
                    <td>
                        <b>
                            <?php
                                $rak = $getData->getDataFr('_tb_rack', '_id', $detailAPD['_rack']);
                                echo $rak['_code_rack'].'.'.$detailAPD['_detail_rack_num'];
                            ?>
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>Stock APD</td>
                    <td>:</td>
                    <td><b><?= $detailAPD['_stok_apd']; ?></b></td>
                </tr>
                <tr>
                    <td>Expired Date</td>
                    <td>:</td>
                    <td><b><?= $detailAPD['_tgl_expired']; ?></b></td>
                </tr>
            </table>    
            <br>
        </div>
    </div>
</div>