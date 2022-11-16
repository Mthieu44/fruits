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
		$this->session->set_userdata("panier",$this->panier);
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
				return $this->session->fauxPanier[$i]->quantity;
			}else{
				return "0";
			}
		}
	}

	public function increase_quantity($id){
		$temp = $this->session->fauxPanier;
		$test = true;
		foreach ($temp as $prod){
			if ($prod->id_fruits == $id){
				$prod->quantity++;
				$test = false;
			}
		}
		if($test){
			$produit = new ProduitEntity($id,1);
			$tmp = array($produit);
			if ($temp == null){
				$temp = $tmp;
			}else{
				$temp = array_merge($temp,$tmp);
			}
		}
		
		$this->session->set_userdata("fauxPanier",$temp);
		redirect('Boutique');
	}
	public function decrease_quantity($id){
		$temp = $this->session->fauxPanier;
		foreach ($temp as $prod){
			if ($prod->id_fruits == $id && $prod->quantity > 0){
				$prod->quantity--;
				if ($prod->quantity == 0){
					$index = array_search($prod,$temp);
					unset($temp[$index]);
				}
			}
		}
		$this->session->set_userdata("fauxPanier",$temp);
		redirect('Boutique');
	}
}