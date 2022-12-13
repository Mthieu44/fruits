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
        $fruit->setImage($this->input->post('nom') . '.png');
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

        /*$config = array(
            'upload_path'     => "./uploads",
            'allowed_types' => "png",
            'overwrite' => true,
            'max_size' => "20000000000",
            'max_height' => "10000",
            'max_width' => "10000"
        );
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
            echo "file upload success";
        } else {
            echo "file upload failed";
        }
        die();*/

        redirect('Connexion');
    }

    function delete($id)
    {
        $this->load->helper("file");
        /*$fruit = $this->FruitModel->findById($id);
        unlink(base_url("img/fruit" . DIRECTORY_SEPARATOR . $fruit->getImage()));*/
        $user = $this->FruitModel->deleteById($id);
        redirect('Connexion');
    }
}
