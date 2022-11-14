<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Boutique extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('FruitModel');
		$this->load->library('session');
	}

	public function index(){
        $this->load->helper('url');
		$fruits = $this->FruitModel->findAll();
		$this->load->view('BoutiqueView', array('fruits' => $fruits));
	}
	public function increase_quantity($id){
		$this->FruitModel->increase_quantity($id);
		redirect('Boutique');
	}
	public function decrease_quantity($id){
		$this->FruitModel->decrease_quantity($id);
		redirect('Boutique');
	}
}
