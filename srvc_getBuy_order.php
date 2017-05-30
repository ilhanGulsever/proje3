<?php

require_once(realpath(".") . "/logiclayer/CategoryManager.php");
require_once(realpath(".") . "/logiclayer/CategoryProperties.php");
require_once(realpath(".") . "/logiclayer/ProductTempManager.php");
require_once(realpath(".") . "/logiclayer/CustomerTempManager.php");



$orderId = $_GET["orderID"];

if (isset($orderId)) {

    $getFile = file_get_contents("http://www.bilisimarsivi.com/shopping/webservice/order.php?orderID=" . $orderId);
    $json = json_decode($getFile);

    // $id = $json->products->id;
    $c_id = $json->Customer->ID;
    $c_name = $json->Customer->Name;
    $c_sname = $json->Customer->Surname;
    $c_tc = $json->Customer->identification;
    $c_phone = $json->Customer->Phone;



    $getCus = CustomerTempManager::getCustomer($c_id);


    if (!$getCus) {

        CustomerTempManager::addCustomer($c_id, $c_name, $c_sname, $c_phone, $c_tc);
    }
    for ($i = 0; $i < count($json->order->products); $i++) {

        $product_no = $json->order->products[$i]->productID;
        $amount = $json->order->products[$i]->amount;
        $price = $json->order->products[$i]->price;
        $total = $price * $amount;
        $date = $json->order->date;
        ProductTempManager::addProductSell($product_no, $amount, $total, $date, $c_id);
    }
}


//customerıd    name surname phone tc
?>