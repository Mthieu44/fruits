<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "UserEntity.php";
require APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "CommandeEntity.php";
require APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "ProduitEntity.php";

class Commande extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        if (!isset($this->session->panier)) {
            $this->session->set_userdata("panier", array());
        }
        if (!isset($this->session->fauxPanier)) {
            $this->session->set_userdata("fauxPanier", array());
        }
        $this->load->model('FruitModel');
        $this->load->model('CommandeModel');
        if ($this->session->panier == []){
            redirect('Connexion');
        }
    }

    /*
    Méthode qui est exécutée lorsqu'on accède à la page de commande
    et affiche la vue CommandeView. Si la commande se vide, on est
    redirigé vers le panier.
    */
    public function index()
    {
        if (!isset($this->session->user) || sizeof($this->session->panier) == 0) {
            redirect('Panier');
        } else {
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->view('CommandeView');
        }
    }

    /*
    Méthode qui est exécutée lorsqu'on valide la commande et affiche
    la vue CommandeValideView. Envoie un mail de confirmation à l'utilisateur.
    Crée une nouvelle commande dans la base de données.
    */
    public function validerCommande()
    {
        $adresse = $this->input->post('adresse');
        if ($adresse == null) {
            $adresse = $this->session->user["user"]->adresse;
        }

        $config['mailtype'] = 'html';
        $this->email->from('fruits.juiceco@gmail.com','Fruits ');
        $this->email->to($this->session->user["user"]->mail);
        $this->email->set_header('Content-Type', 'text/html');
        $this->email->subject('Merci pour votre commande !'); 
        
        $dataCommande = $this->CommandeModel->CreerCommandePanier($adresse);

        $data = array(
            'name' => $this->session->user["user"]->prenom,
            'date' => $dataCommande['date'],
            'title' => "Merci pour votre commande ",
            'subtitle' => "Voici un résumer de votre commande passé le ",
            'message' => "Vous pouvez consulter votre commande ici !",
        );
        
        $this->email->message($this->load->view('MailCommande',$data,true));   
        $this->email->send();

        $this->session->unset_userdata('panier');
        $this->session->unset_userdata('fauxpanier');
        $this->session->unset_userdata('total');
        $this->load->view('CommandeValideView');
    }
}
