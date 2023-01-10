<?php

require_once APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "CategoryEntity.php";
require_once APPPATH . DIRECTORY_SEPARATOR . 'libraries' . DIRECTORY_SEPARATOR . "Prices.php";

global $calculator;
$calculator = PriceCalculatorFactory::createCalculator();

class FruitEntity
{
    public int $id_fruit;
    public string $nom;
    public string $prix;
    public string $description;
    public array $category = [];
    public string $origine;
    public string $image;

    public function __construct(
        $id_fruit,
        $nom,
        $prix,
        $description,
        $image,
        $origine,
        $category
    ) {
        $this->id_fruit = $id_fruit;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->description =$description;
        $this->origine = $origine;
        $this->category = $category;
        $this->image = $image;
    }
    /*Méthode qui permet d'ajouter une catégorie dans l'attribut category (un tableau)*/
    public function addCategory(int $idCategory, string $nom, string $description): void
    {
        $category = new CategoryEntity($idCategory,$nom,$description);
        array_push($this->category, $category);
    }
};


/*Class absraite pour design pattern Decorator*/
abstract class FruitDecorator extends FruitEntity
{
}

/*Classe qui va ajouter un attribut quantité au fruit utiliser dans notre boutique vueJS panier etc.*/
class FruitQuantity extends FruitDecorator
{
    public $quantity;

    public function __construct(FruitEntity $fruit, $quantity)
    {
        parent::__construct(
            $fruit->id_fruit,
            $fruit->nom,
            $GLOBALS['calculator']->calculatePrice($fruit->prix),
            $fruit->description,
            $fruit->image,
            $fruit->origine,
            $fruit->category
        );
        $this->quantity = $quantity;
    }
}

/*Classe qui va ajouter un attribut quantité et un attibut id_commande au fruit utiliser dans nos commandes (historique)*/
class FruitCommande extends FruitDecorator
{
    public $quantity;
    public $id_commande;

    public function __construct(FruitEntity $fruit, $quantity, $id_commande)
    {
        parent::__construct(
            $fruit->id_fruit,
            $fruit->nom,
            $GLOBALS['calculator']->calculatePrice($fruit->prix),
            $fruit->description,
            $fruit->image,
            $fruit->origine,
            $fruit->category
        );
        $this->quantity = $quantity;
        $this->id_commande = $id_commande;
    }
}
