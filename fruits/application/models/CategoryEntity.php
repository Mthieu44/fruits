<?php

class CategoryEntity
{
    private int $id_categorie;
    private string $nom;
    private string $description;



    public function setId_categorie(int $id_categorie): void
	{
		$this->id_categorie = $id_categorie;
	}

    public function getId_categorie(): int
	{
		return $this->id_categorie;
	}
 

    public function setNom(string $nom): void
	{
		$this->nom = $nom;
	}
    
    public function getNom(): string
	{
		return $this->nom;
	}


    public function setDescription(string $description): void
	{
		$this->description = $description;
	}
    
    public function getDescription(): string
	{
		return $this->description;
	}
}