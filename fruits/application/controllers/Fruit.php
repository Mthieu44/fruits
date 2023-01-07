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
        $this->load->helper(array('form', 'url'));

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


    public function modif($id)
    {
        $fruit = $this->FruitModel->findById($id);
        $this->load->view('modifFruitView', array('fruit' => $fruit));
    }

    public function modifFruit($id)
    {
        $fruit = new fruitEntity();
        $fruit->setId_fruit($id);
        $fruit->setNom($this->input->post('nom'));
        $fruit->setDescription($this->input->post('description'));
        $fruit->setPrix($this->input->post('prix'));
        $fruit->setOrigine($this->input->post('origine'));
        $filename = str_replace(' ', '_', strtolower($this->input->post('nom') . '.png'));
        $fruit->setImage($filename);
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
        if (empty($_FILES['userfile']['name'])) {
            redirect('Connexion');
        } else {
            $config['upload_path']          = './img/fruit/';
            $config['allowed_types']        = 'png';
            $config['max_size']             = 1000000000000000;
            $config['max_width']            = 2000;
            $config['max_height']           = 2000;
            $config['overwrite']            = true;
            $config['file_name']            = $filename;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
                die();
            } else {
                redirect('Connexion');
            }
        }
    }

    public function add()
    {
        $categories = $this->CategoryModel->findAll();
        $this->load->view('addFruitView', array('categories' => $categories));
    }

    public function addFruit()
    {
        $fruit = new fruitEntity();
        $fruit->setNom($this->input->post('nom'));
        $fruit->setDescription($this->input->post('description'));
        $fruit->setPrix($this->input->post('prix'));
        $fruit->setOrigine($this->input->post('origine'));
        $filename = str_replace(' ', '_', strtolower($this->input->post('nom') . '.png'));
        $fruit->setImage($filename);
        $this->FruitModel->add($fruit);
        $fruit = $this->FruitModel->findByNameWithoutCat($fruit->getNom());
        $categories = $this->CategoryModel->findAll();
        $cpt = 0;
        foreach ($categories as $categoriy) {
            if (null !== $this->input->post(str_replace(' ', '_', $categoriy->getNom()))) {
                $cpt = $cpt + 1;
                $this->FruitModel->addCategorieToFruit($fruit->getId_fruit(), $categoriy->getId_Categorie());
            }
        }
        if ($cpt == 0) {
            $this->FruitModel->deleteById($fruit->getId_fruit());
        }

        $config['upload_path']          = './img/fruit/';
        $config['allowed_types']        = 'png';
        $config['max_size']             = 1000000000000000;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;
        $config['overwrite']            = true;
        $config['file_name']            = $filename;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            redirect('fruit/add');
        } else {
            redirect('Connexion');
        }
    }

    public function delete($id)
    {
        $fruit = $this->FruitModel->findById($id);
        if (is_file('./img/fruit' . DIRECTORY_SEPARATOR . $fruit->getImage())) {
            unlink('./img/fruit' . DIRECTORY_SEPARATOR . $fruit->getImage());
        }
        $this->FruitModel->deleteById($id);
        redirect('Connexion');
    }
}
