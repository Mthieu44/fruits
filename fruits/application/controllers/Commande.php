<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "UserEntity.php";
require APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "CommandeEntity.php";
require APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "ProduitEntity.php";


class Commande extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		if (!isset($this->session->panier)){
			$this->session->set_userdata("panier",array());
		}
		if (!isset($this->session->fauxPanier)){
			$this->session->set_userdata("fauxPanier",array());
		}
		$this->load->model('CommandeModel');
	}

	public function index()
	{
		if (!isset($this->session->user) || sizeof($this->session->panier) == 0){
			redirect('Panier');
		}
		else {
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->view('CommandeView');
		}
	}

	public function validerCommande(){
		$adresse = $this->input->post('adresse');
		if ($adresse == NULL){
			$adresse = $this->session->user["user"]->getAdresse();
		}
		$this->CommandeModel->CreerCommandePanier($adresse);
		$this->session->unset_userdata('panier');
		$this->session->unset_userdata('fauxpanier');
		$this->load->view('CommandeValideView');
	}



}
