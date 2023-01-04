<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "UserEntity.php";

class Connexion extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('UserModel');
        $this->load->model('FruitModel');
        if (!isset($this->session->panier)) {
            $this->session->set_userdata("panier", array());
        }
        if (!isset($this->session->fauxPanier)) {
            $this->session->set_userdata("fauxPanier", array());
        }
    }

    function index()
    {
        $in = $this->session->flashdata('in');
        if ($in == 1) {
            $this->load->view('ConnexionView', array('msg' => "Identifiants invalides"));
        } elseif (isset($this->session->user["user"])) {
            if ($this->session->user["user"]->getStatus() == 'admin') {
                $data['users'] = $this->UserModel->findAll();
                $data['fruits'] = $this->FruitModel->findAll();
                $this->load->view('ClientView', $data);
                $this->load->view('ResponsableView');
                $this->load->view('AdminView');
            } elseif ($this->session->user["user"]->getStatus() == 'responsable') {
                $data['fruits'] = $this->FruitModel->findAll();
                $this->load->view('ClientView', $data);
                $this->load->view('ResponsableView');
            } elseif ($this->session->user["user"]->getStatus() == 'client') {
                $users = $this->UserModel->findAll();
                $this->load->view('ClientView');
            }
        } else {
            $this->load->view('ConnexionView');
        }
    }

    function loginCheck()
    {
        $mail = $this->input->post('mail');
        $password = $this->input->post('password');
        $user = $this->UserModel->findByMail($mail);
        if ($user != null && $user->isValidPassword($password)) {
            $this->session->set_userdata("user", array("user" => $user));
            if (count($this->session->panier) > 0 ){
                redirect("panier");
                die();
            }else{
                redirect("home");
                die();
            }
            
        }
        $this->session->set_flashdata('in', 1);
        redirect("Connexion");
    }

    function modifInformation()
    {
        $user = $this->session->user;
        $this->load->view('modifInformationView', array('user' => $user));
    }

    function modifInformationUser()
    {
        $user = $this->UserModel->findByMail($this->session->user["user"]->getMail());
        $user->setPrenom($this->input->post('prenom'));
        $user->setNom($this->input->post('nom'));
        $user->setAdresse($this->input->post('adresse'));
        $user->setTelephone($this->input->post('telephone'));
        $user->setSexe($this->input->post('sexe'));
        $this->UserModel->modif($user);
        $this->session->set_userdata("user", array("user" => $user));
        redirect('Connexion');
    }

    function modifPass(){
        $this->load->view('ModifPassView');
    }

    function modifPassSend(){
        $mdpCurrent = $this->input->post('mdpCurrent');
        $user = $this->session->user["user"];
        if ($user != null && $user->isValidPassword($mdpCurrent)){
            $mdpChange =  $this->input->post('mdpChange');
            $mdpConfirm = $this->input->post('mdpConfirm');
            if ($mdpChange == $mdpConfirm){
                $user->setPassword($mdpChange);
                $this->UserModel->modif($user);
                redirect('Connexion/modifInformation');
            }else{
                redirect('Connexion/modifPass');
            }
        }else{
            redirect('Connexion/modifPass');
        }

    }

    function logout()
    {
        $this->session->unset_userdata("login");
        $this->session->sess_destroy();
        redirect("Connexion");
    }

    function register()
    {
        $this->load->helper('form');
        $this->load->view('RegisterView');
    }

    function registerRequest()
    {
        $valid = true;
        if ($this->UserModel->findByMail($this->input->post('email')) != null) {
            $msg = 'Mail dèjà utilisé';
            $valid = false;
        }
        if ($this->input->post('password') != $this->input->post('passwordComfirm')) {
            $msg = 'Mot de passe incorrect';
            $valid = false;
        }
        if (!$valid) {
            $this->load->view('RegisterView');
        } else {
            $user = new UserEntity();
            $user->setPrenom($this->input->post('prenom'));
            $user->setNom($this->input->post('nom'));
            $user->setMail($this->input->post('email'));
            $user->setAdresse($this->input->post('adresse'));
            $user->setTelephone($this->input->post('telephone'));
            $user->setSexe($this->input->post('sexe'));
            $user->setStatus('client');
            $user->setPassword($this->input->post('password'));
            $this->UserModel->add($user);
            $this->session->set_userdata("user", array("prenom" => $user->getPrenom(), "status" => $user->getStatus(), "user" => $user));
            redirect('Home');
        }
    }

    function forgotPass(){
        $this->load->view('ResetPassView');
    }

    function forgotPassSend(){
        $mail = $this->input->post('mail');
        $user = $this->UserModel->findByMail($mail);
        if ($user == null){
            redirect('Connexion/forgotPass');
        }else{
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 15; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            $user->setPassword($randomString);
            $this->UserModel->modif($user);

            $this->email->from('fruits.juiceco@gmail.com', 'Fruits');
            $this->email->to($mail);

            $this->email->subject('Réinitialisation du mot de passe');
            $this->email->message("Voici votre nouveau mot de passe : {$randomString}. Si vous n'êtes pas à l'origine de cette demande, tant pis pour vous");

            $this->email->send();
            redirect("Connexion");
        }
    }
}
