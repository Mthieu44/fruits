<?php

class UserEntity
{
    public int $id_user;
    public string $nom;
    public string $prenom;
    public string $mail;
    public string $password = "";
    public string $status;
    public string $adresse;
    public string $sexe;
    public string $telephone;


    /*Méthode qui va vérifier si un mot de passe passé en paramètre correspond a celui hashé dans l'attribut de l'entité*/
    public function isValidPassword(string $password): bool
    {
        return password_verify($password, $this->password);
    }

    public function getPassword()
    {
        return $this->password;
    }

    /*Méthode qui va attributé le mot de passe en le hashant*/
    public function setPassword($password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    /*Méthode qui va attributé le mot de passe sans hash*/
    public function setEncryptedPassword($password): void
    {
        $this->password = $password;
    }
}
