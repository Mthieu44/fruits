<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('FruitModel');
		$this->load->library('session');
		if (!isset($this->session->fauxPanier)) {
			$this->session->set_userdata("fauxPanier", array());
		}
	}

	public function index()
	{
		$this->load->helper('url');
		$fruits = $this->FruitModel->findAll();
		$this->load->view('PanierView', array('fruits' => $fruits));
	}
}
