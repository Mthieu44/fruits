<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "UserEntity.php";

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('UserModel');

        if (isset($this->session->user["user"])) {
            if ($this->session->user["user"]->getStatus() == 'admin') {
            } else {
                $this->load->view('accessDeniedView');
            }
        } else {
            $this->load->view('accessDeniedView');
        }

        if (!isset($this->session->panier)) {
            $this->session->set_userdata("panier", array());
        }
        if (!isset($this->session->fauxPanier)) {
            $this->session->set_userdata("fauxPanier", array());
        }
    }

    function modif($id)
    {
        $user = $this->UserModel->findById($id);
        $this->load->view('modifUserView', array('user' => $user));
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

    function modifUser()
    {
        $user = new UserEntity();
        $user->setId_user($this->input->post('id_user'));
        $user->setPrenom($this->input->post('prenom'));
        $user->setNom($this->input->post('nom'));
        $user->setMail($this->input->post('email'));
        $user->setAdresse($this->input->post('adresse'));
        $user->setTelephone($this->input->post('telephone'));
        $user->setSexe($this->input->post('sexe'));
        $user->setStatus($this->input->post('status'));
        $user->setPassword($this->input->post('password'));
        $this->UserModel->modif($user);
        redirect('Connexion');
    }

    function delete($id)
    {
        $user = $this->UserModel->deleteById($id);
        redirect('Connexion');
    }

    function add()
    {
        $this->load->view('addUserView');
    }

    function addUser()
    {
        $user = new UserEntity();
        $user->setPrenom($this->input->post('prenom'));
        $user->setNom($this->input->post('nom'));
        $user->setMail($this->input->post('email'));
        $user->setAdresse($this->input->post('adresse'));
        $user->setTelephone($this->input->post('telephone'));
        $user->setSexe($this->input->post('sexe'));
        $user->setStatus($this->input->post('status'));
        $user->setPassword($this->input->post('password'));
        $this->UserModel->add($user);
        redirect('Connexion');
    }

    function register()
    {
        $this->load->library('form_validation');

        $config = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            )
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('RegisterView');
        } else {
            $this->load->library('form_validation');
            $user = new UserEntity();
            $user->setPrenom($this->input->post('prenom'));
            $user->setNom($this->input->post('nom'));
            $user->setMail($this->input->post('email'));
            $user->setAdresse($this->input->post('adresse'));
            $user->setTelephone($this->input->post('telephone'));
            $user->setSexe($this->input->post('sexe'));
            $user->setStatus($this->input->post('status'));
            $user->setPassword($this->input->post('password'));
            $this->UserModel->add($user);
            redirect('Connexion');
        }
    }
}
