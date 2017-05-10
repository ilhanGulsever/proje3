<?php
include './presentationlayer/ust.php';
include './presentationlayer/menu.php';

require_once("/logiclayer/CategoryManager.php");

$categoriList = CategoryManager::getAllCategory();

$mod = getGET("mod");
$id = getGET("id");
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <?php
                if ($mod == "") {
                    include_once './presentationlayer/category/list.php';
                } else if ($mod == "insert") {
                    include_once './presentationlayer/category/insert.php';
                } else if ($mod == "edit") {
                    include_once './presentationlayer/category/edit.php';
                } else if ($mod == "proper") {
                    include_once './presentationlayer/category/properties.php';
                } else if ($mod == "delete") {
                    CategoryManager::delCategory($id);
                    header("Location: category.php");
                } else {
                    include_once './presentationlayer/category/list.php';
                }
                ?>

            </div>
        </div>

    </div>

</div>


<?php
include './presentationlayer/alt.php';
?>