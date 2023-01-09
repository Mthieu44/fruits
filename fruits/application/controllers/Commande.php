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

    public function validerCommande()
    {
        $adresse = $this->input->post('adresse');
        if ($adresse == null) {
            $adresse = $this->session->user["user"]->adresse;
        }
        $config['mailtype'] = 'html';
        $dataCommande = $this->CommandeModel->CreerCommandePanier($adresse);
        $this->email->from('fruits.juiceco@gmail.com','Fruits ');
        $this->email->to($this->session->user["user"]->mail);
        $this->email->set_header('Content-Type', 'text/html');
        $this->email->subject('Merci pour votre commande !'); 
        
        $data = array(
            'name' => $this->session->user["user"]->prenom,
            'id' => $dataCommande['id'],
            'date' => $dataCommande['date'],
            'fruitsCommandes' => [],
        );
        $data['commandes'] = $this->CommandeModel->findById_User($this->session->user["user"]->id_user);
        
        array_push($data['fruitsCommandes'], $this->CommandeModel->getFruitFrom_IdCommande($dataCommande['id']));
        
        $this->email->message($this->load->view('MailCommande',$data,true));   
        $this->email->send();

        $this->session->unset_userdata('panier');
        $this->session->unset_userdata('fauxpanier');
        $this->session->unset_userdata('total');
        $this->load->view('CommandeValideView');
    }
}