<?php
    if(!isset($_SESSION['status-login']) || $_SESSION['level'] != "administrator"){ 
        header('location:'.BASEURL.'/logout');
    }
?>
<div class="container-form">
    <?php
        if(isset($_SESSION['status']) && isset($_SESSION['msg'])){ ?>
            <div class="notification" style="background-color: <?= ($_SESSION['status'] == "success") ? 'rgba(168, 243, 190, 0.4)' : 'rgba(242, 151, 169, 0.67)' ; ?>">
                <?= $_SESSION['msg']; ?>
            </div>
  <?php }
        unset($_SESSION['status']);
        unset($_SESSION['msg']);
    ?>
    <a href="<?= BASEURL; ?>/list-apd" class="btn-close">X</a>
    <h5>Form Add APD</h5>

    <form action="<?= BASEURL; ?>/save-data-new-apd" method="POST" enctype="multipart/form-data">
        <div>
            <label for="code">Code APD </label><span>*</span>
            <input type="text" name="code" id="code" placeholder="Type Code APD" required>
        </div>
        <div>
            <label for="name">Name APD </label><span>*</span>
            <input type="text" name="name" id="name" placeholder="Type Name APD" required>
        </div>
        <div>
            <label for="category">Category </label><span>*</span>
            <select name="category" id="category" required>
                <option value="" selected>- Select Category -</option>
                <?php
                    if($cekData->cekDataAll('_tb_category_apd') > 0){
                        foreach ($getData->getDataAll('_tb_category_apd','_id') as $row){ ?>
                            <option value="<?= $row['_id']; ?>"><?= $row['_category']; ?></option>
                 <?php  }
                    }
                    else { ?>
                        <option value="">Data not found ! </option>
              <?php }
                ?>
            </select>
        </div>
        <div>
            <label for="location">Location APD </label><span>*</span>
            <input type="text" name="location" id="location" value="HSSE Firestation Bunyu Field" placeholder="Type Location APD" required>
        </div>
        <div>
            <label for="rack-code">Rack Code </label><span>*</span>
            <select name="rack-code" id="rack-code" required>
                <option value="" selected>- Select Rack Code -</option>
                <?php
                    if($cekData->cekDataAll('_tb_rack') > 0){
                        foreach ($getData->getDataAll('_tb_rack','_id') as $row){ ?>
                            <option value="<?= $row['_id']; ?>"><?= $row['_code_rack']; ?></option>
                 <?php  }
                    }
                    else { ?>
                        <option value="">Data not found ! </option>
              <?php }
                ?>
            </select>
        </div>
        <div>
            <label for="rack-num">Detail Rack Number </label><span>*</span>
            <input type="number" name="rack-num" id="rack-num" placeholder="Type Detail Rack Number" required>
        </div>
        <div>
            <label for="stock">Stock </label><span>*</span>
            <input type="number" name="stock" id="stock" placeholder="Type Stock APD" required>
        </div>
        <div>
            <label for="expired">Expired Date </label><span>*</span>
            <input type="date" name="expired" id="expired" required>
        </div>
        <div>
            <label for="f1">Photo APD </label><span>*</span><br><br>
            <input type="file" name="f1" id="f1" accept="image/*">
        </div>
        <div>
            <input type="submit" name="submit" class="btn-save" value="Save">
        </div>
    </form>
</div>