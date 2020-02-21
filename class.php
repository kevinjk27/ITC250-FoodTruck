<?php

    //item class & constructor
class Item {
    public $name='';
    public $id;
    public $description='';
    public $price=0.00;
    // public $quantity=0;
    public $toppings=array();


    //the constructor is the order is set up here..
    public function __construct($id, $iname, $iprice, $idesc) {
        $this->id = $id;
        $this->name = $iname;
        $this->description = $idesc;
        $this->price = $iprice;

    } #end Item constructor

    public function addtoppings($topping){
        $this->toppings[]=$topping;

    }
}#end Item class