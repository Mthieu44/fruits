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
            if ($this->session->user["user"]->status == 'admin') {
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
        $filename = str_replace(' ', '_', strtolower($this->input->post('nom') . '.png'));
        $fruit = new fruitEntity($id, $this->input->post('nom'), $this->input->post('prix'), $this->input->post('description'), $filename, $this->input->post('origine'), []);
        $this->FruitModel->modif($fruit);
        $fruit = $this->FruitModel->findByName($fruit->nom);
        $categories = $this->CategoryModel->findAll();
        $fruitCategory = $this->FruitModel->findFruitCategotiId($fruit);
        foreach ($categories as $categoriy) {
            if (null !== $this->input->post(str_replace(' ', '_', $categoriy->nom))) {
                $bool = true;
                foreach ($fruitCategory as $fruitcat) {
                    if ($fruitcat == $categoriy->id_categorie) {
                        $bool = false;
                    }
                }

                if ($bool) {
                    $this->FruitModel->addCategorieToFruit($fruit->id_fruit, $categoriy->id_categorie);
                }
            } else {
                $this->FruitModel->deleteCategorieToFruit($fruit->id_fruit, $categoriy->id_categorie);
            }
        }
        if (empty($_FILES['userfile']['name'])) {
            /*rename old image si nom change a faire*/
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
        $filename = str_replace(' ', '_', strtolower($this->input->post('nom') . '.png'));
        $fruit = new fruitEntity('0', $this->input->post('nom'), $this->input->post('prix'), $this->input->post('description'), $filename, $this->input->post('origine'), []);
        $this->FruitModel->add($fruit);
        $fruit = $this->FruitModel->findByNameWithoutCat($fruit->nom);
        $categories = $this->CategoryModel->findAll();
        $cpt = 0;
        foreach ($categories as $categoriy) {
            if (null !== $this->input->post(str_replace(' ', '_', $categoriy->nom))) {
                $cpt = $cpt + 1;
                $this->FruitModel->addCategorieToFruit($fruit->id_fruit, $categoriy->id_categorie);
            }
        }
        if ($cpt == 0) {
            $this->FruitModel->deleteById($fruit->id_fruit);
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
        if (is_file('./img/fruit' . DIRECTORY_SEPARATOR . $fruit->image)) {
            unlink('./img/fruit' . DIRECTORY_SEPARATOR . $fruit->image);
        }
        $this->FruitModel->deleteById($id);
        redirect('Connexion');
    }
}