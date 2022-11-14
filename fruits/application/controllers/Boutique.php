<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR."ProduitEntity.php";

class Boutique extends CI_Controller
{

	private array $panier = [];
	private array $fauxPanier = [];

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('FruitModel');
		$this->load->library('session');
		$this->session->set_userdata("panier",$this->panier);
		array_push($this->fauxPanier, new ProduitEntity(1, 2));
		$this->session->set_userdata("fauxPanier",$this->fauxPanier);
	}

	public function index(){
        $this->load->helper('url');
		$fruits = $this->FruitModel->findAll();
		$this->load->view('BoutiqueView', array('fruits' => $fruits));
	}

	public function test(){
		$fruits = $this->FruitModel->findAll();
		$this->load->view('testBoutique', array('fruits' => $fruits));
	}

	public function getQuantity($id){
		for ($i = 0; $i < count($this->session->fauxPanier); $i++) {
			if ($this->session->fauxPanier[$i]->id_fruits == $id) {
				echo($this->session->fauxPanier[$i]->quantity);
			}else{
				echo("0");
			}
		}
	}

	public function increase_quantity($id){
		$produit = new ProduitEntity($id, $this->getQuantity($id) + 1);
		array_push($this->session->fauxPanier, $produit);
		redirect('Boutique');
	}
	public function decrease_quantity($id){
		$fruits = $this->FruitModel->findById($id);
		$this->FruitModel->decrease_quantity($id);
		redirect('Boutique');
	}
}