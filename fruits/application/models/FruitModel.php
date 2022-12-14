<?php
require_once APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "FruitEntity.php";
require_once APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "CategoryEntity.php";
class FruitModel extends CI_Model
{

    function findAll()
    {
        $q = $this->db->query('CALL getAllFruit()');
        $response = array();
        foreach ($q->result() as $row) {
            $id = $row->id_fruit;
            $isIn = false;
            foreach ($response as $fruit) {
                if ($fruit->getId_fruit() == $id) {
                    $isIn = true;
                    $fruit->addCategory($row->id_categorie, $row->nomc, $row->descriptionc);
                }
            }
            if (!$isIn) {
                $fruit = new FruitEntity();
                $fruit->setId_fruit($id);
                $fruit->setNom($row->nom);
                $fruit->setPrix($row->prix);
                $fruit->setDescription($row->description);
                $fruit->setImage($row->image);
                $fruit->setOrigine($row->origine);
                $fruit->addCategory($row->id_categorie, $row->nomc, $row->descriptionc);
                array_push($response, $fruit);
            }
        }
        $q->next_result();
        $q->free_result();
        return $response;
    }

    function findById($id)
    {
        $sql = 'CALL getFruitById(?)';
        $q = $this->db->query($sql, array($id));
        $response = array();
        foreach ($q->result() as $row) {
            $id = $row->id_fruit;
            $isIn = false;
            foreach ($response as $fruit) {
                if ($fruit->getId_fruit() == $id) {
                    $isIn = true;
                    $fruit->addCategory($row->id_categorie, $row->nomc, $row->descriptionc);
                }
            }
            if (!$isIn) {
                $fruit = new FruitEntity();
                $fruit->setId_fruit($id);
                $fruit->setNom($row->nom);
                $fruit->setPrix($row->prix);
                $fruit->setDescription($row->description);
                $fruit->setImage($row->image);
                $fruit->setOrigine($row->origine);
                $fruit->addCategory($row->id_categorie, $row->nomc, $row->descriptionc);
                array_push($response, $fruit);
            }
        }
        $q->next_result();
        $q->free_result();
        return $response[0];
    }

    function findByName($nom)
    {
        $sql = 'CALL getFruitByName(?)';
        $q = $this->db->query($sql, array($nom));
        $response = array();
        foreach ($q->result() as $row) {
            $id = $row->id_fruit;
            $isIn = false;
            foreach ($response as $fruit) {
                if ($fruit->getId_fruit() == $id) {
                    $isIn = true;
                    $fruit->addCategory($row->id_categorie, $row->nomc, $row->descriptionc);
                }
            }
            if (!$isIn) {
                $fruit = new FruitEntity();
                $fruit->setId_fruit($id);
                $fruit->setNom($row->nom);
                $fruit->setPrix($row->prix);
                $fruit->setDescription($row->description);
                $fruit->setImage($row->image);
                $fruit->setOrigine($row->origine);
                $fruit->addCategory($row->id_categorie, $row->nomc, $row->descriptionc);
                array_push($response, $fruit);
            }
        }
        $q->next_result();
        $q->free_result();
        if (count($response) > 0)
            return $response[0];
    }

    function findByNameWithoutCat($nom)
    {
        $sql = 'CALL getFruitByNameWithoutCat(?)';
        $q = $this->db->query($sql, array($nom));
        $response = array();
        foreach ($q->result() as $row) {
            $fruit = new FruitEntity();
            $fruit->setId_fruit($row->id_fruit);
            $fruit->setNom($row->nom);
            $fruit->setPrix($row->prix);
            $fruit->setDescription($row->description);
            $fruit->setImage($row->image);
            $fruit->setOrigine($row->origine);
            array_push($response, $fruit);
        }
        $q->next_result();
        $q->free_result();
        if (count($response) > 0)
            return $response[0];
    }



    function deleteById($id)
    {
        $sql = 'CALL deleteFruit(?)';
        $q = $this->db->query($sql, array($id));
    }

    function add($fruit)
    {
        $sql = 'CALL addFruit(?,?,?,?,?)';
        $q = $this->db->query($sql, array($fruit->getNom(), $fruit->getPrix(), $fruit->getDescription(), $fruit->getOrigine(), $fruit->getImage()));
    }

    function modif($fruit)
    {
        $sql = 'CALL modifFruit(?,?,?,?,?,?)';
        $q = $this->db->query($sql, array($fruit->getId_fruit(), $fruit->getNom(), $fruit->getPrix(), $fruit->getDescription(), $fruit->getOrigine(), $fruit->getImage()));
    }

    function addCategorieToFruit($id_fruit, $id_category)
    {
        $sql = 'CALL addCategorieToFruit(?,?)';
        $q = $this->db->query($sql, array($id_fruit, $id_category));
    }

    function deleteCategorieToFruit($id_fruit, $id_category)
    {
        $sql = 'CALL deleteCategorieToFruit(?,?)';
        $q = $this->db->query($sql, array($id_fruit, $id_category));
    }

    function findFruitCategotiId($fruit)
    {
        $sql = 'CALL getCategorieFromFruit(?)';
        $q = $this->db->query($sql, array($fruit->getId_fruit()));
        $response = array();
        foreach ($q->result() as $row) {
            array_push($response, $row->id_categorie);
        }
        $q->next_result();
        $q->free_result();
        return $response;
    }
}
