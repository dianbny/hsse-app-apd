<?php
    if(!isset($_SESSION['status-login']) || $_SESSION['level'] != "administrator"){ 
        header('location:'.BASEURL.'/logout');
    }

    $_SESSION['tab-content'] = "1";
?>
<div class="title-page">
    <img src="<?= BASEURL; ?>/assets/img/shoes.png" alt="">Safety Shoes
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
        <h5>List APD HSSE Bunyu Field</h5>
        <div>
            <a href="<?= BASEURL; ?>/add-apd" class="link-crud" style="background-color:#008000;"><i class="fa fa-plus" aria-hidden="true"></i></a>
            <a href="" class="link-crud" style="background-color:#FF4500;"><i class="fa fa-refresh" aria-hidden="true"></i></a>
           
        </div>
    </div>
    <div class="table-layout">
        <table class="table-style">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Code APD</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Location APD</th>
                    <th>Detail Rack Num.</th>
                    <th>Stock</th>
                    <th>Expired Date</th>
                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($cekData->cekDataAll('_tb_item_apd') > 0){
                        $no = 1; 
                        foreach($getData->getDataAll('_tb_item_apd','_id') as $row){ ?>
                            <tr>
                                <td><?= $no++.'.'; ?></td>
                                <td><?= $row['_kode_apd']; ?></td>
                                <td><?= $row['_nama_apd']; ?></td>
                                <td>
                                    <?php
                                        $kategori = $getData->getDataFr('_tb_category_apd', '_id', $row['_category']);
                                        echo $kategori['_category'];
                                    ?>
                                </td>
                                <td><?= $row['_lokasi_apd']; ?></td>
                                <td>
                                    <?php
                                        $rak = $getData->getDataFr('_tb_rack', '_id', $row['_rack']);
                                        echo $rak['_code_rack'].'.'.$row['_detail_rack_num'];
                                    ?>
                                </td>
                                <td><?= $row['_stok_apd']; ?></td>
                                <td><?= $row['_tgl_expired']; ?></td>
                                <td style="text-align:center;"><a href="<?= BASEURL; ?>/detail-apd/<?= $row['_id']; ?>" class="link-edit-detail" style="background-color:#FF4500;"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>
                        
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