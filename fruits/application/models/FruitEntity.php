<?php
require_once APPPATH.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR."CategoryEntity.php";

class FruitEntity
{   
    public int $id_fruit;
    public string $nom;
    public string $prix;
    public string $description;
    public array $category = [];
	public string $origine;
	public string $image;


    public function setId_fruit(int $id_fruit): void
	{
		$this->id_fruit = $id_fruit;
	}

    public function getId_fruit(): int
	{
		return $this->id_fruit;
	}
 

    public function setNom(string $nom): void
	{
		$this->nom = $nom;
	}
    
    public function getNom(): string
	{
		return $this->nom;
	}


    public function setPrix(string $prix): void
	{
		$this->prix = $prix;
	}
    

    public function getPrix(): string
	{
		return $this->prix;
	}


    public function setDescription(string $description): void
	{
		$this->description = $description;
	}
    
    public function getDescription(): string
	{
		return $this->description;
	}


	public function setCategory(array $category): void
	{
		$this->category = $category;
	}
    
    public function getCategory(): array
	{
		return $this->category;
	}

	public function setImage(string $image): void
	{
		$this->image = $image;
	}
    
    public function getImage(): string
	{
		return $this->image;
	}

	public function setOrigine(string $origine): void
	{
		$this->origine = $origine;
	}
    
    public function getOrigine(): string
	{
		return $this->origine;
	}
}
