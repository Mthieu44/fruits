<?php

require_once APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "FruitEntity.php";
require_once APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "CategoryEntity.php";
class FruitModel extends CI_Model
{
    public function findAll()
    {

        /*Méthode qui va retourner tous les fruits de notre base de données, avec toutes les catégories du fruit*/
        $q = $this->db->query('CALL getAllFruit()');
        $response = array();
        foreach ($q->result() as $row) {
            $id = $row->id_fruit;
            $isIn = false;
            foreach ($response as $fruit) {
                if ($fruit->id_fruit == $id) {
                    $isIn = true;
                    $category = new CategoryEntity($row->id_categorie,$row->nomc,$row->descriptionc);
                    array_push($fruit->category, $category);
                }
            }
            if (!$isIn) {
                $fruit = new FruitEntity(
                    $id,
                    $row->nom,
                    $row->prix,
                    $row->description,
                    $row->image,
                    $row->origine,
                    []
                );
                $fruit->addCategory($row->id_categorie, $row->nomc, $row->descriptionc);
                array_push($response, $fruit);
            }
        }
        $q->next_result();
        $q->free_result();
        return $response;
    }

    /*Méthode qui va retourner le premier, et seul, fruit avec l'id passé en paramètre*/
    public function findById($id)
    {
        $sql = 'CALL getFruitById(?)';
        $q = $this->db->query($sql, array($id));
        $response = array();
        foreach ($q->result() as $row) {
            $id = $row->id_fruit;
            $isIn = false;
            foreach ($response as $fruit) {
                if ($fruit->id_fruit == $id) {
                    $isIn = true;
                    $category = new CategoryEntity($row->id_categorie,$row->nomc,$row->descriptionc);
                    array_push($fruit->category, $category);
                }
            }
            if (!$isIn) {
                $fruit = new FruitEntity(
                    $id,
                    $row->nom,
                    $row->prix,
                    $row->description,
                    $row->image,
                    $row->origine,
                    []
                );
                $fruit->addCategory($row->id_categorie, $row->nomc, $row->descriptionc);

                array_push($response, $fruit);
            }
        }
        $q->next_result();
        $q->free_result();
        return $response[0];
    }

    /*Méthode qui va retourner le premie fruit avec l'nom passé en paramètre*/
    public function findByName($nom)
    {
        $sql = 'CALL getFruitByName(?)';
        $q = $this->db->query($sql, array($nom));
        $response = array();
        foreach ($q->result() as $row) {
            $id = $row->id_fruit;
            $isIn = false;
            foreach ($response as $fruit) {
                if ($fruit->id_fruit == $id) {
                    $isIn = true;
                    $fruit->addCategory($row->id_categorie, $row->nomc, $row->descriptionc);
                }
            }
            if (!$isIn) {
                $fruit = new FruitEntity(
                    $id,
                    $row->nom,
                    $row->prix,
                    $row->description,
                    $row->image,
                    $row->origine,
                    []
                );
                $fruit->addCategory($row->id_categorie, $row->nomc, $row->descriptionc);
                array_push($response, $fruit);
            }
        }
        $q->next_result();
        $q->free_result();
        if (count($response) > 0) {
            return $response[0];
        }
    }

    /*Méthode qui va retourner le premier, et seul, fruit avec l'id passé en paramètre. Sans les catégories, utiliser pour les modifications de fruit*/
    public function findByNameWithoutCat($nom)
    {
        $sql = 'CALL getFruitByNameWithoutCat(?)';
        $q = $this->db->query($sql, array($nom));
        $response = array();
        foreach ($q->result() as $row) {
            $fruit = new FruitEntity(
                $row->id_fruit,
                $row->nom,
                $row->prix,
                $row->description,
                $row->image,
                $row->origine,
                []
            );
            array_push($response, $fruit);
        }
        $q->next_result();
        $q->free_result();
        if (count($response) > 0) {
            return $response[0];
        }
    }


    /*Méthode qui va delete le fruit avec l'id passé en paramètre, la procédure supprime aussi les relations dans la table de catégorisation*/
    public function deleteById($id)
    {
        $sql = 'CALL deleteFruit(?)';
        $q = $this->db->query($sql, array($id));
        $q->next_result();
        $q->free_result();
    }

    /*Méthode qui va ajout un fruit passé en paramètre*/
    public function add($fruit)
    {
        $sql = 'CALL addFruit(?,?,?,?,?)';
        $q = $this->db->query($sql, array($fruit->nom, $fruit->prix, $fruit->description, $fruit->origine, $fruit->image));
        $q->next_result();
        $q->free_result();
    }

    /*Méthode qui va modifier un fruit passé en paramètre*/
    public function modif($fruit)
    {
        $sql = 'CALL modifFruit(?,?,?,?,?,?)';
        $q = $this->db->query($sql, array($fruit->id_fruit, $fruit->nom, $fruit->prix, $fruit->description, $fruit->origine, $fruit->image));
        $q->next_result();
        $q->free_result();
    }

    /*Méthode qui va ajout une catégorie à un fruit*/
    public function addCategorieToFruit($id_fruit, $id_category)
    {
        $sql = 'CALL addCategorieToFruit(?,?)';
        $q = $this->db->query($sql, array($id_fruit, $id_category));
        $q->next_result();
        $q->free_result();
    }

    /*Méthode qui va supprimer une catégorie à un fruit*/
    public function deleteCategorieToFruit($id_fruit, $id_category)
    {
        $sql = 'CALL deleteCategorieToFruit(?,?)';
        $q = $this->db->query($sql, array($id_fruit, $id_category));
    }

    /*Méthode qui va retoruner les id des catégories associer a un fruit passé en argument*/
    public function findFruitCategotiId($fruit)
    {
        $sql = 'CALL getCategorieFromFruit(?)';
        $q = $this->db->query($sql, array($fruit->id_fruit));
        $response = array();
        foreach ($q->result() as $row) {
            array_push($response, $row->id_categorie);
        }
        $q->next_result();
        $q->free_result();
        return $response;
    }

    /*Méthode qui retourner tous les fruits de la table fruit save, cette table grade tous les fruits qui ont été un jour sur le site. Utile pour l'historique de commande (que le fruit ne disparaisse pas de la commande)*/
    public function findAllSave()
    {
        $q = $this->db->query('CALL getAllFruitSave()');
        $response = array();
        foreach ($q->result() as $row) {
            $id = $row->id_fruit;
            $isIn = false;
            foreach ($response as $fruit) {
                if ($fruit->id_fruit == $id) {
                    $isIn = true;
                }
            }
            if (!$isIn) {
                $fruit = new FruitEntity(
                    $id,
                    $row->nom,
                    $row->prix,
                    $row->description,
                    $row->image,
                    $row->origine,
                    []
                );
                array_push($response, $fruit);
            }
        }
        $q->next_result();
        $q->free_result();
        return $response;
    }
}
