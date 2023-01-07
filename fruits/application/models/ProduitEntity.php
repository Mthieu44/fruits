<?php

require_once APPPATH.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR."FruitEntity.php";

class ProduitEntity
{
    public int $id;
    public int $quantity;

    public function __construct($id, $quantity)
    {
        $this->id = $id;
        $this->quantity = $quantity;
    }
}
