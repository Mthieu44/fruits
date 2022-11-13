<?php
require_once APPPATH.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR."FruitEntity.php";
require_once APPPATH.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR."CategoryEntity.php";
class FruitModel extends CI_Model {

    function findAll(){
	    $this->db->select('*');
	    $q = $this->db->get('fruit');
		$response = array(); 
		
		foreach ($q->result() as $row) {
			$fruit = new FruitEntity();
			$fruit->setId_fruit($row->id_fruit);
        	$fruit->setNom($row->nom);
			$fruit->setPrix($row->prix);
			$fruit->setDescription($row->description);
			$fruit->setImage($row->image);
			
			$q_category = $this->db->query('SELECT c.* FROM categorie c, categorisation ca where c.id_categorie = ca.id_categorie and ca.id_fruit = ' . $row->id_fruit);
			$fruit->setCategory($q_category->custom_result_object('CategoryEntity'));


			array_push($response,$fruit);
		}
	    return $response;
	}
}

