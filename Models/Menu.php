<?php

class Menu{
    public $ID;
    public $Name; 
    public $MenuGroups;

    public function __construct($id, $name, $menugroups = array()){
        $this->ID = $id;
        $this->Name = $name;
        $this->MenuGroups = $menugroups;
    }

    public function addMenuGroup($menugroup){
        array_push($this->MenuGroups, $menugroup);
    }
}