<?php
$messageError = "";
$messageSucess = "";

if (existPOST("editCat")) {
    $ad = getPOST("name");
    if ($ad == "") {
        $messageError = "Please type the category name!";
    } else {

        $cevap = CategoryManager::editCategory($id, $ad);
        if ($cevap) {
            $messageSucess = "Action sucessful";
        } else {
            $hataMesaj = "Action failed!";
        }
    }
}

$category = new Category();

$category = CategoryManager::getCategory($id);
?>
<form method="post" action="" style="margin-top: 20px;">
    <div class='panel panel-default'>
        <div class='panel-heading'>
            <h3 class='box-title'>Category Edit</h3>
        </div>
        <div class='panel-body'>
            <div class="form-group">
                <label>Category Name</label>
                <input type="text" value="<?php echo $category->getName(); ?>" name="name" class="form-control" />
            </div>

            <?php if ($messageError != "") { ?>
                <div class="form-group">
                    <div class="alert alert-danger mesajilhan">
                        <?php echo $messageError ?>
                    </div>
                </div>
            <?php } ?>

            <?php if ($messageSucess != "") { ?>
                <div class="form-group">
                    <div class="alert alert-success mesajilhan">
                        <?php echo $messageSucess ?>
                    </div>
                </div>
            <?php } ?>

        </div>
        <div class='panel-footer'>
            <button type="submit" name="editCat" class="btn btn-primary btn-md"><i class="fa fa-save"></i> Save</button>
            <a href="category.php" class="btn btn-md btn-danger"><i class="fa fa-times"></i> Cancel</a>
        </div>
    </div>  
</form>