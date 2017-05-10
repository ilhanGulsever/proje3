<?php
$mesajError = "";
$mesajSucess = "";

if (existPOST("addCat")) {
    $ad = getPOST("ad");
    if ($ad == "") {
        $mesajError = "Please type the category name!";
    } else {

        $cevap = CategoryManager::addCategory($ad);
        if ($cevap) {
            $mesajSucess = "Action sucessful.";
        } else {
            $hataMesaj = "Action failed!";
        }
    }
}
?>
<form method="post" action="" style="margin-top: 20px;">
    <div class='panel panel-default'>
        <div class='panel-heading'>
            <h3 class='box-title'>Add Category</h3>
        </div>
        <div class='panel-body'>
            <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="ad" class="form-control" />
            </div>

            <?php if ($mesajError != "") { ?>
                <div class="form-group">
                    <div class="alert alert-danger mesajilhan">
                        <?php echo $mesajError ?>
                    </div>
                </div>
            <?php } ?>

            <?php if ($mesajSucess != "") { ?>
                <div class="form-group">
                    <div class="alert alert-success mesajilhan">
                        <?php echo $mesajSucess ?>
                    </div>
                </div>
            <?php } ?>

        </div>
        <div class='panel-footer'>
            <button type="submit" name="addCat" class="btn btn-primary btn-md"><i class="fa fa-save"></i> Save</button>
            <a href="category.php" class="btn btn-md btn-danger"><i class="fa fa-times"></i>Cancel</a>
        </div>
    </div>  
</form>