<?php
    if(!isset($_SESSION['status-login']) || $_SESSION['level'] != "administrator"){ 
        header('location:'.BASEURL.'/logout');
    }

    $_SESSION['tab-content'] = "1";
?>
<div class="title-page">
    <img src="<?= BASEURL; ?>/assets/img/view-list.png" alt="">List APD
</div>
<div class="container-nd">

    <h5>List APD HSSE Bunyu Field</h5>

    <div class="tab">
        <div>
            <a href="#" class="link-tab active" data-id="1">Coveralls</a>
        </div>
        <div>
            <a href="#" class="link-tab" data-id="2">Safety Shoes</a>
        </div>
        <div>
            <a href="#" class="link-tab" data-id="3">Safety Helmet</a>
        </div>
        <div>
            <a href="#" class="link-tab" data-id="4">Safety Goggles</a>
        </div>
        <div>
            <a href="#" class="link-tab" data-id="5">Safety Gloves</a>
        </div>
    </div>

    <!-- Content Tab 1 -->
    <div class="tab-content active" data-content="1">
        <select name="" id="" class="select-filter">
            <option value="" selected>- Filter -</option>
            <option value="">In Store</option>
            <option value="">In Use</option>
        </select>

        <input type="text" placeholder="Search by Filter">

        <button type="button" id="search" class="button-search">Search</button>
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
    <!-- Akhir Content Tab 1 -->

    <!-- Content Tab 2 -->
    <div class="tab-content" data-content="2">
        2
    </div>
    <!-- Akhir Content Tab 2 -->

    <!-- Content Tab 3 -->
    <div class="tab-content" data-content="3">
        3
    </div>
    <!-- Akhir Content Tab 3 -->

    <!-- Content Tab 4 -->
    <div class="tab-content" data-content="4">
        4
    </div>
    <!-- Akhir Content Tab 4 -->

    <!-- Content Tab 5 -->
    <div class="tab-content" data-content="5">
        5
    </div>
    <!-- Akhir Content Tab 5 -->
</div>