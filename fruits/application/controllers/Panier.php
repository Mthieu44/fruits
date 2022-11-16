<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panier extends CI_Controller {

	public function index()
	{
        $this->load->helper('url');
		$this->load->library('session');
		$this->load->view('PanierView');
	}
}
