<?php

include_once 'methods.php';


$type = getGET("type");

$userid = getSESSION("userid");

if ($userid == "") {
    include_once './presentationlayer/login.php';
} else {
    header("Location: main.php");
}


if ($type == "cikis") {
    removeSESSION("userid");
    header("Refresh:0; url=index.php");
}
?>