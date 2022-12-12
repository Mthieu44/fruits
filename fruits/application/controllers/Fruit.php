<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "FruitEntity.php";
require APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "UserEntity.php";

class Fruit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('FruitModel');
        $this->load->model('CategoryModel');

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
        $fruit = $this->FruitModel->findById($id);
        $this->load->view('modifFruitView', array('fruit' => $fruit));
    }

    function modifFruit($id)
    {
        $fruit = new fruitEntity();
        $fruit->setId_fruit($id);
        $fruit->setNom($this->input->post('nom'));
        $fruit->setDescription($this->input->post('description'));
        $fruit->setPrix($this->input->post('prix'));
        $fruit->setOrigine($this->input->post('origine'));
        $fruit->setImage($this->input->post('image'));/*Trouver solution pour save l'image*/
        $this->FruitModel->modif($fruit);
        $fruit = $this->FruitModel->findByName($fruit->getNom());
        $categories = $this->CategoryModel->findAll();
        $fruitCategory = $this->FruitModel->findFruitCategotiId($fruit);
        foreach ($categories as $categoriy) {
            if (null !== $this->input->post(str_replace(' ', '_', $categoriy->getNom()))) {
                $bool = true;
                foreach ($fruitCategory as $fruitcat) {
                    if ($fruitcat == $categoriy->getId_Categorie()) {
                        $bool = false;
                    }
                }

                if ($bool) {
                    $this->FruitModel->addCategorieToFruit($fruit->getId_fruit(), $categoriy->getId_Categorie());
                }
            } else {
                $this->FruitModel->deleteCategorieToFruit($fruit->getId_fruit(), $categoriy->getId_Categorie());
            }
        }
        redirect('Connexion');
    }

    function add()
    {
        $categories = $this->CategoryModel->findAll();
        $this->load->view('addFruitView', array('categories' => $categories));
    }

    function addFruit()
    {
        $fruit = new fruitEntity();
        $fruit->setNom($this->input->post('nom'));
        $fruit->setDescription($this->input->post('description'));
        $fruit->setPrix($this->input->post('prix'));
        $fruit->setOrigine($this->input->post('origine'));
        $fruit->setImage($this->input->post('image'));/*Trouver solution pour save l'image*/
        $this->FruitModel->add($fruit);
        $fruit = $this->FruitModel->findByName($fruit->getNom());
        $categories = $this->CategoryModel->findAll();
        foreach ($categories as $categoriy) {
            if (null !== $this->input->post(str_replace(' ', '_', $categoriy->getNom()))) {
                $this->FruitModel->addCategorieToFruit($fruit->getId_fruit(), $categoriy->getId_Categorie());
            }
        }
        redirect('Connexion');
    }

    function delete($id)
    {
        $user = $this->FruitModel->deleteById($id);
        redirect('Connexion');
    }
}