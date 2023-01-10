<?php

require_once APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "CategoryEntity.php";
class CategoryModel extends CI_Model
{

    /*Méthode qui permet de trouver toutes les catégories stockées dans la base de données*/
    public function findAll()
    {
        $q = $this->db->query('CALL getAllCategorie()');
        $response = array();

        foreach ($q->result() as $row) {
            $category = new CategoryEntity($row->id_categorie,$row->nom,$row->description);
            array_push($response, $category);
        }
        $q->next_result();
        $q->free_result();
        return $response;
    }
}