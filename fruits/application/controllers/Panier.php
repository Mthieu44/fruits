<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR."ProduitEntity.php";


class Panier extends CI_Controller {

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
        $fruits = $this->PanierModel->getPanier();
		$this->load->view('PanierView', array('fruits' => $fruits));
	}

	public function addToPanier(){
		if (isset($_POST['id'],$_POST['quantity'],$_POST['tab'])){
			$id = $_POST['id'];
			$quantity = $_POST['quantity'];
			$tab = $_POST['tab'];
			
			$newPanier = $this->PanierModel->addPanier($id,$quantity,$tab);
			$res = ["panier" =>$newPanier, "tab" => $tab,"id" => $id, "quantity" => $quantity ];
			echo json_encode($res);
		}else{
			$res = ["non" => "dommage"];
			echo json_encode($res);
		}
	}


	public function getPanier(){
		$res = []; // get le panier depuis la bd par la suite
		for ($i = 0; $i < count($this->session->panier); $i++ ){
			$new = $this->FruitModel->findById($this->session->panier[$i]->id);
			$new->quantity = $this->session->panier[$i]->quantity;
			array_push($res,$new);
		}
		//var_dump($this->session->Panier);
		echo json_encode($res);
	}
	public function getAllFruits(){
		$res = $this->FruitModel->findAll();
		for ($i = 0; $i < count($res); $i++){
			$test = true;
			for ($j = 0; $j < count($this->session->fauxPanier); $j++){
				if ($res[$i]->getId_fruit() == $this->session->fauxPanier[$j]->id){
					$test = false;
					if($this->session->fauxPanier[$j]->quantity > 0){
						$res[$i]->quantity = $this->session->fauxPanier[$j]->quantity;
					}else{
						$res[$i]->quantity = 0;					
					}
				}
			}
			if ($test){
				$res[$i]->quantity = 0;
			}
		}
		echo json_encode($res);
	}

}
