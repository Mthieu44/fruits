<?php

require_once APPPATH.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR."FruitEntity.php";


// Entity permettant de faire passer des éléments dans les tableaux de session fauxPanier et panier
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
