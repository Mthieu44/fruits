<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "UserEntity.php";
require APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "CommandeEntity.php";

class Connexion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('UserModel');
        $this->load->model('FruitModel');
        $this->load->model('CommandeModel');
        if (!isset($this->session->panier)) {
            $this->session->set_userdata("panier", array());
        }
        if (!isset($this->session->fauxPanier)) {
            $this->session->set_userdata("fauxPanier", array());
        }
    }

    public function index()
    {
        $data['fruitsCommandes'] = array();
        $in = $this->session->flashdata('in');
        if ($in == 1) {
            $this->load->view('ConnexionView', array('msg' => "Identifiants invalides"));
        } elseif (isset($this->session->user["user"])) {
            $view = new UserFactory();
            $view2 = $view->makeUser($this->session->user["user"]->status);
            $view2->loadView();
        } else {
            $this->load->view('ConnexionView');
        }
    }

    public function loginCheck()
    {
        $mail = $this->input->post('mail');
        $password = $this->input->post('password');
        $user = $this->UserModel->findByMail($mail);
        if ($user != null && $user->isValidPassword($password)) {
            $this->session->set_userdata("user", array("user" => $user));
            if (count($this->session->panier) > 0) {
                redirect("panier");
                die();
            } else {
                redirect("home");
                die();
            }
        }
        $this->session->set_flashdata('in', 1);
        redirect("Connexion");
    }

    public function modifInformation()
    {
        $user = $this->session->user;
        $this->load->view('modifInformationView', array('user' => $user));
    }

    public function modifInformationUser()
    {
        $user = $this->UserModel->findByMail($this->session->user["user"]->mail);
        $user->prenom = $this->input->post('prenom');
        $user->nom = $this->input->post('nom');
        $user->adresse = $this->input->post('adresse');
        $user->telephone = $this->input->post('telephone');
        $user->sexe = $this->input->post('sexe');
        $this->UserModel->modif($user);
        $this->session->set_userdata("user", array("user" => $user));
        redirect('Connexion');
    }

    public function modifPass()
    {
        $this->load->view('ModifPassView');
    }

    public function modifPassSend()
    {
        $mdpCurrent = $this->input->post('mdpCurrent');
        $user = $this->session->user["user"];
        if ($user != null && $user->isValidPassword($mdpCurrent)) {
            $mdpChange =  $this->input->post('mdpChange');
            $mdpConfirm = $this->input->post('mdpConfirm');
            if ($mdpChange == $mdpConfirm) {
                $user->setPassword($mdpChange);
                $this->UserModel->modif($user);
                redirect('Connexion/modifInformation');
            } else {
                redirect('Connexion/modifPass');
            }
        } else {
            redirect('Connexion/modifPass');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata("login");
        $this->session->sess_destroy();
        redirect("Connexion");
    }

    public function register()
    {
        $this->load->helper('form');
        $this->load->view('RegisterView');
    }

    public function registerRequest()
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
            $this->session->set_flashdata('in', 1);
            $this->load->view('RegisterView', array('msg' => $msg));
        } else {
            $user = new UserEntity();
            $user->prenom = $this->input->post('prenom');
            $user->nom = $this->input->post('nom');
            $user->mail = $this->input->post('email');
            $user->adresse = $this->input->post('adresse');
            $user->telephone = $this->input->post('telephone');
            $user->sexe = $this->input->post('sexe');
            $user->status = 'client';
            $user->setPassword($this->input->post('password'));
            $this->UserModel->add($user);
            $userdb = $this->UserModel->findByMail($this->input->post('email'));
            $user->id_user = $userdb->id_user;
            $this->session->set_userdata("user", array("user" => $user));
            redirect('Home');
        }
    }

    public function forgotPass()
    {
        $this->load->view('ResetPassView');
    }

    public function forgotPassSend()
    {
        $mail = $this->input->post('mail');
        $user = $this->UserModel->findByMail($mail);
        if ($user == null) {
            redirect('Connexion/forgotPass');
        } else {
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

    public function resetPass($id)
    {
        $user = $this->UserModel->findById($id);
        $mail = $user->mail;
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
        $this->email->message("Voici votre nouveau mot de passe : {$randomString}. Un administrateur vous à modifier votre mot de passe désolé pour le dérangement");

        $this->email->send();
        redirect("Connexion");
    }
};



abstract class UserStrategy
{
    abstract public function makeUser($statut);
}

class UserFactory extends UserStrategy
{
    public function makeUser($statut)
    {
        switch ($statut) {
            case "client":
                return new UserClient();
            case "responsable":
                return new UserResp();
            case "admin":
                return new UserAdmin();
        }
    }
}

class UserClient extends UserFactory
{
    public function loadView()
    {
        $CI =& get_instance();
        $data['fruitsCommandes'] = array();

        $users = $CI->UserModel->findAll();
        $data['commandes'] = $CI->CommandeModel->findById_User($CI->session->user["user"]->id_user);
        foreach ($data['commandes'] as $c) {
            array_push($data['fruitsCommandes'], $CI->CommandeModel->getFruitFrom_IdCommande($c->id_commande));
        }
        $CI->load->view('ClientView', $data);
        $CI->load->view('FooterView');
    }
}

class UserResp extends UserFactory
{
    public function loadView()
    {
        $CI =& get_instance();
        $data['fruitsCommandes'] = array();

        $data['fruits'] = $CI->FruitModel->findAll();
        $data['commandes'] = $CI->CommandeModel->findById_User($CI->session->user["user"]->id_user);
        foreach ($data['commandes'] as $c) {
            array_push($data['fruitsCommandes'], $CI->CommandeModel->getFruitFrom_IdCommande($c->id_commande));
        }

        $CI->load->view('ClientView', $data);
        $CI->load->view('ResponsableView');
        $CI->load->view('FooterView');
    }
}

class UserAdmin extends UserFactory
{
    public function loadView()
    {
        $CI =& get_instance();
        $data['fruitsCommandes'] = array();

        $data['users'] = $CI->UserModel->findAll();
        $data['fruits'] = $CI->FruitModel->findAll();
        $data['commandes'] = $CI->CommandeModel->findById_User($CI->session->user["user"]->id_user);
        
        foreach ($data['commandes'] as $c) {
            array_push($data['fruitsCommandes'], $CI->CommandeModel->getFruitFrom_IdCommande($c->id_commande));
        }
        $CI->load->view('ClientView', $data);
        $CI->load->view('ResponsableView');
        $CI->load->view('AdminView');
        $CI->load->view('FooterView');
    }
}



/*
if ($this->session->user["user"]->getStatus() == 'admin') {
                $data['users'] = $this->UserModel->findAll();
                $data['fruits'] = $this->FruitModel->findAll();
                $data['commandes'] = $this->CommandeModel->findById_User($this->session->user["user"]->getId_user());

                foreach ($data['commandes'] as $c){
                    array_push($data['fruitsCommandes'],$this->CommandeModel->getFruitFrom_IdCommande($c->id_commande));
                }
                $this->load->view('ClientView', $data);
                $this->load->view('ResponsableView');
                $this->load->view('AdminView');
            } elseif ($this->session->user["user"]->getStatus() == 'responsable') {
                $data['fruits'] = $this->FruitModel->findAll();
                $data['commandes'] = $this->CommandeModel->findById_User($this->session->user["user"]->getId_user());
                foreach ($data['commandes'] as $c){
                    array_push($data['fruitsCommandes'],$this->CommandeModel->getFruitFrom_IdCommande($c->id_commande));
                }

                $this->load->view('ClientView', $data);
                $this->load->view('ResponsableView');
            } elseif ($this->session->user["user"]->getStatus() == 'client') {
                $users = $this->UserModel->findAll();
                $data['commandes'] = $this->CommandeModel->findById_User($this->session->user["user"]->getId_user());
                foreach ($data['commandes'] as $c){
                    array_push($data['fruitsCommandes'],$this->CommandeModel->getFruitFrom_IdCommande($c->id_commande));
                }
                $this->load->view('ClientView', $data);
            } */