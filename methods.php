<?php

/**
 * @author ilhan
 */

session_start();
ob_start();

function getGET($paramname ) {
    $veri = $defaultvalue="";
    $isRemove = false;
    if (isset($_GET[$paramname])) {

        $veri = $_GET[$paramname];
        if (is_array($veri)) {
            return $veri;
        } else {
            $veri = trim($veri);
        }
        if ($isRemove == true) {
            removeGET($paramname);
        }
    }
    return $veri;
}

function getPOST($paramname, $defaultvalue = "", $isRemove = false) {
    $veri = $defaultvalue;
    if (isset($_POST[$paramname])) {
        $veri = $_POST[$paramname];
        if (is_array($veri)) {
            return $veri;
        } else {
            $veri = str_replace("'", "&#39;", trim($veri));
        }
        if ($isRemove == true) {
            removePOST($paramname);
        }
    }
    return $veri;
}

function removePOST($paramname) {
    if (isset($_POST[$paramname])) {
        unset($_POST[$paramname]);
    }
}

function existPOST($paramname) {
    $veri = false;
    if (isset($_POST[$paramname])) {
        $veri = true;
    }
    return $veri;
}

function removeGET($paramname) {
    if (isset($_GET[$paramname])) {
        unset($_GET[$paramname]);
    }
}

function getSESSION($paramname) {
    $veri = $default="";
    $isRemove = false;
    if (isset($_SESSION[$paramname])) {
        $veri = trim($_SESSION[$paramname]);
        if ($isRemove == true) {
            removeSESSION($paramname);
        }
    }
    return $veri;
}

function setSESSION($paramname, $value) {
    $_SESSION[$paramname] = trim($value);
}

function removeSESSION($paramname) {
    if (isset($_SESSION[$paramname])) {
        unset($_SESSION[$paramname]);
    }
}

function sessionDestroy() {
    //if(!isset($_SESSION)){session_start();}  
    session_destroy();
}

?>