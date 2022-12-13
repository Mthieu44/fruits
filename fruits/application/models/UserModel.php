<?php

require_once APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "UserEntity.php";
class UserModel extends CI_Model
{
    function findByMail($mail)
    {
        $sql = 'CALL getUserByMail(?)';
        $q = $this->db->query($sql, array($mail));

        $user = new UserEntity();
        $response = $q->row(0);
        if (isset($response)) {
            $user->setId_user($response->id_user);
            $user->setNom($response->nom);
            $user->setPrenom($response->prenom);
            $user->setMail($response->mail);
            $user->setEncryptedPassword($response->mdp);
            $user->setStatus($response->status);
            $user->setAdresse($response->adresse);
            $user->setSexe($response->sexe);
            $user->settelephone($response->telephone);
        } else {
            return null;
        }
        $q->next_result();
        $q->free_result();
        return $user;
    }

    function findAll()
    {
        $sql = 'CALL getAllUser()';
        $q = $this->db->query($sql);
        $response = array();

        foreach ($q->result() as $row) {
            $user = new UserEntity();
            $user->setId_user($row->id_user);
            $user->setNom($row->nom);
            $user->setPrenom($row->prenom);
            $user->setMail($row->mail);
            $user->setEncryptedPassword($row->mdp);
            $user->setStatus($row->status);
            $user->setAdresse($row->adresse);
            $user->setSexe($row->sexe);
            $user->settelephone($row->telephone);
            array_push($response, $user);
        }
        $q->next_result();
        $q->free_result();
        return $response;
    }

    function findById($id)
    {
        $sql = 'CALL getUserById(?)';
        $q = $this->db->query($sql, array($id));
        $user = new UserEntity();
        $response = $q->row(0);
        if (isset($response)) {
            $user->setId_user($response->id_user);
            $user->setNom($response->nom);
            $user->setPrenom($response->prenom);
            $user->setMail($response->mail);
            $user->setEncryptedPassword($response->mdp);
            $user->setStatus($response->status);
            $user->setAdresse($response->adresse);
            $user->setSexe($response->sexe);
            $user->settelephone($response->telephone);
        }
        $q->next_result();
        $q->free_result();
        return $user;
    }

    function deleteById($id)
    {
        $sql = 'CALL deleteUser(?)';
        $q = $this->db->query($sql, array($id));
    }

    function add($user)
    {
        $sql = 'CALL addUser(?,?,?,?,?,?,?,?)';
        $q = $this->db->query($sql, array($user->getPrenom(), $user->getNom(), $user->getAdresse(), $user->getMail(), $user->getPassword(), $user->getTelephone(), $user->getSexe(), $user->getStatus()));
    }

    function modif($user)
    {
        $sql = 'CALL modifUser(?,?,?,?,?,?,?,?,?)';
        $q = $this->db->query($sql, array($user->getId_user(), $user->getPrenom(), $user->getNom(), $user->getAdresse(), $user->getMail(), $user->getPassword(), $user->getTelephone(), $user->getSexe(), $user->getStatus()));
        $q->next_result();
        $q->free_result();
    }
}
