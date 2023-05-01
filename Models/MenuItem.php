<?php

class MenuItem {
    var $id;
    var $name;
    var $price;
    var $description;
    var $image;
    var $isAvailable;
    var $orderIndex;
    var $menuGroupID;

    function __construct($id, $name, $price, $description, $image, $isAvailable, $orderIndex, $menuGroupID) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
        $this->isAvailable = $isAvailable;
        $this->orderIndex = $orderIndex;
        $this->menuGroupID = $menuGroupID;
    }
}