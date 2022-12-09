<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "ProduitEntity.php";
require APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "UserEntity.php";

class Boutique extends CI_Controller
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

    public function index()
    {
        $this->load->helper('url');
        $fruits = $this->FruitModel->findAll();
        $this->load->view('BoutiqueView', array('fruits' => $fruits));
    }

    public function addToPanier()
    {
        $id = $this->input->post('id');
        $quantity = $this->input->post('quantity');
        $tab = $this->input->post('tab');
        echo $tab, $id, $quantity;
        if (isset($_POST['id'], $_POST['quantity'], $_POST['tab'])) {
            $fruit = $this->FruitModel->findById($_POST['id']);
            $quantity = $_POST['quantity'];
            $tab = $_POST['tab'];
            $panier = $this->PanierModel->addPanier($fruit, $quantity, $tab);
            echo $panier;
        }
    }
}
