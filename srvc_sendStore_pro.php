<?php

require_once(realpath(".") . "/logiclayer/CategoryManager.php");
require_once(realpath(".") . "/logiclayer/CategoryProperties.php");
require_once(realpath(".") . "/logiclayer/ProductTempManager.php");


$productNo =$_GET["productNO"];




$product = ProductTempManager::getIdProduct($productNo);
$properties = ProductTempManager::getAllProductTempValue($product[0]->getValue_id()); // bu properties name




$propertList = array();

for ($i = 0; $i < count($properties); $i++) {
    $proName= ProductTempManager::getIdProperties($properties[$i]->getProperties_id());
    array_push($propertList, array($proName[0]->getProperties(), $properties[$i]->getValue()));
}

$productJSON = array("product" => array(
        "id" => $product[0]->getProduct_no(),
        "name" => $product[0]->getProduct_name(),
        "quantity" => $product[0]->getStock(),
        "properties" => $propertList
    )
);


header('Content-type: application/json');
echo json_encode($productJSON);


?>