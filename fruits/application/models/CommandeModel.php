<?php

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
			$fruit = new FruitEntity();
			$fruit->setId_fruit($row->id_fruit);
			$fruit->setNom($row->nom);
			$fruit->setPrix($row->prix);
			$fruit->setDescription($row->description);
			$fruit->setImage($row->image);
			$fruit->setOrigine($row->origine);
			$fruit->quantity = $row->quantity;
			$fruit->id_commande = $row->id_commande;
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
            $this->session->set_userdata("panier", array());
			if (isset($this->session->user)){
				$today = getdate();
				$date = $today['wday'].'-'.$today['mon'].'-'.$today['year'] .' '.$today['minutes'].'h'.$today['seconds'];
				$sql = 'CALL addCommande(?,?,?,?)';
				$q = $this->db->query($sql, array($this->session->user["user"]->getId_user(),$date ,$this->session->total,$adresse));
				$id = $q->result()[0]->id_commande;
				$q->next_result();
        		$q->free_result();

				$panier = $this->session->panier;
				foreach ($panier as $fruit){
					$sql = 'CALL  addFruitToCommande(?,?,?)';
					$q = $this->db->query($sql, array($id,$fruit->id ,$fruit->quantite));
					$q->next_result();
        			$q->free_result();
				}
			}
        }
        
    }
}