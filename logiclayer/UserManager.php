<?php

require_once("datalayer/DB.php");
require_once("User.php");

class UserManager {

    public static function userControl($name, $password) {

        $db = new DB();
        $result = $db->getDataTable("select * from user where name='" . $name . "' and password='" . $password . "'");
        if (mysqli_num_rows($result) > 0) {

            $userArray = array();
            while ($row = $result->fetch_assoc()) {
                $user = new User($row["id"], $row["name"], $row["password"]);
                array_push($userArray, $user);
            }
            return $userArray[0];
        } else {
            return false;
        }
    }

    public static function getUserList() {
        $db = new DB();
        $result = $db->getDataTable("select id,name,password from user order by id");

        $allUsers = array();

        while ($row = $result->fetch_assoc()) {
            $userObj = new User($row["id"], $row["name"], $row["password"]);
            array_push($allUsers, $userObj);
        }

        return $allUsers;
    }

    public static function insertUser($name, $password) {
        $db = new DB();
        $success = $db->executeQuery("INSERT INTO user(name, password) VALUES ('$name', '$password')");
        return $success;
    }

    public static function getUser($id) {
        $db = new DB();
        $result = $db->getDataTable("select * from user where id=" . $id . "");

        if (mysqli_num_rows($result) > 0) {
            $userArray = array();
            while ($row = $result->fetch_assoc()) {
                $user = new User($row["id"], $row["name"], $row["password"]);
                array_push($userArray, $user);
            }
            return $userArray[0];
        } else {
            return false;
        }
    }

    public static function editUser($id, $ad, $sifre) {
        $db = new DB();
        $sonuc = $db->executeQuery("update user SET name='" . $ad . "',password='" . $sifre . "' where id=" . $id . "");
        return $sonuc;
    }

    public static function deleteUser($id) {
        $db = new DB();
        $sonuc = $db->executeQuery("delete from user where id=" . $id . "");
        return $sonuc;
    }

}

?>