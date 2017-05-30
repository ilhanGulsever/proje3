<?php

require_once(realpath(".") . "/logiclayer/CategoryManager.php");
require_once(realpath(".") . "/logiclayer/CategoryProperties.php");
require_once(realpath(".") . "/logiclayer/ProductTempManager.php");



$orderId=$_GET["orderId"];

  if (isset($orderId)) {
      
      $getFile = file_get_contents("http://www.bilisimarsivi.com/shopping/view/webservice/store.php?CustomerID=".$orderId);

  }

?>