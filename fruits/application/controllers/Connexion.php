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

    /*
    Méthode qui est exécutée lorsqu'on accède à la page de connexion
    et affiche la vue ConnexionView. 
    */
    public function index()
    {
        $data['fruitsCommandes'] = array();
        $in = $this->session->flashdata('in');
        if ($in == 1) {
            $this->load->view('ConnexionView', array('msg' => "Identifiants invalides"));
        } elseif (isset($this->session->user["user"])) {
            $view = UserFactory::makeUser($this->session->user["user"]->status);
            $view->loadView();
        } else {
            $this->load->view('ConnexionView');
        }
    }

    /*
    Méthode qui est exécutée lorsqu'on appuie sur le bouton "connexion" et
    affiche la vue panierView/HomeView si les identifiants sont valides, sinon
    affiche la vue ConnexionView avec un message d'erreur.
    */
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

    /*
    Méthode qui affiche la vue modifInformationView et qui est exécutée lorsqu'on
    appuie sur le bouton "modifier mes informations".
    */
    public function modifInformation()
    {
        $user = $this->session->user;
        $this->load->view('modifInformationView', array('user' => $user));
    }

    /*
    Méthode qui est exécutée lorsqu'on appuie sur le bouton "modifier" et
    change les informations de l'utilisateur. Redirige enfin vers la vue
    ConnexionView.
    */
    public function modifInformationUser()
    {

        if (strip_tags($this->input->post('prenom')) != $this->input->post('prenom') || 
            strip_tags($this->input->post('nom')) != $this->input->post('nom') ||
            strip_tags($this->input->post('email')) != $this->input->post('email') ||
            strip_tags($this->input->post('adresse')) != $this->input->post('adresse') ||
            strlen($this->input->post('telephone')) != 10 ||
            strip_tags($this->input->post('telephone')) != $this->input->post('telephone')){
                $msg = 'Pas cool les injections';redirect('connexion');
        }

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

    /*
    Méthode qui affiche la vue ModifPasswordView.
    */
    public function modifPass()
    {
        $this->load->view('ModifPassView');
    }

    /*
    Méthode qui est exécutée lorsqu'on modifie le mot de passe et qui change le mot de passe
    de l'utilisateur. Redirige sur la page de modification si le mot de passe confirmé est correct,
    sinon reste sur la page.
    */
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

    /*
    Méthode qui est exécutée lorsqu'on appuie sur le bouton "se déconnecter" et
    déconnecte l'utilisateur. Redirige sur la page de connexion. Détruit la session.
    */
    public function logout()
    {
        $this->session->unset_userdata("login");
        $this->session->sess_destroy();
        redirect("Connexion");
    }

    /*
    Méthode qui est exécutée lorsqu'on appuie sur le bouton "s'inscrire" et
    affiche la vue InscriptionView.
    */
    public function register()
    {
        $this->load->helper('form');
        $this->load->view('RegisterView');
    }

    /* Crée un nouvel utilisateur et l'ajoute à la base de données. Effectue
    les vérifications nécessaires. Redirige vers la vue HomeView si réussite,
    sinon ConnexionView.
    */
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

        if (strip_tags($this->input->post('prenom')) != $this->input->post('prenom') || 
            strip_tags($this->input->post('nom')) != $this->input->post('nom') ||
            strip_tags($this->input->post('email')) != $this->input->post('email') ||
            strip_tags($this->input->post('adresse')) != $this->input->post('adresse') ||
            strip_tags($this->input->post('password')) != $this->input->post('password') ||
            strlen($this->input->post('telephone')) != 10 ||
            strip_tags($this->input->post('telephone')) != $this->input->post('telephone')){
                $msg = 'Pas cool les injections';
                $valid = false;
            }

        //Si les données sont invalides, on envoir le message d'erreur en flashdata.
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

    /*
    Méthode qui est exécutée lorsqu'on appuie sur le bouton "mot de passe oublié" et
    affiche la vue ForgotPasswordView.
    */
    public function forgotPass()
    {
        $this->load->view('ResetPassView');
    }

    /*
    Méthode qui est exécutée lorsque l'on accède à la vue ResetPassView et
    qui envoie un mail à l'utilisateur avec un nouveau mot de passe pour
    réinitialiser son mot de passe.
    */
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

            $config['mailtype'] = 'html';
            $this->email->from('fruits.juiceco@gmail.com', 'Fruits');
            $this->email->to($mail);
            $this->email->set_header('Content-Type', 'text/html');

            $this->email->subject('Réinitialisation du mot de passe');

            $data = array(
                'title' => "Réinitialisation de votre mot de passe ",
                'subtitle' => "Vous êtes à la dernière étape, courage ! ",
                'message' => "Voici votre nouveau mot de passe {$randomString}. Si vous n'êtes pas à l'origine de cette demande, tant pis pour vous",
            );

            $this->email->message($this->load->view('MailCommande',$data,true));   
            $this->email->send();

            redirect("Connexion");
        }
    }

   /*
    Méthode qui est exécutée lorsque l'administrateur réinitialise le mot
    de passe d'un utilisateur et qui envoie un mail à l'utilisateur avec
    un nouveau mot de passe.
    */
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


//------ Design pattern Strategy & Factory ------

abstract class UserStrategy
{
    abstract public function loadView();
}

/*
Classe qui permet de choisir les vues à charger.
*/
class UserFactory
{
    public static function makeUser($statut)
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

/*
Vue pour les clients.
*/
class UserClient extends UserStrategy
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

/*
Vue pour les responsables.
*/
class UserResp extends UserStrategy
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

/*
Vue pour les administrateurs.
*/
class UserAdmin extends UserStrategy
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
