<?php
defined('BASEPATH') or exit('No direct script access allowed');

class APropos extends CI_Controller
{
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
	
	public function index()
	{
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->view('AProposView');
	}
}
