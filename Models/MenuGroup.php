<?php

class MenuGroup{
    public $ID;
    public $MenuID;
    public $Name;
    public $OrderIndex; 
    public $MenuItems;

    public function __construct($id, $menuid, $name, $orderindex, $menuitems = array()){
        $this->ID = $id;
        $this->MenuID = $menuid;
        $this->Name = $name;
        $this->OrderIndex = $orderindex;
        $this->MenuItems = $menuitems;
    }

    public function addMenuItem($menuitem){
        array_push($this->MenuItems, $menuitem);
    }
}