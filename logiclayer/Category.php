<?php

/**
 * author ilhan
 */
class Category {

    private $id;
    private $name;

    function __construct($id = NULL, $name = NULL) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

}
