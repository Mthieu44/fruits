<?php
class FruitHistoEntity
{   
    public int $id_commande;
    public int $id_fruit;
    public string $nom;
    public string $prix;
	public string $image;
    public string $quantity;


	public function __construct($id_commande,$id_fruit,$nom,$prix,$image,$quantity){
        $this->id_commande = $id_commande;
        $this->id_fruit = $id_fruit;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->image = $image;
        $this->quantity = $quantity;
        
    }

}
