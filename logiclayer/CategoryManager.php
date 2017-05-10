<?php

require_once("datalayer/DB.php");
require_once("Category.php");
require_once("CategoryProperties.php");

class CategoryManager {

    public static function getAllCategory() {
        $db = new DB();
        $result = $db->getDataTable("select cat_id,cat_name from category order by cat_id");
        $allCategory = array();

        while ($row = $result->fetch_assoc()) {
            $category = new Category($row["cat_id"], $row["cat_name"]);
            array_push($allCategory, $category);
        }

        return $allCategory;
    }

    public static function addCategory($ad) {
        $db = new DB();
        $result = $db->executeQuery("INSERT INTO category (cat_name) VALUES ('$ad')");
        return $result;
    }

    public static function editCategory($id, $name) {
        $db = new DB();
        $result = $db->executeQuery("update category SET cat_name='" . $name . "' where cat_id=" . $id . "");
        return $result;
    }

    public static function delCategory($id) {
        $db = new DB();
        $result = $db->executeQuery("delete from category where cat_id=" . $id . "");
        return $result;
    }

    public static function getCategory($id) {
        $db = new DB();
        $result = $db->getDataTable("select * from category where cat_id=" . $id . "");

        if (mysqli_num_rows($result) > 0) {
            $array = array();
            while ($row = $result->fetch_assoc()) {
                $cat = new Category($row["cat_id"], $row["cat_name"]);
                array_push($array, $cat);
            }
            return $array[0];
        } else {
            return false;
        }
    }

    /** Kategori Properties Metotları * */
    public static function getCategoryPropertiesList($catId) {

        $db = new DB();
        $result = $db->getDataTable("select * from cat_properties where cat_id=" . $catId . "");
        $array = array();

        while ($row = $result->fetch_assoc()) {
            $propertie = new CategoryProperties($row["cat_id"], $row["properties"]);
            array_push($array, $propertie);
        }

        return $array;
    }
     public static function getAllCategoryPropertiesList() {

        $db = new DB();
        $result = $db->getDataTable("select * from cat_properties");
        $array = array();

        while ($row = $result->fetch_assoc()) {
            $propertie = new CategoryProperties($row["cat_id"], $row["properties"]);
            array_push($array, $propertie);
        }

        return $array;
    }

    public static function addCategoryProperties($catId, $properties) {
        $db = new DB();
        $result = $db->executeQuery("INSERT INTO cat_properties (cat_id,properties) VALUES ('$catId','$properties')");
        return $result;
    }

    public static function delCategoryProperties($catId) {
        $db = new DB();
        $result = $db->executeQuery("delete from cat_properties where cat_id=" . $catId . "");
        return $result;
    }

}
