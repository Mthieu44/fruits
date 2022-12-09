<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "ProduitEntity.php";
require APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "UserEntity.php";


class Panier extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('FruitModel');
        $this->load->model('PanierModel');
        $this->load->library('session');
        if (!isset($this->session->panier)) {
            $this->session->set_userdata("panier", array());
        }
        if (!isset($this->session->fauxPanier)) {
            $this->session->set_userdata("fauxPanier", array());
        }
    }

    public function index()
    {
        $fruits = $this->PanierModel->getPanier();
        $this->load->view('PanierView', array('fruits' => $fruits));
    }

    public function addToPanier()
    {
        if (isset($_POST['fruits'], $_POST['tab'])) {
            $fruits = $_POST['fruits'];
            $tab = $_POST['tab'];
            $this->PanierModel->addPanier($fruits, $tab);
            var_dump($this->session->$tab);
            echo json_encode($this->session->$tab);
        }
    }
    public function getPanier()
    {
        echo json_encode($this->session->panier);
    }
    public function getAllFruits()
    {
        $res = $this->FruitModel->findAll();
        $test = true;
        for ($i = 0; $i < count($res); $i++) {
            for ($j = 0; $j < count($this->session->fauxPanier); $j++) {
                if ($res[$i]->fruits->id == $this->session->fauxPanier[$j]->fruits->id) {
                    $test = false;
                    if ($this->session->fauxPanier[$j]->quantity > 0) {
                        $res[$i]->quantity = $this->session->fauxPanier[$j]->quantity;
                    } else {
                        $res[$i]->quantity = 0;
                    }
                }
            }
            if ($test) {
                $res[$i]->quantity = 0;
            }
        }
        echo json_encode($res);
    }
}
