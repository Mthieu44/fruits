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
	}

	function index()
	{
		$in = $this->session->flashdata('in');
		if ($in == 1) {
			$this->load->view('ConnexionView', array('msg' => "Identifiants invalides"));
		} elseif (isset($this->session->user["status"])) {
			if ($this->session->user["status"] == 'admin') {
				$this->load->view('AdminView');
			} elseif ($this->session->user["status"] == 'reponsable') {
				$this->load->view('ResponsableView');
			} elseif ($this->session->user["status"] == 'client') {
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
			$this->session->set_userdata("user", array("prenom" => $user->getPrenom(), "status" => $user->getStatus(), "id_user" => $user->getId_user()));
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
		redirect("home");
	}

	function register()
	{
		$this->load->view('RegisterView');
	}
}
