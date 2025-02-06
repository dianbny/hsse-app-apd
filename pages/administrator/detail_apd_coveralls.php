<?php
    if(!isset($_SESSION['status-login']) || $_SESSION['level'] != "administrator"){ 
        header('location:'.BASEURL.'/logout');
    }

    $id = addslashes($_GET['id']);

    $detailAPD = $getData->getDataFr('_tb_coveralls', '_id', $id);
?>
<div class="container-detail">
    <a href="<?= BASEURL; ?>/list-coveralls" class="btn-close">X</a>

    <div>
        <div class="image">
            <img src="<?= BASEURL; ?>/uploads/coveralls/<?= $detailAPD['_foto']; ?>" alt="">
            <a href="" class="link-edit-delete" style="background-color:#FF4500;"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp; Update</a>
            <a href="" class="link-edit-delete" style="background-color:#800000;"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
        </div>
        <div class="detail">
            <span>Detail Coveralls </span><br>
            <table class="table-detail">
                <tr>
                    <td>Name APD</td>
                    <td>:</td>
                    <td><b><?= $detailAPD['_nama']; ?></b></td>
                </tr>
                <tr>
                    <td>Merk</td>
                    <td>:</td>
                    <td><b><?= $detailAPD['_merk']; ?></b></td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>:</td>
                    <td><b><?= $detailAPD['_jenis']; ?></b></td>
                </tr>
                <tr>
                    <td>Size</td>
                    <td>:</td>
                    <td><b><?= $detailAPD['_ukuran']; ?></b></td>
                </tr>
                <tr>
                    <td>Stock APD</td>
                    <td>:</td>
                    <td><b><?= $detailAPD['_stok']; ?></b></td>
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
                    <td>Created At</td>
                    <td>:</td>
                    <td><b><?= $detailAPD['_created_at']; ?></b></td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>:</td>
                    <td><b><?= $detailAPD['_updated_at']; ?></b></td>
                </tr>
            </table>    
            <br>
        </div>
    </div>
</div>