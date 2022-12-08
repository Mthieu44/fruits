<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "UserEntity.php";
class Connexion extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('UserModel');
		$this->load->model('FruitModel');
		if (!isset($this->session->panier)) {
			$this->session->set_userdata("panier", array());
		}
		if (!isset($this->session->fauxPanier)) {
			$this->session->set_userdata("fauxPanier", array());
		}
	}

	function index()
	{
		$in = $this->session->flashdata('in');
		if ($in == 1) {
			$this->load->view('ConnexionView', array('msg' => "Identifiants invalides"));
		} elseif (isset($this->session->user["status"])) {
			if ($this->session->user["status"] == 'admin') {
				$data['users'] = $this->UserModel->findAll();
				$data['fruits'] = $this->FruitModel->findAll();
				$this->load->view('AdminView', $data);
			} elseif ($this->session->user["status"] == 'responsable') {
				$data['fruits'] = $this->FruitModel->findAll();
				$this->load->view('ResponsableView', $data);
			} elseif ($this->session->user["status"] == 'client') {
				$users = $this->UserModel->findAll();
				$this->load->view('ClientView');
			}
		} else {
			$this->load->view('ConnexionView');
		}
	}

	function loginCheck()
	{
		$mail = $this->input->post('mail');
		$password = $this->input->post('password');
		$user = $this->UserModel->findByMail($mail);

		if ($user != null && $user->isValidPassword($password)) {
			$this->session->set_userdata("user", array("prenom" => $user->getPrenom(), "status" => $user->getStatus(), "user" => $user));
			redirect("home");
			die();
		}
		$this->session->set_flashdata('in', 1);
		redirect("connexion");
	}

	function logout()
	{
		$this->session->unset_userdata("login");
		$this->session->sess_destroy();
		redirect("Connexion");
	}

	function register()
	{
		$this->load->helper('form');
		$this->load->view('RegisterView');
	}

	function registerRequest()
	{
		$valid = true;
		if ($this->UserModel->findByMail($this->input->post('email') == null)) {
			$msg = 'Mail dèjà utilisé';
			$valid = false;
		}
		if ($this->input->post('password') != $this->input->post('passwordComfirm')) {
			$msg = 'Mot de passe incorrect';
			$valid = false;
		}
		if ($valid) {
			$this->load->view('RegisterView');
		} else {
			$user = new UserEntity();
			$user->setPrenom($this->input->post('prenom'));
			$user->setNom($this->input->post('nom'));
			$user->setMail($this->input->post('email'));
			$user->setAdresse($this->input->post('adresse'));
			$user->setTelephone($this->input->post('telephone'));
			$user->setSexe($this->input->post('sexe'));
			$user->setStatus('client');
			$user->setPassword($this->input->post('password'));
			$this->UserModel->add($user);
			$this->session->set_userdata("user", array("prenom" => $user->getPrenom(), "status" => $user->getStatus(), "user" => $user));
			redirect('Home');
		}
	}

	function user($id)
	{
		$user = $this->UserModel->findById($id);
		$this->load->view('AdminView', array('user' => $user));
	}
}
