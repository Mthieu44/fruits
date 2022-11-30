<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR."ProduitEntity.php";


class Home extends CI_Controller
{

	public function __construct()
	{
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
		$this->load->view('HomeView', array('fruits' => $fruits));
	}

}
