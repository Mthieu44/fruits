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
			$fruit->setOrigine($row->origine);
			
			$q_category = $this->db->query('SELECT c.* FROM categorie c, categorisation ca where c.id_categorie = ca.id_categorie and ca.id_fruit = ' . $row->id_fruit);
			$fruit->setCategory($q_category->custom_result_object('CategoryEntity'));

			array_push($response,$fruit);
		}
	    return $response;
	}

	function findById($id){
		$this->db->select('*');
		$this->db->where('id_fruit', $id);
		$q = $this->db->get('fruit');
		$fruit = new FruitEntity();
		foreach ($q->result() as $row) {
			$fruit->setId_fruit($row->id_fruit);
			$fruit->setNom($row->nom);
			$fruit->setPrix($row->prix);
			$fruit->setDescription($row->description);
			$fruit->setImage($row->image);
			$fruit->setOrigine($row->origine);
			
			$q_category = $this->db->query('SELECT c.* FROM categorie c, categorisation ca where c.id_categorie = ca.id_categorie and ca.id_fruit = ' . $row->id_fruit);
			$fruit->setCategory($q_category->custom_result_object('CategoryEntity'));
		}
		return $fruit;
	}

	function findByName($nom){
		$this->db->select('*');
		$this->db->where('nom', $nom);
		$q = $this->db->get('fruit');
		$fruit = new FruitEntity();
		foreach ($q->result() as $row) {
			$fruit->setId_fruit($row->id_fruit);
			$fruit->setNom($row->nom);
			$fruit->setPrix($row->prix);
			$fruit->setDescription($row->description);
			$fruit->setImage($row->image);
			$fruit->setOrigine($row->origine);
			
			$q_category = $this->db->query('SELECT c.* FROM categorie c, categorisation ca where c.id_categorie = ca.id_categorie and ca.id_fruit = ' . $row->id_fruit);
			$fruit->setCategory($q_category->custom_result_object('CategoryEntity'));
		}
		return $fruit;
	}



	function deleteById($id)
	{
		$q = $this->db->query('CALL deleteFruit(' . $id . ')');
	}

	function add($fruit)
	{
		try {
			$q = $this->db->query(
				'CALL addFruit(
				\'' . str_replace("'","\'",$fruit->getNom()) . '\',
				\'' . str_replace("'","\'",$fruit->getPrix()) . '\',\'' .
					str_replace("'","\'",$fruit->getDescription()) . '\',\'' .
					str_replace("'","\'",$fruit->getOrigine()) . '\',\'' .
					str_replace("'","\'",$fruit->getImage()) . '\'' . ')'
			);
		} catch (Exception $e) {
		}
	}

	function modif($fruit)
	{

		$q = $this->db->query(
			'CALL modifFruit(' . $fruit->getId_fruit() . ',' . '
			\'' . str_replace("'","\'",$fruit->getPrenom()) . '\',
			\'' . str_replace("'","\'",$fruit->getPrix()) . '\',\'' .
					str_replace("'","\'",$fruit->getDescription()) . '\',\'' .
					str_replace("'","\'",$fruit->getOrigine()) . '\',\'' .
					str_replace("'","\'",$fruit->getPassword()) . '\',\'' .
					str_replace("'","\'",$fruit->getImage()) . '\'' . ')'
		);
	}

	function addCategorieToFruit($id_fruit,$id_category)
	{
		$q = $this->db->query(
			'CALL addCategorieToFruit('.$id_fruit.','.$id_category.')');
	}

	function deleteCategorieToFruit($id_fruit,$id_category)
	{
		$q = $this->db->query(
			'CALL deleteCategorieToFruit('.$id_fruit.','.$id_category.')');
	}

	function findFruitCategotiId($fruit){
	    $this->db->select('*');
		$this->db->where('id_fruit', $fruit->getId_fruit());
	    $q = $this->db->get('categorisation');
		$response = array(); 
		
		foreach ($q->result() as $row) {
			array_push($response,$row->id_categorie);
		}
		
	    return $response;
	}
}



