<?php
require_once APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "CommandeEntity.php";
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
				$q = $this->db->query($sql, array($this->session->user["user"]->get_id_user(),$date ,$this->session->total,$adresse));
				$id = $q->result()[0];
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