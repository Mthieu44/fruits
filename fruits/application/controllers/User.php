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

        if (isset($this->session->user["status"])) {
            if ($this->session->user["status"] == 'admin') {
            } else {
                $this->load->view('accessDeniedView');
            }
        } else {
            $this->load->view('accessDeniedView');
        }
    }


    function modif($id)
    {
        $user = $this->UserModel->findById($id);
        $this->load->view('modifUserView', array('user' => $user));
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

    function delete($id)
    {
        $user = $this->UserModel->deleteById($id);
        redirect('Connexion');
    }

    function register()
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
}
