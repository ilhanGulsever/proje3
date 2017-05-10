<?php

class User {

    private $id;
    private $name;
    private $password;

    function __construct($id = NULL, $name = NULL, $password = NULL) {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
    }

    public function getID() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPassword() {
        return $this->password;
    }

}

?>