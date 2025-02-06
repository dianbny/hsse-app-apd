<?php
    if(!isset($_SESSION['status-login']) || $_SESSION['level'] != "administrator"){ 
        header('location:'.BASEURL.'/logout');
    }
?>
<div class="title-page">
    <img src="<?= BASEURL; ?>/assets/img/coveralls.png" alt="">Coveralls
</div>
<div class="container-nd">
    <select name="" id="" class="select-filter">
        <option value="" selected>- Filter -</option>
        <option value="">In Store</option>
        <option value="">In Use</option>
    </select>

    <input type="text" placeholder="Search by Filter">

    <button type="button" id="search" class="button-search">Search</button>

    <div class="top">
        <h5>List Coveralls</h5>
        <div>
            <a href="<?= BASEURL; ?>/add-coveralls" class="link-crud" style="background-color:#008000;"><i class="fa fa-plus" aria-hidden="true"></i></a>
            <a href="<?= BASEURL; ?>/list-coveralls" class="link-crud" style="background-color:#FF4500;"><i class="fa fa-refresh" aria-hidden="true"></i></a>
           
        </div>
    </div>
    <div class="table-layout">
        <table class="table-style">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Merk</th>
                    <th>Type</th>
                    <th>Size</th>
                    <th>Stock</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($cekData->cekDataAll('_tb_coveralls') > 0){
                        $no = 1; 
                        foreach($getData->getDataAll('_tb_coveralls','_id') as $row){ ?>
                            <tr>
                                <td><?= $no++.'.'; ?></td>
                                <td><?= $row['_nama']; ?></td>
                                <td><?= $row['_merk']; ?></td>
                                <td><?= $row['_jenis']; ?></td>
                                <td><?= $row['_ukuran']; ?></td>
                                <td><?= $row['_stok']; ?></td>
                                <td><?= $row['_created_at']; ?></td>
                                <td><?= $row['_updated_at']; ?></td>
                                <td style="text-align:center;"><a href="<?= BASEURL; ?>/detail-coveralls/<?= $row['_id']; ?>" class="link-edit-detail" style="background-color:#FF4500;"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>
                        
                            </tr>
                  <?php }
                    }
                    else { ?>
                        <tr>
                            <td colspan="11" style="text-align:center;color:#FF0000;font-size:12px;">Data not found !</td>
                        </tr>
              <?php }
                ?>
            </tbody>
        </table>
    </div>
    
</div>