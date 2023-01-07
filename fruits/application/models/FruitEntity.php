<?php

require_once APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "CategoryEntity.php";

class FruitEntity
{
    public int $id_fruit;
    public string $nom;
    public string $prix;
    public string $description;
    public array $category = [];
    public string $origine;
    public string $image;

	public function __construct($id_fruit,$nom,$prix,$description,$image,$origine,
	$id_categorie, $nomc, $descriptionc){
        $this->id_fruit = $id_fruit;
        $this->nom = $nom;
        $this->prix = $prix;
		$this->description =$description;
		$this->origine = $origine;
		if ($id_categorie != null){
			$category = new CategoryEntity();
			$category->setId_categorie($id_categorie);
			$category->setNom($nomc);
			$category->setDescription($descriptionc);
			array_push($this->category, $category);
		}
		
        $this->image = $image; 

    }
};



abstract class FruitDecorator extends FruitEntity {
}

class FruitQuantity extends FruitDecorator {
    public $quantity;

    public function __construct(FruitEntity $fruit, $quantity) {
        parent::__construct($fruit->id_fruit,$fruit->nom,$fruit->prix,$fruit->description,$fruit->image,$fruit->origine,
		$fruit->category[0]->id_categorie,$fruit->category[0]->nom,$fruit->category[0]->description);
        $this->quantity = $quantity;
    }
}

class FruitCommande extends FruitDecorator {
    public $quantity;
	public $id_commande;

    public function __construct(FruitEntity $fruit, $quantity,$id_commande) {
        parent::__construct($fruit->id_fruit,$fruit->nom,$fruit->prix,$fruit->description,$fruit->image,$fruit->origine,
		$fruit->category[0]->id_categorie,$fruit->category[0]->nom,$fruit->category[0]->description);
        $this->quantity = $quantity;
		$this->id_commande = $id_commande;
    }
}

