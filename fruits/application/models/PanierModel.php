<?php

require_once APPPATH.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR."ProduitEntity.php";

class PanierModel extends CI_Model
{
    // fonction qui prend en parametre l'id du fruit concerné, sa quantity et la tableau dans lequel son état doit être modifié
    public function addPanier($id, $quantity, $tab)
    {
        if ($quantity != 0) {
            $temp = $this->session->$tab;
            $test = true;
            foreach ($temp as $prod) { // si le fruit est déjà dans le tableau concerné
                if ($prod->id == $id) {
                    $prod->quantity = $quantity;
                    $test = false;
                    if ($prod->quantity <= 0) {
                        $index = array_search($prod, $temp);
                        unset($temp[$index]);
                    }
                }
            }
            if ($test) { // autrement on crée un produitEntity prennant en parametre l'id et la quantity
                $produit = new ProduitEntity($id, $quantity);
                $tmp = array($produit);
                if ($temp == null) {
                    $temp = $tmp;
                } else {
                    $temp = array_merge($temp, $tmp);
                }
            }
            $this->session->set_userdata($tab, $temp); // on ajoute le tableau final à la variable de session
            $res = ["tab" => $this->session->$tab]; // formate pour encodé en js
            return json_encode($res);
        }
    }

    // Fonction qui retourne tous les fruits présent de le panier courant
    public function getPanier()
    {
        $fruits = array();
        foreach ($this->session->panier as $fruit) { // récupère tous les fruits présent dans le panier de session
            $new = $this->FruitModel->findById($fruit->id_fruits);
            array_push($fruits, $new);
        }
        return $fruits;
    }
}

?>
