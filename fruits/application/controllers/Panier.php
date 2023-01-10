<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR."ProduitEntity.php";
require APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "UserEntity.php";


class Panier extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('FruitModel');
        $this->load->model('PanierModel');
        $this->load->library('session');
        if (!isset($this->session->panier)) {
            $this->session->set_userdata("panier", array());
        }
        if (!isset($this->session->fauxPanier)) {
            $this->session->set_userdata("fauxPanier", array());
        }
    }

	// Methode qui permet d'accéder a la page panier
    public function index()
    {
        $this->load->view('PanierView');
    }

	// Methode qui permet d'ajouter un produit au panier
    public function addToPanier()
    {
        if (isset($_POST['id'],$_POST['quantity'],$_POST['tab'])) {
            $id = $_POST['id'];
            $quantity = $_POST['quantity'];
            $tab = $_POST['tab'];
            $total = $_POST['total'];
            $this->session->set_userdata('total', $total);
            $newPanier = $this->PanierModel->addPanier($id, $quantity, $tab);
            $res = ["panier" =>$newPanier, "tab" => $tab,"id" => $id, "quantity" => $quantity ];
            echo json_encode($res);
        } else {
            $res = ["non" => "dommage"];
            echo json_encode($res);
        }
    }



	public function getPanier(){
		$res = []; // get le panier depuis la bd par la suite
		for ($i = 0; $i < count($this->session->panier); $i++ ){
			$new = $this->FruitModel->findById($this->session->panier[$i]->id);
			$fruitDeco = new FruitQuantity($new,$this->session->panier[$i]->quantity);
			array_push($res,$fruitDeco);
		}
		//var_dump($this->session->Panier);
		echo json_encode($res);
	}

	public function getAllFruits(){
		$res = $this->FruitModel->findAll();
		$res2 = array();
		for ($i = 0; $i < count($res); $i++){
			$test = true;
			for ($j = 0; $j < count($this->session->fauxPanier); $j++){
				if ($res[$i]->id_fruit == $this->session->fauxPanier[$j]->id){
					$test = false;
					if($this->session->fauxPanier[$j]->quantity > 0){
						array_push($res2 , new FruitQuantity($res[$i],$this->session->fauxPanier[$j]->quantity));
					}else{
						array_push($res2 , new FruitQuantity($res[$i],0));				
					}
				}
			}
			if ($test){
				array_push($res2 , new FruitQuantity($res[$i],0));	
			}
		}
		echo json_encode($res2);
	}

}

/*
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
*/
