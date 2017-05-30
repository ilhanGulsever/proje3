<?php

require_once(realpath(".") . "/logiclayer/CategoryManager.php");
require_once(realpath(".") . "/logiclayer/CategoryProperties.php");
require_once(realpath(".") . "/logiclayer/ProductTempManager.php");

//catID
$limit=$_GET["limit"];
$products = ProductTempManager::getAllProductInfo($limit);


$deneme=array();

for($i=0;$i<count($products);$i++){
    
    $category= CategoryManager::getCategory($products[$i]->getCat_id());
    array_push($deneme,array($products[$i]->getProduct_no(),$products[$i]->getName(),$products[$i]->getImage(),$products[$i]->getSell(),$category->getId() ,$category->getName()   )         );
}

$array = array(
  
    "products"=>$deneme
);

echo json_encode($array);
?>