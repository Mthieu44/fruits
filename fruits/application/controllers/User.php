<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "UserEntity.php";
require APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "CommandeEntity.php";


class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('UserModel');

        if (isset($this->session->user["user"])) {
            if ($this->session->user["user"]->status == 'admin') {
            } else {
                redirect('home');
            }
        } else {
            redirect('home');
        }

        if (!isset($this->session->panier)) {
            $this->session->set_userdata("panier", array());
        }
        if (!isset($this->session->fauxPanier)) {
            $this->session->set_userdata("fauxPanier", array());
        }
    }

    public function modif($id)
    {
        $user = $this->UserModel->findById($id);
        $this->load->view('modifUserView', array('user' => $user));
    }

    public function modifUser()
    {
        $user = new UserEntity();
        $user->id_user = $this->input->post('id_user');
        $user->prenom = $this->input->post('prenom');
        $user->nom = $this->input->post('nom');
        $user->mail = $this->input->post('email');
        $user->adresse = $this->input->post('adresse');
        $user->telephone = $this->input->post('telephone');
        $user->sexe = $this->input->post('sexe');
        $user->status = $this->input->post('status');
        $user->setPassword($this->input->post('password'));
        $this->UserModel->modif($user);
        redirect('Connexion');
    }

    public function delete($id)
    {
        $user = $this->UserModel->deleteById($id);
        redirect('Connexion');
    }

    public function add()
    {
        $this->load->view('addUserView');
    }

    public function addUser()
    {
        $user = new UserEntity();
        $user->prenom = $this->input->post('prenom');
        $user->nom = $this->input->post('nom');
        $user->mail = $this->input->post('email');
        $user->adresse = $this->input->post('adresse');
        $user->telephone = $this->input->post('telephone');
        $user->sexe = $this->input->post('sexe');
        $user->status = $this->input->post('status');
        $user->setPassword($this->input->post('password'));
        $this->UserModel->add($user);
        redirect('Connexion');
    }

    public function register()
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
        if ($this->form_validation->run() == false) {
            $this->load->view('RegisterView');
        } else {
            $this->load->library('form_validation');
            $user = new UserEntity();
            $user->prenom = $this->input->post('prenom');
            $user->nom = $this->input->post('nom');
            $user->mail = $this->input->post('email');
            $user->adresse = $this->input->post('adresse');
            $user->telephone = $this->input->post('telephone');
            $user->sexe = $this->input->post('sexe');
            $user->status = $this->input->post('status');
            $user->setPassword($this->input->post('password'));
            $this->UserModel->add($user);
            redirect('Connexion');
        }
    }
}