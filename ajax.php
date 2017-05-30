<?php

include_once 'methods.php';

$tur = getGET("tur");
require_once(realpath(".") . "/logiclayer/ProductTempManager.php");


if ($tur == "moneycontrol") {

    $stock = getPOST("stock");
    $purchasePrice = getPOST("pricePurchase");


    $money = ($purchasePrice * $stock);

    $myMoney = ProductTempManager::getCash();
    $x = $myMoney[0]->getCash();

    if ($money > $x) {
        echo "false| Insufficient balance";
        exit();
    }
    echo "true|asdasd";
}
?>





