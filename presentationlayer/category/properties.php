<?php
$messageError = "";
$messageSucess = "";

if (existPOST("setproperties")) {
    $ad = getPOST("ad");
    CategoryManager::delCategoryProperties($id);

    if (!empty($ad)) {
        for ($i = 0; $i < count($ad); $i++) {
            if ($ad[$i] != "") {
                CategoryManager::addCategoryProperties($id, $ad[$i]);
            }
        }
    }

    $messageSucess = "Action sucessful";
}

$categoryProperties = CategoryManager::getCategoryPropertiesList($id);
?>
<form method="post" action="" style="margin-top: 20px">
    <div class='panel panel-default'>
        <div class='panel-heading'>
            Category Properties
        </div>
        <div class='panel-body'>

            <div class="properties">
                <?php
                if (count($categoryProperties) > 0) {
                    for ($i = 0; $i < count($categoryProperties); $i++) {
                        ?>

                        <div class="row" style="margin: 3px 0">
                            <div class="col-sm-11">
                                <input type="text" name="ad[]" value="<?php echo $categoryProperties[$i]->getProperties(); ?>" placeholder="properties..." class="form-control input-sm" />
                            </div>
                            <div class="col-sm-1">
                                <button type="button" class="btn btn-danger btn-xs delProperties"><i class="fa fa-times"></i></button>
                            </div>
                        </div>


                    <?php } ?>
                <?php } ?>
            </div>

            <div class="row" style="margin: 3px 0">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-sm btn-success ekleProperties"><i class="fa fa-plus"></i> New</button>
                </div>
            </div>


            <div class="row" style="margin: 3px 0">
                <div class="col-sm-12">
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
            </div>


        </div>
        <div class='panel-footer'>
            <button type="submit" name="setproperties" class="btn btn-primary btn-md">Save</button>
            <a href="category.php" class="btn btn-md btn-danger">Cancel</a>
        </div>
    </div>  
</form>
<script type="text/javascript">

    $(".ekleProperties").click(function () {
        var context = "";
        context += '<div class="row" style="margin: 3px 0"><div class="col-sm-11">';
        context += '<input type="text" name="ad[]" placeholder="properties..." class="form-control input-sm" />';
        context += '</div><div class="col-sm-1">';
        context += '  <button type="button" class="btn btn-danger btn-xs delProperties"><i class="fa fa-times"></i></button>';
        context += '</div></div>';
        $(".properties").append(context);
    });


    $(document).on("click", ".delProperties", function () {
        $(this).parent().parent().remove();
    });

</script>
