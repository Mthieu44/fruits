<?php
require_once APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "CategoryEntity.php";
class CategoryModel extends CI_Model
{
    function findAll(){
	    $this->db->select('*');
	    $q = $this->db->get('categorie');
		$response = array(); 
		
		foreach ($q->result() as $row) {
			$category = new CategoryEntity();
			$category->setId_categorie($row->id_categorie);
        	$category->setNom($row->nom);
			$category->setDescription($row->description);
			array_push($response,$category);
		}
	    return $response;
	}

	
}