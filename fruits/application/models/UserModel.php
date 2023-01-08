<?php

require_once APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "UserEntity.php";
class UserModel extends CI_Model
{
    public function findByMail($mail)
    {
        $sql = 'CALL getUserByMail(?)';
        $q = $this->db->query($sql, array($mail));

        $user = new UserEntity();
        $response = $q->row(0);
        if (isset($response)) {
            $user->id_user = $response->id_user;
            $user->nom = $response->nom;
            $user->prenom = $response->prenom;
            $user->mail = $response->mail;
            $user->password = $response->mdp;
            $user->status = $response->status;
            $user->adresse = $response->adresse;
            $user->sexe = $response->sexe;
            $user->telephone = $response->telephone;
        } else {
            $q->next_result();
            $q->free_result();
            return null;
        }
        $q->next_result();
        $q->free_result();
        return $user;
    }

    public function findAll()
    {
        $sql = 'CALL getAllUser()';
        $q = $this->db->query($sql);
        $response = array();

        foreach ($q->result() as $row) {
            $user = new UserEntity();
            $user->id_user = $row->id_user;
            $user->nom = $row->nom;
            $user->prenom = $row->prenom;
            $user->mail = $row->mail;
            $user->password = $row->mdp;
            $user->status = $row->status;
            $user->adresse = $row->adresse;
            $user->sexe = $row->sexe;
            $user->telephone = $row->telephone;
            array_push($response, $user);
        }
        $q->next_result();
        $q->free_result();
        return $response;
    }

    public function findById($id)
    {
        $sql = 'CALL getUserById(?)';
        $q = $this->db->query($sql, array($id));
        $user = new UserEntity();
        $response = $q->row(0);
        if (isset($response)) {
            $user->id_user = $response->id_user;
            $user->nom = $response->nom;
            $user->prenom = $response->prenom;
            $user->mail = $response->mail;
            $user->password = $response->mdp;
            $user->status = $response->status;
            $user->adresse = $response->adresse;
            $user->sexe = $response->sexe;
            $user->telephone = $response->telephone;
        }
        $q->next_result();
        $q->free_result();
        return $user;
    }

    public function deleteById($id)
    {
        $sql = 'CALL deleteUser(?)';
        $q = $this->db->query($sql, array($id));
        $q->next_result();
        $q->free_result();
    }

    public function add($user)
    {
        $sql = 'CALL addUser(?,?,?,?,?,?,?,?)';
        $q = $this->db->query($sql, array($user->prenom, $user->nom, $user->adresse, $user->mail, $user->password, $user->telephone, $user->sexe, $user->status));
        $q->next_result();
        $q->free_result();
    }

    public function modif($user)
    {
        $sql = 'CALL modifUser(?,?,?,?,?,?,?,?,?)';
        $q = $this->db->query($sql, array($user->id_user, $user->prenom, $user->nom, $user->adresse, $user->mail, $user->password, $user->telephone, $user->sexe, $user->status));
        $q->next_result();
        $q->free_result();
    }
}