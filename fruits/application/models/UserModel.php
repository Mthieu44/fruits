<?php

require_once APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "UserEntity.php";
class UserModel extends CI_Model
{
	function findByMail($mail)
	{
		$sql = 'SELECT * FROM usertab where mail = ?';
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
			$user->settelephone($response->telephone);
		}
		return $user;
	}

	function findAll()
	{
		$this->db->select('*');
		$q = $this->db->get('usertab');
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
		return $response;
	}

	function findById($id)
	{
		$q = $this->db->query('SELECT * FROM usertab where id_user = ' . '"' . $id . '"');
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
		return $user;
	}

	function deleteById($id)
	{
		$q = $this->db->query('CALL deleteUser(' . $id . ')');
	}

	function add($user)
	{
		try {
			$q = $this->db->query(
				'CALL addUser(
				\'' . $user->getPrenom() . '\',
				\'' . $user->getNom() . '\',\'' .
					$user->getAdresse() . '\',\'' .
					$user->getMail() . '\',\'' .
					$user->getPassword() . '\',\'' .
					$user->getTelephone() . '\',\'' .
					$user->getSexe() . '\',\'' .
					$user->getStatus() . '\'' . ')'
			);
		} catch (Exception $e) {
		}
	}

	function modif($user)
	{
		$q = $this->db->query(
			'CALL modifUser(' . $user->getId_user() . ',' . '
			\'' . $user->getPrenom() . '\',
			\'' . $user->getNom() . '\',\'' .
				$user->getAdresse() . '\',\'' .
				$user->getMail() . '\',\'' .
				$user->getPassword() . '\',\'' .
				$user->getTelephone() . '\',\'' .
				$user->getSexe() . '\',\'' .
				$user->getStatus() . '\'' . ')'
		);
	}
}
?>