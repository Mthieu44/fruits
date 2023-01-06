<?php

require APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "FruitHistoEntity.php";

class CommandeModel extends CI_Model
{
    function findAll(){
	    $q = $this->db->query('CALL getAllCommande()');
		$response = array(); 
		
		foreach ($q->result() as $row) {
			$commande = new CommandeEntity();
			$commande->setId_commande($row->id_commande);
        	$commande->setId_user($row->id_user);
			$commande->setDate_commande($row->date_commande);
			$commande->setPrix($row->prix);
			$commande->setAdresse($row->adresse);
			array_push($response,$commande);
		}

		$q->next_result();
        $q->free_result();
	    return $response;
	}

	function getFruitFrom_IdCommande($id){
		$sql = 'CALL getFruitFromCommande(?)';
	    $q = $this->db->query($sql, array($id));
		$response = array();
		
		foreach ($q->result() as $row){
			$fruit = new FruitHistoEntity($row->id_commande,$row->id_fruit,$row->nom,$row->prix,$row->image,$row->quantity);
			
			array_push($response, $fruit);
		}
		$q->next_result();
        $q->free_result();
        return $response;
	}

	function findById_User($id){
		$sql = 'CALL getCommandebyUser(?)';
	    $q = $this->db->query($sql, array($id));
		$response = array(); 
		
		foreach ($q->result() as $row) {
			$commande = new CommandeEntity();
			$commande->setId_commande($row->id_commande);
        	$commande->setId_user($row->id_user);
			$commande->setDate_commande($row->date_commande);
			$commande->setPrix($row->prix);
			$commande->setAdresse($row->adresse);
			array_push($response,$commande);
		}
		$q->next_result();
        $q->free_result();
	    return $response;
	}

	function deleteById($id)
    {
        $sql = 'CALL deleteCommande(?)';
        $q = $this->db->query($sql, array($id));
        $q->next_result();
        $q->free_result();
    }

	function CreerCommandePanier($adresse)
    {
		if (isset($this->session->panier)) {
			if (isset($this->session->user)){
				$today = getdate();
				$date = $today['wday'].'-'.$today['mon'].'-'.$today['year'] .' '.$today['hours'].'h'.$today['minutes'];
				$sql = 'CALL addCommande(?,?,?,?)';
				$q = $this->db->query($sql, array($this->session->user["user"]->getId_user(),$date ,$this->session->total,$adresse));
				$id = $q->result()[0]->id_commande;
				$q->next_result();
        		$q->free_result();
				foreach ($this->session->panier as $fruit){
					$sql = 'CALL  addFruitToCommande(?,?,?)';
					$q = $this->db->query($sql, array($id,$fruit->id ,$fruit->quantity));
					$q->next_result();
        			$q->free_result();
				}
			}
        }
        
    }
}