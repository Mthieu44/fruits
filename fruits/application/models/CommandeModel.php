<?php

class CommandeModel extends CI_Model
{
    /*Méthode qui va retourner toutes les commandes */
    public function findAll()
    {
        $q = $this->db->query('CALL getAllCommande()');
        $response = array();

        foreach ($q->result() as $row) {
            $commande = new CommandeEntity();
            $commande->id_commande = $row->id_commande;
            $commande->id_user = $row->id_user;
            $commande->date_commande = $row->date_commande;
            $commande->prix = $row->prix;
            $commande->adresse = $row->adresse;
            array_push($response, $commande);
        }

        $q->next_result();
        $q->free_result();
        return $response;
    }

    /*Méthode qui va retourner tous les fruits de associer à la commande associer à l'id passé en entrée*/
    public function getFruitFrom_IdCommande($id) 
    {
        $fruits = $this->FruitModel->findAllSave();

        $sql = 'CALL getFruitFromCommande(?)';
        $q = $this->db->query($sql, array($id));

        $response = array();
        foreach ($fruits as $fruit) {
            foreach ($q->result() as $row) {
                if ($row->id_fruit == $fruit->id_fruit) {
                    array_push($response, new FruitCommande($fruit, $row->quantity, $row->id_commande));
                }
            }
        }
        $q->next_result();
        $q->free_result();
     
        return $response;
    }

    /*Méthode qui va retourner toutes les commandes d'un user*/
    public function findById_User($id)
    {
    
        $sql = 'CALL getCommandebyUser(?)';
        $q = $this->db->query($sql, array($id));
        $response = array();

        foreach ($q->result() as $row) {
            $commande = new CommandeEntity();
            $commande->id_commande = $row->id_commande;
            $commande->id_user = $row->id_user;
            $commande->date_commande = $row->date_commande;
            $commande->prix = $row->prix;
            $commande->adresse = $row->adresse;
            array_push($response, $commande);
        }
        $q->next_result();
        $q->free_result();
        return $response;
    }
    
    /*Méthode qui va delete une comande suivant son id*/
    public function deleteById($id)
    {
        $sql = 'CALL deleteCommande(?)';
        $q = $this->db->query($sql, array($id));
        $q->next_result();
        $q->free_result();
    }

    /*Méthode qui va créer une commande avec soit l'adresses passer dans le formulaire soir celle de l'user (dans la variable de session)*/
    public function CreerCommandePanier($adresse)
    {
        if (isset($this->session->panier)) {
            if (isset($this->session->user)) {
                $today = getdate();
                $date = '';

                if(strlen($today['wday']) == 1) {
                    $date .= '0';
                   }
                $date .= $today['wday'].'-';

                if(strlen($today['mon']) == 1) {
                    $date .= '0';
                   }
                $date .= $today['mon'].'-'.$today['year'].' ';

                if(strlen($today['hours']) == 1) {
                    $date .= '0';
                   }
                $date .= $today['hours'].'h';

                if(strlen($today['minutes']) == 1) {
                    $date .= '0';
                   }
                $date .= $today['minutes'];
                $sql = 'CALL addCommande(?,?,?,?)';
                $q = $this->db->query($sql, array($this->session->user["user"]->id_user,$date ,$this->session->total,$adresse));
                $id = $q->result()[0]->id_commande;

                $q->next_result();
                $q->free_result();
                foreach ($this->session->panier as $fruit) {
                    $sql = 'CALL  addFruitToCommande(?,?,?)';
                    $q = $this->db->query($sql, array($id,$fruit->id ,$fruit->quantity));
                    $q->next_result();
                    $q->free_result();
                }
                
                return array('id' => $id,'date' => $date);
            }
        }
    }
}