<?php
require_once APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "CategoryEntity.php";

class FruitEntity
{
	private int $id_fruit;
	private string $nom;
	private string $prix;
	private string $description;
	private array $category = [];
	private string $origine;
	private string $image;



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

	public function addCategory(int $idCategory, string $nom, string $description): void
	{
		$category = new CategoryEntity();
		$category->setId_categorie($idCategory);
		$category->setNom($nom);
		$category->setDescription($description);
		array_push($this->category, $category);
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
