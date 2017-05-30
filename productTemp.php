<?php
include './presentationlayer/ust.php';
include './presentationlayer/menu.php';

require_once(realpath(".") . "/logiclayer/CategoryManager.php");
require_once(realpath(".") . "/logiclayer/ProductTempManager.php");

$categoriList = CategoryManager::getAllCategory();

$propertiesList = ProductTempManager::getAllProductValues();
$productList = ProductTempManager::getAllProduct();

$mod = getGET("mod");
$id = getGET("id");
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <?php
                if ($mod == "") {
                    include_once './presentationlayer/product/list.php';
                } else if ($mod == "insert") {
                    include_once './presentationlayer/product/insert.php';
                } else if ($mod == "edit") {
                    include_once './presentationlayer/product/edit.php';
                } else if ($mod == "proper") {
                    include_once './presentationlayer/category/properties.php';
                } else if ($mod == "details") {
                    include_once './presentationlayer/product/details.php';
                } else if ($mod == "service") {
                    $getFile = file_get_contents("http://www.bilisimarsivi.com/store/Services/srvc_saveProduct.php?productNO=" . $id);
                    sleep(1);
                    ProductTempManager::setCash($id);
                   

                    header("Location: productTemp.php");
                } else if ($mod == "delete") {
                    ProductTempManager::delProductTemp($id);
                    header("Location: productTemp.php");
                } else if ($mod == "moneycontrol") {


                 
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