<?php

class FruitEntity
{   
    public int $id_commande;
    public int $id_user;
    public string $date_commande;
    public string $prix;

	public function setId_Commande(int $id_commande): void
	{
		$this->id_commande = $id_commande;
	}

	public function getId_Commande(): int
	{
		return $this->$id_commande;
	}

    public function setId_user(int $id_user): void
	{
		$this->id_user = $id_user;
	}

	public function getId_user(): int
	{
		return $this->id_user;
	}

    public function setDate_commande(string $date_commande): void
	{
		$this->date_commande = $date_commande;
	}


	public function getDate_commande(): string
	{
		return $this->date_commande;
	}


    public function setPrix(string $prix): void
	{
		$this->prix = $prix;
	}


	public function getPrix(): string
	{
		return $this->prix;
	}
}
