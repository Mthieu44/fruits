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

	public function test(){
		$fruits = $this->FruitModel->findAll();
		$this->load->view('testBoutique', array('fruits' => $fruits));
	}


	public function modifyProductsQuantity(){
		if (isset($_POST['id'], $_POST['quantity'])) {
			$id = $_POST['id'];
			$quantity = $_POST['quantity'];
			$temp = $this->session->fauxPanier;
			$test = true;
			foreach ($temp as $prod){
				if ($prod->id_fruits == $id){
					$prod->quantity = $quantity;
					$test = false;
					if ($prod->quantity == 0){
						$index = array_search($prod,$temp);
						unset($temp[$index]);
					}
				}
			}
			if($test){
				$produit = new ProduitEntity($id,$quantity);
				$tmp = array($produit);
				if ($temp == null){
					$temp = $tmp;
				}else{
					$temp = array_merge($temp,$tmp);
				}
			}
			$this->session->set_userdata("fauxPanier",$temp);
		}
	}
	public function addPanier(){
		if (isset($_POST['id'], $_POST['quantity'])) {
			$id = $_POST['id'];
			$quantity = $_POST['quantity'];
			if ($quantity != 0) {
				$temp = $this->session->panier;
				$test = true;
				foreach ($temp as $prod){
					if ($prod->id_fruits == $id){
						$prod->quantity = $quantity;
						$test = false;
						if ($prod->quantity == 0){
							$index = array_search($prod,$temp);
							unset($temp[$index]);
						}
					}
				}
				if($test){
					$produit = new ProduitEntity($id,$quantity);
					$tmp = array($produit);
					if ($temp == null){
						$temp = $tmp;
					}else{
						$temp = array_merge($temp,$tmp);
					}
				}
				$this->session->set_userdata("panier",$temp);
				$res = ["size" => count($this->session->panier),"panier" => $this->session->panier];
				echo json_encode($res);
			}
			
		}
	}
}