<?php

require_once APPPATH.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR."FruitEntity.php";

class ProduitEntity{

    public FruitEntity $fruits;
    public int $quantity;

    public function __construct($fruits, $quantity){
        $this->fruits = $fruits;
        $this->quantity = $quantity;
    }

}

?>