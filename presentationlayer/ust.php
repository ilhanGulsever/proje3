<?php
include_once 'methods.php';

$userid = getSESSION("userid");

if ($userid == "") {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
<title>SUPPLIER APP</title>
<link href="assest/css/bootstrap.css" rel="stylesheet" />
<link href="assest/css/metisMenu.css" rel="stylesheet" />
<link href="assest/css/style.css" rel="stylesheet" />
<link href="assest/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<script src="assest/js/jquery.js"></script>
</head>
<body>

<div id="wrapper">







