<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "UserEntity.php";

class Contact extends CI_Controller
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
    }

	// Méthode qui permet d'afficher la page de contact
    public function index()
    {
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->view('ContactView');
    }

	// Méthode qui permet d'envoyer un email à fruits.juiceco@gmail.com
    public function sendmessage()
    {
        $prenom = $this->input->post('prenom');
        $nom = $this->input->post('nom');
        $objet = $this->input->post('objet');
        $mail = $this->input->post('mail');
        $message = $this->input->post('message');

        $this->email->from($mail, $prenom);
        $this->email->to('fruits.juiceco@gmail.com');

        $this->email->subject($objet);
        $this->email->message($message);

        $this->email->send();
        redirect("Contact");
    }
}
