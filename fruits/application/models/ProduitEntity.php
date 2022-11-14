<?php

class ProduitEntity{

    public int $id_fruits;
    public int $quantity;

    public function __construct($id_fruits, $quantity){
        $this->id_fruits = $id_fruits;
        $this->quantity = $quantity;
    }

}

?>