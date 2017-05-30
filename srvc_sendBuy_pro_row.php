<?php

require_once(realpath(".") . "/logiclayer/CategoryManager.php");
require_once(realpath(".") . "/logiclayer/CategoryProperties.php");
require_once(realpath(".") . "/logiclayer/ProductTempManager.php");

//catID
$productID=$_GET["productID"];
$product = ProductTempManager::getProductInfo($productID);


$category= CategoryManager::getCategory($product[0]->getCat_id());

$json_product=array(
    "productID"=>$product[0]->getProduct_no(),
    "title"=>$product[0]->getName(),
    "image"=>$product[0]->getImage(),
    "price"=>$product[0]->getSell(),
    "catID"=>$category->getId(),
    "category"=>$category->getName()
);



$array = array("product"=>$json_product);

echo json_encode($array);
?>