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


    /*
    Méthode qui est exécutée lorsqu'on accède à la page d'accueil de la boutique.
    Récupère la liste de tous les fruits et ensuite la vue BoutiqueView est chargée
    avec la liste de fruits est passée en argument.
    */
    public function index()
    {
        $this->load->helper('url');
        $fruits = $this->FruitModel->findAll();
        $this->load->view('BoutiqueView', array('fruits' => $fruits));
    }


    /*
    Méthode qui est exécutée lorsqu'on ajoute un produit au panier. Cette méthode récupère
    l'ID du produit, la quantité puis appelle la méthode addPanier du modèle PanierModel
    pour ajouter le produit au panier.
    */
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

    /*
    Méthode qui est exécutée lorsqu'on clique sur un produit dans la boutique. Cette méthode 
    prend en paramètre l'ID du produit et récupère le produit correspondant à cet ID puis charge
    la vue ProduitView du produit correspondant.
    */

    public function fruit($id)
    {
        $fruit = $this->FruitModel->findbyId($id);
        $this->load->view('ProduitView', array('fruit' => $fruit));
    }
}
