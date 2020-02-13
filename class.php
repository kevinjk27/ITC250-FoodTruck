<?php

    //item class & constructor
class Item {
    public $name='';
    public $id;
    public $description='';
    public $price=0.00;
    public $quantity=0;

    public function __construct($id, $iname, $iprice, $idesc) {
        $this->id = $id;
        $this->name = $iname;
        $this->description = $idesc;
        $this->price = $iprice;

    } #end Item constructor
}#end Item class

 ?>
