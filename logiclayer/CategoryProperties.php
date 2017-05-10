<?php

/**
 * author ilhan
 */
class CategoryProperties {

    private $cat_id;
    private $properties;

    function __construct($cat_id = NULL, $properties = NULL) {
        $this->cat_id = $cat_id;
        $this->properties = $properties;
    }

    public function getCat_id() {
        return $this->cat_id;
    }

    public function getProperties() {
        return $this->properties;
    }

}
