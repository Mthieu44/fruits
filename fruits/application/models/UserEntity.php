<?php

class UserEntity
{
    private int $id_user;
    private string $nom;
    private string $prenom;
    private string $mail;
    private string $password = "";
    private string $status;
    private string $adresse;
    private string $sexe;
    private string $telephone;


    public function getId_user(): string
    {
        return $this->id_user;
    }

    public function setId_user(string $id_user): void
    {
        $this->id_user = $id_user;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }


    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function getMail(): string
    {
        return $this->mail;
    }

    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }


    public function getMdp()
    {
        return $this->mdp;
    }

    public function isValidPassword(string $password): bool
    {
        return password_verify($password, $this->password);
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function setEncryptedPassword($password): void
    {
        $this->password = $password;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getAdresse(): string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): void
    {
        $this->adresse = $adresse;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }
    public function getSexe(): string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): void
    {
        $this->sexe = $sexe;
    }
}
