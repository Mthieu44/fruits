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
			$this->load->view('ConnexionView', array('msg' => "Connexion refusée : Mot de passe pas bon"));
		} else if ($in == 1) {
			$this->load->view('ConnexionView', array('msg' => "Connexion refusée : Mail pas bon"));
		} else {
			$this->load->view('ConnexionView');
		}

	}

	/*function loginCheck()
	{
		$mail = $this->input->post('mail');
		$password = $this->input->post('mdp');
		$user = $this->UserModel->findByMail($mail);

		if ($user != null && $user->isValidMdp($password)) {
			$this->session->set_userdata("user", array("prenom" => $user->getPrenom(), "status" => $user->getStatus()));
			redirect("home");
			die();
		}
		$this->session->set_flashdata('in', 1);
		redirect("connexion");
	}*/

	function loginCheck(){
		$mail = $this->input->post('mail');
		$password = $this->input->post('password');
		$user = $this->UserModel->findByMail($mail);

		if ($user !=null && $user->isValidPassword($password)) {
			$this->session->set_userdata("user",array("prenom"=>$user->getPrenom(), "status"=>$user->getStatus()));
			redirect("home");
			die();
		}
		$this->load->view('accessDenied.php');
	}

	function logout()
	{
		$this->session->unset_userdata("login");
		$this->session->sess_destroy();
		redirect("home");
	}
}
?>