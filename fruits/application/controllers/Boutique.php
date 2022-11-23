<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR."ProduitEntity.php";

class Boutique extends CI_Controller
{
	private array $panier = [];

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('FruitModel');
		$this->load->model('PanierModel');
		$this->load->library('session');
		if (!isset($this->session->panier)){
			$this->session->set_userdata("panier",array());
		}
		if (!isset($this->session->fauxPanier)){
			$this->session->set_userdata("fauxPanier",array());
		}
		
	}

	public function index(){
        $this->load->helper('url');
		$fruits = $this->FruitModel->findAll();
		$this->load->view('BoutiqueView', array('fruits' => $fruits));
	}


	public function addToPanier(){
		if (isset($_POST['id'], $_POST['quantity'], $_POST['tab'])) {
			$id = $_POST['id'];
			$quantity = $_POST['quantity'];
			$tab = $_POST['tab'];
			$panier = $this->PanierModel->addPanier($id,$quantity,$tab);
			echo $panier;
		}
	}
}