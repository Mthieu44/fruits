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

	public function getPanier(){
		echo json_encode($this->session->panier);
	}
	public function getAllFruits(){
		$res = $this->FruitModel->findAll();
		for ($i = 0; $i < count($res); $i++){
			$res[$i]->quantity = 0;
		}
		echo json_encode($res);
	}

}