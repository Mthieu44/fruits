<?php

require_once APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "UserEntity.php";
class UserModel extends CI_Model
{
	function findByMail($mail){
		$q = $this->db->query('SELECT * FROM usertab where mail = '. '"'. $mail . '"');
		$user = new UserEntity();
		$response = $q->row(0);
		if (isset($response)){
			$user->setId_user($response->id_user);
			$user->setNom($response->nom);
			$user->setPrenom($response->prenom);
			$user->setMail($response->mail);
			$user->setEncryptedPassword($response->mdp);
			$user->setStatus($response->status);
			$user->setAdresse($response->adresse);
			$user->settelephone($response->telephone);
		}
		return $user;
	}
}
?>