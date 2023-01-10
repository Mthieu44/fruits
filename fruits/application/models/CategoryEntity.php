<?php

class CategoryEntity
{
    public int $id_categorie;
    public string $nom;
    public string $description;

    public function __construct(
        $id_categorie,
        $nom,
        $description
    ) {
        $this->id_categorie = $id_categorie;
        $this->nom = $nom;
        $this->description =$description;
    }
}