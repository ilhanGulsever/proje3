<?php

require_once(realpath(".") . "/logiclayer/CategoryManager.php");
require_once(realpath(".") . "/logiclayer/CategoryProperties.php");

$categoriList = CategoryManager::getAllCategory();
$array = array();
for ($i = 0; $i < count($categoriList); $i++) {

    array_push($array, array($categoriList[$i]->getId(), $categoriList[$i]->getName()));
}
echo json_encode(array('Categories' => $array));
?>