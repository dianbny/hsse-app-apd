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
    <a href="<?= BASEURL; ?>/list-coveralls" class="btn-close">X</a>
    <h5>Form Add Coveralls</h5>

    <form action="<?= BASEURL; ?>/save-data-new-coveralls" method="POST" enctype="multipart/form-data">
        <div>
            <label for="name">Name APD </label><span>*</span>
            <input type="text" name="name" id="name" placeholder="Type Name APD" required>
        </div>
        <div>
            <label for="merk">Merk </label><span>*</span>
            <input type="text" name="merk" id="merk" placeholder="Type Merk APD" required>
        </div>
        <div>
            <label for="type">Type </label><span>*</span>
            <select name="type" id="type" required>
                <option value="" selected>- Select Type -</option>
                <option value="Coveralls Flame Resistant">Coveralls Flame Resistant</option>
                <option value="Coveralls Worker">Coveralls Worker</option>
                <option value="Coveralls Non-Woven">Coveralls Non-Woven</option>
                <option value="Coveralls Tahan Kimia">Coveralls Tahan Kimia</option>
                <option value="Coveralls Isolasi">Coveralls Isolasi</option>
            </select>
        </div>
        <div>
            <label for="size">Size </label><span>*</span>
            <select name="size" id="size" required>
                <option value="" selected>- Select Size -</option>
                <option value="M">Size M</option>
                <option value="L">Size L</option>
                <option value="XL">Size XL</option>
                <option value="XXL">Size XXL</option>
            </select>
        </div>
        <div>
            <label for="stock">Stock </label><span>*</span>
            <input type="number" name="stock" id="stock" placeholder="Type Stock APD" required>
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
            <label for="f1">Photo APD </label><span>*</span><br><br>
            <input type="file" name="f1" id="f1" accept="image/*">
        </div>
        <div>
            <input type="submit" name="submit" class="btn-save" value="Save">
        </div>
    </form>
</div>