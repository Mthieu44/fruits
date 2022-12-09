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
        return $response[0];
    }



    function deleteById($id)
    {
        $q = $this->db->query('CALL deleteFruit(' . $id . ')');
    }

    function add($fruit)
    {
        /*$sql = 'CALL addFruit(?,?,?,?,?)';
		$q = $this->db->query($sql, array($fruit->getNom(), $fruit->getPrix(), $fruit->getDescription(), $fruit->getOrigine(), $fruit->getImage()));*/
        try {
            $q = $this->db->query(
                'CALL addFruit(
				\'' . str_replace("'", "\'", $fruit->getNom()) . '\',
				\'' . str_replace("'", "\'", $fruit->getPrix()) . '\',\'' .
                    str_replace("'", "\'", $fruit->getDescription()) . '\',\'' .
                    str_replace("'", "\'", $fruit->getOrigine()) . '\',\'' .
                    str_replace("'", "\'", $fruit->getImage()) . '\'' . ')'
            );
        } catch (Exception $e) {
        }
    }

    function modif($fruit)
    {

        $q = $this->db->query(
            'CALL modifFruit(' . $fruit->getId_fruit() . ',' . '
			\'' . str_replace("'", "\'", $fruit->getNom()) . '\',
			\'' . str_replace("'", "\'", $fruit->getPrix()) . '\',\'' .
                str_replace("'", "\'", $fruit->getDescription()) . '\',\'' .
                str_replace("'", "\'", $fruit->getOrigine()) . '\',\'' .
                str_replace("'", "\'", $fruit->getImage()) . '\'' . ')'
        );
    }

    function addCategorieToFruit($id_fruit, $id_category)
    {
        $q = $this->db->query(
            'CALL addCategorieToFruit(' . $id_fruit . ',' . $id_category . ')'
        );
    }

    function deleteCategorieToFruit($id_fruit, $id_category)
    {
        $q = $this->db->query(
            'CALL deleteCategorieToFruit(' . $id_fruit . ',' . $id_category . ')'
        );
    }

    function findFruitCategotiId($fruit)
    {
        $this->db->select('*');
        $this->db->where('id_fruit', $fruit->getId_fruit());
        $q = $this->db->get('categorisation');
        $response = array();

        foreach ($q->result() as $row) {
            array_push($response, $row->id_categorie);
        }

        return $response;
    }
}
