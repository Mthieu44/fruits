<?php

require_once APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "FruitEntity.php";
require_once APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "CategoryEntity.php";

class FruitModel extends CI_Model
{
    public function findAll()
    {
        $q = $this->db->query('CALL getAllFruit()');
        $response = array();
        foreach ($q->result() as $row) {
            $id = $row->id_fruit;
            $isIn = false;
            foreach ($response as $fruit) {
                if ($fruit->id_fruit == $id) {
                    $isIn = true;
                    $category = new CategoryEntity();
                    $category->id_categorie = $row->id_categorie;
                    $category->nom = $row->nomc;
                    $category->description = $row->descriptionc;
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
                    $category = new CategoryEntity();
                    $category->id_categorie = $row->id_categorie;
                    $category->nom = $row->nomc;
                    $category->description = $row->descriptionc;
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
            ); // ne rentre pas dans la condition dans FruitEntity donc pas de categorie
            array_push($response, $fruit);
        }
        $q->next_result();
        $q->free_result();
        if (count($response) > 0) {
            return $response[0];
        }
    }



    public function deleteById($id)
    {
        $sql = 'CALL deleteFruit(?)';
        $q = $this->db->query($sql, array($id));
        $q->next_result();
        $q->free_result();
    }

    public function add($fruit)
    {
        $sql = 'CALL addFruit(?,?,?,?,?)';
        $q = $this->db->query($sql, array($fruit->nom, $fruit->prix, $fruit->description, $fruit->origine, $fruit->image));
        $q->next_result();
        $q->free_result();
    }

    public function modif($fruit)
    {
        $sql = 'CALL modifFruit(?,?,?,?,?,?)';
        $q = $this->db->query($sql, array($fruit->id_fruit, $fruit->nom, $fruit->prix, $fruit->description, $fruit->origine, $fruit->image));
        $q->next_result();
        $q->free_result();
    }

    public function addCategorieToFruit($id_fruit, $id_category)
    {
        $sql = 'CALL addCategorieToFruit(?,?)';
        $q = $this->db->query($sql, array($id_fruit, $id_category));
        $q->next_result();
        $q->free_result();
    }

    public function deleteCategorieToFruit($id_fruit, $id_category)
    {
        $sql = 'CALL deleteCategorieToFruit(?,?)';
        $q = $this->db->query($sql, array($id_fruit, $id_category));
    }

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
        var_dump($response);die();
    }
}