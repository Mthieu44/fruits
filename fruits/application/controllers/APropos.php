<?php
defined('BASEPATH') or exit('No direct script access allowed');

class APropos extends CI_Controller
{

	public function index()
	{
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->view('AProposView');
	}
}
