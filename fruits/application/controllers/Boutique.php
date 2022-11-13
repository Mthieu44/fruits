<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Boutique extends CI_Controller {

	public function index()
	{
        $this->load->helper('url');
		$this->load->model('FruitModel');
		$fruits = $this->FruitModel->findAll();
		$this->load->view('BoutiqueView', array('fruits' => $fruits));
	}
}
