<?php

require_once(realpath(".") . "/logiclayer/CategoryManager.php");
require_once(realpath(".") . "/logiclayer/CategoryProperties.php");
require_once(realpath(".") . "/logiclayer/ProductTempManager.php");

//catID
$catID=$_GET["catID"];
$products = ProductTempManager::getCategoryProducts($catID);
$category= CategoryManager::getCategory($catID);

$deneme=array();

for($i=0;$i<count($products);$i++){
    array_push($deneme, array($products[$i]->getProduct_no(),$products[$i]->getName(),$products[$i]->getImage(),$products[$i]->getSell()));
}

$array = array(
    "category"=>$category->getName(),
    "products"=>$deneme
);

echo json_encode(array('catProduct' => $array));
?>